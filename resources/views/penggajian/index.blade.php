@extends('layouts.template')
 
@section('tab')
Data Penggajian Karyawan
@endsection
 
@section('title')
Data Penggajian Karyawan
@endsection
 
@section('content')
 
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-12">
           <div class="card">
               <div class="card-body">
                   <table class="table table-hover">
                       <thead>
                           <tr>
                               <th>No.</th>
                               <th>Nama Karyawan</th>
                               <th>Jabatan</th>
                               <th>Status</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($karyawan as $row)
                           <tr>
                               <td>{{$loop->iteration + ($karyawan->perpage() * ($karyawan->currentPage() -1)) }}
                               </td>
                               <td>{{$row->nama_karyawan}}</td>
                               <td>{{$row->jabatan->nama_jabatan}}</td>
                               <td>{{$row->status}}</td>
                               <td>
                                   <a href="/create-gaji/{{$row->id}}" class="btn btn-primary"><i
                                           class="fa fa-exchange-alt"></i>
                                       Penggajian</a>
                                   <a href="/riwayat-gaji/{{$row->id}}" class="btn btn-info"><i class="fa fa-eye"></i> Info</a>
                               </td>
                           </tr>
                           @endforeach
                       </tbody>
                   </table>
                   {{$karyawan -> appends(Request::all())->links()}}
               </div>
           </div>
       </div>
   </div>
</div>
 
@endsection
