<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Student;
use App\Presences;
use Carbon\Carbon;



class PresencesController extends Controller
{
    public function present() {
        // $presensi = Auth::user()->with('presents')->find(Auth::id());
        // $pres = Student::find(Auth::id())->presents;
        $pres = Presences::where('rfid_id', Auth::guard('student')->id())
        ->orderBy('tanggal', 'DESC')
        ->orderBy('jam', 'DESC')
        ->get();
        // $pres = Auth::user();
        
        return response()->json(   
            $pres
        , 200);
    }

    public function report(Request $request) {
        
        $minggu = Presences::where('rfid_id', Auth::guard('student')->id())
        ->whereBetween(('tanggal'),[ 
            Carbon::now()->startOfWeek(), 
            Carbon::now()->endOfWeek()])
        ->count();

        $minggu_masuk = Presences::where('rfid_id', Auth::guard('student')->id())
        ->where('keterangan', 'Masuk')
        ->whereBetween(('tanggal'),[ 
            Carbon::now()->startOfWeek(), 
            Carbon::now()->endOfWeek()])
        ->count();

        $minggu_pulang = Presences::where('rfid_id', Auth::guard('student')->id())
        ->where('keterangan', 'Pulang')
        ->whereBetween(('tanggal'),[ 
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()])
        ->count();

        $bulan = Presences::where('rfid_id', Auth::guard('student')->id())
        ->whereBetween(('tanggal'),[ 
            Carbon::now()->startOfMonth(), 
            Carbon::now()->endOfMonth()])
        ->count();

        $bulan_masuk = Presences::where('rfid_id', Auth::guard('student')->id())
        ->where('keterangan', 'Masuk')
        ->whereBetween(('tanggal'),[ 
            Carbon::now()->startOfMonth(), 
            Carbon::now()->endOfMonth()])
        ->count();

        $bulan_pulang = Presences::where('rfid_id', Auth::guard('student')->id())
        ->where('keterangan', 'Pulang')
        ->whereBetween(('tanggal'),[ 
            Carbon::now()->startOfMonth(), 
            Carbon::now()->endOfMonth()])
        ->count();    
        
        return response()->json([   
            'minggu' => $minggu,
            'minggu_masuk' => $minggu_masuk,
            'minggu_pulang' => $minggu_pulang,
            'bulan' => $bulan,
            'bulan_masuk' => $bulan_masuk,
            'bulan_pulang' => $bulan_pulang,
        ], 200);
    }
}
