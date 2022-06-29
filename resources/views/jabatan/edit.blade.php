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
                <div class="card-body">
                    Edit jabatan
                </div>
                <div class="card-body">
                    <form action="{{route('jabatan.update', $jabatan->id)}}" method="post">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">Nama jabatan</label>
                                <input type="text" name="nama_jabatan" value="{{$jabatan->nama_jabatan}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Gaji Pokok</label>
                                <input type="number" name="gaji_pokok" value="{{$jabatan->gaji_pokok}}"  class="form-control">
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