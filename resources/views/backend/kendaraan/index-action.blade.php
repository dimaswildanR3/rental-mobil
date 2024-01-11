{{-- <span data-toggle="modal" data-target="#show" data-Merek="{{$Merek}}"
    data-Model="{{$Model}}"
    data-Warna="{{$Warna}}"
    data-Jenis_Kendaraan="{{$Jenis_Kendaraan}}"
    data-Nomor_Plat="{{$Nomor_Plat}}"
    data-Status_Ketersediaan="{{$Status_Ketersediaan}}"
    data-Harga_Sewa_Per_Hari="{{$Harga_Sewa_Per_Hari}}">
    <a href="#"
        class="btn btn-info btn-sm shadow-sm"
        data-toggle="tooltip"
        data-placement="top"
        title="Detail">
        <i class="fa fa-search"></i>
    </a>
</span> --}}
<a href="{{route('kendaraan.edit',$id)}}"
    class="btn btn-success btn-sm shadow-sm"
    data-toggle="tooltip"
    data-placement="top"
    title="Edit">
    <i class="fa fa-pen"></i>
</a>
<a href="{{route('kendaraan.destroy',$id)}}"
    class="btn btn-danger btn-sm shadow-sm delete-data"
    data-toggle="tooltip"
    data-placement="top"
    title="Delete">
    <i class="fa fa-times"></i>
</a>
