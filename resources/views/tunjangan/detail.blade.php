@extends('layouts.template') 

@section('tab') 
Detail Tunjangan 
@endsection

@section('title') 
Halaman Tunjangan
@endsection

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="col md-12">
            <div class="card">
                <div class="card-header">
                    Detail Tunjangan
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Nama Tunjangan</th>
                            <th>{{$tunjangan->nama_tunjangan}}</th>
                        </tr>
                        <tr>
                            <th>Nominal</th>
                            <th>{{$tunjangan->nominal}}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection