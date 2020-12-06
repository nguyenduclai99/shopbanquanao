<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('pro_category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('pro_admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('pro_user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Schema::table('attributes', function (Blueprint $table) {
        //     $table->foreign('atb_type')->references('id')->on('group_attribute')->onDelete('cascade');
        // });

        // Schema::table('group_attribute', function (Blueprint $table) {
        //     $table->foreign('ga_category_id')->references('id')->on('categories')->onDelete('cascade');
        // });

        // Schema::table('product_attributes', function (Blueprint $table) {
        //     $table->foreign('pa_product_id')->references('id')->on('products')->onDelete('cascade');
        //     $table->foreign('pa_attribute_id')->references('id')->on('attributes')->onDelete('cascade');
        // });

        Schema::table('products_keywords', function (Blueprint $table) {
            $table->foreign('pk_product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('pk_keyword_id')->references('id')->on('keyword')->onDelete('cascade');
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('tst_user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('od_transaction_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->foreign('od_product_id')->references('id')->on('products')->onDelete('cascade');
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->foreign('a_menu_id')->references('id')->on('menu')->onDelete('cascade');
            $table->foreign('a_admin_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
