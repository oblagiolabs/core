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
		                
	                {!! Html()->oblagioTable([
							['data' => 'action' , 'name' => 'action'],
				    		['data' => 'label' , 'name' => 'label'],
				    		['data' => 'opsi' , 'name' => 'opsi']
	    			]) !!}
		                <!--table id = 'crud-table' class = 'table'>
		                	<thead>
		                		<th>Action</th>
		                		<th>Label</th>
		                		<th>Opsi</th>
		                	</thead>
		                </table-->
	                </div>

			</div>
	</div>

@stop