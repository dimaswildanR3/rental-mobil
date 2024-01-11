<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Pembayaran;

class PembayaranController extends Controller
{
    public function __construct()
    {
        $this->pembayaran = new Pembayaran();
    }

    public function index()
    {
      
        return view('backend.pembayaran.index');
    }
    public function Source(){
        $query= Pembayaran::query();
        // \Log::info('DataTable Request Received');
        return DataTables::eloquent($query)
            ->filter(function ($query) {
                if (request()->has('search')) {
                    $query->where(function ($q) {
                        $q->where('kode_bayar', 'LIKE', '%' . request('search')['value'] . '%')
                          ->orWhere('tanggal_bayar', 'LIKE', '%' . request('search')['value'] . '%')
                          ->orWhere('metode_transaksi', 'LIKE', '%' . request('search')['value'] . '%');
                        // Add other columns as needed
                    });
                }
            })
            ->addColumn('kode_bayar', function ($data) {
                return $data->kode_bayar;
            })
            ->addColumn('tanggal_bayar', function ($data) {
                return $data->tanggal_bayar;
            })
            ->addColumn('no_kartu', function ($data) {
                return $data->no_kartu;
            })
            ->addColumn('metode_transaksi', function ($data) {
                return $data->metode_transaksi;
            })
            ->addColumn('id_pelanggan', function ($data) {
                return $data->id_pelanggan;
            })
        
            // Add other columns as needed
            ->addIndexColumn()
            ->addColumn('action', 'backend.pembayaran.index-action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function create()
    {
        // Tampilkan formulir untuk membuat pembayaran baru
        return view('backend.pembayaran.create');
    }

    public function store(Request $request)
    {
       
        DB::beginTransaction();
        try {
            $requset = $request->merge(['slug'=>$request->name]);
            $this->pembayaran->create($request->all());
            DB::commit();
            return redirect()->route('pembayaran.index')->with('success-message','Data telah disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }  }

    public function show($id)
    {
        // Tampilkan detail pembayaran berdasarkan ID
        $pembayaran = Pembayaran::findOrFail($id);
        return view('pembayaran.show', compact('pembayaran'));
    }

    public function edit($id)
    {
        // Tampilkan formulir untuk mengedit pembayaran berdasarkan ID
        $data = Pembayaran::findOrFail($id);
        return view('backend.pembayaran.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data dan update pembayaran ke database
        DB::beginTransaction();
        try {
            $requset = $request->merge(['slug'=>$request->name]);
            $this->pembayaran->create($request->all());
            DB::commit();
            return redirect()->route('pembayaran.index')->with('success-message','Data telah disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }  }

    public function destroy($id)
    {
        // Hapus pembayaran berdasarkan ID
        Pembayaran::findOrFail($id)->delete();

        return redirect(route('pembayaran.index'))->with('success', 'Pembayaran berhasil dihapus!');
    }
}
