<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();

            $table->string('name', 200)->unique();
            $table->string('slug', 100)->unique();
            $table->text('description')->nullable();
            $table->enum('fullAccess', ['yes', 'no'])->nullable();
            $table->boolean('status')->default('1');
            $table->string('responsable', 100);
            $table->integer('range')->nullable();
            $table->boolean('asignament')->default('0');

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
        Schema::dropIfExists('roles');
    }
}
