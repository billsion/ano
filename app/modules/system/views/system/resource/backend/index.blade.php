@extends('backend.layouts.main')

@section('content')

@include('backend.widgets.message')
<div class="page-header" style="text-align:right;">
    <button type="button" class="btn btn-primary" onclick="window.location.href='{{ Uri::to('system/resource/create', false) }}'">{{ Lang::get('backend.create') }}</button> 
</div>

<div class="row">
    <div class="col-xs-12">
        <table id="simple-table" class="table  table-bordered table-hover">
            <thead>
						    <tr>
						        <th>#</th>
									  <th>{{ Lang::get('system::system_resource.name'); }}</th>
									  <th>{{ Lang::get('system::system_resource.system_menu_id'); }}</th>
									  <th>{{ Lang::get('system::system_resource.pattern'); }}</th>
									  <th>{{ Lang::get('system::system_resource.type'); }}</th>
									  <th>{{ Lang::get('backend.enabled'); }}</th>
										<th>
										    <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
										    {{ Lang::get('backend.created_at'); }}
										</th>
										<th>
										    <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
										    {{ Lang::get('backend.updated_at'); }}
										</th>
										<th></th>
								</tr>
            </thead>

            <tbody>
                <?php foreach($data as $_data):?>
						    <tr class="">
								    <td><?php echo $_data['id']; ?></td>
										<td><?php echo $_data['name']; ?></td>
										<td><?php echo $_data->menu->name; ?></td>
										<td><?php echo $_data['pattern']; ?></td>
										<td><?php echo $_data['type']; ?></td>
										<td><?php echo \Base::enable($_data['enabled']); ?></td>
										<td><?php echo $_data['created_at']; ?></td>
										<td><?php echo $_data['updated_at']; ?></td>
										<td>
										    <div class="hidden-sm hidden-xs btn-group">
										        <a class="btn btn-xs btn-info" href="{{ Uri::to('system/resource/' . $_data['id'] . '/edit', false, true) }}">
    										        <i class="ace-icon fa fa-pencil bigger-120"></i>
										        </a>
										    </div>
										    <div class="hidden-sm hidden-xs btn-group">
										    <a class="btn btn-xs btn-danger" data-confirm="sure?" data-method="DELETE" href="{{ Uri::to('system/resource/' . $_data['id'], false, true) }}">
										        <i class="ace-icon fa fa-trash-o bigger-120"></i>
										    </a>
										    </div>
										</td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <div>
            {{ $data->appends(Input::except('page'))->links(); }}
        </div>
    </div><!-- /.span -->
</div>
@stop
