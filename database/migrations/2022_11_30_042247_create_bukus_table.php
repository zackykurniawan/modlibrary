<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('isbn');
            $table->string('judul');
            $table->string('sinopsis');
            $table->string('pernerbit');
            $table->string('cover');
            $table->foreignId('kategori_id')->constrained('kategori')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('status')->default('Tidak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
};
