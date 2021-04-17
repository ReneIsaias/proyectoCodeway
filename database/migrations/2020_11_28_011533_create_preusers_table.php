<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preusers', function (Blueprint $table) {
            $table->id();

            $table->string('name', 100);
            $table->string('lastname', 100);
            $table->string('phone', 20);
            $table->string('email')->unique();
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
        Schema::dropIfExists('preusers');
    }
}
