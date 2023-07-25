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
        Schema::create('services', function (Blueprint $table) {
            $table->id('no');
            $table->uuid('id');
            $table->uuid('aset_id');
            $table->string('nama_bengkel');
            $table->string('alamat_bengkel');
            $table->string('nohp_bengkel');
            $table->string('deskripsi_bengkel');
            $table->string('nama_kegiatan');
            $table->date('tanggal_kegiatan');
            $table->string('kilometer_tiba')->nullable();
            $table->string('kilometer_kembali')->nullable();
            $table->string('saran');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
