<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class AdminKaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::all();
        return view('admin.pages.karyawan.index', ['title' => 'Data Karyawan', 'karyawans' => $karyawans]);
    }

    public function create()
    {
        return view('admin.pages.karyawan.create', ['title' => 'Tambah Karyawan']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:20|unique:karyawans',
            'nama' => 'required|string|max:255',
            'gaji_pokok' => 'required|numeric|min:0',
            'tanggal' => 'required|date',
            'terapi_yang_dilakukan' => 'required|string',
            'status' => 'required|string',
        ]);

        Karyawan::create($request->except('jabatan'));
        return redirect()->route('admin.karyawan')->with('success', 'Karyawan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('admin.pages.karyawan.edit', [
            'title' => 'Edit Karyawan',
            'karyawan' => $karyawan
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|unique:karyawans,nik,' . $id,
            'nama' => 'required',
            'gaji_pokok' => 'required|numeric',
            'tanggal' => 'required|date',
            'terapi_yang_dilakukan' => 'nullable',
            'status' => 'required'
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'gaji_pokok' => $request->gaji_pokok,
            'tanggal' => $request->tanggal,
            'terapi_yang_dilakukan' => $request->terapi_yang_dilakukan,
            'status' => $request->status
        ]);
        
        return redirect()->route('admin.karyawan')->with('success', 'Data karyawan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();
        return redirect()->route('admin.karyawan')->with('success', 'Karyawan berhasil dihapus');
    }
}
