@extends('backend.layouts')
@section('title','Factur')
@section('content')
<div class="col-lg-12">
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered" id="faktur-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Faktur</th>
                        <th>Tahun</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Total Bayar</th>
                        <th>Metode Pembayaran</th>
                        <th>Pesanan</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@include('backend.faktur.modal-show')
@endsection

@push('scripts')
<script src="{{ asset('backend/js/sweet-alert.min.js') }}"></script>
<script>
$(document).ready(function () {

    $.fn.dataTable.ext.errMode = 'throw';
    var $table = $('#faktur-table').DataTable({
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
        ajax: '{!! route('faktur.source') !!}', // Update the route here
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', width: "2%", orderable: false},
            {data: 'kode_faktur', name: 'kode_faktur', width: "5%", orderable: true},
            {data: 'tahun', name: 'tahun', width: "5%", orderable: true},
            {data: 'tanggal_pemesanan', name: 'tanggal_pemesanan', width: "5%", orderable: true},
            {data: 'total_bayar', name: 'total_bayar', width: "5%", orderable: true},
            {data: 'metode_pembayaran', name: 'metode_pembayaran', width: "5%", orderable: true},
            {data: 'id_pemesanan', name: 'id_pemesanan', width: "20%", orderable: false},
            {data: 'action', name: 'action', width: "2o%", orderable: false}
        ]
    });

    $('#faktur-table_wrapper > div.toolbar').html('<div class="row">' +
                '<div class="col-lg-10">'+
                    '<div class="input-group mb-3"> ' +
                        '<input type="text" class="form-control form-control-sm border-0 bg-light" id="search-box" placeholder="Masukkan Kata Kunci"> ' +
                        '<div class="input-group-append">' +
                        '<span class="btn btn-sm btn-primary"><i class="fas fa-search"></i></span>' +
                        '</div>' +
                    '</div>' +
                '</div>'+
                '<div class="col-lg-2">'+
                    '<a href="{{ route("faktur.create") }}" class="btn btn-sm btn-primary shadow-sm float-right" data-toggle="tooltip" title="Tambah Data"><i class="fas fa-plus"></i></a>'+
                '</div>' +
                '</div>');

     $(document).on('keyup','#search-box',function (e) {
         e.preventDefault();
         $table.search($(this).val()).draw() ;
     });


    $('#faktur-table').on('click','a.delete-data',function(e) {
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
        var kode_faktur = button.data('kode_faktur'); // Extract info from data-* attributes
        var tahun = button.data('tahun'); // Extract info from data-* attributes
        var tanggal_pemesanan = button.data('tanggal_pemesanan'); // Extract info from data-* attributes
        var total_bayar = button.data('total_bayar'); // Extract info from data-* attributes
        var metode_pembayaran = button.data('metode_pembayaran'); // Extract info from data-* attributes
        var id_pemesanan = button.data('id_pemesanan'); // Extract info from data-* attributes
        var modal = $(this)

        modal.find('input[name="kode_faktur"]').val(kode_faktur);
        modal.find('input[name="tahun"]').val(tahun);
        modal.find('input[name="tanggal_pemesanan"]').val(tanggal_pemesanan);
        modal.find('input[name="total_bayar"]').val(total_bayar);
        modal.find('input[name="metode_pembayaran"]').val(metode_pembayaran);
        modal.find('input[name="id_pemesanan"]').val(id_pemesanan);

    });
});
</script>
@endpush
