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
            $table->string('nama_lengkap');

            // Buat kolom nis, nisn, nip nullable tanpa unique agar bisa diisi sesuai tipe user
            $table->string('nis')->nullable();
            $table->string('nisn')->nullable();
            $table->string('nip')->nullable(); // ← tambahkan kolom untuk guru

            $table->enum('kelas', ['X', 'XI', 'XII'])->nullable(); // guru tidak punya kelas
            $table->enum('jurusan', ['dkv', 'akl', 'tkr'])->nullable(); // guru bisa tidak isi jurusan

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->enum('opsi', ['guru', 'siswa']);

            $table->string('sekolah');
            $table->text('alamat')->nullable();
            $table->string('foto')->nullable();

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
