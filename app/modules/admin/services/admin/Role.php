<?php
namespace App\Modules\Admin\Services\Admin;

use App\Modules\Admin\Models\Admin\Role as Role_Entity;
use App\Modules\Admin\Models\Admin\Role\Menu as ARM_Entity;
use App\Modules\Admin\Models\Admin\Priviledge as Priviledge_Entity;

class Role extends Role_Entity
{
    static function save_priviledge($data, $id)
    {
        $role_id = $id;
        ARM_Entity::where('admin_role_id', $role_id)->delete();
        Priviledge_Entity::where('admin_role_id', $role_id)->delete();
        if (array_key_exists('menu', $data)) {

            foreach($data['menu'] as $_key => $_value) {
                /*ARM_Entity::where('admin_role_id', $role_id)
                            ->where('admin_menu_id', $_key)->delete();
                            */

                if (is_array($data['menu'][$_key])) {
                    ARM_Entity::create(array(
                                                'admin_role_id' => $role_id,
                                                'system_menu_id' => $_key)
                    );
                    foreach($data['menu'][$_key] as $__key => $__value) {
                        Priviledge_Entity::create(array(
                                                    'admin_role_id' => $role_id,
                                                    'system_menu_id' => $_key,
                                                    'system_resource_id' => $__key
                                                    ));
                    }
                }
            }
        }
    }
    
    static function get_priviledge($role_id)
    {
        $priviledges = array();
        $arms = ARM_Entity::where('admin_role_id', $role_id)->get()->toArray();
        foreach($arms as $_arm) {
            $priviledges[$_arm['system_menu_id']] = Priviledge_Entity::where('admin_role_id', $role_id)
                                                                      ->where('system_menu_id', $_arm['system_menu_id'])->get()->toArray();
        }
        
        return $priviledges;
    }
}
