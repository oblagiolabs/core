@extends('backend.layouts.layout')

@section('content')
	
	<div class="row">
			
		<div class="col-md-12">
			<div class="box box-primary">
	                <div class="box-header" style="margin-bottom:5px;margin-top:5px;">
	                  <h3 class="box-title">
	                  	{!! html()->buttonCreate() !!}
	                  </h3>
	                </div><!-- /.box-header -->
	                <div class="box-body">
		                <table class="table table-bordered" id = 'oblagio-table-default'>
		                	<thead>
		                		<tr>
		                			<th>Parent</th>
		                			<th>Label</th>
		                			<th>Controller</th>
		                			<th>Permalink</th>
		                			<th>Model</th>
		                			<th>Order</th>
		                			<th>Action</th>
		                		</tr>
		                	</thead>
		                	<tbody>	
		                		@foreach($model->whereParentId(0)->orderBy('order' , 'asc')->get() as $row)
		                
		                		<tr style="background-color:#eee;">
		                			<td>This Parent Menu</td>
		                			<td>{{ $row->label }}</td>
		                			<td>{{ $row->controller }}</td>
		                			<td>{{ $row->permalink }}</td>
		                			<td>{{ $row->model }}</td>
		                			<td>{{ $row->order }}</td>
		                			<td>{!! html()->buttonUpdate($row->id).' '.html()->buttonDelete($row->id) !!}</td>
		                		</tr>
			                		@foreach($model->whereParentId($row->id)->orderBy('order' , 'asc')->get() as $row2)
			                
			                		<tr style="">
			                			<td>{{ $row->label }}</td>
			                			<td>{{ $row2->label }}</td>
			                			<td>{{ $row2->controller }}</td>
			                			<td>{{ $row2->permalink }}</td>
			                			<td>{{ $row2->model }}</td>
			                			<td>{{ $row2->order }}</td>
			                			<td>{!! html()->buttonUpdate($row2->id).' '.html()->buttonView($row2->id).' '.html()->buttonDelete($row2->id) !!}</td>
		                			</tr>
		                		@endforeach

		                		@endforeach
		                	</tbody>
		                		
		                	
		                </table>
	                </div>

			</div>
	</div>

@stop