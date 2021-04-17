<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacants', function (Blueprint $table) {
            $table->id();

            $table->string('name', 200)->unique();
            $table->string('slug')->unique();
            $table->text('description');
            $table->integer('quantity');
            $table->boolean('status')->default('1');

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
        Schema::dropIfExists('vacants');
    }
}
