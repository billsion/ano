@extends('backend.layouts.empty')

@section('content')

@include('backend.widgets.message')

<div class="main-content">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="login-container">
                <div class="center">
                    <h1>
                        <i class="ace-icon fa fa-leaf green"></i>
                        <span class="red">Ace</span>
                        <span class="white" id="id-text2">Application</span>
                    </h1>
                    <h4 class="blue" id="id-company-text">&copy; Company Name</h4>
                </div>

                <div class="space-6"></div>

                <div class="position-relative">
                    <div id="login-box" class="login-box visible widget-box no-border">
                        <div class="widget-body">
                            <div class="widget-main">
                                <h4 class="header blue lighter bigger">
                                    <i class="ace-icon fa fa-coffee green"></i>
                                    Please Enter Your Information
                                </h4>

                                <div class="space-6"></div>

                                {{ Form::open(array('url' => Uri::to('admin/login_post', false, true), 'method' => 'POST', 'id' => 'admin-form', 'data-toggle' => 'validator', 'class' => 'form-horizontal')) }}
                                    <fieldset>
                                        <label class="block clearfix">
                                            <span class="block input-icon input-icon-right">
                                                <input type="text" class="form-control" placeholder="{{ Lang::get('admin::admin.username') }}" name="username" />
                                                <i class="ace-icon fa fa-user"></i>
                                            </span>
                                        </label>

                                        <label class="block clearfix">
                                            <span class="block input-icon input-icon-right">
                                                <input type="password" class="form-control" placeholder="{{ Lang::get('admin::admin.password') }}" name="password" />
                                                <i class="ace-icon fa fa-lock"></i>
                                            </span>
                                        </label>

                                        <div class="space"></div>

                                        <div class="clearfix">
                                            <label class="inline">
                                                <input type="checkbox" class="ace" />
                                                <span class="lbl"> {{ Lang::get('admin::admin.remember_me') }}</span>
                                            </label>

                                            <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                                <i class="ace-icon fa fa-key"></i>
                                                <span class="bigger-110">{{ Lang::get('admin::admin.login') }}</span>
                                            </button>
                                        </div>

                                        <div class="space-4"></div>
                                    </fieldset>
                                {{ Form::close(); }}
                            </div><!-- /.widget-body -->
                        </div><!-- /.login-box -->
                    </div><!-- /.position-relative -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.main-content -->
    </div>
</div>
@stop
