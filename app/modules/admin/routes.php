<?php
/* MIT License
 *
 * Copyright (c) [2017] [Bill billsion@gmail.com]
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the 'Software'), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */
Route::group(array('before' => '', 'prefix' => \Config::get('system.uri_prefix.backend')), function(){
    //Route::get('/admin/dashboard', 'App\Modules\Admin\Controllers\Backend\AdminController@dashboard');
    Route::get('/admin/login', 'App\Modules\Admin\Controllers\Backend\AdminController@login');
    Route::get('/admin/create', 'App\Modules\Admin\Controllers\Backend\AdminController@create');
    Route::post('/admin/login_post', 'App\Modules\Admin\Controllers\Backend\AdminController@login_post');
    //Route::resource('admin/group', 'App\Modules\Admin\Controllers\Backend\Admin\GroupController');
    //Route::resource('admin/role', 'App\Modules\Admin\Controllers\Backend\Admin\RoleController');
    //Route::resource('admin', 'App\Modules\Admin\Controllers\Backend\AdminController');
});

Route::group(array('before' => 'csrf|backend_auth|backend_access_check', 'prefix' => \Config::get('system.uri_prefix.backend')), function(){
    Route::get('/admin/profile', 'App\Modules\Admin\Controllers\Backend\AdminController@profile');
    Route::get('/admin/logout', 'App\Modules\Admin\Controllers\Backend\AdminController@logout');
    Route::resource('admin/group', 'App\Modules\Admin\Controllers\Backend\Admin\GroupController');
    Route::resource('admin/role', 'App\Modules\Admin\Controllers\Backend\Admin\RoleController');
    Route::resource('admin', 'App\Modules\Admin\Controllers\Backend\AdminController');

});
