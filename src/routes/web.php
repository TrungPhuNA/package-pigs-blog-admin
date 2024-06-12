<?php
/**
 * Created By PhpStorm
 * User: trungphuna
 * Date: 6/4/24
 * Time: 3:42  PM
 */

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Pigs\BlogAdmin\Http\Controllers','prefix' => 'admin/blog'], function() {
    Route::get('', 'BlogAdminDashboardController@index')->name('get.adm_blog.dashboard');

    Route::group(['prefix' => 'tag'], function (){
        Route::get('','BlogAdminTagController@index')->name('get.adm_blog.tag.index');

        Route::get('create','BlogAdminTagController@create');
        Route::post('create','BlogAdminTagController@store')->name('get.adm_blog.tag.store');

        Route::get('update/{id}','BlogAdminTagController@edit');
        Route::post('update/{id}','BlogAdminTagController@update');

        Route::get('delete/{id}','BlogAdminTagController@delete')->name('get.adm_blog.tag.delete');
    });

    Route::group(['prefix' => 'menu'], function (){
        Route::get('','BlogAdminMenuController@index')->name('get.adm_blog.menu.index');

        Route::get('create','BlogAdminMenuController@create');
        Route::post('create','BlogAdminMenuController@store')->name('get.adm_blog.menu.store');

        Route::get('update/{id}','BlogAdminMenuController@edit');
        Route::post('update/{id}','BlogAdminMenuController@update');

        Route::get('delete/{id}','BlogAdminMenuController@delete')->name('get.adm_blog.menu.delete');
    });

    Route::group(['prefix' => 'article'], function (){
        Route::get('','BlogAdminArticlesController@index')->name('get.adm_blog.article.index');

        Route::get('create','BlogAdminArticlesController@create')->name('get.adm_blog.article.create');
        Route::post('create','BlogAdminArticlesController@store');

        Route::get('update/{id}','BlogAdminArticlesController@edit')->name('get.adm_blog.article.update');
        Route::post('update/{id}','BlogAdminArticlesController@update');

        Route::get('delete/{id}','BlogAdminArticlesController@delete')->name('get.adm_blog.article.delete');
    });
});