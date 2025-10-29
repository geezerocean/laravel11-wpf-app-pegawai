<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('departments')->insert([
            [
                'kode_departemen' => 'HRD',
                'nama_departemen' => 'Human Resources Development',
                'lokasi' => 'Head Office - Surabaya',
                'jumlah_pegawai' => 25,
                'deskripsi' => 'Mengelola rekrutmen, pelatihan, dan pengembangan karyawan di seluruh unit.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_departemen' => 'FIN',
                'nama_departemen' => 'Finance & Accounting',
                'lokasi' => 'Head Office - Surabaya',
                'jumlah_pegawai' => 18,
                'deskripsi' => 'Bertanggung jawab atas manajemen keuangan, akuntansi, dan penganggaran.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_departemen' => 'MKT',
                'nama_departemen' => 'Marketing & Branding',
                'lokasi' => 'Jakarta Office',
                'jumlah_pegawai' => 22,
                'deskripsi' => 'Menangani strategi pemasaran, riset pasar, dan branding produk Paragon.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_departemen' => 'RND',
                'nama_departemen' => 'Research & Development',
                'lokasi' => 'R&D Center - Tangerang',
                'jumlah_pegawai' => 35,
                'deskripsi' => 'Melakukan inovasi dan pengembangan formula produk baru Paragon.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_departemen' => 'ITD',
                'nama_departemen' => 'Information Technology Division',
                'lokasi' => 'Head Office - Surabaya',
                'jumlah_pegawai' => 15,
                'deskripsi' => 'Menangani sistem informasi, infrastruktur, dan keamanan data perusahaan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_departemen' => 'PRD',
                'nama_departemen' => 'Production Department',
                'lokasi' => 'Factory - Sidoarjo',
                'jumlah_pegawai' => 50,
                'deskripsi' => 'Mengelola seluruh proses produksi, kontrol kualitas, dan supply chain.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_departemen' => 'QAD',
                'nama_departemen' => 'Quality Assurance Department',
                'lokasi' => 'Factory - Sidoarjo',
                'jumlah_pegawai' => 20,
                'deskripsi' => 'Menjamin kualitas produk melalui uji laboratorium dan inspeksi produksi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_departemen' => 'LOG',
                'nama_departemen' => 'Logistics & Distribution',
                'lokasi' => 'Warehouse - Bekasi',
                'jumlah_pegawai' => 28,
                'deskripsi' => 'Mengatur penyimpanan, pengiriman, dan distribusi produk ke seluruh Indonesia.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_departemen' => 'CSM',
                'nama_departemen' => 'Customer Service Management',
                'lokasi' => 'Head Office - Surabaya',
                'jumlah_pegawai' => 12,
                'deskripsi' => 'Menangani layanan pelanggan dan pengelolaan umpan balik konsumen.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_departemen' => 'LGL',
                'nama_departemen' => 'Legal & Compliance',
                'lokasi' => 'Head Office - Surabaya',
                'jumlah_pegawai' => 10,
                'deskripsi' => 'Mengurus dokumen hukum, izin, serta memastikan kepatuhan regulasi perusahaan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
