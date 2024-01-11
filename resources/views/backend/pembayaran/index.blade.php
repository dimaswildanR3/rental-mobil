@extends('backend.layouts')
@section('title','pembayaran')
@section('content')
<div class="col-lg-12">
    <div class="card mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered table-striped" id="pembayaran-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Bayar</th>
                        <th>Tanggal Bayar</th>
                        <th>Metode Transaksi</th>
                        <th>no Kartu</th>
                        <th>id pembayaran</th>         
                        <th>Action</th>            
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@include('backend.pembayaran.modal-show')
@endsection
@push('scripts')
<script src="{{ asset('backend/js/sweet-alert.min.js') }}"></script>
<script>
$(document).ready(function () {

$.fn.dataTable.ext.errMode = 'throw';
var $table = $('#pembayaran-table').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    stateSave: true,
    language: {
        paginate: {
            next: '<i class="fa fa-angle-right"></i>',
            previous: '<i class="fa fa-angle-left"></i>'
        },
        processing: 'Loading . . .',
        emptyTable: 'Tidak Ada Data',
        zeroRecords: 'Tidak Ada Data'
    },
    dom: '<"toolbar">rtp',
    ajax: '{!! route('pembayaran.source') !!}', // Update the route here
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex', width: "2%", orderable: false},
        {data: 'kode_bayar', name: 'kode_bayar', width: "5%", orderable: true},
        {data: 'tanggal_bayar', name: 'tanggal_bayar', width: "5%", orderable: true},
        {data: 'metode_transaksi', name: 'metode_transaksi', width: "5%", orderable: true},       
        {data: 'no_kartu', name: 'no_kartu', width: "5%", orderable: true},
        {data: 'id_pelanggan', name: 'id_pelanggan', width: "20%", orderable: false},        
        {data: 'action', name: 'action', width: "20%", orderable: false}
    ]
});

$('#pembayaran-table_wrapper > div.toolbar').html('<div class="row">' +
            '<div class="col-lg-10">'+
                '<div class="input-group mb-3"> ' +
                    '<input type="text" class="form-control form-control-sm border-0 bg-light" id="search-box" placeholder="Masukkan Kata Kunci"> ' +
                    '<div class="input-group-append">' +
                    '<span class="btn btn-sm btn-primary"><i class="fas fa-search"></i></span>' +
                    '</div>' +
                '</div>' +
            '</div>'+
            '<div class="col-lg-2">'+
                '<a href="{{ route("pembayaran.create") }}" class="btn btn-sm btn-primary shadow-sm float-right" data-toggle="tooltip" title="Tambah Data"><i class="fas fa-plus"></i></a>'+
            '</div>' +
            '</div>');

 $(document).on('keyup','#search-box',function (e) {
     e.preventDefault();
     $table.search($(this).val()).draw() ;
 });


$('#pembayaran-table').on('click','a.delete-data',function(e) {
    e.preventDefault();
    var delete_link = $(this).attr('href');
    swal({
        title: "Hapus Data ini?",
        text: "",
        icon: "error",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Data anda terhapus");
                window.location.replace(delete_link);
            } else {
                swal("Data anda aman");
            }
        });
});

$('body').tooltip({selector: '[data-toggle="tooltip"]'});

$('#show').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var kode_bayar = button.data('kode_bayar'); // Extract info from data-* attributes
    var tanggal_bayar = button.data('tanggal_bayar'); // Extract info from data-* attributes
    var metode_transaksi = button.data('metode_transaksi'); // Extract info from data-* attributes
    var no_kartu = button.data('no_kartu'); // Extract info from data-* attributes
    var id_pelanggan = button.data('id_pelanggan'); // Extract info from data-* attributes    
    var modal = $(this)

    modal.find('input[name="kode_bayar"]').val(kode_bayar);
    modal.find('input[name="tanggal_bayar"]').val(tanggal_bayar);
    modal.find('input[name="metode_transaksi"]').val(metode_transaksi);
    modal.find('input[name="no_kartu"]').val(no_kartu);
    modal.find('input[name="id_pelanggan"]').val(id_pelanggan);    

});
});
</script>
@endpush
