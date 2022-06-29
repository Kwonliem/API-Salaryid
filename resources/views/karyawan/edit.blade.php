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
                <div class="card-body">
                    Edit Karyawan
                </div>
                <div class="card-body">
                    <form action="{{route('karyawan.update', $karyawan->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">Nama karyawan</label>
                                <input type="text" name="nama_karyawan" value="{{$karyawan->nama_karyawan}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Jabatan</label>
                                <select name="id_jabatan" required="required" class="form-control" >
                                    <option value="{{$karyawan->jabatan->id}}">{{$karyawan->jabatan->nama_jabatan}}</option>
                                    @foreach ($jabatan as $row)
                                        <option value="{{$row->id}}">{{$row->nama_jabatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select name="status" required="required" class="form-control" >
                                    <option value="{{$karyawan->status}}">{{$karyawan->status}}</option>
                                    <option value="kontrak">Karyawan Kontrak</option>
                                    <option value="magang">Karyawan Magang</option>
                                    <option value="tetap">Karyawan Tetap</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nomer</label>
                                <input type="number" name="nomer_hp" value="{{$karyawan->nomer_hp}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" value="{{$karyawan->username}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" value="" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-warning">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection