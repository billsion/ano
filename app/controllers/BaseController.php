<?php

class BaseController extends Controller {
    
    protected $page_size = 20;

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = \View::make($this->layout);
		}
	}
	
	protected function get_view($__method__)
	{
	    $backend_prefix = \Config::get('system.uri_prefix.backend');
	    $__method__ = explode("::", strtolower($__method__));
	    $module_and_controller = explode("controllers", $__method__[0]);
	    
	    $module_name = rtrim(str_replace("app\\modules\\", '', $module_and_controller[0]), "\\");
	    
	    $controller_name = str_replace(array("\\backend\\", "controller"), '', $module_and_controller[1]);
	    $controller_name = str_replace('\\', '.', $controller_name);
	    
	    return \View::make("{$module_name}::{$controller_name}.{$backend_prefix}.{$__method__[1]}");
	    //echo "{$module_name}::{$controller_name}.{$backend_prefix}.{$__method__[1]}";exit;
	}
	
	/**
	 * 
	 * @param string $code success-绿色，info-蓝色，warning-黄色，danger-红色
	 * @param unknown_type $message
	 */
	protected function flash($code, $messages = null)
	{
	    $data['code'] = $code;
	    $data['messages'] = $messages ? $messages : 'OK';
	    return \Session::flash('msg', $data);
	}
}
