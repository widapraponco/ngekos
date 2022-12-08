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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_cs', 20);
            $table->string('email_cs', 20);
            $table->string('pass_cs', 20);
            $table->string('foto_cs');
            $table->string('alamat_cs', 20);
            $table->string('notlp_cs', 14);
            $table->enum('type', ['male', 'female']);
            $table->string('nik');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
};
