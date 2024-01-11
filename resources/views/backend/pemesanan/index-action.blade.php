{{-- <span data-toggle="modal" data-target="#show" data-Tanggal_Pemesanan="{{$Tanggal_Pemesanan}}"
    data-Tanggal_Booking="{{$Tanggal_Booking}}"
    data-Jumlah_Hari="{{$Jumlah_Hari}}"
    data-Jaminan="{{$Jaminan}}"
    data-ID_Pelanggan="{{$ID_Pelanggan}}"
    data-ID_Kendaraan="{{$ID_Kendaraan}}">

    <a href="#"
        class="btn btn-info btn-sm shadow-sm"
        data-toggle="tooltip"
        data-placement="top"
        title="Detail">
        <i class="fa fa-search"></i>
    </a>
</span> --}}
<a href="{{route('pemesanan.edit',$id)}}"
    class="btn btn-success btn-sm shadow-sm"
    data-toggle="tooltip"
    data-placement="top"
    title="Edit">
    <i class="fa fa-pen"></i>
</a>
<a href="{{route('pemesanan.destroy',$id)}}"
    class="btn btn-danger btn-sm shadow-sm delete-data"
    data-toggle="tooltip"
    data-placement="top"
    title="Delete">
    <i class="fa fa-times"></i>
</a>
