<?php
namespace App\Modules\Admin\Models\Admin;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Priviledge extends \Eloquent {
    protected $table = 'admin_priviledges';
    protected $fillable = array('admin_role_id', 'system_menu_id', 'system_resource_id');
    
    public $timestamps = false;
}