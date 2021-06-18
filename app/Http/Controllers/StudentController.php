<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Kelas;
use Datatables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;    
use Illuminate\Support\Facades\Crypt;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return Datatables::of(Student::all())->make(true);
        $kelas = Kelas::all();

        $data = Student::all();
        return view('pages.admin.siswa.index', [
            'student' => $data,
            'kelas' => $kelas
        ]);
    }

    public function json(Request $request)
	{
        // return Datatables::of(Student::all())->make(true);
        if ($request->ajax()) {
            $data = Student::select('*');
            return Datatables::of($data->with('kelas'))
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        
                            $btn = '<a href="/admin/siswa/'. $data->rfid .'" class="m-1 edit btn btn-info btn-sm">View</a>';
                            $btn = $btn.'<a href="/admin/siswa/'. $data->rfid .'/edit" class="m-1 edit btn btn-primary btn-sm">Edit</a>';
                            $btn = $btn. '<button type="button" name="delete" id="'.$data->rfid.'" class="m-1 delete btn btn-danger btn-sm">Delete</button>';
         
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rand = mt_rand(100000,999999);

        $pw = '*' .$rand;

        // $encrypted = Crypt::encryptString('Belajar Laravel Di malasngoding.com');
		// $decrypted = Crypt::decryptString($encrypted);
 
		// echo "Hasil Enkripsi : " . $encrypted;
		// echo "<br/>";
		// echo "<br/>";
		// echo "Hasil Dekripsi : " . $decrypted;

        $kelas = Kelas::all();
        return view('pages.admin.siswa.create', [
            'pw' => $pw,
            'kelas' => $kelas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $password = request('password'); // get the value of password field
        $data['password'] = Hash::make($password); 
        $data['log_pass'] = $password; 

        Student::create($data);
        Alert::success('Berhasil', ' Siswa Baru Berhasil ditambahkan');
        return redirect()->route('siswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Student::findOrFail($id);

        return view('pages.admin.siswa.detail', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $kelas = Kelas::all();
        
        return view('pages.admin.siswa.edit', [
            'student' => $student,
            'kelas' => $kelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $student = Student::findOrFail($id);

        $student->update($data);
        Alert::success('Berhasil', ' Siswa Berhasil diperbarui');
        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Student::findOrFail($id);

        $data->delete();
        Alert::success('Berhasil', ' Siswa Berhasil dihapus');
        return back();
    }
}
