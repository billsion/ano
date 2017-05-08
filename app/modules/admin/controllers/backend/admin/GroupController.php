<?php
namespace App\Modules\Admin\Controllers\Backend\Admin;

use Input;
use Redirect;
use Session;
use Auth;
use Hash;
use Uri;
use Base;

use App\Modules\Admin\Models\Admin;
use App\Modules\Admin\Models\Admin\Group;

class GroupController extends \BaseController
{
    function index()
    {
        $groups = new Group;
        $groups = $groups->where('enabled', 1)->paginate($this->page_size);
        return parent::get_view(__METHOD__)->with('data', $groups);
    }
    
    function create()
    {
        return parent::get_view(__METHOD__)->with('jstree_data', Group::jstree_data());
    }
    
    function store()
    {
        $data = Input::all();
        $data['admin_group_id'] = $data['admin_group_id'] > 0 ? $data['admin_group_id'] : '#';
        $validator = Base::validator($data, new Group);
        if ($validator === true) {
            if (Group::create($data)) {
                $this::flash('success');
                return Uri::to('admin/group', true, true);
            } else {
                $this::flash('danger');
                return Uri::to('admin/group/create', true, true);
            }            
        } else {
            $this->flash('danger', $validator);
            return Uri::to('admin/group/create', true, true);
        }
    }
    
    function edit($id)
    {
        if ($group = Group::find($id)) {
            return parent::get_view(__METHOD__)->with('data', $group)->with('jstree_data', Group::jstree_data());
        } else {
            $this->flash('danger', '查询不到数据');
            return Uri::to('admin/group', true, true);
        }
    }
    
    function update($id)
    {
        if ($id) {
            $data = Input::all();
            $data['enabled'] = Input::get('enabled') ? Input::get('enabled') : 0;
            $data['admin_group_id'] = $data['admin_group_id'] > 0 ? $data['admin_group_id'] : '#';
            
            if ($data['admin_group_id'] != $id) {
                if (Group::find($id)->update($data)) {
                    $this->flash('success', '更新成功');
                } else {
                    $this->flash('danger', '更新失败');
                }
            } else {
                $this->flash('danger', '不能选择自己为父类');
            }
        } else {
            $this->flash('danger', 'ID不合法');
        }
        return Uri::to("admin/group/{$id}/edit");
    }
    
    function dashboard()
    {
        return parent::get_view(__METHOD__);
    }
    
    function destroy($id)
    {
        if ($id) {
            $group = Group::find($id);
            if ($group->delete()) {
                $this->flash('success');
            }
        } else {
            $this->flash('danger', 'ID不合法');
        }
        
        return Uri::to('admin/group');
    }
}
