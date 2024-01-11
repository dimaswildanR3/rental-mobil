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
            <form action="{{route('pembayaran.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Kode Bayar</label>
                            <input type="text" name="kode_bayar" id="" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Tanggal Bayar</label>
                            <input type="date" name="tanggal_bayar" id="" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                   
                    <div class="col">
                        <div class="form-group">
                            <label>Metode Transaksi</label>
                            <input type="text" name="metode_transaksi" id="" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                          <label>Nomor Kartu</label>
                          <input type="text" name="no_kartu" id="" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                          <label>Pelanggan</label>
                          <input type="number" name="id_pelanggan" id="" class="form-control border-dark-50" required="">
                        </div>
                    </div>
                </div>
              

                <div class="row">
                    <div class="col">
                        <div class="form-gorup">
                            <button type="submit" class="btn btn-primary shadow-sm">Simpan</button>
                            <a class="btn btn-light shadow-sm" href="{{route('pembayaran.index')}}">Batal</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
