<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penggajian;
use App\Karyawan;
use App\Tunjangan;
use App\Jabatan;
use Validator;
// use Alert;

class PenggajianController extends Controller
{
    public function index(Request $request)
    {
        $karyawan = Karyawan::paginate(5);
        return view('penggajian.index', compact('karyawan'));
    }

    public function create_penggajian($id)
    {
        $karyawan = Karyawan::find($id);
        $tunjangan = Tunjangan::all();
        return view('penggajian.create', compact('karyawan', 'tunjangan', 'id'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
       $array = implode(',', $request->input('id_tunjangan'));
       $total_tunjangan = 0;
       $input['id_tunjangan'] = json_encode($array);
       foreach($request->input('id_tunjangan') as $id){
           $total_tunjangan += Tunjangan::find($id)->nominal;
       }
       $karyawan = Karyawan::find($request->id_karyawan);
       $gaji_pokok = $karyawan->jabatan->gaji_pokok;
       $input['total_tunjangan'] = $total_tunjangan;
       $input['tanggal_gajian'] = date('Y-m-d');
       $input['total_gajian'] = $gaji_pokok + $total_tunjangan - $input['potongan'];
       Penggajian::create($input);
       return redirect('list-karyawan');
    }

    public function detail($id)
    {
        $karyawan = Karyawan::find($id);
        $penggajian = Penggajian::where('id_karyawan', $id)->get()->all();
        return view('penggajian.detail', compact('karyawan', 'penggajian'));
    }
}
