<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            // TODO: definisikan schema table buku anda disini
            $table->id(); // ID untuk setiap buku
            $table->string('judul'); // Kolom untuk judul buku
            $table->string('penulis'); // Kolom untuk penulis buku
            $table->integer('tahun_terbit'); // Kolom untuk tahun terbit buku
            $table->string('penerbit'); // Kolom untuk penerbit buku
            $table->string('kategori'); // Kolom untuk kategori buku
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
