<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Tampilkan daftar absensi.
     */
    public function index()
    {
        $attendances = Attendance::with('employee')->latest()->paginate(5);
        return view('attendances.index', compact('attendances'));
    }

    /**
     * Tampilkan form tambah absensi baru.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('attendances.create', compact('employees'));
    }

    /**
     * Simpan data absensi baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'status' => 'required|in:hadir,cuti,izin,tidak_hadir',
            'waktu_masuk' => 'nullable|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i',
        ]);

        Attendance::create([
            'employee_id' => $request->employee_id,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'waktu_masuk' => $request->waktu_masuk,
            'waktu_keluar' => $request->waktu_keluar,
        ]);

        return redirect()->route('attendances.index')->with('success', '✅ Data absensi berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail absensi.
     */
    public function show($id)
    {
        $attendance = Attendance::with('employee')->findOrFail($id);
        return view('attendances.show', compact('attendance'));
    }

    /**
     * Tampilkan form edit absensi.
     */
    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        $employees = Employee::all();
        return view('attendances.edit', compact('attendance', 'employees'));
    }

    /**
     * Update data absensi.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'status' => 'required|in:hadir,cuti,izin,tidak_hadir',
            'waktu_masuk' => 'nullable|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i',
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->all());

        return redirect()->route('attendances.index')->with('success', '✅ Data absensi berhasil diperbarui!');
    }

    /**
     * Hapus data absensi.
     */
    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return redirect()->route('attendances.index')->with('success', '🗑️ Data absensi berhasil dihapus!');
    }
}
