<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('itemcode');
            $table->string('itemname');
            $table->decimal('itemprice', 10, 2);
            $table->text('itemdesc')->nullable();
            $table->string('itempict')->nullable();
            $table->foreignId('satuan_id')->constrained('satuans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }

};
