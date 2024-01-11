@extends('backend.layouts')
@section('title','Ubah Data')
@section('content')
<div class="col-lg-12">
    <div class="card mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">
            <form action="{{route('kendaraan.update',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Merek</label>
                            <input type="text" name="Merek" value="{{$data->Merek}}" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Model</label>
                            <input type="text" name="Model" value="{{$data->Model}}" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Warna</label>
                            <input type="text" name="Warna" value="{{$data->Warna}}" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Jenis_Kendaraan</label>
                            <input type="text" name="Jenis_Kendaraan" value="{{$data->Jenis_Kendaraan}}" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                          <label>Nomor Plat</label>
                          <input type="text" name="Nomor_Plat" value="{{$data->Nomor_Plat}}" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                          <label>Status Ketersediaan</label>
                          <input type="text" name="Status_Ketersediaan" value="{{$data->Status_Ketersediaan}}" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                          <label>Harga Sewa</label>
                          <input type="number" name="Harga_Sewa_Per_Hari" value="{{$data->Harga_Sewa_Per_Hari}}" class="form-control border-dark-50" required="">
                            </div>
                        </div>
                    </div>

                <div class="row">
                    <div class="col">
                        <div class="form-gorup">
                            <button type="submit" class="btn btn-primary shadow-sm">Simpan</button>
                            <a class="btn btn-light shadow-sm" href="{{route('kendaraan.index')}}">Batal</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush
