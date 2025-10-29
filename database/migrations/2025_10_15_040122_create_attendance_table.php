<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel karyawan
            $table->unsignedBigInteger('employee_id');
            $table->date('tanggal');

            // Status harian
            $table->enum('status', ['hadir', 'cuti', 'izin', 'tanpa_keterangan'])->default('hadir');

            // Data waktu
            $table->time('waktu_masuk')->nullable();
            $table->time('waktu_keluar')->nullable();

            // Statistik bulanan (optional, bisa diisi otomatis lewat perhitungan)
            $table->integer('jumlah_hadir_bulan_ini')->default(0);
            $table->integer('jumlah_cuti_bulan_ini')->default(0);
            $table->integer('jumlah_izin_bulan_ini')->default(0);
            $table->integer('jumlah_tanpa_keterangan_bulan_ini')->default(0);

            // Kuota cuti tahunan
            $table->integer('kuota_cuti_tahunan')->default(12);

            $table->timestamps();

            // Foreign key
            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
