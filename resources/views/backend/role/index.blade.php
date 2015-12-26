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
		                {!! html()->oblagioTable([
				            ['data' => 'role' , 'name' => 'role'],
				            ['data' => 'opsi' , 'name' => 'opsi'],
        				]) !!}
	                </div>

			</div>
	</div>

@stop