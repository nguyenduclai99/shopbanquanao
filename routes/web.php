<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['namespace' => 'Auth','prefix'=>'account'], function () {
    Route::get('register','RegisterController@getFormRegister')->name('get.register');
    Route::post('register','RegisterController@postRegister')->name('get.register');

    Route::get('login','LoginController@getFormLogin')->name('get.login');
    Route::post('login','LoginController@postLogin')->name('get.login');

    Route::get('logout','LoginController@getLogout')->name('get.logout');
});

Route::group(['prefix' => 'admin-auth','namespace'=>'Admin\Auth'], function () {
    
    //Route::get('register','AdminRegisterController@getFormRegister')->name('get.register.admin');
    //Route::post('register','AdminRegisterController@postRegister');

    Route::get('login','AdminLoginController@getLoginAdmin')->name('get.login.admin');
    Route::post('login','AdminLoginController@postLoginAdmin')->name('post.login.admin');

    Route::get('logout','AdminLoginController@getLogoutAdmin')->name('get.logout.admin');

});

Route::group(['prefix' => 'laravel-filemanager'], function () { 
    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show')->name('laravel.filemanager'); 
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload')->name('laravel.filemanager.upload'); 
});




Route::group(['prefix' => 'api-admin','namespace'=>'Admin','middleware' => 'check_admin_login'], function () {
    Route::get('','AdminController@index')->name('get.admin.home');


    Route::group(['prefix' => 'category'], function(){
        Route::get('','AdminCategoryController@index')->name('admin.category.index');
        Route::get('create','AdminCategoryController@create')->name('admin.category.create');
        Route::post('create','AdminCategoryController@store')->name('admin.category.store');

        Route::get('update/{id}','AdminCategoryController@edit')->name('admin.category.update');
        Route::post('update/{id}','AdminCategoryController@update');

        Route::get('active/{id}','AdminCategoryController@active')->name('admin.category.active');
        Route::get('delete/{id}','AdminCategoryController@delete')->name('admin.category.delete');

    });

    Route::group(['prefix' => 'distributor'], function(){
        Route::get('','AdminDistributorController@index')->name('admin.distributor.index');
        Route::get('create','AdminDistributorController@create')->name('admin.distributor.create');
        Route::post('create','AdminDistributorController@store')->name('admin.distributor.store');

        Route::get('update/{id}','AdminDistributorController@edit')->name('admin.distributor.update');
        Route::post('update/{id}','AdminDistributorController@update');

        Route::get('delete/{id}','AdminDistributorController@delete')->name('admin.distributor.delete');

    });

    Route::group(['prefix' => 'distributor-seconhand'], function(){
        Route::get('','AdminDistributorSeconhandController@index')->name('admin.distributorseconhand.index');
        Route::get('create','AdminDistributorSeconhandController@create')->name('admin.distributorseconhand.create');
        Route::post('create','AdminDistributorSeconhandController@store')->name('admin.distributorseconhand.store');

        Route::get('update/{id}','AdminDistributorSeconhandController@edit')->name('admin.distributorseconhand.update');
        Route::post('update/{id}','AdminDistributorSeconhandController@update');

        Route::get('delete/{id}','AdminDistributorSeconhandController@delete')->name('admin.distributorseconhand.delete');

    });

    Route::group(['prefix' => 'keyword'], function(){
        Route::get('','AdminKeywordController@index')->name('admin.keyword.index');
        Route::get('create','AdminKeywordController@create')->name('admin.keyword.create');
        Route::post('create','AdminKeywordController@store')->name('admin.keyword.store');

        Route::get('update/{id}','AdminKeywordController@edit')->name('admin.keyword.update');
        Route::post('update/{id}','AdminKeywordController@update');

        Route::get('hot/{id}','AdminKeywordController@hot')->name('admin.keyword.hot');
        Route::get('delete/{id}','AdminKeywordController@delete')->name('admin.keyword.delete');

    });

    Route::group(['prefix' => 'attribute'], function(){
        Route::get('','AttributeController@index')->name('admin.attribute.index');
        Route::get('create','AttributeController@create')->name('admin.attribute.create');
        Route::post('create','AttributeController@store')->name('admin.attribute.store');

        Route::get('update/{id}','AttributeController@edit')->name('admin.attribute.update');
        Route::post('update/{id}','AttributeController@update');

        Route::get('delete/{id}','AttributeController@delete')->name('admin.attribute.delete');

    });

    Route::group(['prefix' => 'group_attribute'], function(){
        Route::get('','AdminGroupAttributeController@index')->name('admin.group_attribute.index');
        Route::get('create','AdminGroupAttributeController@create')->name('admin.group_attribute.create');
        Route::post('create','AdminGroupAttributeController@store')->name('admin.group_attribute.store');

        Route::get('update/{id}','AdminGroupAttributeController@edit')->name('admin.group_attribute.update');
        Route::post('update/{id}','AdminGroupAttributeController@update');

        Route::get('delete/{id}','AdminGroupAttributeController@delete')->name('admin.group_attribute.delete');

    });

    Route::group(['prefix' => 'product'], function(){
        Route::get('','AdminProductController@index')->name('admin.product.index');
        Route::get('create','AdminProductController@create')->name('admin.product.create');
        Route::post('create','AdminProductController@store')->name('admin.product.store');;

        Route::get('update/{id}','AdminProductController@edit')->name('admin.product.update');
        Route::post('update/{id}','AdminProductController@update');
        
        Route::get('active/{id}','AdminProductController@active')->name('admin.product.active');
        Route::get('hot/{id}','AdminProductController@hot')->name('admin.product.hot');
        Route::get('delete/{id}','AdminProductController@delete')->name('admin.product.delete');
        Route::post('image-upload', 'AdminProductController@imageUpload')->name('admin.image.upload');
    });

    Route::group(['prefix' => 'seconhand-product'], function(){
        Route::get('','AdminProductSeconhandController@index')->name('admin.seconhandproduct.index');
        Route::get('create','AdminProductSeconhandController@create')->name('admin.seconhandproduct.create');
        Route::post('create','AdminProductSeconhandController@store')->name('admin.seconhandproduct.store');;

        Route::get('update/{id}','AdminProductSeconhandController@edit')->name('admin.seconhandproduct.update');
        Route::post('update/{id}','AdminProductSeconhandController@update');
        
        Route::get('active/{id}','AdminProductSeconhandController@active')->name('admin.seconhandproduct.active');
        Route::get('hot/{id}','AdminProductSeconhandController@hot')->name('admin.seconhandproduct.hot');
        Route::get('delete/{id}','AdminProductSeconhandController@delete')->name('admin.seconhandproduct.delete');
    });

    Route::group(['prefix' => 'consignment-product'], function(){
        Route::get('','AdminDistributorConsignmentController@index')->name('admin.consignmentproduct.index');
        Route::get('create','AdminDistributorConsignmentController@create')->name('admin.consignmentproduct.create');
        Route::post('create','AdminDistributorConsignmentController@store')->name('admin.consignmentproduct.store');;

        Route::get('update/{id}','AdminDistributorConsignmentController@edit')->name('admin.consignmentproduct.update');
        Route::post('update/{id}','AdminDistributorConsignmentController@update');
        
        Route::get('active/{id}','AdminDistributorConsignmentController@active')->name('admin.consignmentproduct.active');
        Route::get('hot/{id}','AdminDistributorConsignmentController@hot')->name('admin.consignmentproduct.hot');
        Route::get('delete/{id}','AdminDistributorConsignmentController@delete')->name('admin.consignmentproduct.delete');
    });

    Route::group(['prefix' => 'user'], function(){
        Route::get('','UserController@index')->name('admin.user.index');

        Route::get('update/{id}','UserController@edit')->name('admin.user.update');
        Route::post('update/{id}','UserController@update');

        Route::get('delete/{id}','UserController@delete')->name('admin.user.delete');

    });

    Route::group(['prefix' => 'employee'], function() {
        Route::get('', 'AdminEmployeeController@index')->name('admin.employee.index');
        Route::get('create', 'AdminEmployeeController@create')->name('admin.employee.create');
        Route::post('create', 'AdminEmployeeController@store')->name('admin.employee.store');
    });

    Route::group(['prefix' => 'sender'], function(){
        Route::get('','AdminSenderController@index')->name('admin.sender.index');

        Route::get('update/{id}','AdminSenderController@edit')->name('admin.sender.update');
        Route::post('update/{id}','AdminSenderController@update');

        Route::get('delete/{id}','AdminSenderController@delete')->name('admin.sender.delete');

    });

    Route::group(['prefix' => 'transaction'], function(){

        Route::get('','AdminTransactionController@index')->name('admin.transaction.index');
        Route::get('delete/{id}','AdminTransactionController@delete')->name('admin.transaction.delete');

        Route::get('view-transaction/{id}','AdminTransactionController@getTransactionDetail')->name('ajax.admin.transaction.detail');
        Route::get('order-delete/{id}','AdminTransactionController@deleteOrderItem')->name('ajax.admin.transaction.order_item');

        Route::get('action/{action}/{id}','AdminTransactionController@getAction')->name('admin.action.transaction');

    });

    Route::group(['prefix' => 'menu'], function(){
        Route::get('','AdminMenuController@index')->name('admin.menu.index');
        Route::get('create','AdminMenuController@create')->name('admin.menu.create');
        Route::post('create','AdminMenuController@store')->name('admin.menu.store');

        Route::get('update/{id}','AdminMenuController@edit')->name('admin.menu.update');
        Route::post('update/{id}','AdminMenuController@update');

        Route::get('active/{id}','AdminMenuController@active')->name('admin.menu.active');
        Route::get('hot/{id}','AdminMenuController@hot')->name('admin.menu.hot');
        Route::get('delete/{id}','AdminMenuController@delete')->name('admin.menu.delete');

    });

    Route::group(['prefix' => 'article'], function(){
        Route::get('','AdminArticleController@index')->name('admin.article.index');
        Route::get('create','AdminArticleController@create')->name('admin.article.create');
        Route::post('create','AdminArticleController@store')->name('admin.article.store');

        Route::get('update/{id}','AdminArticleController@edit')->name('admin.article.update');
        Route::post('update/{id}','AdminArticleController@update');

        Route::get('active/{id}','AdminArticleController@active')->name('admin.article.active');
        Route::get('hot/{id}','AdminArticleController@hot')->name('admin.article.hot');
        Route::get('delete/{id}','AdminArticleController@delete')->name('admin.article.delete');

    });

    Route::get('ajax','AdminAjaxController@getGroupAttribute')->name('ajax_get.group_attribute');
    Route::get('ajax_attribute','AdminAjaxController@getAttribute')->name('ajax_get.attribute');
});




