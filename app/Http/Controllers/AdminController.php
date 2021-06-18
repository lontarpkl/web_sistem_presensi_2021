<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Presences;
use App\Kelas;
use App\Post;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function index() {
            $data = Presences::selectRaw("rfid_id,count(id) as presences")
                ->groupBy('rfid_id')
                ->orderBy('presences','DESC')
                ->where('keterangan', 'masuk')
                ->whereBetween('tanggal', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->limit('3')
                ->get();


        
        return view('pages.admin.index',[
            'data' => $data,
            'student' => Student::count(),
            'kelas' => Kelas::count(),
            'presensi' => Presences::where('tanggal', Carbon::today())->count(),
            'pengumuman' => Post::count(),
            'posts' => Post::orderBy('created_at', 'DESC')->limit(3)->get(),

        ]);
    }
}
