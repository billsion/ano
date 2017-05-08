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
Route::group(array('before' => 'csrf|backend_auth|backend_access_check', 'prefix' => \Config::get('system.uri_prefix.backend')), function(){
    Route::resource('system/menu', 'App\Modules\System\Controllers\Backend\System\MenuController');
    Route::resource('system/resource', 'App\Modules\System\Controllers\Backend\System\ResourceController');
    Route::get('system/dashboard', 'App\Modules\System\Controllers\Backend\SystemController@dashboard');
    Route::resource('system', 'App\Modules\System\Controllers\Backend\SystemController');
});
