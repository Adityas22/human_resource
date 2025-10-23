<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//tambahin tools  
use Faker\Factory as Faker;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HumanResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        DB::table('departemen')->insert([
            [
                'nama' => 'IT',
                'deskripsi' => 'Departemen IT',
                'status' => 'Aktif',
                'alamat' => 'Jakarta',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'nama' => 'HRD',
                'deskripsi' => 'Departemen HRD',
                'status' => 'Aktif',
                'alamat' => 'Jakarta',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'nama' => 'Keuangan',
                'deskripsi' => 'Departemen Keuangan',
                'status' => 'Aktif',
                'alamat' => 'Jakarta',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        DB::table('roles')->insert([
            [
                'nama' => 'HRD',
                'deskripsi' => 'Kelola Sumber Daya',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'IT',
                'deskripsi' => 'Teknologi dan Sistem',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'Keuangan',
                'deskripsi' => 'Aturan Aliran Dana',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        DB::table('karyawan')->insert([
            [
                'nama' => $faker->name,
                'email' => $faker->unique()->safeEmail(),
                'nomor_hp' => $faker->phoneNumber,
                'alamat' => $faker->address,
                'tgl_lahir'=>$faker->dateTimeBetween('1990-01-01', '2000-01-01'),
                'tgl_rekrutment'=>Carbon::now(),
                'departemen_id'=>1,
                'roles_id'=>1,
                'status'=>'active',
                'gaji'=>3000000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ],
            [
                'nama' => $faker->name,
                'email' => $faker->unique()->safeEmail(),
                'nomor_hp' => $faker->phoneNumber,
                'alamat' => $faker->address,
                'tgl_lahir'=>$faker->dateTimeBetween('1996-01-01', '2002-01-01'),
                'tgl_rekrutment'=>Carbon::now(),
                'departemen_id'=>2,
                'roles_id'=>2,
                'status'=>'active',
                'gaji'=>2800000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ],
            [
                'nama' => $faker->name,
                'email' => $faker->unique()->safeEmail(),
                'nomor_hp' => $faker->phoneNumber,
                'alamat' => $faker->address,
                'tgl_lahir'=>$faker->dateTimeBetween('1993-01-01', '2004-01-01'),
                'tgl_rekrutment'=>Carbon::now(),
                'departemen_id'=>3,
                'roles_id'=>3,
                'status'=>'active',
                'gaji'=>2700000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ],
        ]);

        DB::table('tasks')->insert([
            [
                'nama' => $faker->sentence(3), //generate kalimat random
                'deskripsi' => $faker->paragraph(),
                'penugasan'=>1,
                'tenggat_waktu'=>Carbon::parse('2023-12-31'),
                'status' => 'Pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => $faker->sentence(3), //generate kalimat random
                'deskripsi' => $faker->paragraph(),
                'penugasan'=>2,
                'tenggat_waktu'=>Carbon::parse('2023-12-23'),
                'status' => 'Pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => $faker->sentence(3), //generate kalimat random
                'deskripsi' => $faker->paragraph(),
                'penugasan'=>3,
                'tenggat_waktu'=>Carbon::parse('2023-9-23'),
                'status' => 'Pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        DB::table('payroll')->insert([
            [
                'karyawan_id'=>1,
                'gaji'=>$faker->randomNumber(3),
                'bonus'=>$faker->randomNumber(3),
                'potongan'=>$faker->randomNumber(3),
                'gaji_bersih'=>$faker->randomNumber(3),
                'tgl_pembayaran'=>Carbon::parse('2023-9-23'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'karyawan_id'=>2,
                'gaji'=>$faker->randomNumber(3),
                'bonus'=>$faker->randomNumber(3),
                'potongan'=>$faker->randomNumber(3),
                'gaji_bersih'=>$faker->randomNumber(3),
                'tgl_pembayaran'=>Carbon::parse('2023-9-23'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'karyawan_id'=>3,
                'gaji'=>$faker->randomNumber(3),
                'bonus'=>$faker->randomNumber(3),
                'potongan'=>$faker->randomNumber(3),
                'gaji_bersih'=>$faker->randomNumber(3),
                'tgl_pembayaran'=>Carbon::parse('2023-9-23'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        DB::table('kehadiran')->insert([
            [
                'karyawan_id'=>1,
                'check_in'=>Carbon::parse('2023-9-23 9:00:00'),
                'check_out'=>Carbon::parse('2023-9-23 18:00:00'),
                'date'=>Carbon::parse('2023-9-23'),
                'status'=>'hadir',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'karyawan_id'=>2,
                'check_in'=>Carbon::parse('2023-9-23 9:00:00'),
                'check_out'=>Carbon::parse('2023-9-23 18:00:00'),
                'date'=>Carbon::parse('2023-9-23'),
                'status'=>'hadir',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'karyawan_id'=>3,
                'check_in'=>Carbon::parse('2023-9-23 9:00:00'),
                'check_out'=>Carbon::parse('2023-9-23 18:00:00'),
                'date'=>Carbon::parse('2023-9-23'),
                'status'=>'hadir',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        Db::table('cuti')->insert([
            [
                'karyawan_id'=>1,
                'jenis_cuti'=>'sakit',
                'mulai'=>Carbon::parse('2023-9-20'),
                'selesai'=>Carbon::parse('2023-9-23'),
                'status'=>'Pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'karyawan_id'=>2,
                'jenis_cuti'=>'liburan',
                'mulai'=>Carbon::parse('2023-9-20'),
                'selesai'=>Carbon::parse('2023-9-21'),
                'status'=>'Pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'karyawan_id'=>3,
                'jenis_cuti'=>'sakit',
                'mulai'=>Carbon::parse('2023-9-22'),
                'selesai'=>Carbon::parse('2023-9-23'),
                'status'=>'Pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}