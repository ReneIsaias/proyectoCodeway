<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolidaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holidays', function (Blueprint $table) {
            $table->id();

            $table->integer('days')->nullable();
            $table->date('beginDate')->nullable();
            $table->date('endDate')->nullable();
            $table->integer('inProcess')->nullable();
            $table->integer('taken')->nullable();
            $table->double('available')->nullable();
            $table->string('responsable', 100)->nullable();
            $table->text('commentable')->nullable();
            $table->boolean('status')->default('0');
            $table->foreignId('absence_id')->nullable()->references('id')->on('absences')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('period_id')->references('id')->on('periods')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('holidays');
    }
}
