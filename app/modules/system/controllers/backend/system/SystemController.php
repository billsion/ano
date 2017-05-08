<?php
namespace App\Modules\System\Controllers\Backend;

use Input;
use Redirect;
use Session;
use Auth;
use Hash;
use Uri;
use Base;

class SystemController extends \BaseController
{
    function dashboard()
    {
        return parent::get_view(__METHOD__);
    }
}