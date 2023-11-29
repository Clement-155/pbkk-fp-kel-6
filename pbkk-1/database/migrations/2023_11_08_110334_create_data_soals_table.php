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
        Schema::create('data_soals', function (Blueprint $table) {
            $table->id();

            /**
             * Angka yang digunakan untuk mengurutkan soal saat diambil dari DB.
             * Tidak harus urut.
             */
            $table->unsignedSmallInteger('urutan_soal');

            $table->foreignId('last_editor');
            $table->foreignId('paket_soals_id');

            /**
             * 1 = Isian
             * 2 = 4 Pilgan
             * 3 = 4 Pilihan, lebih dari 1
             */
            $table->smallInteger('tipe_soal');
            $table->text('soal');
            $table->text('jawaban');
            $table->text('jawaban2')->nullable();
            $table->text('jawaban3')->nullable();
            $table->text('jawaban4')->nullable();

            $table->foreign('last_editor')->references('id')->on('users');
            $table->foreign('paket_soals_id')->references('id')->on('paket_soals');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_soals');
    }
};
