<?php
namespace App\Modules\System\Controllers\Backend\System;

use Input;
use Redirect;
use Session;
use Auth;
use Hash;
use Uri;
use Base;

use App\Modules\System\Models\System\Menu;

class MenuController extends \BaseController
{
    function index()
    {
        $menus = new Menu;
        $menus = $menus->paginate($this->page_size);
        return parent::get_view(__METHOD__)->with('data', $menus);
    }
    
    function create()
    {
        return parent::get_view(__METHOD__);
    }
    
    function store()
    {
        $data = Input::all();
        $validator = Base::validator($data, new Menu);
        if ($validator === true) {
            if (Menu::create($data)) {
                $this::flash('success');
                return Uri::to('system/menu', true, true);
            } else {
                $this::flash('danger');
                return Uri::to('system/menu/create', true, true);
            }            
        } else {
            $this->flash('danger', $validator);
            return Uri::to('system/menu/create', true, true);
        }
    }
    
    function edit($id)
    {
        if ($menu = Menu::find($id)) {
            return parent::get_view(__METHOD__)->with('data', $menu);
        } else {
            $this->flash('danger', '查询不到数据');
            return Uri::to('system/menu', true, true);
        }
    }
    
    function update($id)
    {
        if ($id) {
            $data = Input::all();
            $data['enabled'] = Input::get('enabled') ? Input::get('enabled') : 0;
            
            if (Menu::find($id)->update($data)) {
                $this->flash('success', '更新成功');
            } else {
                $this->flash('danger', '更新失败');
            }
        } else {
            $this->flash('danger', 'ID不合法');
        }
        return Uri::to("system/menu/{$id}/edit");
    }
    
    function destroy($id)
    {
        if ($id) {
            $menu = Menu::find($id);
            if ($menu->delete()) {
                $this->flash('success');
            }
        } else {
            $this->flash('danger', 'ID不合法');
        }
        
        return Uri::to('system/menu');
    }
}