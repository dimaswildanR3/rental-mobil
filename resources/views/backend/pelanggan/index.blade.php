@extends('backend.layouts')
@section('title','Pelanggan')
@section('content')
<div class="col-lg-12">
    <div class="card mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered table-striped" id="pelanggan-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Email</th>     
                        <th>Action</th>                
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@include('backend.pelanggan.modal-show')
@endsection
@push('scripts')
<script src="{{ asset('backend/js/sweet-alert.min.js') }}"></script>
<script>
$(document).ready(function () {

$.fn.dataTable.ext.errMode = 'throw';
var $table = $('#pelanggan-table').DataTable({
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
    ajax: '{!! route('pelanggan.source') !!}', // Update the route here
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex', width: "2%", orderable: false},
        {data: 'NIK', name: 'NIK', width: "5%", orderable: true},
        {data: 'Nama', name: 'Nama', width: "5%", orderable: true},
        {data: 'Alamat', name: 'Alamat', width: "5%", orderable: true},       
        {data: 'No_Telepon', name: 'No_Telepon', width: "5%", orderable: true},
        {data: 'Email', name: 'Email', width: "20%", orderable: false},        
        {data: 'action', name: 'action', width: "20%", orderable: false}
    ]
});

$('#pelanggan-table_wrapper > div.toolbar').html('<div class="row">' +
            '<div class="col-lg-10">'+
                '<div class="input-group mb-3"> ' +
                    '<input type="text" class="form-control form-control-sm border-0 bg-light" id="search-box" placeholder="Masukkan Kata Kunci"> ' +
                    '<div class="input-group-append">' +
                    '<span class="btn btn-sm btn-primary"><i class="fas fa-search"></i></span>' +
                    '</div>' +
                '</div>' +
            '</div>'+
            '<div class="col-lg-2">'+
                '<a href="{{ route("pelanggan.create") }}" class="btn btn-sm btn-primary shadow-sm float-right" data-toggle="tooltip" title="Tambah Data"><i class="fas fa-plus"></i></a>'+
            '</div>' +
            '</div>');

 $(document).on('keyup','#search-box',function (e) {
     e.preventDefault();
     $table.search($(this).val()).draw() ;
 });


$('#pelanggan-table').on('click','a.delete-data',function(e) {
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
    var NIK = button.data('NIK'); // Extract info from data-* attributes
    var Nama = button.data('Nama'); // Extract info from data-* attributes
    var Alamat = button.data('Alamat'); // Extract info from data-* attributes
    var No_Telepon = button.data('No_Telepon'); // Extract info from data-* attributes
    var Email = button.data('Email'); // Extract info from data-* attributes    
    var modal = $(this)

    modal.find('input[name="NIK"]').val(NIK);
    modal.find('input[name="Nama"]').val(Nama);
    modal.find('input[name="Alamat"]').val(Alamat);
    modal.find('input[name="No_Telepon"]').val(No_Telepon);
    modal.find('input[name="Email"]').val(Email);    

});
});
</script>
@endpush
