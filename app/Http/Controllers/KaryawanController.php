<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Karyawan;

class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->karyawan = new Karyawan();
    }

    public function index()
    {
        // Tampilkan daftar karyawan
        
        return view('backend.karyawan.index');
    }

    public function Source(){
        $query= Karyawan::query();
        // \Log::info('DataTable Request Received');
        return DataTables::eloquent($query)
            ->filter(function ($query) {
                if (request()->has('search')) {
                    $query->where(function ($q) {
                        $q->where('nama', 'LIKE', '%' . request('search')['value'] . '%')
                          ->orWhere('alamat', 'LIKE', '%' . request('search')['value'] . '%')
                          ->orWhere('notelp', 'LIKE', '%' . request('search')['value'] . '%');
                        // Add other columns as needed
                    });
                }
            })
            ->addColumn('nama', function ($data) {
                return $data->nama;
            })
            ->addColumn('alamat', function ($data) {
                return $data->alamat;
            })
            ->addColumn('tanggal_pemesanan', function ($data) {
                return $data->tanggal_pemesanan;
            })
            ->addColumn('notelp', function ($data) {
                return $data->notelp;
            })
            ->addColumn('email', function ($data) {
                return $data->email;
            })
            ->addColumn('tanggal_lahir', function ($data) {
                return $data->tanggal_lahir;
            })
            ->addColumn('jabatan', function ($data) {
                return $data->jabatan;
            })
            ->addColumn('gaji', function ($data) {
                return $data->gaji;
            })
            ->addColumn('mulai_kerja', function ($data) {
                return $data->mulai_kerja;
            })
            ->addColumn('jam_kerja', function ($data) {
                return $data->jam_kerja;
            })
            // Add other columns as needed
            ->addIndexColumn()
            ->addColumn('action', 'backend.karyawan.index-action')
            ->rawColumns(['action'])
            ->toJson();
    }
    

    public function create()
    {
        // Tampilkan formulir untuk membuat karyawan baru
        return view('backend.karyawan.create');
    }

    public function store(Request $request)
    {
        // Validasi data dan simpan karyawan baru ke database
        DB::beginTransaction();
        try {
            $requset = $request->merge(['slug'=>$request->name]);
            $this->karyawan->create($request->all());
            DB::commit();
            return redirect()->route('karyawan.index')->with('success-message','Data telah disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }

    }

    public function show($id)
    {
        // Tampilkan detail karyawan berdasarkan ID
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.show', compact('karyawan'));
    }

    public function edit($id)
    {
        // Tampilkan formulir untuk mengedit karyawan berdasarkan ID
        $data = Karyawan::findOrFail($id);
        return view('backend.karyawan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data dan update karyawan ke database
        $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'notelp' => 'required',
            'email' => 'required|email|unique:karyawan,email,' . $id,
            'tanggal_lahir' => 'required|date',
            'jabatan' => 'required',
            'gaji' => 'required|numeric',
            'mulai_kerja' => 'required|date',
            'jam_kerja' => 'required',
        ]);

        Karyawan::whereId($id)->update($validatedData);

        return redirect(route('karyawan.index'))->with('success', 'Karyawan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Hapus karyawan berdasarkan ID
        Karyawan::findOrFail($id)->delete();

        return redirect(route('karyawan.index'))->with('success', 'Karyawan berhasil dihapus!');
    }
}
