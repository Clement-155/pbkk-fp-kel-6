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
        Schema::create('char_data', function (Blueprint $table) {
            $table->id(); //Big increments

            // Form Data
            $table->string('image');
            $table->string('full_name');
            $table->string('nickname');
            $table->text('description');
            $table->integer('base_prot');
            $table->double('prot_multiplier');
            $table->integer('base_dmg');
            $table->double('dmg_multiplier');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('char_data');
    }
};
