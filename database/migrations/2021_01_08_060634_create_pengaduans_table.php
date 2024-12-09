<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();

            $table->string('user_alamat');
            $table->string('name');
            $table->integer('user_id');
            $table->string('lokasi_kejadian');
            $table->text('description');
            $table->text('keterangan_tambahan');
            $table->string('image');
            $table->string('status')->default('Belum di Proses');
            $table->softDeletes();
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
        Schema::dropIfExists('pengaduans');
    }
}
