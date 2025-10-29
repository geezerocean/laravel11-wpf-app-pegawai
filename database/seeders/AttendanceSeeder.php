<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;

class AttendanceSeeder extends Seeder
{
    /**
     * Jalankan seeder database.
     */
    public function run(): void
    {
        $employees = Employee::all();

        if ($employees->count() == 0) {
            $this->command->warn("⚠️ Tidak ada data karyawan. Jalankan EmployeeSeeder dulu.");
            return;
        }

        // Loop untuk setiap karyawan
        foreach ($employees as $employee) {
            // Simulasi absensi 30 hari terakhir
            for ($i = 0; $i < 30; $i++) {
                $tanggal = Carbon::now()->subDays($i)->toDateString();

                // Tentukan status secara acak
                $status = collect(['hadir', 'cuti', 'izin', 'tanpa_keterangan'])
                    ->random();

                // Kalau hadir, isi jam masuk & keluar
                $waktuMasuk = $status === 'hadir' ? Carbon::createFromTime(rand(7, 8), rand(0, 59)) : null;
                $waktuKeluar = $status === 'hadir' ? Carbon::createFromTime(rand(15, 17), rand(0, 59)) : null;

                Attendance::create([
                    'employee_id' => $employee->id,
                    'tanggal' => $tanggal,
                    'status' => $status,
                    'waktu_masuk' => $waktuMasuk,
                    'waktu_keluar' => $waktuKeluar,
                ]);
            }
        }

        $this->command->info('✅ AttendanceSeeder berhasil dijalankan!');
    }
}
