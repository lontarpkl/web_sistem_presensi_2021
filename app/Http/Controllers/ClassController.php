<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Kelas;
use Datatables;


class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    
    {

        

        $kelas = Kelas::get();
        return view('pages.admin.kelas.index',[
            'kelas' => $kelas
        ]);
    }

    public function json(Request $request)
	{
        // return Datatables::of(Student::all())->make(true);
        if ($request->ajax()) {
            $data = Kelas::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        
                    
                            // $btn = '<a href="/admin/kelas/'. $data->id .'/edit" class="m-1 edit btn btn-primary btn-sm">Edit</a>';
                            $btn = '<button type="button" name="delete" id="'.$data->id.'" class="m-1 delete btn btn-danger btn-sm">Delete</button>';
        
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
        return view('pages.admin.kelas.create');
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

        Kelas::create($data);
        Alert::success('Berhasil', ' Kelas Baru Berhasil ditambahkan');
        return redirect()->route('kelas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        
        return view('pages.admin.kelas.edit', [
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

        $kelas = Kelas::findOrFail($id);

        $kelas->update($data);
        Alert::success('Berhasil', ' Kelas Berhasil diperbarui');
        return redirect()->route('kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kelas::findOrFail($id);

        $data->delete();
        Alert::success('Berhasil', 'Kelas Berhasil dihapus');
        return back();
    }
}
