<?php
namespace App\Modules\System\Models\System;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Menu extends \Eloquent {
    protected $table = 'system_menus';
    protected $fillable = array('name', 'icon', 'enabled');
    
    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];
    
    public $rules = array(
            'name' => 'required|min:2|alpha_dash',
            'icon' => 'required|min:2|alpha_dash',
    );
    
    static function select_data()
    {
        return self::select(array('id', 'name'))->where('enabled', 1)->get()->toArray();
    }
}