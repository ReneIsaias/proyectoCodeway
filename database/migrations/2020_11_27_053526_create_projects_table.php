<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string('avatar')->nullable()->default('project.png');
            $table->string('key', 100)->unique();
            $table->string('name', 200)->unique();
            $table->string('slug')->unique();
            $table->text('description');
            $table->boolean('status')->default('1');
            $table->string('responsable', 100);
            $table->foreignId('clas_id')->references('id')->on('class')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('projects');
    }
}
