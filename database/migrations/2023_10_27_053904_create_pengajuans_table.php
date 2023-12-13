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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('nama_kegiatan_perlombaan',150);
            $table->string('lokasi_lomba',150);
            $table->string('tahun',10);
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('juara',20);
            $table->string('tingkat_prestasi',50);
            $table->integer('jumlah_Peserta');
            $table->string('nama_penyelenggara',100);
            $table->string('url_penyelenggara',150);
            $table->string('file_penghargaan',200);
            $table->string('file_dokumentasi_kegiatan',200)->nullable();
            $table->string('file_surat_tugas',200)->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
