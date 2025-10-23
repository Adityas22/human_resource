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
        // Schema::create('human_resource_app', function (Blueprint $table) {

        Schema::create('departemen', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->text("deskripsi")->nullable(); //data boleh kosong
            $table->string("status");
            $table->string("alamat");
            $table->timestamps();
            $table->softDeletes();
        });
        
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->text("deskripsi")->nullable(); //data boleh kosong
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('karyawan', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->id();
            $table->string("nama");
            $table->string("email")->unique();
            $table->string("nomor_hp");
            $table->string("alamat");
            $table->string("tgl_lahir");
            $table->string("tgl_rekrutment");
            $table->foreignId("departemen_id")->contrained("departemen");
            $table->foreignId("roles_id")->contrained("roles");
            $table->string("status");
            $table->integer("gaji");
            $table->timestamps();
            $table->softDeletes();
        });
        
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->text("deskripsi")->nullable(); //data boleh kosong
            $table->foreignId("penugasan")->contrained("karyawan");
            $table->date("tenggat_waktu");
            $table->string("status");
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('payroll', function (Blueprint $table) {
            $table->id();
            $table->foreignId("karyawan_id")->contrained("karyawan");
            $table->integer("gaji");
            $table->integer("bonus")->nullable();
            $table->integer("potongan")->nullable();
            $table->integer("gaji_bersih");
            $table->date("tgl_pembayaran");
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('kehadiran', function (Blueprint $table) {
            $table->id();
            $table->foreignId("karyawan_id")->contrained("karyawan");
            $table->date("check_in");
            $table->date("check_out");
            $table->date("date");
            $table->string("status");
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('cuti', function (Blueprint $table) {
            $table->id();
            $table->foreignId("karyawan_id")->contrained("karyawan");
            $table->string("jenis_cuti");
            $table->date("mulai");
            $table->date("selesai");
            $table->string("status");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('human_resource_app');
        Schema::dropIfExists('karyawan');
        Schema::dropIfExists('departemen');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('payroll');
        Schema::dropIfExists('kehadiran');
        Schema::dropIfExists('cuti');
    }
};