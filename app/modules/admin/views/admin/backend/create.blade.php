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
    {{ Form::open(array('url' => Uri::to('admin', false, true), 'method' => 'POST', 'id' => 'admin-form', 'data-toggle' => 'validator', 'class' => 'form-horizontal')) }}
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">
            {{ Lang::get('admin::admin.label') }}
            </label>
            <div class="col-sm-9">
                <input type="text" name="label" class="col-xs-10 col-sm-5" required /><br/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">
            {{ Lang::get('admin::admin.username') }}
            </label>
            <div class="col-sm-9">
                <input type="text" name="username" class="col-xs-10 col-sm-5" required /><br/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">
            {{ Lang::get('admin::admin.avatar') }}
            </label>
            <div class="col-sm-9">
                <ul class="ace-thumbnails clearfix" id="ul-avatar-wrapper">
                    <!-- li>
                        <a href="" data-rel="colorbox" class="cboxElement">
                            <img width="150" height="150" src="/upload/admin/avatar/S5pZEIfBLmgLgrISK59DGM1iZH43sohB7aSLBSQj/2130958050.jpg" alt="" />
                            <input id="input-hidden-avatar" type="hidden" name="avatar[]" value="" />
                        </a>
                        <div class="tools tools-bottom">
												    <a href="#">
												        <i class="ace-icon fa fa-times red"></i>
												    </a>
											  </div>
                    </li-->
                </ul>
                <input id="input-file-avatar" type="file" multiple="false">
            </div>
        </div>
        <div class="form-group">
            	<label class="col-sm-3 control-label no-padding-right">
      	      {{ Lang::get('admin::admin.password') }}
            </label>
            <div class="col-sm-9">
      	          <input type="password" name="password" class="col-xs-10 col-sm-5" required />
            </div>
        </div>
        <div class="form-group">
        	<label class="col-sm-3 control-label no-padding-right">{{ Lang::get('admin::admin.admin_role_id') }}</label>
        	<div class="col-sm-9">
        	    <?php foreach($roles as $_role):?>
				    <label class="control-label no-padding-right">
				        <input name="admin_role_id[]" type="checkbox" class="ace">
						    <span class="lbl"> <?php echo $_role['name']; ?></span>
					  </label>
					  <?php endforeach;?>
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
                <a class="btn btn-yellow" href="{{ Uri::to('admin', false, true) }}">
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
<script type="text/javascript">
jQuery('#admin-form').validator();
$(function() {
	$('#input-file-avatar').uploadify({
		'formData'     : {
			'token'     : '<?php echo md5(csrf_token() . time()); ?>',
			'module'    : 'admin/avatar',
			'size'      : '100_100'
		},
		'uploader' : '/backend/upload_img',
		'buttonClass' : 'btn btn-primary',
		'swf'      : '/packages/uploadify/uploadify.swf',
		'onUploadSuccess': function(file, data, response) {
			//if ($('#ul-avatar-wrapper').children().length()) {
		  $('#ul-avatar-wrapper').children().remove();
			//}

			$('#ul-avatar-wrapper').append('<li><a href="" data-rel="colorbox" class="cboxElement"><img width="150" height="150" src="'+data+'" alt="" /><input id="input-hidden-avatar" type="hidden" name="avatar" value="" /></a><div class="tools tools-bottom"><a href="javascript:;"><i class="ace-icon fa fa-times red"></i></a></div></li>');
			$('#input-hidden-avatar').attr('value', data);


			$('.tools-bottom>a').click("click", function(){
				$(this).parent().parent().remove();
			});
		},
		onInit:function(){
		    $("div#"+$(this).attr("id")+"-button").removeClass("uploadify-button");
    }
	});
});

$('.tools-bottom>a').click("click", function(){
	$(this).parent().parent().remove();
});

</script>
@stop
