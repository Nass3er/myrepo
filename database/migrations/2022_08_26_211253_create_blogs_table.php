<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->nullable();
            // $table->integer('user_id')->unsigned();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->longText('content')->nullable();
            $table->string('photo')->nullable();
            $table->string('slug')->nullable();
            $table->softDeletes();
            $table->timestamps();



            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });



        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table-> string('user_name');
            $table-> string('user_email');
            $table->integer('blog_id')->unsigned()->nullable();
            $table->integer('parent_id')->unsigned()->nallable();
            $table->longText('description');
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
        Schema::dropIfExists('blogs');
    }


};
