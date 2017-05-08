<?php
namespace App\Modules\Admin\Models\Admin\Role;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Menu extends \Eloquent {
    protected $table = 'admin_role_menu';
    protected $fillable = array('admin_role_id', 'system_menu_id');
    
    public $timestamps = false;
    
}