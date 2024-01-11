<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Kendaraan;

class KendaraanController extends Controller
{
    public function __construct()
    {
        $this->kendaraan = new Kendaraan();
    }
    public function index()
    {
        // Tampilkan daftar kendaraan
        return view('backend.kendaraan.index');
    }

    public function Source(){
        $query= Kendaraan::query();
        // \Log::info('DataTable Request Received');
        return DataTables::eloquent($query)
            ->filter(function ($query) {
                if (request()->has('search')) {
                    $query->where(function ($q) {
                        $q->where('Merek', 'LIKE', '%' . request('search')['value'] . '%')
                          ->orWhere('Model', 'LIKE', '%' . request('search')['value'] . '%')
                          ->orWhere('Warna', 'LIKE', '%' . request('search')['value'] . '%');
                        // Add other columns as needed
                    });
                }
            })
            ->addColumn('Merek', function ($data) {
                return $data->Merek;
            })
            ->addColumn('Model', function ($data) {
                return $data->Model;
            })
            ->addColumn('tanggal_pemesanan', function ($data) {
                return $data->tanggal_pemesanan;
            })
            ->addColumn('Warna', function ($data) {
                return $data->Warna;
            })
            ->addColumn('Jenis_Kendaraan', function ($data) {
                return $data->Jenis_Kendaraan;
            })
            ->addColumn('Nomor_Plat', function ($data) {
                return $data->Nomor_Plat;
            })
            ->addColumn('Status_Ketersediaan', function ($data) {
                return $data->Status_Ketersediaan;
            })
            ->addColumn('Harga_Sewa_Per_Hari', function ($data) {
                return $data->Harga_Sewa_Per_Hari;
            })
           
            // Add other columns as needed
            ->addIndexColumn()
            ->addColumn('action', 'backend.kendaraan.index-action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function create()
    {
        // Tampilkan formulir untuk membuat kendaraan baru
        return view('backend.kendaraan.create');
    }

    public function store(Request $request)
    {
        // Validasi data dan simpan kendaraan baru ke database
        $validatedData = $request->validate([
            'Merek' => 'required',
            'Model' => 'required',
            'Warna' => 'required',
            'Jenis_Kendaraan' => 'required',
            'Nomor_Plat' => 'required',
            'Status_Ketersediaan' => 'required',
            'Harga_Sewa_Per_Hari' => 'required|numeric',
        ]);

        Kendaraan::create($validatedData);

        return redirect(route('kendaraan.index'))->with('success', 'Kendaraan berhasil ditambahkan!');
    }

    public function show($id)
    {
        // Tampilkan detail kendaraan berdasarkan ID
        $kendaraan = Kendaraan::findOrFail($id);
        return view('kendaraan.show', compact('kendaraan'));
    }

    public function edit($id)
    {
        // Tampilkan formulir untuk mengedit kendaraan berdasarkan ID
        $data = Kendaraan::findOrFail($id);
        return view('backend.kendaraan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data dan update kendaraan ke database
        $validatedData = $request->validate([
            'Merek' => 'required',
            'Model' => 'required',
            'Warna' => 'required',
            'Jenis_Kendaraan' => 'required',
            'Nomor_Plat' => 'required',
            'Status_Ketersediaan' => 'required',
            'Harga_Sewa_Per_Hari' => 'required|numeric',
        ]);

        Kendaraan::whereId($id)->update($validatedData);

        return redirect(route('kendaraan.index'))->with('success', 'Kendaraan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Hapus kendaraan berdasarkan ID
        Kendaraan::findOrFail($id)->delete();

        return redirect(route('kendaraan.index'))->with('success', 'Kendaraan berhasil dihapus!');
    }
}
