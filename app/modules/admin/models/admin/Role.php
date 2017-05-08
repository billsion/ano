<?php
namespace App\Modules\Admin\Models\Admin;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Role extends \Eloquent {
    protected $table = 'admin_roles';
    protected $fillable = array('name', 'enabled');
    
    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];
    
    public $rules = array(
            'name' => 'required|min:2|alpha_dash',
    );
    
    static function select_data()
    {
        return self::select(array('id', 'name'))->where('enabled', 1)->get()->toArray();
    }
}