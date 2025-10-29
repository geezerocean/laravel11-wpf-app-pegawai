<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'gaji_pokok',
        'tunjangan',
        'potongan',
        'total_gaji',
        'periode',
    ];

    /**
     * Relasi ke model Employee
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Shortcut relasi ke Department melalui Employee
     */
    public function department()
    {
        return $this->hasOneThrough(
            Department::class,  // Model tujuan akhir
            Employee::class,    // Model perantara
            'id',               // Foreign key di tabel employees
            'id',               // Foreign key di tabel departments
            'employee_id',      // Foreign key di tabel salaries
            'department_id'     // Foreign key di tabel employees
        );
    }

    /**
     * Shortcut relasi ke Position melalui Employee
     */
    public function position()
    {
        return $this->hasOneThrough(
            Position::class,
            Employee::class,
            'id',
            'id',
            'employee_id',
            'jabatan_id'
        );
    }
}
