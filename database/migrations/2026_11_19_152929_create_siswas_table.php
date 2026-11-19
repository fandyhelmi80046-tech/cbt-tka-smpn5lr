<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();

            // Identitas siswa
            $table->string('nisn', 20)->unique();
            $table->string('nis', 30)->nullable()->unique();
            $table->string('nama_lengkap', 150);
            $table->enum('jenis_kelamin', ['L', 'P']);

            // Data kelahiran
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tanggal_lahir')->nullable();

            // Data kontak dan alamat
            $table->text('alamat')->nullable();
            $table->string('no_hp_orangtua', 20)->nullable();
            $table->string('email')->nullable();

            // Relasi kelas disiapkan untuk pengembangan berikutnya
            $table->unsignedBigInteger('kelas_id')->nullable()->index();

            // Status siswa
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
