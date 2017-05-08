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
    {{ Form::open(array('url' => Uri::to('admin/role/' . $data['id'], false, true), 'method' => 'PUT', 'id' => 'admin-role-form', 'data-toggle' => 'validator', 'class' => 'form-horizontal')) }}
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">
            {{ Lang::get('admin::admin_role.name') }}
            </label>
            <div class="col-sm-9">
                <input value="{{ $data['name'] }}" type="text" name="name" class="col-xs-10 col-sm-5" required /><br/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">
            {{ Lang::get('admin::admin_role.priviledge') }}
            </label>
            <div class="col-sm-9">
            <?php foreach($menu_and_resource as $_menu_and_resource):?>
            <?php if(count($_menu_and_resource['resources'])):?>
            <?php
                if ($priviledges) {
					          $display = array_key_exists($_menu_and_resource['id'], $priviledges) ? true : false;
					      } else {
					          $display = false;
					      }
            ?>
						<div class="col-sm-6 widget-container-col ui-sortable" id="widget-container-menu-{{ $_menu_and_resource['id']; }}">
						    <div class="widget-box transparent ui-sortable-handle" id="widget-box-{{ $_menu_and_resource['id']; }}">
								    <div class="widget-header widget-header-small">
										    <h6 class="widget-title smaller">{{ $_menu_and_resource['name']; }}</h6>
												<div class="widget-toolbar no-border">
														<label>
															<input <?php if($display){echo 'checked="checked"';}?> name="menu[{{ $_menu_and_resource['id'] }}]" id="input-checkbox-menu-{{ $_menu_and_resource['id']; }}" type="checkbox" class="ace ace-switch ace-switch-4 menus-resources-switch-{{ $_menu_and_resource['id'] }}">
															<span class="lbl middle"></span>
														</label>
												</div>
										</div>

										<div <?php if(!$display){echo 'style="display:none;"';}?> class="widget-body div-resources-wrapper-{{ $_menu_and_resource['id'] }}">
										    <div class="widget-main">
										        <?php foreach($_menu_and_resource['resources'] as $_resource):?>
										        <?php
                					        $resource_check = false;
										            if ($priviledges && array_key_exists($_menu_and_resource['id'], $priviledges)) {
                					            foreach($priviledges[$_menu_and_resource['id']] as $_choose_resource) {
                					                if ($_choose_resource['system_resource_id'] == $_resource['id']) {
                                            $resource_check = true;
                					                }
                					            }
                					        }
										        ?>
										            <label>
														        <input <?php if($resource_check){echo 'checked="checked"';}?> name="menu[{{ $_menu_and_resource['id'] }}][{{ $_resource['id'] }}]" class="ace ace-switch ace-switch-3 menus-resources-switch-{{ $_menu_and_resource['id'] }}" type="checkbox">
														        <span class="lbl"><p style="float:left;padding-left:10px;"><?php echo $_resource['name']; ?></p></span>
													      </label>
										        <?php endforeach;?>
												</div>
										</div>
								</div>
						</div>
						<?php endif; ?>
						<?php endforeach;?>
						</div>
        </div>
        <div class="form-group">
            	<label class="col-sm-3 control-label no-padding-right">
      	      {{ Lang::get('backend.enabled') }}
            </label>
            <div class="col-xs-3" style="padding-top:6px;">
                <label>
            	        <input name="enabled" value="1" class="ace ace-switch ace-switch-6" <?php if ($data['enabled']) {echo 'checked="checked"';}?> type="checkbox">
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
                <a class="btn btn-yellow" href="{{ Uri::to('admin/role', false, true) }}">
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
$('.ace-switch-4').click(function(){
	var id = $(this).attr('id').split('-');
	$('.div-resources-wrapper-'+id[3]).toggle();
	if ($('.div-resources-wrapper-'+id[3]).css('display') == 'none') {
		$('.menus-resources-switch-'+id[3]).removeAttr('checked');
	}
})
</script>
@stop
