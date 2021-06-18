<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presences;
use App\Student;
use App\Kelas;
use DB;
use Datatables;
use PDF;

class ReportController extends Controller
{
    public function index(Request $request) {
        

        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');
        $class = $request->input('class');

        $total = Student::withCount(['presents',
        'presents as masuk_presents_count' => function ($query) use ($from_date, $to_date) {
            $query->where('keterangan', 'masuk')->whereBetween(('tanggal'), [$from_date, $to_date]);
        },
        'presents as pulang_presents_count' => function ($query) use ($from_date, $to_date) {
            $query->where('keterangan', 'pulang')->whereBetween(('tanggal'), [$from_date, $to_date]);
        },
        ])
        ->join('class', 'students.id_class', '=', 'class.id')
        ->where('class', $class)
        ->get();

        
        
        
        return view('pages.admin.laporan.index',[
            'from' => $request->input('from_date'),
            'to' => $request->input('to_date'),
            'student' => $total,
            'kelas' => Kelas::all()
        ]);
    }

    public function pdf(Request $request) {
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');
        $class = $request->input('class');

        $total = Student::withCount(['presents',
        'presents as masuk_presents_count' => function ($query) use ($from_date, $to_date) {
            $query->where('keterangan', 'masuk')->whereBetween(('tanggal'), [$from_date, $to_date]);
        },
        'presents as pulang_presents_count' => function ($query) use ($from_date, $to_date) {
            $query->where('keterangan', 'pulang')->whereBetween(('tanggal'), [$from_date, $to_date]);
        },
        ])
        // ->with(['kelas' => function($query) {
        //     $query->where('class', '=', '11-RPL-1');
        // }])
        ->join('class', 'students.id_class', '=', 'class.id')
        ->where('class', $class)
        ->get();

        $pdf = PDF::loadView('pages.admin.laporan.report', [
            'from' => $request->input('from_date'),
            'to' => $request->input('to_date'),
            'student' => $total,
            'kelas' => Kelas::all()
        ]);
        return $pdf->download('Laporan.pdf');
    }

    public function json() {
        // hitung jumlah presensi
        $total = Student::withCount(['presents',
        'presents as masuk_presents_count' => function ($query) {
            $query->where('keterangan', 'masuk');
        },
        'presents as pulang_presents_count' => function ($query) {
            $query->where('keterangan', 'pulang');
        },
        
        ])
        ->get();
        return Datatables::of($total)->make(true);
    }
}
