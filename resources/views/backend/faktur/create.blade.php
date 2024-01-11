@extends('backend.layouts')
@section('title','Tambah Data')
@section('content')
<div class="col-lg-12">
    {{-- <div class="card border-left-primary"> --}}
    <div class="card mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">
            <form action="{{route('faktur.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                          <label>Kode Faktur</label>
                          <input type="text" name="kode_faktur" id="" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                          <label>Tahun</label>
                            <input type="number" name="tahun" id="" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                           <label>Tanggal Pemesanan</label>
                            <input type="date" name="tanggal_pemesanan"id="" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Total Pembayaran</label>
                            <input type="number" name="total_bayar"id="" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                   
                    <div class="col">
                        <div class="form-group">
                            <label>Metode Pembayaran</label>
                            <input type="text" name="metode_pembayaran" id="" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Pesanan</label>
                            <input type="text" name="id_pemesanan" id="" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-gorup">
                            <button type="submit" class="btn btn-primary shadow-sm">Simpan</button>
                            <a class="btn btn-light shadow-sm" href="{{route('customer.index')}}">Batal</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
