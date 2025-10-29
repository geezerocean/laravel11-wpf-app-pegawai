<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Department;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Menampilkan daftar semua jabatan
     */
    public function index()
    {
        $positions = Position::with('department')
            ->orderBy('created_at', 'desc')
            ->paginate(5); // 5 data per halaman
        
        return view('positions.index', compact('positions'));
    }

    /**
     * Menampilkan form tambah jabatan
     */
    public function create()
    {
        $departments = Department::all();
        return view('positions.create', compact('departments'));
    }

    /**
     * Simpan jabatan baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_jabatan' => 'required|string|max:50|unique:positions,kode_jabatan',
            'nama_jabatan' => 'required|string|max:100',
            'department_id' => 'required|exists:departments,id',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'level_jabatan' => 'nullable|string|max:50',
            'deskripsi_pekerjaan' => 'nullable|string',
        ]);

        Position::create($request->all());

        return redirect()->route('positions.index')
                         ->with('success', 'Jabatan berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail jabatan
     */
    public function show(string $id)
    {
        $position = Position::with('department')->findOrFail($id);
        return view('positions.show', compact('position'));
    }

    /**
     * Menampilkan form edit jabatan
     */
    public function edit(string $id)
    {
        $position = Position::findOrFail($id);
        $departments = Department::all();
        return view('positions.edit', compact('position', 'departments'));
    }

    /**
     * Update data jabatan
     */
    public function update(Request $request, string $id)
    {
        $position = Position::findOrFail($id);

        $request->validate([
            'kode_jabatan' => 'required|string|max:50|unique:positions,kode_jabatan,' . $id,
            'nama_jabatan' => 'required|string|max:100',
            'department_id' => 'required|exists:departments,id',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'level_jabatan' => 'nullable|string|max:50',
            'deskripsi_pekerjaan' => 'nullable|string',
        ]);

        $position->update($request->all());

        return redirect()->route('positions.index')
                         ->with('success', 'Data jabatan berhasil diperbarui!');
    }

    /**
     * Hapus jabatan
     */
    public function destroy(string $id)
    {
        $position = Position::findOrFail($id);
        $position->delete();

        return redirect()->route('positions.index')
                        ->with('success', 'Jabatan berhasil dihapus!');
    }
}
