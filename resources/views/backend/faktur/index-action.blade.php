<span data-toggle="modal" data-target="#show" data-kode_faktur="{{$kode_faktur}}"
    data-tahun="{{$tahun}}"
    data-tanggal_pemesanan="{{$tanggal_pemesanan}}"
    data-total_bayar="{{$total_bayar}}"
    data-metode_pembayaran="{{$metode_pembayaran}}"
    data-id_pemesanan="{{$id_pemesanan}}">
    <a href="#"
        class="btn btn-info btn-sm shadow-sm"
        data-toggle="tooltip"
        data-placement="top"
        title="Detail">
        <i class="fa fa-search"></i>
    </a>
</span>
<a href="{{route('faktur.edit',[$id])}}"
    class="btn btn-success btn-sm shadow-sm"
    data-toggle="tooltip"
    data-placement="top"
    title="Edit">
    <i class="fa fa-pen"></i>
</a>
<a href="{{route('faktur.destroy',[$id])}}"
    class="btn btn-danger btn-sm shadow-sm delete-data"
    data-toggle="tooltip"
    data-placement="top"
    title="Delete">
    <i class="fa fa-times"></i>
</a>
