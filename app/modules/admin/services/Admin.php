<?php
namespace App\Modules\Admin\Services;

use App\Modules\Admin\Models\Admin as Admin_Entity;
use App\Modules\Admin\Models\Admin\Role as Role_Entity;
use App\Modules\Admin\Models\Admin\Priviledge as Priviledge_Entity;
use App\Modules\System\Models\System\Menu as Menu_Entity;
use App\Modules\System\Models\System\Resource as Resource_Entity;

use Auth;

class Admin
{

    /**
     * 
     * @param array $data
     * @return boolean
     */
    static function login($data)
    {
        if (array_key_exists('username', $data) || array_key_exists('password', $data)) {    
            if (Auth::admin()->attempt(array(
                                                'username' => $data['username'],
                                                'password'	=> $data['password']))) {
                //更新登录时间和登录IP
                $admin = Auth::admin()->get();
                $admin = Admin_Entity::find($admin->id);
                $admin->last_login_at = date('Y-m-d H:i:s');
                $admin->last_ip = $_SERVER['REMOTE_ADDR'];
                
                $admin->save();

                //依据角色获取对应权限
                $menus_and_priviledges = array();
                $permissions = \Config::get('permission');
                if ($admin->admin_role_id) {
                    $admin_role_id_array = explode(',', $admin->admin_role_id);
                    $priviledges = Priviledge_Entity::whereIn('admin_role_id', $admin_role_id_array)
                                                        ->groupBy('system_resource_id')->get()->toArray();
                    
                    foreach($priviledges as $_priviledge) {
                        if ($menu = Menu_Entity::find($_priviledge['system_menu_id'])) {
                            $menus_and_priviledges[$menu->id]['name'] = $menu->name;
                            $menus_and_priviledges[$menu->id]['icon'] = $menu->icon;
                            if ($resources = Resource_Entity::where('id', $_priviledge['system_resource_id'])
                                                                ->where('system_menu_id', $menu->id)->get()) {
                                if (array_key_exists($menu->id, $menus_and_priviledges)) {
                                    $menus_and_priviledges[$menu->id]['children'][] = $resources->first()->toArray();
                                } else {
                                    $menus_and_priviledges[$menu->id]['children'] = $resources->first()->toArray();
                                }
                                $a = $resources->first()->toArray();
                                $permissions[] = $a['pattern'];
                            }
                        }
                    }
                }
                
                $menus_and_priviledges = json_encode($menus_and_priviledges, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                $permissions = json_encode($permissions, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                
                //依据组获取对应权限
                if ($admin->admin_group_id) {
                
                } else {
                
                }
                
                \Session::forget(\Config::get('system.uri_prefix.backend') . '.' . $admin->username);//菜单项
                \Session::forget(\Config::get('system.uri_prefix.backend') . '.' . $admin->username . '_permissions');//权限
                \Session::put(\Config::get('system.uri_prefix.backend') . "." . $admin->username, $menus_and_priviledges);
                \Session::put(\Config::get('system.uri_prefix.backend') . '.' . Auth::admin()->get()->username . '_permissions', $permissions);
                
                return true;

            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    static function logout()
    {
        \Session::forget(\Config::get('system.uri_prefix.backend') . '.' . Auth::admin()->get()->username);
        \Session::forget(\Config::get('system.uri_prefix.backend') . '.' . Auth::admin()->get()->username . '_permissions');
        Auth::admin()->logout();
    }
    
    static function check_username_exist($username, $id = null)
    {
        if ($id) {
            return Admin_Entity::where('username', $username)->where('id', '<>', $id)->get()->toArray();
        } else {
            return Admin_Entity::where('username', $username)->get()->toArray();
        }
    }
}
