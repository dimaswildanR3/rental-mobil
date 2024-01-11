{{-- <span data-toggle="modal" data-target="#show" data-NIK="{{$NIK}}"
    data-Nama="{{$Nama}}"
    data-Alamat="{{$Alamat}}"
    data-No_Telepon="{{$No_Telepon}}"
    data-Email="{{$Email}}">

    <a href="#"
        class="btn btn-info btn-sm shadow-sm"
        data-toggle="tooltip"
        data-placement="top"
        title="Detail">
        <i class="fa fa-search"></i>
    </a>
</span> --}}
<a href="{{route('pelanggan.edit',$id)}}"
    class="btn btn-success btn-sm shadow-sm"
    data-toggle="tooltip"
    data-placement="top"
    title="Edit">
    <i class="fa fa-pen"></i>
</a>
<a href="{{route('pelanggan.destroy',$id)}}"
    class="btn btn-danger btn-sm shadow-sm delete-data"
    data-toggle="tooltip"
    data-placement="top"
    title="Delete">
    <i class="fa fa-times"></i>
</a>
