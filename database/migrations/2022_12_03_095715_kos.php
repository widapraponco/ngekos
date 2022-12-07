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
        Schema::create('kos', function (Blueprint $table) {
            $table->id();
            $table->variable_characters('nama_kos');
            $table->variable_characters('desk_kos');
            $table->variable_characters('tarif');
            $table->integer('jml_kamar');
            $table->integer('stok_kamar');
            $table->variable_characters('alamat_kos');
            $table->image('gambar1');
            $table->image('gambar2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
