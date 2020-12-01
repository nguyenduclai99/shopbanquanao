<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('a_name');
            $table->string('a_slug')->index();
            $table->tinyInteger('a_hot')->default(0)->index();
            $table->tinyInteger('a_active')->default(0)->index();
            $table->unsignedBigInteger('a_menu_id')->index()->default(0);
            $table->unsignedBigInteger('a_admin_id')->index()->default(0);
            $table->integer('a_view')->default(0);
            $table->mediumText('a_description')->nullable();
            $table->string('a_avatar')->nullable();
            $table->text('a_contents')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
