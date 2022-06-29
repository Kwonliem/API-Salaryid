<?php

namespace App\Http\Controllers;
use App\Jabatan;
use App\Karyawan;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $karyawan = Karyawan::paginate(5);
        $jabatan = Jabatan::all();
        return view('karyawan.index', compact('karyawan','jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator =Validator::make($input, [
            'nama_karyawan' => 'max:50',
            'nomer_hp',
            'username',
            'password',
        ]);

        if($validator->fails())
        {
            return back()->withInput();
        }

        $input['password'] = password_hash($request->input('password'), PASSWORD_DEFAULT);
        $input['tanggal_masuk'] = date('Y-m-d');

        Karyawan::create($input);
        return redirect('/karyawan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $karyawan = Karyawan::find($id);
        $jabatan = Jabatan::all();
        return view('karyawan.detail', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawan = Karyawan::find($id);
        $jabatan = Jabatan::all();

        return view('karyawan.edit', compact('karyawan', 'jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);
        $input = $request->all();
        $validator =Validator::make($input, [
            'nama_karyawan' => 'max:50',
            'nomer_hp',
            'username',
            'password',
        ]);

        if($validator->fails())
        {
            return back()->withInput();
        }
        $input['tanggal_masuk'] = date('Y-m-d');

        if($request->input('password'))
        {
            $input['password'] = password_hash($request->input('password'), PASSWORD_DEFAULT);
        }else{
            $input = Arr::except($input ,['password']);
        }
        
        
        $karyawan->update($input);
        return redirect('/karyawan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Karyawan::find($id);
        $data->delete();
        return back();
    }
}
