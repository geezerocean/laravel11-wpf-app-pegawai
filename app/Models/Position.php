<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_jabatan',
        'nama_jabatan',
        'gaji_pokok',
        'tunjangan',
        'level_jabatan',
        'deskripsi_pekerjaan',
        'department_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function employees()
    {
        // 🔹 Ubah dari 'jabatan_id' jadi 'position_id'
        return $this->hasMany(Employee::class, 'position_id');
    }
}
