<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presences;
use App\Student;
use App\Time;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class PresencesController extends Controller
{
    public function index() {
        // $data = Presences::with('student')->get();
        // $data = Presences::all();

        // return view('pages.absen.index', [
        //     'presences' => $data,
        //     'students' => Student::get(),
        // ]);

        $artikel = Presences::where('tanggal', Carbon::today())->with('student')->orderBy('jam', 'DESC')->limit(6)->get();
    	return view('pages.absen.index',['presences' => $artikel]);
    }

    public function ajaxRequestPost(Request $request, Student $id) {

        $text = $request->input('rfid_id');
     

        
        if (Student::where('rfid', '=', $request->input('rfid_id'))->exists()) {
    
            $data['rfid_id']= $text;
            $data['jam']= date('H:i:s');
            $data['tanggal']= date('Y-m-d');
            $time_in = Time::where('id','=',  1)->first()->jam_masuk;
            $time_out = Time::where('id','=',  1)->first()->jam_pulang;
            // dd($time_in);
            // jadi ini terakhir bisa absenya jam 7:15 = jam masuk
            if (strtotime($data['jam']) <= strtotime($time_in)) {
                $data['kehadiran'] = 'Tepat Waktu';
                $data['keterangan'] = 'Masuk';
                // jika presensi lebih dari jam masuk maka ket nya terlambat
            } else if (strtotime($data['jam']) >= strtotime($time_in) && strtotime($data['jam']) <= strtotime($time_out)) {
                $data['kehadiran'] = 'Terlambat';
                $data['keterangan'] = 'Masuk';
                // pulang duluan di hapus aja
            } 
            // else if (strtotime($data['jam']) > strtotime('11:00:00') && strtotime($data['jam']) <= strtotime('15:00:00')) {
            //     $data['kehadiran'] = 'Pulang Duluan';
            //     $data['keterangan'] = 'Pulang';
            //     // ini jam pulang jika lebih dari jam plng itu tepat waktu
            // } 
            else if (strtotime($data['jam']) >= strtotime($time_out)) {
                $data['kehadiran'] = 'Tepat Waktu';
                $data['keterangan'] = 'Pulang';
            } 
            
            else {
                Alert::warning('Gagal', 'Belum waktunya presensi');
            }

            // if(Presences::where('rfid_id', '=', $request->input('rfid_id') > 2 )) {
            //     Alert::warning('Gagal', 'Anda sudah absen');
            // } else {
            //     Alert::success('Berhasil', 'Anda Telah Melakukan Presensi Pada Pukul ... ');
            // }
            

            // LANJUTKAN INI UNTUK PENGECEKAN AGAR TIDAK 2 KALI ABSEN
            $count = Presences::where('rfid_id', $request->input('rfid_id'))->count();
            $date = Presences::where('tanggal', '=', date('Y-m-d'))->pluck('rfid_id');
            
            $rfid = Presences::where('rfid_id', $request->input('rfid_id'))->pluck('tanggal');

            // dd($rfid);

            $time = Presences::where('jam', '<=', strtotime('23:00:00'))->count();
            
            // $ket = Presences::where('kehadiran', '=', 'Masuk')->count();
            // dd($count);
            $tgl = Presences::where('rfid_id', $request->input('rfid_id'))->where('tanggal', Carbon::today())->count();

            $tgl_plng = Presences::where('rfid_id', $request->input('rfid_id'))->where('tanggal', Carbon::today()->format('Y-m-d'))->where('keterangan', '=','Pulang')->count();
            // $tgl = Carbon::today()->format('Y-m-d');

            // $ket = Presences::where('keterangan', '=','Pulang')->Where('rfid_id', $request->input('rfid_id'))->count();

            // $jam = Time::pluck('jam_masuk');


    
            // ini diganti dengan jam 15 atau jam pulang
            if ($tgl > 0 && strtotime($data['jam']) <= strtotime($time_out) && $count > 0) {
                Alert::error('Gagal', 'Anda sudah presensi masuk');
                // lalu ini sama diganti dengan jam pulang tapi lebih dari atau sama dengan >= jam pulang 
            } else if ($tgl_plng > 0 && $count > 0 && strtotime($data['jam']) >= strtotime($time_out) ) {
                Alert::error('Gagal', 'Anda sudah presensi pulang');
            } else if(date('l') == 'Saturday' || date('l') == 'Sunday') {
                Alert::error('Gagal', 'Hari libur tidak bisa melakukan presensi');
            } 
            else {


                $SERVER_API_KEY = 'AAAA0Gynpx8:APA91bGZ_Bhq-7pDDmUgDdEoxxQ2pTSQiJNicyck2P9apJwkSDUvyq8KBGubZQu_Wu0x1UZeElbQF_Lp2CUZc1IA0DMf9DNmoE2z0nwWukTb4sIjUvykkRxis5vPOXtVag8k_-Cg_DI5';

                $url = 'https://fcm.googleapis.com/fcm/send';

                $nis = Student::where('rfid', $request->input('rfid_id'))->first()->nis;
                $name = Student::where('rfid', $request->input('rfid_id'))->first()->name;
                $photo = Student::where('rfid', $request->input('rfid_id'))->first()->photo;
                $jam = date('H:i');

                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization'=> 'key='. $SERVER_API_KEY,
                ])->post($url, [
                    'notification' => [
                        'title' => 'Laporan Presensi Terdeteksi',
                        'body' => "Ananda $name Berhasil Presensi Pada Pukul $jam",                        
                    ],
                    'priority'=> 'high',
                    'data' => [
                        'click_action'=> 'FLUTTER_NOTIFICATION_CLICK',
                        
                        'status'=> 'done',
                        
                    ],
                    'to' => '/topics/' . $nis,
                ]);
                $data['created_at'] = Carbon::now();
                Presences::insert($data);
                Alert::success('Hai, ' . $name, 'Anda Telah Melakukan Tap Presensi' );
            }
            
        } else {

            Alert::error('Gagal', 'ID Tidak Ditemukan');
        }        

        return back();
    }

}
