<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            $table->string('avatar', 200)->nullable()->default('user.png');
            $table->text('description')->nullable();
            $table->date('birthday')->nullable();
            $table->string('facebook', 200)->nullable();
            $table->string('instagram', 200)->nullable();
            $table->string('github', 200)->nullable();
            $table->string('website', 200)->nullable();
            $table->string('other', 200)->nullable();
            $table->boolean('status')->default('1');
            $table->foreignId('user_id')->unique()->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('profiles');
    }
}
