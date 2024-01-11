<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Pemesanan;

class PemesananController extends Controller
{

    public function __construct()
    {
        $this->pemesanan = new Pemesanan();
    }
    public function index()
    {
        // Tampilkan daftar pemesanan
      
        return view('backend.pemesanan.index');
    }

    public function Source(){
        $query= Pemesanan::query();
        // \Log::info('DataTable Request Received');
        return DataTables::eloquent($query)
            ->filter(function ($query) {
                if (request()->has('search')) {
                    $query->where(function ($q) {
                        $q->where('Tanggal_Pemesanan', 'LIKE', '%' . request('search')['value'] . '%')
                          ->orWhere('Tanggal_Booking', 'LIKE', '%' . request('search')['value'] . '%')
                          ->orWhere('Jumlah_Hari', 'LIKE', '%' . request('search')['value'] . '%');
                        // Add other columns as needed
                    });
                }
            })
            ->addColumn('Tanggal_Pemesanan', function ($data) {
                return $data->Tanggal_Pemesanan;
            })
            ->addColumn('Tanggal_Booking', function ($data) {
                return $data->Tanggal_Booking;
            })
            ->addColumn('Jaminan', function ($data) {
                return $data->Jaminan;
            })
            ->addColumn('Jumlah_Hari', function ($data) {
                return $data->Jumlah_Hari;
            })
            ->addColumn('ID_Pelanggan', function ($data) {
                return $data->ID_Pelanggan;
            })
            ->addColumn('ID_Kendaraan', function ($data) {
                return $data->ID_Kendaraan;
            })
        
            // Add other columns as needed
            ->addIndexColumn()
            ->addColumn('action', 'backend.pemesanan.index-action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function create()
    {
        // Tampilkan formulir untuk membuat pemesanan baru
        return view('backend.pemesanan.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $requset = $request->merge(['slug'=>$request->name]);
            $this->pemesanan->create($request->all());
            DB::commit();
            return redirect()->route('pemesanan.index')->with('success-message','Data telah disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }  }

    public function show($id)
    {
        // Tampilkan detail pemesanan berdasarkan ID
        $pemesanan = Pemesanan::findOrFail($id);
        return view('pemesanan.show', compact('pemesanan'));
    }

    public function edit($id)
    {
        // Tampilkan formulir untuk mengedit pemesanan berdasarkan ID
        $data = Pemesanan::findOrFail($id);
        return view('backend.pemesanan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $requset = $request->merge(['slug'=>$request->name]);
            $this->pemesanan->create($request->all());
            DB::commit();
            return redirect()->route('pemesanan.index')->with('success-message','Data telah disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }  }



    public function destroy($id)
    {
        // Hapus pemesanan berdasarkan ID
        Pemesanan::findOrFail($id)->delete();

        return redirect(route('pemesanan.index'))->with('success', 'Pemesanan berhasil dihapus!');
    }
}
