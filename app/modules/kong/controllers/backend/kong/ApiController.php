<?php
namespace App\Modules\Kong\Controllers\Backend\Kong;

use Input;
use Redirect;
use Session;
use Auth;
use Hash;
use Uri;
use Base;

class ApiController extends \BaseController
{
    function index()
    {
        echo __METHOD__;exit;
        return parent::get_view(__METHOD__);
    }
}