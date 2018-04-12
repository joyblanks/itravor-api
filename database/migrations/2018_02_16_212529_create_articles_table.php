<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->enum('type', ['blog','video','picture']);
            $table->point('location');
            $table->string('keywords');
            $table->string('thumbnail');
            $table->boolean('is_public');
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*Schema::table('articles', function ($table) {
            $table->dropForeign('articles_user_id_foreign');
        });*/
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); 
        Schema::dropIfExists('articles');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
