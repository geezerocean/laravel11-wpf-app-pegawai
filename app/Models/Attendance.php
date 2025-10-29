<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances';
    protected $fillable = [
        'employee_id',
        'tanggal',
        'status',
        'waktu_masuk',
        'waktu_keluar',
    ];

    // Relasi ke tabel employees
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // 🔢 Fungsi untuk menghitung jumlah kehadiran bulanan
    public static function countMonthlyByStatus($employeeId, $status)
    {
        return self::where('employee_id', $employeeId)
            ->where('status', $status)
            ->whereMonth('tanggal', now()->month)
            ->count();
    }
}
