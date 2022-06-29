@extends('layouts.template') 

@section('tab') 
Detail Jabatan 
@endsection

@section('title') 
Halaman Jabatan
@endsection

@section('content')
@extends('layouts.template') 
@section('tab') 
Halaman jabatan 
@endsection
 @section('title') 
 Halaman jabatan
  @endsection 
  @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                        Tambah
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Jabatan</th>
                                <th>Gaji Pokok</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jabatan as $row )
                            <tr>
                                <td>{{$loop->iteration + ($jabatan->perpage()*($jabatan->currentPage()-1))}}</td>
                                <td>{{$row->nama_jabatan}}</td>
                                <td>Rp. {{number_format($row->gaji_pokok)}}</td>
                                <td>
                                    <form action="{{route('jabatan.destroy', $row->id)}}" method="post"
                                        onsubmit="return confirm('Hapus {{$row->nama_jabatan}}?')">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <a href="{{route('jabatan.show', $row->id)}}" class="btn btn-primary">
                                            <i class="fa fa-eye"></i></a>
                                        <a href="{{route('jabatan.edit', $row->id)}}" class="btn btn-warning">
                                            <i class="fa fa-pencil-alt"></i></a>
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$jabatan->appends(Request::all())->links()}}
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Tambah jabatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('jabatan.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label">Nama Jabatan</label>
                            <input type="text" name="nama_jabatan" value="{{old('nama_jabatan')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Gaji Pokok</label>
                            <input type="number" name="gaji_pokok" value="{{old('gaji_pokok')}}"  class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-warning">Tambah</button>
                        <button type="reset" class="btn btn-outline-primary">cancel</button>

                    </div>
                </form>
 
            </div>
        </div>
    </div>
    <!-- END MODAL -->
 
</div>
@endsection
@endsection