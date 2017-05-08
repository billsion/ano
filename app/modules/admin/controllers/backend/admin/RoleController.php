<?php
namespace App\Modules\Admin\Controllers\Backend\Admin;

use Input;
use Redirect;
use Session;
use Auth;
use Hash;
use Uri;
use Base;

use App\Modules\Admin\Service\Admin;
//use App\Modules\Admin\Models\Admin\Role;
use App\Modules\System\Models\System\Resource;
use App\Modules\System\Services\System\Menu;
use App\Modules\Admin\Services\Admin\Role;

class RoleController extends \BaseController
{
    function index()
    {
        $roles = new Role;
        $roles = $roles->paginate($this->page_size);
        return parent::get_view(__METHOD__)->with('data', $roles);
    }
    
    function create()
    {
        return parent::get_view(__METHOD__)->with('menu_and_resource', Menu::get_menu_and_resource());
    }
    
    function store()
    {
        $data = Input::all();
        $validator = Base::validator($data, new Role);
        if ($validator === true) {
            if ($role = Role::create($data)) {
                Role::save_priviledge($data, $role->id);
                $this::flash('success');
                return Uri::to('admin/role', true, true);
            } else {
                $this::flash('danger');
                return Uri::to('admin/role/create', true, true);
            }            
        } else {
            $this->flash('danger', $validator);
            return Uri::to('admin/role/create', true, true);
        }
    }
    
    function edit($id)
    {
        if ($role = Role::find($id)) {
            Role::get_priviledge($id);

            return parent::get_view(__METHOD__)
                            ->with('data', $role)
                            ->with('menu_and_resource', Menu::get_menu_and_resource())
                            ->with('priviledges', Role::get_priviledge($id));
        } else {
            $this->flash('danger', '查询不到数据');
            return Uri::to('admin/role', true, true);
        }
    }
    
    function update($id)
    {
        if ($id) {
            $data = Input::all();
            $data['enabled'] = Input::get('enabled') ? Input::get('enabled') : 0;
            
            Role::save_priviledge($data, $id);

            if (Role::find($id)->update($data)) {
                $this->flash('success', '更新成功');
            } else {
                $this->flash('danger', '更新失败');
            }
        } else {
            $this->flash('danger', 'ID不合法');
        }
        return Uri::to("admin/role/{$id}/edit");
    }
    
    function destroy($id)
    {
        if ($id) {
            $role = Role::find($id);
            if ($role->delete()) {
                $this->flash('success');
            }
        } else {
            $this->flash('danger', 'ID不合法');
        }
        
        return Uri::to('admin/role');
    }
}
