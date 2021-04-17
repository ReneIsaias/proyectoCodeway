<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departament_group', function (Blueprint $table) {
            $table->id();

            $table->foreignId('departament_id')->references('id')->on('departaments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('group_id')->references('id')->on('groups')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('departament_group');
    }
}
