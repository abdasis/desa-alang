<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTetanggasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tetanggas', function (Blueprint $table) {
            $table->id();
            $table->string('barat', 100)->nullable();
            $table->string('timur', 100)->nullable();
            $table->string('utara', 100)->nullable();
            $table->string('selatan', 100)->nullable();
            $table->foreignId('keluarga_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('tetanggas');
    }
}
