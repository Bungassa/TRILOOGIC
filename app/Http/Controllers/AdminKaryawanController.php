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
            'nama' => 'required|string|max:255',
            'umur' => 'required|integer|min:1',
            'jenis_kelamin' => 'required|in:L,P',
            'status' => 'required|string',
        ]);

        Karyawan::create($request->all());
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
            'nama' => 'required',
            'umur' => 'required|integer|min:1',
            'jenis_kelamin' => 'required|in:L,P',
            'status' => 'required'
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update([
            'nama' => $request->nama,
            'umur' => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
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
