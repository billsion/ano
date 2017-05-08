<?php
namespace App\Modules\System\Models\System;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Resource extends \Eloquent {
    protected $table = 'system_resources';
    protected $fillable = array('name', 'is_menu', 'pattern', 'type', 'system_menu_id', 'enabled');
    
    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];
    
    public $rules = array(
            'name' => 'required|min:2|alpha_dash',
            'pattern' => 'required',
            'type' => 'required',
            'system_menu_id' => 'required|numeric',
    );
    
    public function menu()
    {
        return $this->belongsTo('App\Modules\System\Models\System\Menu', 'system_menu_id');
    }
}