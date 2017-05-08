<?php
namespace App\Modules\Admin\Models;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Admin extends \Eloquent implements UserInterface, RemindableInterface {
    protected $table = 'admins';
    protected $fillable = array('label', 'admin_role_id', 'admin_group_id', 'username', 'password', 'avatar', 'last_ip', 'last_login_at', 'enabled');
    
    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];
    
    public $rules = array(
                'label' => 'required|min:2|alpha_dash',
                'username'  => 'required|min:4|alpha_dash',
                'password' => 'sometimes|required|min:6',
            );
    
    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }
    
    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }
    
    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }
    
    public function getRememberToken()
    {
        return $this->remember_token;
    }
    
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }
    
    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}