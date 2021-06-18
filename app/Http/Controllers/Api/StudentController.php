<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function uploadPhoto(Request $request) {

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->all();
        
        $data['photo'] = $request->file('photo')->store(
            'assets/photo', 'public'
        );        

        $item = Student::find(Auth::id());

        $item->update($data);

        return response()->json([
            'success' => 'Foto profile tersimpan',
        ], 200);     
    }
}
