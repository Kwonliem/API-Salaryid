@extends('layouts.template') 

@section('tab') 
Detail Karyawan 
@endsection

@section('title') 
Halaman Karyawan
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
                                <th>Nama Karyawan</th>
                                <th>Jabatan</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($karyawan as $row )
                            <tr>
                                <td>{{$loop->iteration + ($karyawan->perpage()*($karyawan->currentPage()-1))}}</td>
                                <td>{{$row->nama_karyawan}}</td>
                                <td>{{$row->jabatan->nama_jabatan}}</td>
                                <td>{{$row->status}}</td>
                                <td>
                                    <form action="{{route('karyawan.destroy', $row->id)}}" method="post"
                                        onsubmit="return confirm('Hapus {{$row->nama_karyawan}}?')">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <a href="{{route('karyawan.show', $row->id)}}" class="btn btn-primary">
                                            <i class="fa fa-eye"></i></a>
                                        <a href="{{route('karyawan.edit', $row->id)}}" class="btn btn-warning">
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
                    {{$karyawan->appends(Request::all())->links()}}
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Tambah karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('karyawan.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label">Nama karyawan</label>
                            <input type="text" name="nama_karyawan" value="{{old('nama_karyawan')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jabatan</label>
                            <select name="id_jabatan" required="required" class="form-control" >
                                <option value="">Pilih Jabatan</option>
                                @foreach ($jabatan as $row)
                                    <option value="{{$row->id}}">{{$row->nama_jabatan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select name="status" required="required" class="form-control" >
                                <option value="">Pilih Status</option>
                                <option value="kontrak">Karyawan Kontrak</option>
                                <option value="magang">Karyawan Magang</option>
                                <option value="tetap">Karyawan Tetap</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nomer</label>
                            <input type="number" name="nomer_hp" value="{{old('nomer_hp')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" value="{{old('username')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" value="{{old('password')}}" class="form-control">
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