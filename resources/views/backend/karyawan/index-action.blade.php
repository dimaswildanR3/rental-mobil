<span data-toggle="modal" data-target="#show" data-nama="{{$nama}}"
    data-alamat="{{$alamat}}"
    data-notelp="{{$notelp}}"
    data-email="{{$email}}"
    data-tanggal_lahir="{{$tanggal_lahir}}"
    data-jabatan="{{$jabatan}}"
    data-gaji="{{$gaji}}"
    data-mulai_kerja="{{$mulai_kerja}}"
    data-jam_kerja="{{$jam_kerja}}"
    >
    <a href="#"
        class="btn btn-info btn-sm shadow-sm"
        data-toggle="tooltip"
        data-placement="top"
        title="Detail">
        <i class="fa fa-search"></i>
    </a>
</span>
<a href="{{route('karyawan.edit',[$id])}}"
    class="btn btn-success btn-sm shadow-sm"
    data-toggle="tooltip"
    data-placement="top"
    title="Edit">
    <i class="fa fa-pen"></i>
</a>
<a href="{{route('karyawan.destroy',[$id])}}"
    class="btn btn-danger btn-sm shadow-sm delete-data"
    data-toggle="tooltip"
    data-placement="top"
    title="Delete">
    <i class="fa fa-times"></i>
</a>
