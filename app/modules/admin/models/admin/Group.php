<?php
namespace App\Modules\Admin\Models\Admin;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Group extends \Eloquent {
    protected $table = 'admin_groups';
    protected $fillable = array('admin_group_id', 'name', 'enabled');
    
    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];
    
    public $rules = array(
            'name' => 'required|min:2|alpha_dash',
    );
    
    static function jstree_data()
    {
        return json_encode(self::select(array('id', 'admin_group_id as parent', 'name as text'))->get()->toArray());
    }
}