<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('employees')->insert([
            [
                'nama_lengkap' => 'Nadia Putri Anindya',
                'email' => 'nadia.anindya@paragon.co.id',
                'no_telepon' => '081234560001',
                'tanggal_lahir' => '2001-03-22',
                'alamat' => 'Jl. Ketintang Barat No. 12, Surabaya',
                'tanggal_masuk' => '2024-06-10',
                'status' => 'aktif',
                'department_id' => 1, // Human Resources
                'position_id' => 1, // HR Manager
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Rafi Akbar Pratama',
                'email' => 'rafi.pratama@paragon.co.id',
                'no_telepon' => '081234560002',
                'tanggal_lahir' => '2000-11-15',
                'alamat' => 'Jl. Raya Jemursari No. 8, Surabaya',
                'tanggal_masuk' => '2023-09-01',
                'status' => 'aktif',
                'department_id' => 2, // Finance
                'position_id' => 3, // Financial Analyst
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Celine Aurora',
                'email' => 'celine.aurora@paragon.co.id',
                'no_telepon' => '081234560003',
                'tanggal_lahir' => '2002-07-09',
                'alamat' => 'Jl. Manyar Tirtoyoso No. 19, Surabaya',
                'tanggal_masuk' => '2024-01-20',
                'status' => 'aktif',
                'department_id' => 3, // Marketing
                'position_id' => 5, // Marketing Specialist
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Darren Alvaro',
                'email' => 'darren.alvaro@paragon.co.id',
                'no_telepon' => '081234560004',
                'tanggal_lahir' => '2001-12-28',
                'alamat' => 'Jl. Pucang Anom No. 33, Surabaya',
                'tanggal_masuk' => '2022-08-11',
                'status' => 'aktif',
                'department_id' => 4, // IT
                'position_id' => 8, // Software Engineer
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Almira Zahra',
                'email' => 'almira.zahra@paragon.co.id',
                'no_telepon' => '081234560005',
                'tanggal_lahir' => '2000-06-05',
                'alamat' => 'Jl. Raya Darmo Permai No. 47, Surabaya',
                'tanggal_masuk' => '2021-05-14',
                'status' => 'aktif',
                'department_id' => 5, // Production
                'position_id' => 9, // Production Supervisor
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Reyhan Dimas Nugraha',
                'email' => 'reyhan.dimas@paragon.co.id',
                'no_telepon' => '081234560006',
                'tanggal_lahir' => '1999-09-12',
                'alamat' => 'Jl. Margomulyo No. 10, Surabaya',
                'tanggal_masuk' => '2020-10-02',
                'status' => 'aktif',
                'department_id' => 6, // Quality Assurance
                'position_id' => 10, // QA Specialist
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Keisha Ayunda',
                'email' => 'keisha.ayunda@paragon.co.id',
                'no_telepon' => '081234560007',
                'tanggal_lahir' => '2002-01-19',
                'alamat' => 'Jl. Ngagel Jaya Selatan No. 24, Surabaya',
                'tanggal_masuk' => '2023-03-27',
                'status' => 'aktif',
                'department_id' => 7, // Supply Chain
                'position_id' => 11, // Procurement Officer
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Zidan Al Ghifari',
                'email' => 'zidan.alghifari@paragon.co.id',
                'no_telepon' => '081234560008',
                'tanggal_lahir' => '2001-04-08',
                'alamat' => 'Jl. Gunung Anyar No. 18, Surabaya',
                'tanggal_masuk' => '2022-11-09',
                'status' => 'aktif',
                'department_id' => 8, // Research & Development
                'position_id' => 13, // R&D Specialist
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Tasya Aurelia',
                'email' => 'tasya.aurelia@paragon.co.id',
                'no_telepon' => '081234560009',
                'tanggal_lahir' => '2003-02-25',
                'alamat' => 'Jl. Raya Nginden No. 56, Surabaya',
                'tanggal_masuk' => '2024-02-03',
                'status' => 'aktif',
                'department_id' => 9, // Customer Service
                'position_id' => 14, // Customer Service Representative
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Dio Mahendra',
                'email' => 'dio.mahendra@paragon.co.id',
                'no_telepon' => '081234560010',
                'tanggal_lahir' => '2000-10-17',
                'alamat' => 'Jl. Wonocolo No. 5, Surabaya',
                'tanggal_masuk' => '2020-12-15',
                'status' => 'aktif',
                'department_id' => 10, // Legal & Compliance
                'position_id' => 15, // Legal Officer
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
