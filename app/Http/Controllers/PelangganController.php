<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Pelanggan;

class PelangganController extends Controller
{

    public function __construct()
    {
        $this->pelanggan = new Pelanggan();
    }
    public function index()
    {

        return view('backend.pelanggan.index');
    }

    public function Source(){
        $query= Pelanggan::query();
        // \Log::info('DataTable Request Received');
        return DataTables::eloquent($query)
            ->filter(function ($query) {
                if (request()->has('search')) {
                    $query->where(function ($q) {
                        $q->where('NIK', 'LIKE', '%' . request('search')['value'] . '%')
                          ->orWhere('Nama', 'LIKE', '%' . request('search')['value'] . '%')
                          ->orWhere('Alamat', 'LIKE', '%' . request('search')['value'] . '%');
                        // Add other columns as needed
                    });
                }
            })
            ->addColumn('NIK', function ($data) {
                return $data->NIK;
            })
            ->addColumn('Nama', function ($data) {
                return $data->Nama;
            })
            ->addColumn('No_Telepon', function ($data) {
                return $data->No_Telepon;
            })
            ->addColumn('Alamat', function ($data) {
                return $data->Alamat;
            })
            ->addColumn('Email', function ($data) {
                return $data->Email;
            })
           
            // Add other columns as needed
            ->addIndexColumn()
            ->addColumn('action', 'backend.pelanggan.index-action')
            ->rawColumns(['action'])
            ->toJson();
    }


    public function create()
    {
        // Tampilkan formulir untuk membuat pelanggan baru
        return view('backend.pelanggan.create');
    }

    public function store(Request $request)
    {
        // Validasi data dan simpan pelanggan baru ke database
        DB::beginTransaction();
        try {
            $requset = $request->merge(['slug'=>$request->name]);
            $this->pelanggan->create($request->all());
            DB::commit();
            return redirect()->route('pelanggan.index')->with('success-message','Data telah disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
    }

    public function show($id)
    {
        // Tampilkan detail pelanggan berdasarkan ID
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.show', compact('pelanggan'));
    }

    public function edit($id)
    {
        // Tampilkan formulir untuk mengedit pelanggan berdasarkan ID
        $data = Pelanggan::findOrFail($id);
        return view('backend.pelanggan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $requset = $request->merge(['slug'=>$request->name]);
            $this->pelanggan->create($request->all());
            DB::commit();
            return redirect()->route('pelanggan.index')->with('success-message','Data telah disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }  }

    public function destroy($id)
    {
        // Hapus pelanggan berdasarkan ID
        Pelanggan::findOrFail($id)->delete();

        return redirect(route('pelanggan.index'))->with('success', 'Pelanggan berhasil dihapus!');
    }
}
