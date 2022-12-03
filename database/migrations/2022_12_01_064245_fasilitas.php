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
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_fasilitas');
            $table->string('deskripsi');
            $table->integer('harga');
            $table->timestamps();
        });

        $this->createPermission(Fasilitas::PERMISSIONS);
        $this->assignPermissionToSystem(Fasilitas::PERMISSIONS);
        $this->assignPermissionToAdmin(Fasilitas::PERMISSIONS);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fasilitas');
    }
};
