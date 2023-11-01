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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('profil',100)->nullable();
            $table->string('nama',50);
            $table->string('npm_nip',11)->unique();
            $table->string('email',50)->unique();
            $table->string('jurusan',20)->nullable();
            $table->string('jenis_kelamin',10);
            $table->string('password');
            $table->enum('role',['super admin','admin','user'])->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
