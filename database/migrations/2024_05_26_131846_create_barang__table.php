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
    Schema::create('barangs', function (Blueprint $table) {
        $table->id();
        $table->string('Kode_Barang')->unique();
        $table->string('Nama_Barang');
        $table->decimal('Harga_Barang', 10, 2); // 2 angka dibelakang koma
        $table->text('Deskripsi_Barang');
        $table->string('gambar')->nullable(); // Tambahkan kolom gambar

        // Menambahkan foreign key yang merujuk ke tabel 'satuans'
        $table->unsignedBigInteger('satuan_id');
        $table->foreign('satuan_id')->references('id')->on('satuans')->onDelete('cascade');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
