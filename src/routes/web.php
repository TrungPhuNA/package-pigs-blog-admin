<?php
/**
 * Created By PhpStorm
 * User: trungphuna
 * Date: 6/4/24
 * Time: 3:42 PM
 */

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Pigs\BlogAdmin\Http\Controllers','prefix' => 'admin/blog'], function() {
    Route::get('', 'BlogAdminDashboardController@index');
});