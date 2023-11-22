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
        Schema::create('kamus_bahasas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('last_editor');
            $table->foreignId('bahasa');
            $table->string('kata');
            $table->text('pengertian');
            $table->text('contoh');

            $table->foreign('last_editor')->references('id')->on('users');
            $table->foreign('bahasa')->references('id')->on('bahasas');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamus_bahasas');
    }
};
