<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Faktur;

class FakturController extends Controller
{
    public function __construct()
    {
        $this->faktur = new Faktur();
    }
    public function index()
    {    
    
        return view('backend.faktur.index');
    }
    
    public function fakturSource(){
        $query= Faktur::query();
        // \Log::info('DataTable Request Received');
        return DataTables::eloquent($query)
            ->filter(function ($query) {
                if (request()->has('search')) {
                    $query->where(function ($q) {
                        $q->where('kode_faktur', 'LIKE', '%' . request('search')['value'] . '%')
                          ->orWhere('tahun', 'LIKE', '%' . request('search')['value'] . '%')
                          ->orWhere('total_bayar', 'LIKE', '%' . request('search')['value'] . '%');
                        // Add other columns as needed
                    });
                }
            })
            ->addColumn('kode_faktur', function ($data) {
                return $data->kode_faktur;
            })
            ->addColumn('tahun', function ($data) {
                return $data->tahun;
            })
            ->addColumn('tanggal_pemesanan', function ($data) {
                return $data->tanggal_pemesanan;
            })
            ->addColumn('total_bayar', function ($data) {
                return $data->total_bayar;
            })
            ->addColumn('metode_pembayaran', function ($data) {
                return $data->metode_pembayaran;
            })
            // Add other columns as needed
            ->addIndexColumn()
            ->addColumn('action', 'backend.faktur.index-action')
            ->rawColumns(['action'])
            ->toJson();
    }
    

    public function create()
    {
        // Tampilkan formulir untuk membuat faktur baru
        return view('backend.faktur.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $requset = $request->merge(['slug'=>$request->name]);
            $this->faktur->create($request->all());
            DB::commit();
            return redirect()->route('faktur.index')->with('success-message','Data telah disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
        // return redirect(route('backend.faktur.index'))->with('success', 'Faktur berhasil ditambahkan!');
    }

    public function show($id)
    {
        // Tampilkan detail faktur berdasarkan ID
        $data = $this->faktur->find($id);
        return $data;
    }

    public function edit($id)
    {
        // Tampilkan formulir untuk mengedit faktur berdasarkan ID
        $data = $this->faktur->find($id);
        return view('backend.faktur.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $request = $request->merge(['slug'=>$request->name]);
            $this->faktur->find($id)->update($request->all());
            DB::commit();
            return redirect()->route('faktur.index')->with('success-message','Data telah dirubah');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
    }

    public function destroy($id)
    {
        // Hapus faktur berdasarkan ID
        Faktur::findOrFail($id)->delete();

        return redirect(route('faktur.index'))->with('success', 'Faktur berhasil dihapus!');
    }
}
