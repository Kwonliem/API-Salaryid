@extends('layouts.template') 

@section('tab') 
Detail Berita
@endsection

@section('title') 
Halaman Berita
@endsection

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="col md-12">
            <div class="card">
                <div class="card-body">
                    Edit Berita
                </div>
                <div class="card-body">
                    <form action="{{route('berita.update', $berita->id)}}" method="post">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">judul berita</label>
                                <input type="text" name="judul_berita" value="{{$berita->judul_berita}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Isi Berita</label>
                                <input type="text" name="isi_berita" value="{{$berita->isi_berita}}"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tanggal Terbit</label>
                                <input type="date" name="tanggal_terbit" value="{{$berita->tanggal_terbit}}"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Penerbit</label>
                                <input type="text" name="penerbit" value="{{$berita->penerbit}}"  class="form-control">
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