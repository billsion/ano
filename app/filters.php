<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

/**
 * 对后台登录管理员用户进行检查
 */
Route::filter('backend_auth', function(){
    if(!Auth::admin()->check()) {
        $data['code'] = 'warning';
        $data['messages'] = '登录已过期';
        \Session::flash('msg', $data);
        return \Uri::to('admin/login', true, true);
    }
});

/**
 * 对权限进行检查
 */
Route::filter('backend_access_check', function(){
    if (\Config::get('app.permission_check')) {
        $permissions = \Session::get(\Config::get('system.uri_prefix.backend') . '.' . Auth::admin()->get()->username . '_permissions');
        $request_uri = str_replace('/' . \Config::get('system.uri_prefix.backend') . '/', '', $_SERVER['REQUEST_URI']);
        //$request_uri = 'admin/1/edit?admin_id=1';
        if (strpos($request_uri, '?')) {
            $request_uri = preg_replace('/[0-9]+\//', '', substr($request_uri, 0, strpos($request_uri, '?')));
        } else {
            $request_uri = preg_replace('/[0-9]+\//', '', $request_uri);
        }
        
        /**
         * 因为是基于REST的路由，还需要检查
         * 是不是新增、修改、删除操作
         */
        $method_search = array('put', 'delete', 'post');
        $request_method = strtolower(Input::get('_method') ? Input::get('_method') : $_SERVER['REQUEST_METHOD']);

        if (in_array($request_method, $method_search)) {
            if ($request_method == 'put') {//修改
                $request_uri = preg_replace('/[0-9]+/', 'edit', $request_uri);
            } else if ($request_method == 'post') {//删除
                $request_uri = preg_replace('/[0-9]+/', 'delete', $request_uri);
            } else if ($request_method == 'post') {//新增
                $request_uri .= '/create';
            }
        }
    
        if (!strpos($permissions, $request_uri)) {//如果没有找到，就是没有权限
            $data['code'] = 'warning';
            $data['messages'] = '无权限操作';
            \Session::flash('msg', $data);
            //如果是点超连接跳转
            if (array_key_exists('HTTP_REFERER', $_SERVER)) {

                $search = array(
                            \Config::get('app.url') . '/',
                            \Config::get('system.uri_prefix.backend') . '/',
                        );

                $uri = str_replace($search, '', $_SERVER['HTTP_REFERER']);
                return \Uri::to($uri, true, true);
            } else {//浏览器输入直接跳到首页
                return \Uri::to('system/dashboard', true, true);
            }
        }
    }
});

/**
 * 对前台用户进行登录检查
 */
Route::filter('frontend_auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('login');
		}
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token') && $_SERVER['REQUEST_METHOD'] != 'GET')
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});
