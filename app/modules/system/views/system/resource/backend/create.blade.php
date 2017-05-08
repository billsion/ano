@extends('backend.layouts.main') @section('content')

@include('backend.widgets.message')

<div class="page-header">
    <h1>
        Tables <small> <i class="ace-icon fa fa-angle-double-right"></i>
        Static &amp; Dynamic Tables
        </small>
    </h1>
</div>

<div class="row">
    <div class="col-xs-12">
    {{ Form::open(array('url' => Uri::to('system/resource', false, true), 'method' => 'POST', 'id' => 'system-resource-form', 'data-toggle' => 'validator', 'class' => 'form-horizontal')) }}
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">
            {{ Lang::get('system::system_resource.name') }}
            </label>
            <div class="col-sm-9">
                <input type="text" name="name" class="col-xs-10 col-sm-5" required /><br/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">
            {{ Lang::get('system::system_resource.system_menu_id') }}
            </label>
            <div class="col-sm-9">
                <select name="system_menu_id" class="col-xs-10 col-sm-5" id="select-system_menu_id" required>
                    <option value="">{{ Lang::get('backend.please_select') }}</option>
                    <?php foreach($menus as $_menu):?>
                    <option value="<?php echo $_menu['id']; ?>"><?php echo $_menu['name']; ?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">
            {{ Lang::get('system::system_resource.pattern') }}
            </label>
            <div class="col-sm-9">
                <input type="text" name="pattern" class="col-xs-10 col-sm-5" required /><br/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">
            {{ Lang::get('system::system_resource.type') }}
            </label>
            <div class="col-sm-9">
                <div class="radio">
							      <label>
										    <input value="menu" name="type" type="radio" class="ace">
												<span class="lbl"> {{ Lang::get('system::system_resource.type_menu') }}</span>
										</label>
							      <label>
										    <input value="action" name="type" type="radio" class="ace">
												<span class="lbl"> {{ Lang::get('system::system_resource.type_action') }}</span>
										</label>
							      <label>
										    <input value="button" name="type" type="radio" class="ace">
												<span class="lbl"> {{ Lang::get('system::system_resource.type_button') }}</span>
										</label>
							  </div>
            </div>
        </div>
        <div class="form-group">
            	<label class="col-sm-3 control-label no-padding-right">
      	      {{ Lang::get('system::system_resource.is_menu') }}
            </label>
            <div class="col-xs-3" style="padding-top:6px;">
                <label>
            	        <input name="is_menu" value="1" class="ace ace-switch ace-switch-6" checked="checked" type="checkbox">
            					<span class="lbl"></span>
            			</label>
            	</div>
        </div>
        <div class="form-group">
            	<label class="col-sm-3 control-label no-padding-right">
      	      {{ Lang::get('backend.enabled') }}
            </label>
            <div class="col-xs-3" style="padding-top:6px;">
                <label>
            	        <input name="enabled" value="1" class="ace ace-switch ace-switch-6" checked="checked" type="checkbox">
            					<span class="lbl"></span>
            			</label>
            	</div>
        </div>
        <div class="clearfix form-actions">
            <div class="col-md-offset-3 col-md-9">
                <button class="btn btn-info" type="submit">
                <i class="ace-icon fa fa-check bigger-110"></i> {{ Lang::get('backend.submit') }}
                </button>
                &nbsp; &nbsp; &nbsp;
                <button class="btn" type="reset">
                <i class="ace-icon fa fa-undo bigger-110"></i> {{ Lang::get('backend.reset') }}
                </button>
                &nbsp; &nbsp; &nbsp;
                <a class="btn btn-yellow" href="{{ Uri::to('system/menu', false, true) }}">
                    <i class="ace-icon fa fa-caret-left icon-only bigger-110"></i> {{ Lang::get('backend.back') }}
                </a>
            </div>
        </div>
    {{ Form::close(); }}
    <div class="hr hr-18 dotted hr-double"></div>
    </div>
  <!-- /.col -->
</div>
<!-- /.row -->
@stop
