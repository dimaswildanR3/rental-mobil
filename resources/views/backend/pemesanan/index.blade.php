@extends('backend.layouts')
@section('title','pemesanan')
@section('content')
<div class="col-lg-12">
    <div class="card mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered table-striped" id="pemesanan-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Tanggal Booking</th>
                        <th>Jumlah Hari</th>
                        <th>Jaminan</th>
                        {{-- <th>ID_Pelanggan</th>         
                        <th>ID_Kendaraan</th>          --}}
                        <th>Action</th>            
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@include('backend.pemesanan.modal-show')
@endsection
@push('scripts')
<script src="{{ asset('backend/js/sweet-alert.min.js') }}"></script>
<script>
$(document).ready(function () {

$.fn.dataTable.ext.errMode = 'throw';
var $table = $('#pemesanan-table').DataTable({
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
    ajax: '{!! route('pemesanan.source') !!}', // Update the route here
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex', width: "2%", orderable: false},
        {data: 'Tanggal_Pemesanan', name: 'Tanggal_Pemesanan', width: "5%", orderable: true},
        {data: 'Tanggal_Booking', name: 'Tanggal_Booking', width: "5%", orderable: true},
        {data: 'Jumlah_Hari', name: 'Jumlah_Hari', width: "5%", orderable: true},       
        {data: 'Jaminan', name: 'Jaminan', width: "5%", orderable: true},
        // {data: 'ID_Pelanggan', name: 'ID_Pelanggan', width: "20%", orderable: false},        
        // {data: 'ID_Kendaraan', name: 'ID_Kendaraan', width: "20%", orderable: false},        
        {data: 'action', name: 'action', width: "20%", orderable: false}
    ]
});

$('#pemesanan-table_wrapper > div.toolbar').html('<div class="row">' +
            '<div class="col-lg-10">'+
                '<div class="input-group mb-3"> ' +
                    '<input type="text" class="form-control form-control-sm border-0 bg-light" id="search-box" placeholder="Masukkan Kata Kunci"> ' +
                    '<div class="input-group-append">' +
                    '<span class="btn btn-sm btn-primary"><i class="fas fa-search"></i></span>' +
                    '</div>' +
                '</div>' +
            '</div>'+
            '<div class="col-lg-2">'+
                '<a href="{{ route("pemesanan.create") }}" class="btn btn-sm btn-primary shadow-sm float-right" data-toggle="tooltip" title="Tambah Data"><i class="fas fa-plus"></i></a>'+
            '</div>' +
            '</div>');

 $(document).on('keyup','#search-box',function (e) {
     e.preventDefault();
     $table.search($(this).val()).draw() ;
 });


$('#pemesanan-table').on('click','a.delete-data',function(e) {
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
    var Tanggal_Pemesanan = button.data('Tanggal_Pemesanan'); // Extract info from data-* attributes
    var Tanggal_Booking = button.data('Tanggal_Booking'); // Extract info from data-* attributes
    var Jumlah_Hari = button.data('Jumlah_Hari'); // Extract info from data-* attributes
    var Jaminan = button.data('Jaminan'); // Extract info from data-* attributes
    var ID_Pelanggan = button.data('ID_Pelanggan'); // Extract info from data-* attributes    
    var ID_Kendaraan = button.data('ID_Kendaraan'); // Extract info from data-* attributes    
    var modal = $(this)

    modal.find('input[name="Tanggal_Pemesanan"]').val(Tanggal_Pemesanan);
    modal.find('input[name="Tanggal_Booking"]').val(Tanggal_Booking);
    modal.find('input[name="Jumlah_Hari"]').val(Jumlah_Hari);
    modal.find('input[name="Jaminan"]').val(Jaminan);
    modal.find('input[name="ID_Pelanggan"]').val(ID_Pelanggan);    
    modal.find('input[name="ID_Kendaraan"]').val(ID_Kendaraan);    

});
});
</script>
@endpush
