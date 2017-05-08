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
    {{ Form::open(array('url' => Uri::to('admin/group', false, true), 'method' => 'POST', 'id' => 'admin-group-form', 'data-toggle' => 'validator', 'class' => 'form-horizontal')) }}
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">
            {{ Lang::get('admin::admin_group.name') }}
            </label>
            <div class="col-sm-9">
                <input type="text" name="name" class="col-xs-10 col-sm-5" required /><br/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">
            {{ Lang::get('admin::admin_group.admin_group_id') }}
            </label>
            <div class="col-sm-9">
                <div class="widget-body">
								    <div class="widget-main padding-8">
								        <div id="div_group"></div>
								        <input type="hidden" id="div-admin_group_id" name="admin_group_id" />
										</div>
								</div>
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
                <a class="btn btn-yellow" href="{{ Uri::to('admin/group', false, true) }}">
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
$('#div_group').jstree({ 
    plugins: ["checkbox", "ui", "sort", "dnd", "wholerow", "types"], 
    'checkbox' : {  
        // 禁用级联选中  
        'three_state' : false,       
        'cascade' : 'undetermined' //有三个选项，up, down, undetermined; 使用前需要先禁用three_state  
    },
    'core' : {
    'multiple' : false,
    'data' : <?php echo $jstree_data; ?>,
    },
    'types': {//图片样式
        "default": {
            "icon": "fa fa-folder tree-item-icon-color icon-lg"
        },
        "file": {
            "icon": "fa fa-file tree-item-icon-color icon-lg"
        }
    },
}).on("select_node.jstree", function (e, data) {
	  $('#div-admin_group_id').val(data.selected);
	  console.log($('#div-admin_group_id').val());
}).on('loaded.jstree', function(e, data){
    //$('#div_group').jstree("select_node", '', true); 
});
</script>
@stop
