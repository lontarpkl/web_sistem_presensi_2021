<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Time;
use RealRashid\SweetAlert\Facades\Alert;


class SettingController extends Controller
{
    public function index() {
        return view('pages.admin.setting.index',[
            'time' => Time::first(),
        ]);
    }

    public function changeTime(Request $request) {

        if ($request->has('form1')) {
            //handle form1
            $data['jam_masuk'] = $request->input('jam_masuk');
        
        }
        if ($request->has('form2')) {
            //handle form2
            $data['jam_pulang'] = $request->input('jam_pulang');
        }

        Time::first()->update($data);
        Alert::success('Berhasil', 'Waktu berhasil di ubah');
        return back();
    }
}
