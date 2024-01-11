<span data-toggle="modal" data-target="#show" data-kode_bayar="{{$kode_bayar}}"
    data-tanggal_bayar="{{$tanggal_bayar}}"
    data-metode_transaksi="{{$metode_transaksi}}"
    data-no_kartu="{{$no_kartu}}"
    data-id_pelanggan="{{$id_pelanggan}}">

    <a href="#"
        class="btn btn-info btn-sm shadow-sm"
        data-toggle="tooltip"
        data-placement="top"
        title="Detail">
        <i class="fa fa-search"></i>
    </a>
</span>
<a href="{{route('pembayaran.edit',$id)}}"
    class="btn btn-success btn-sm shadow-sm"
    data-toggle="tooltip"
    data-placement="top"
    title="Edit">
    <i class="fa fa-pen"></i>
</a>
<a href="{{route('pembayaran.destroy',$id)}}"
    class="btn btn-danger btn-sm shadow-sm delete-data"
    data-toggle="tooltip"
    data-placement="top"
    title="Delete">
    <i class="fa fa-times"></i>
</a>
