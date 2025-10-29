<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('positions')->insert([
            // HRD (department_id = 1)
            [
                'kode_jabatan' => 'HRD-MGR',
                'nama_jabatan' => 'HR Manager',
                'department_id' => 1,
                'gaji_pokok' => 12000000,
                'tunjangan' => 2000000,
                'level_jabatan' => 'Manager',
                'deskripsi_pekerjaan' => 'Mengatur seluruh aktivitas HRD termasuk rekrutmen, pengembangan, dan penilaian kinerja.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_jabatan' => 'HRD-STF',
                'nama_jabatan' => 'HR Staff',
                'department_id' => 1,
                'gaji_pokok' => 6000000,
                'tunjangan' => 1000000,
                'level_jabatan' => 'Staff',
                'deskripsi_pekerjaan' => 'Mendukung administrasi HR seperti absensi, kontrak kerja, dan pelatihan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Finance (department_id = 2)
            [
                'kode_jabatan' => 'FIN-MGR',
                'nama_jabatan' => 'Finance Manager',
                'department_id' => 2,
                'gaji_pokok' => 13000000,
                'tunjangan' => 2500000,
                'level_jabatan' => 'Manager',
                'deskripsi_pekerjaan' => 'Mengatur perencanaan keuangan, laporan akuntansi, dan anggaran tahunan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_jabatan' => 'ACC-STF',
                'nama_jabatan' => 'Accounting Staff',
                'department_id' => 2,
                'gaji_pokok' => 7000000,
                'tunjangan' => 1000000,
                'level_jabatan' => 'Staff',
                'deskripsi_pekerjaan' => 'Mencatat transaksi keuangan dan menyiapkan laporan akuntansi bulanan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Marketing (department_id = 3)
            [
                'kode_jabatan' => 'MKT-EXE',
                'nama_jabatan' => 'Brand Executive',
                'department_id' => 3,
                'gaji_pokok' => 9000000,
                'tunjangan' => 1500000,
                'level_jabatan' => 'Executive',
                'deskripsi_pekerjaan' => 'Mengembangkan strategi branding dan memonitor performa kampanye pemasaran.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_jabatan' => 'MKT-ANL',
                'nama_jabatan' => 'Marketing Analyst',
                'department_id' => 3,
                'gaji_pokok' => 8500000,
                'tunjangan' => 1200000,
                'level_jabatan' => 'Analyst',
                'deskripsi_pekerjaan' => 'Menganalisis data pasar dan memberikan insight untuk keputusan strategi pemasaran.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // R&D (department_id = 4)
            [
                'kode_jabatan' => 'RND-SPV',
                'nama_jabatan' => 'R&D Supervisor',
                'department_id' => 4,
                'gaji_pokok' => 10000000,
                'tunjangan' => 1500000,
                'level_jabatan' => 'Supervisor',
                'deskripsi_pekerjaan' => 'Mengawasi proses penelitian dan pengembangan produk baru.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_jabatan' => 'RND-ASST',
                'nama_jabatan' => 'R&D Assistant',
                'department_id' => 4,
                'gaji_pokok' => 7000000,
                'tunjangan' => 800000,
                'level_jabatan' => 'Staff',
                'deskripsi_pekerjaan' => 'Mendukung eksperimen dan uji kualitas formula produk.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // IT Division (department_id = 5)
            [
                'kode_jabatan' => 'IT-ENG',
                'nama_jabatan' => 'Software Engineer',
                'department_id' => 5,
                'gaji_pokok' => 9500000,
                'tunjangan' => 1500000,
                'level_jabatan' => 'Engineer',
                'deskripsi_pekerjaan' => 'Mengembangkan aplikasi internal dan sistem perusahaan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_jabatan' => 'IT-SPV',
                'nama_jabatan' => 'IT Support Specialist',
                'department_id' => 5,
                'gaji_pokok' => 7500000,
                'tunjangan' => 1000000,
                'level_jabatan' => 'Staff',
                'deskripsi_pekerjaan' => 'Menangani troubleshooting jaringan, server, dan perangkat kerja karyawan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Production (department_id = 6)
            [
                'kode_jabatan' => 'PRD-MGR',
                'nama_jabatan' => 'Production Manager',
                'department_id' => 6,
                'gaji_pokok' => 14000000,
                'tunjangan' => 2000000,
                'level_jabatan' => 'Manager',
                'deskripsi_pekerjaan' => 'Mengatur seluruh lini produksi, termasuk perencanaan kapasitas dan efisiensi mesin.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Quality Assurance (department_id = 7)
            [
                'kode_jabatan' => 'QA-ANL',
                'nama_jabatan' => 'Quality Analyst',
                'department_id' => 7,
                'gaji_pokok' => 8000000,
                'tunjangan' => 1000000,
                'level_jabatan' => 'Analyst',
                'deskripsi_pekerjaan' => 'Melakukan pemeriksaan kualitas produk dan analisis hasil uji laboratorium.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Logistics (department_id = 8)
            [
                'kode_jabatan' => 'LOG-SPV',
                'nama_jabatan' => 'Logistics Supervisor',
                'department_id' => 8,
                'gaji_pokok' => 9000000,
                'tunjangan' => 1200000,
                'level_jabatan' => 'Supervisor',
                'deskripsi_pekerjaan' => 'Mengatur pengiriman, gudang, dan manajemen stok produk.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Customer Service (department_id = 9)
            [
                'kode_jabatan' => 'CSM-EXE',
                'nama_jabatan' => 'Customer Experience Executive',
                'department_id' => 9,
                'gaji_pokok' => 7500000,
                'tunjangan' => 1000000,
                'level_jabatan' => 'Executive',
                'deskripsi_pekerjaan' => 'Menangani keluhan dan memastikan pengalaman pelanggan tetap positif.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Legal (department_id = 10)
            [
                'kode_jabatan' => 'LGL-OFC',
                'nama_jabatan' => 'Legal Officer',
                'department_id' => 10,
                'gaji_pokok' => 8500000,
                'tunjangan' => 1500000,
                'level_jabatan' => 'Officer',
                'deskripsi_pekerjaan' => 'Menyusun dan meninjau dokumen hukum serta memastikan kepatuhan perusahaan terhadap regulasi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
