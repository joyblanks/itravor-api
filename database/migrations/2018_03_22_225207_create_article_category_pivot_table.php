<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCategoryPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('article_category_pivot', function (Blueprint $table) {
            $table->integer('article_id')->unsigned()->index();
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->integer('category_id')->unsigned()->index();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->primary(['article_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        /*Schema::table('article_category_pivot', function ($table) {
            $table->dropForeign('article_category_pivot_category_id_foreign');
            $table->dropForeign('article_category_pivot_article_id_foreign');
        });*/
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); 
        Schema::dropIfExists('article_category_pivot');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
