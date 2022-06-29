@extends('layouts.template')

@section('tab')
    Data Entry Karyawan
@endsection

@section('title')
    Data Entry Karyawan
@endsection


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="/post-gaji" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="label-control">Nama Karyawan</label>
                            <input type="text" value="{{$karyawan->nama_karyawan}}" disabled class="form-control">
                            <input type="hidden" name="id_karyawan" value="{{$karyawan->id}}">
                        </div>
                        <div class="form-group">
                            <lable class="label-control">Tunjangan</lable>
                            @foreach ($tunjangan as $row)
                                <div class="form-check">
                                    <input type="checkbox" class="form check-input" value="{{$row->id}}" name="id_tunjangan[]">
                                <label class="form check-label">
                                    {{$row->nama_tunjangan}}
                                </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label class="label-control">Potongan</label>
                            <input type="number" name="potongan" value="{{old('potongan')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <select name="bulan_gajian" class="form-control">
                                <option value="januari">Januari</option>
                                <option value="febuari">Febuari</option>
                                <option value="maret">Maret</option>
                                <option value="april">April</option>
                                <option value="mei">Mei</option>
                                <option value="juni">Juni</option>
                                <option value="july">Juli</option>
                                <option value="oktober">Oktober</option>
                                <option value="november">November</option>
                                <option value="desember">Desember</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Tahun</label>
                            <input type="number" name="tahun_gajian" value="{{old('tahun')}}" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-danger">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection