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
        Schema::create('paket_soals', function (Blueprint $table) {
            $table->id();

            $table->foreignId('last_editor');
            $table->foreignId('bahasas_id');
            $table->string('nama_paket');
            $table->text('deskripsi');
            $table->unsignedInteger('jumlah_soal')->default(0);

            $table->foreign('last_editor')->references('id')->on('users');
            $table->foreign('bahasas_id')->references('id')->on('bahasas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_soals');
    }
};
