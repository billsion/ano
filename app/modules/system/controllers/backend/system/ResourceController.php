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
use App\Modules\System\Models\System\Resource;

class ResourceController extends \BaseController
{
    function index()
    {
        $resources = new Resource;
        if (Input::get('menu_id')) {
            $resources = $resources->where('system_menu_id', Input::get('menu_id'));
        } else {
            $this->flash('warning', '当前是全局浏览状态');
        }
        $resources = $resources->orderBy('system_menu_id')->paginate($this->page_size);
        return parent::get_view(__METHOD__)->with('data', $resources);
    }
    
    function create()
    {
        return parent::get_view(__METHOD__)->with('menus', Menu::select_data());
    }
    
    function store()
    {
        $data = Input::all();
        $validator = Base::validator($data, new Resource);
        if ($validator === true) {
            if (Resource::create($data)) {
                $this::flash('success');
                return Uri::to('system/resource', true, true);
            } else {
                $this::flash('danger');
                return Uri::to('system/resource/create', true, true);
            }            
        } else {
            $this->flash('danger', $validator);
            return Uri::to('system/resource/create', true, true);
        }
    }
    
    function edit($id)
    {
        if ($resource = Resource::find($id)) {
            return parent::get_view(__METHOD__)->with('data', $resource)->with('menus', Menu::select_data());
        } else {
            $this->flash('danger', '查询不到数据');
            return Uri::to('system/resource', true, true);
        }
    }
    
    function update($id)
    {
        if ($id) {
            $data = Input::all();
            $data['enabled'] = Input::get('enabled') ? Input::get('enabled') : 0;
            $data['is_menu'] = Input::get('is_menu') ? Input::get('is_menu') : 0;
            
            if (Resource::find($id)->update($data)) {
                $this->flash('success', '更新成功');
            } else {
                $this->flash('danger', '更新失败');
            }
        } else {
            $this->flash('danger', 'ID不合法');
        }
        return Uri::to("system/resource/{$id}/edit");
    }
    
    function destroy($id)
    {
        if ($id) {
            $resource = Resource::find($id);
            if ($resource->delete()) {
                $this->flash('success');
            }
        } else {
            $this->flash('danger', 'ID不合法');
        }
        
        return Uri::to('system/resource');
    }
}