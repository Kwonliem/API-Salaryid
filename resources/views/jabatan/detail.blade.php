@extends('layouts.template') 

@section('tab') 
Detail Jabatan 
@endsection

@section('title') 
Halaman Jabatan
@endsection

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="col md-12">
            <div class="card">
                <div class="card-header">
                    Detail Jabatan
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Nama jabatan</th>
                            <th>{{$jabatan->nama_jabatan}}</th>
                        </tr>
                        <tr>
                            <th>Gaji Pokok</th>
                            <th>{{$jabatan->gaji_pokok}}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection