<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::group(array('prefix' => \Config::get('system.uri_prefix.backend')), function(){
    Route::post('/upload_img', function(){
        if (Input::hasFile('Filedata')) {
            $final = array();
            $file_path = htmlentities(public_path() . DIRECTORY_SEPARATOR . 'upload' . DIRECTORY_SEPARATOR . Input::get('module') . DIRECTORY_SEPARATOR . Input::get('token'), ENT_QUOTES);//文件保存的实际地址
            $db_path = htmlentities("/upload/" . Input::get('module') . "/" . Input::get('token') . "/", ENT_QUOTES);//文件保存在数据库中的地址
            $file = Input::file('Filedata');
            if (in_array(strtolower($file->getClientOriginalExtension()), array('jpg', 'png', 'jpeg', 'gif'))) {
                if ($file->isvalid()) {
                    $file_name = mt_rand();
                    if (!is_dir($file_path)) {
                        mkdir($file_path, 0777, true);
                    }
                    $file->move($file_path, $file_name. "." . strtolower($file->getClientOriginalExtension()));
                    $final = $db_path. $file_name. '.' . strtolower($file->getClientOriginalExtension());
                }
            }
            
            echo $final;
        }
    });
});

Route::post('/uploader', function() {
    if (Input::hasFile('Filedata')) {
        $fileSavePath = htmlentities(public_path() . DIRECTORY_SEPARATOR . 'upload' . DIRECTORY_SEPARATOR . Input::get('module') . DIRECTORY_SEPARATOR . Input::get('id') . DIRECTORY_SEPARATOR . (Input::get('type') ? Input::get('type') : ''), ENT_QUOTES);//文件保存的实际地址
        $dbSavePath = htmlentities("/upload/" . Input::get('module') . "/" . Input::get('id') . "/" . (Input::get('type') ? Input::get('type') . '/' : null ), ENT_QUOTES);//文件保存在数据库中的地址
        //后缀判断
        foreach (Input::file('Filedata') as $_file) {
            if (in_array(strtolower($_file->getClientOriginalExtension()), array('jpg', 'png', 'jpeg', 'gif'))) {
                if ($_file->isValid()) {//文件是否有效
                    $file_name = mt_rand();
                    if ($_file->move($fileSavePath, $file_name. "." . strtolower($_file->getClientOriginalExtension()))) {
                        $final[] = $dbSavePath . $file_name. '.' . strtolower($_file->getClientOriginalExtension());
                    } else {
                        return null;
                    }
                } else {
                    return null;
                }
            }
        }
    
        return json_encode($final);
    
    } else {
        return null;
    }
});