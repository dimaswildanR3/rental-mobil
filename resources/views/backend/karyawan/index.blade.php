@extends('backend.layouts')
@section('title','Karyawan')
@section('content')
<div class="col-lg-12">
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered" id="karyawan-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        {{-- <th>Email</th> --}}
                        <th>Tanggal Lahir</th>
                        <th>Jabatan</th>
                        <th>Gaji</th>
                        {{-- <th>Mulai Kerja</th>
                        <th>Jam Kerja</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@include('backend.karyawan.modal-show')
@endsection

@push('scripts')
<script src="{{ asset('backend/js/sweet-alert.min.js') }}"></script>
<script>
$(document).ready(function () {

    $.fn.dataTable.ext.errMode = 'throw';
    var $table = $('#karyawan-table').DataTable({
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
        ajax: '{!! route('karyawan.source') !!}', // Update the route here
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', width: "2%", orderable: false},
            {data: 'nama', name: 'nama', width: "5%", orderable: true},
            {data: 'alamat', name: 'alamat', width: "5%", orderable: true},
            {data: 'notelp', name: 'notelp', width: "5%", orderable: true},
            // {data: 'email', name: 'email', width: "5%", orderable: true},
            {data: 'tanggal_lahir', name: 'tanggal_lahir', width: "5%", orderable: true},
            {data: 'jabatan', name: 'jabatan', width: "20%", orderable: false},
            {data: 'gaji', name: 'gaji', width: "5%", orderable: true},
            // {data: 'mulai_kerja', name: 'mulai_kerja', width: "5%", orderable: true},
            // {data: 'jam_kerja', name: 'jam_kerja', width: "5%", orderable: true},
            {data: 'action', name: 'action', width: "20%", orderable: false}
        ]
    });

    $('#karyawan-table_wrapper > div.toolbar').html('<div class="row">' +
                '<div class="col-lg-10">'+
                    '<div class="input-group mb-3"> ' +
                        '<input type="text" class="form-control form-control-sm border-0 bg-light" id="search-box" placeholder="Masukkan Kata Kunci"> ' +
                        '<div class="input-group-append">' +
                        '<span class="btn btn-sm btn-primary"><i class="fas fa-search"></i></span>' +
                        '</div>' +
                    '</div>' +
                '</div>'+
                '<div class="col-lg-2">'+
                    '<a href="{{ route("karyawan.create") }}" class="btn btn-sm btn-primary shadow-sm float-right" data-toggle="tooltip" title="Tambah Data"><i class="fas fa-plus"></i></a>'+
                '</div>' +
                '</div>');

     $(document).on('keyup','#search-box',function (e) {
         e.preventDefault();
         $table.search($(this).val()).draw() ;
     });


    $('#karyawan-table').on('click','a.delete-data',function(e) {
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
        var nama = button.data('nama'); // Extract info from data-* attributes
        var alamat = button.data('alamat'); // Extract info from data-* attributes
        var notelp = button.data('notelp'); // Extract info from data-* attributes
        var email = button.data('email'); // Extract info from data-* attributes
        var tanggal_lahir = button.data('tanggal_lahir'); // Extract info from data-* attributes
        var jabatan = button.data('jabatan'); // Extract info from data-* attributes
        var gaji = button.data('gaji'); // Extract info from data-* attributes
        var mulai_kerja = button.data('mulai_kerja'); // Extract info from data-* attributes
        var jam_kerja = button.data('jam_kerja'); // Extract info from data-* attributes
        var modal = $(this)

        modal.find('input[name="nama"]').val(nama);
        modal.find('input[name="alamat"]').val(alamat);
        modal.find('input[name="notelp"]').val(notelp);
        modal.find('input[name="email"]').val(email);
        modal.find('input[name="tanggal_lahir"]').val(tanggal_lahir);
        modal.find('input[name="jabatan"]').val(jabatan);
        modal.find('input[name="gaji"]').val(gaji);
        modal.find('input[name="mulai_kerja"]').val(mulai_kerja);
        modal.find('input[name="jam_kerja"]').val(jam_kerja);

    });
});
</script>
@endpush
