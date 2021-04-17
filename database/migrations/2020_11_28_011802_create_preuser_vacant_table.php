<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreuserVacantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preuser_vacant', function (Blueprint $table) {
            $table->id();

            $table->foreignId('preuser_id')->references('id')->on('preusers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('vacant_id')->references('id')->on('vacants')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('preuser_vacant');
    }
}
