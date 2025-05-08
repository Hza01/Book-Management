<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('pengarang');
            $table->integer('tahun_terbit');
            $table->string('penerbit');
            $table->string('kategori');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bukus');
    }
};