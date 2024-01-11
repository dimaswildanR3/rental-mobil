@extends('backend.layouts')
@section('title','Ubah Data')
@section('content')
<div class="col-lg-12">
    <div class="card mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">
            <form action="{{route('pemesanan.update',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Tanggal_Pemesanan</label>
                            <input type="date" name="Tanggal_Pemesanan" value="{{$data->Tanggal_Pemesanan}}" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Tanggal_Booking</label>
                            <input type="date" name="Tanggal_Booking"  value="{{$data->Tanggal_Booking}}" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Jumlah_Hari</label>
                            <input type="number" name="Jumlah_Hari" value="{{$data->Jumlah_Hari}}" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Jaminan</label>
                            <input type="text" name="Jaminan" value="{{$data->Jaminan}}" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>ID_Pelanggan </label>
                          <input type="number" name="ID_Pelanggan"  value="{{$data->ID_Pelanggan}}" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>ID_Kendaraan </label>
                          <input type="number" name="ID_Kendaraan"  value="{{$data->ID_Kendaraan}}" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                   
                </div>
                

                <div class="row">
                    <div class="col">
                        <div class="form-gorup">
                            <button type="submit" class="btn btn-primary shadow-sm">Simpan</button>
                            <a class="btn btn-light shadow-sm" href="{{route('pemesanan.index')}}">Batal</a>
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
