@extends('layouts.template') 

@section('tab') 
Detail Konten
@endsection

@section('title') 
Halaman Konten
@endsection

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="col md-12">
            <div class="card">
                <div class="card-body">
                    Edit Konten
                </div>
                <div class="card-body">
                    <form action="{{route('konten.update', $konten->id)}}" method="post">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">judul konten</label>
                                <input type="text" name="judul_konten" value="{{$konten->judul_konten}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Isi konten</label>
                                <input type="text" name="isi_konten" value="{{$konten->isi_konten}}"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tanggal Terbit</label>
                                <input type="date" name="tanggal_konten" value="{{$konten->tanggal_konten}}"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Penerbit</label>
                                <input type="text" name="penerbit" value="{{$konten->penerbit}}"  class="form-control">
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