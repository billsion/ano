<?php
namespace App\Modules\Admin\Controllers\Backend;

use Input;
use Redirect;
use Session;
use Auth;
use Hash;
use Uri;
use Base;

use App\Modules\Admin\Models\Admin as Admin_Entity;
use App\Modules\Admin\Services\Admin;
use App\Modules\Admin\Models\Admin\Role;
use App\Modules\System\Services\System\Menu;

class AdminController extends \BaseController
{
    function login()
    {
        return parent::get_view(__METHOD__);
    }

    function login_post()
    {
        if(Admin::login(Input::all())) {
            return Uri::to('system/dashboard', true, true);
        } else {
            $this::flash('danger', '用户名或是密码错误');
            return Uri::to('admin/login', true, true);
        }
    }
    
    function logout()
    {
        Admin::logout();
        return Uri::to('admin/login', true, true);
    }
    
    function profile()
    {
        var_dump(\Session::get('backend.' . Auth::admin()->get()->username));exit;
        //return Uri::to("admin/" . Auth::admin()->get()->id . "/edit", true, true); 
    }
    
    function index()
    {
        $admins = new Admin_Entity;
        $admins = $admins->paginate($this->page_size);
        return parent::get_view(__METHOD__)->with('data', $admins);
    }
    
    function create()
    {
        return parent::get_view(__METHOD__)->with('roles', Role::select_data());
    }
    
    function store()
    {
        $data = Input::all();
        
        if (!Input::get('password')) {
            unset($data['password']);
        }
        
        $validator = Base::validator($data, new Admin_Entity);
        if ($validator === true) {
            $data['password'] = Hash::make(Input::get('password'));
            
            if (array_key_exists('admin_role_id', $data)) {
                $data['admin_role_id'] = implode(',', $data['admin_role_id']);
            } else {
                $data['admin_role_id'] = NULL;
            }
            
            //需要对名字进行去重
            if (Admin::check_username_exist($data['username'])) {
                $this->flash('warning', '用户名重复，请选择其它用户名');
                return Uri::to("admin/create", true, true);
            }
            
            if (Admin_Entity::create($data)) {
                $this::flash('success');
                return Uri::to('admin', true, true);
            } else {
                $this::flash('danger');
                return Uri::to('admin/create', true, true);
            }            
        } else {
            $this->flash('danger', $validator);
            return Uri::to('admin/create', true, true);
        }
    }
    
    function edit($id)
    {
        if ($admin = Admin_Entity::find($id)) {
            return parent::get_view(__METHOD__)->with('data', $admin)->with('roles', Role::select_data());
        } else {
            $this->flash('danger', '查询不到数据');
            return Uri::to('admin', true, true);
        }
    }
    
    function update($id)
    {
        if ($id) {
            $data = Input::all();
            $data['enabled'] = Input::get('enabled') ? Input::get('enabled') : 0;
            if (!Input::get('password')) {
                unset($data['password']);
            }
            
            $validator = Base::validator($data, new Admin_Entity);
            if ($validator === true) {
                if (Input::get('password')) {
                    $data['password'] = Hash::make(Input::get('password'));
                }
                if (array_key_exists('admin_role_id', $data)) {
                    $data['admin_role_id'] = implode(',', $data['admin_role_id']);
                } else {
                    $data['admin_role_id'] = NULL;
                }
                
                if (!array_key_exists('avatar', $data)) {
                    $data['avatar'] = NULL;
                }
                
                if (Admin::check_username_exist($data['username'], $id)) {
                    $this->flash('warning', '用户名重复，请选择其它用户名');
                    return Uri::to("admin/{$id}/edit", true, true);                    
                }
                
                if (Admin_Entity::find($id)->update($data)) {
                    $this->flash('success', '更新成功');
                } else {
                    $this->flash('danger', '更新失败');
                }
            } else {
                $this->flash('danger', $validator);
                return Uri::to("admin/{$id}/edit", true, true);                
            }
        } else {
            $this->flash('danger', 'ID不合法');
        }
        return Uri::to("admin/{$id}/edit");
    }
    
    function destroy($id)
    {
        if ($id) {
            $admin = Admin_Entity::find($id);
            if ($admin->delete()) {
                $this->flash('success');
            }
        } else {
            $this->flash('danger', 'ID不合法');
        }
        
        return Uri::to('admin');
    }
}
