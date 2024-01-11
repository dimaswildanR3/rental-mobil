@extends('backend.layouts')
@section('title','Ubah Data')
@section('content')
<div class="col-lg-12">
    {{-- <div class="card border-left-primary"> --}}
    <div class="card mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">
            <form action="{{route('karyawan.update',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama"value="{{$data->nama}}" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat"value="{{$data->alamat}}" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>NOTELP</label>
                            <input type="number" name="notelp"value="{{$data->notelp}}" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email"value="{{$data->email}}" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                   
                    <div class="col">
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                          <input type="date" name="tanggal_lahir"value="{{$data->tanggal_lahir}}" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Mulai Kerja</label>
                            <input type="date" name="mulai_kerja" value="{{$data->mulai_kerja}}" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan"value="{{$data->jabatan}}" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Gaji</label>
                          <input type="number" name="gaji"value="{{$data->gaji}}" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                          <label>Jam Kerja</label>
                          <input type="text" name="jam_kerja"value="{{$data->jam_kerja}}" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-gorup">
                            <button type="submit" class="btn btn-primary shadow-sm">Simpan</button>
                            <a class="btn btn-light shadow-sm" href="{{route('karyawan.index')}}">Batal</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
