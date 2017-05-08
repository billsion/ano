<?php
namespace App\Modules\System\Services\System;

use App\Modules\System\Models\System\Resource;

use App\Modules\System\Models\System\Menu as Menu_Entiry;
use App\Modules\System\Models\System\Resource as Resource_Entiry;

class Menu {
    
    /**
     * 
     * @return array 
     */
    static function get_menu_and_resource()
    {
        $menu_entity = Menu_Entiry::select_data();

        foreach($menu_entity as &$_menu_entity) {
            $_menu_entity['resources'] = Resource_Entiry::where('system_menu_id', $_menu_entity['id'])->get()->toArray();
        }

        return $menu_entity;
    }
}
