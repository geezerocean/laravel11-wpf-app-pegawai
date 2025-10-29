<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
     public function index()
    {
        $departments = Department::withCount('employees')->get();
        
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        // 🔹 Validasi input
        $request->validate([
            'kode_departemen' => 'nullable|string|max:10',
            'nama_departemen' => 'required|string|max:100',
            'lokasi' => 'nullable|string|max:100',
            'jumlah_pegawai' => 'nullable|integer',
            'deskripsi' => 'nullable|string',
        ]);

        // Simpan data ke tabel
        Department::create($request->only([
            'kode_departemen',
            'nama_departemen',
            'lokasi',
            'jumlah_pegawai',
            'deskripsi',
        ]));

        return redirect()->route('departments.index')
                        ->with('success', 'Departemen berhasil ditambahkan!');
    }

    public function show(Department $department)
    {
        // Load jumlah karyawan dari relasi employees
        $department->loadCount('employees');
        
        return view('departments.show', compact('department'));
    }

    public function edit(string $id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'kode_departemen' => 'nullable|string|max:20',
            'nama_departemen' => 'required|string|max:100',
            'lokasi' => 'nullable|string|max:100',
            'jumlah_pegawai' => 'nullable|integer',
            'deskripsi' => 'nullable|string',
        ]);

        // Update data
        $department = Department::findOrFail($id);
        $department->update($request->only([
            'kode_departemen',
            'nama_departemen',
            'lokasi',
            'jumlah_pegawai',
            'deskripsi',
        ]));

        return redirect()->route('departments.index')
                        ->with('success', 'Departemen berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('departments.index')
                        ->with('success', 'Departemen berhasil dihapus!');
    }
}
