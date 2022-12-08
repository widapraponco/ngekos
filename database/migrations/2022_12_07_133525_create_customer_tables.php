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
        Schema::create('customer_tables', function (Blueprint $table) {
            $table->increments('id_cs');
            $table->varchar('nama_cs', 20);
            $table->varchar('email_cs', 20);
            $table->varchar('pass_cs', 10);
            $table->image('foto_cs');
            $table->varchar('alamat_cs', 20);
            $table->char('notelp_cs', 14);
            $table->varchar('gender', 20);
            $table->integer('nik');
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
        Schema::dropIfExists('customer_tables');
    }
};
