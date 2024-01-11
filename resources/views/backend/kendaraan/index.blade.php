@extends('backend.layouts')
@section('title','Mobil')
@section('content')
<div class="col-lg-12">
    <div class="card mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered table-striped" id="kendaraan-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Merk</th>
                        <th>Model</th>
                        <th>Warna</th>
                        <th>Jenis Kendaraan</th>
                        <th>Nomer Plat</th>                        
                        <th>Harga Sewa</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@include('backend.kendaraan.modal-show')
@endsection
@push('scripts')
<script src="{{ asset('backend/js/sweet-alert.min.js') }}"></script>
<script>
$(document).ready(function () {

$.fn.dataTable.ext.errMode = 'throw';
var $table = $('#kendaraan-table').DataTable({
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
    ajax: '{!! route('kendaraan.source') !!}', // Update the route here
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex', width: "2%", orderable: false},
        {data: 'Merek', name: 'Merek', width: "5%", orderable: true},
        {data: 'Model', name: 'Model', width: "5%", orderable: true},
        {data: 'Warna', name: 'Warna', width: "5%", orderable: true},       
        {data: 'Jenis_Kendaraan', name: 'Jenis_Kendaraan', width: "5%", orderable: true},
        {data: 'Nomor_Plat', name: 'Nomor_Plat', width: "20%", orderable: false},
        {data: 'Harga_Sewa_Per_Hari', name: 'Harga_Sewa_Per_Hari', width: "5%", orderable: true},                
        {data: 'action', name: 'action', width: "20%", orderable: false}
    ]
});

$('#kendaraan-table_wrapper > div.toolbar').html('<div class="row">' +
            '<div class="col-lg-10">'+
                '<div class="input-group mb-3"> ' +
                    '<input type="text" class="form-control form-control-sm border-0 bg-light" id="search-box" placeholder="Masukkan Kata Kunci"> ' +
                    '<div class="input-group-append">' +
                    '<span class="btn btn-sm btn-primary"><i class="fas fa-search"></i></span>' +
                    '</div>' +
                '</div>' +
            '</div>'+
            '<div class="col-lg-2">'+
                '<a href="{{ route("kendaraan.create") }}" class="btn btn-sm btn-primary shadow-sm float-right" data-toggle="tooltip" title="Tambah Data"><i class="fas fa-plus"></i></a>'+
            '</div>' +
            '</div>');

 $(document).on('keyup','#search-box',function (e) {
     e.preventDefault();
     $table.search($(this).val()).draw() ;
 });


$('#kendaraan-table').on('click','a.delete-data',function(e) {
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
    var Merek = button.data('Merek'); // Extract info from data-* attributes
    var Model = button.data('Model'); // Extract info from data-* attributes
    var Warna = button.data('Warna'); // Extract info from data-* attributes
    var Jenis_Kendaraan = button.data('Jenis_Kendaraan'); // Extract info from data-* attributes
    var Nomor_Plat = button.data('Nomor_Plat'); // Extract info from data-* attributes
    var Status_Ketersediaan = button.data('Status_Ketersediaan'); // Extract info from data-* attributes
    var Harga_Sewa_Per_Hari = button.data('Harga_Sewa_Per_Hari'); // Extract info from data-* attributes        
    var modal = $(this)

    modal.find('input[name="Merek"]').val(Merek);
    modal.find('input[name="Model"]').val(Model);
    modal.find('input[name="Warna"]').val(Warna);
    modal.find('input[name="Jenis_Kendaraan"]').val(Jenis_Kendaraan);
    modal.find('input[name="Nomor_Plat"]').val(Nomor_Plat);
    modal.find('input[name="Status_Ketersediaan"]').val(Status_Ketersediaan);
    modal.find('input[name="Harga_Sewa_Per_Hari"]').val(Harga_Sewa_Per_Hari);        

});
});
</script>
@endpush
