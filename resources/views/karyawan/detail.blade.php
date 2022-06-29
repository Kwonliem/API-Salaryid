@extends('layouts.template') 

@section('tab') 
Detail Karyawan 
@endsection

@section('title') 
Halaman Karyawan
@endsection

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="col md-12">
            <div class="card">
                <div class="card-header">
                    Detail Karyawan
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Karyawan</th>
                            <th>{{$karyawan->nama_karyawan}}</th>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <th>{{$karyawan->jabatan->nama_jabatan}}</th>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <th>{{$karyawan->status}}</th>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <th>{{$karyawan->username}}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection