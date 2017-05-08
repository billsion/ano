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
    {{ Form::open(array('url' => Uri::to('system/menu', false, true), 'method' => 'POST', 'id' => 'system-menu-form', 'data-toggle' => 'validator', 'class' => 'form-horizontal')) }}
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">
            {{ Lang::get('system::system_menu.name') }}
            </label>
            <div class="col-sm-9">
                <input type="text" name="name" class="col-xs-10 col-sm-5" required /><br/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">
            {{ Lang::get('system::system_menu.icon') }}
            </label>
            <div class="col-sm-9">
                <input type="text" name="icon" class="col-xs-10 col-sm-5" placeholder="{{ Lang::get('system::system_menu.icon_placeholder') }}" required /><br/>
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
