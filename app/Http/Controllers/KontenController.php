<?php

namespace App\Http\Controllers;

use App\Konten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KontenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $konten = Konten::paginate(5);
        return view('konten.index', compact('konten'));
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
        $input['tanggal_konten'] = date('Y-m-d');
        Konten::create($input);
        return redirect('/konten');
        // dd($input);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Konten  $konten
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $konten = Konten::find($id);
        return view('konten.detail', compact('konten'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\konten  $konten
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $konten = Konten::find($id);
            return view('konten.edit', compact('konten'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Konten  $konten
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $konten = Konten::find($id);
        $input = $request->all();
        $validator =Validator::make($input, [
            'judul_konten' => 'max:50',
            'isi_konten',
            'penerbit',
        ]);

        if($validator->fails())
        {
            return back()->withInput();
        }

        $konten->update($input);
        return redirect('/konten');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Konten  $konten
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Konten::find($id);
        $data->delete();
        return back();
    }
}
