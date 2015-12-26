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
	                	<!--  Contoh penulisan helper olagioTable -->
		                {!! html()->oblagioTable([
				            ['data' => 'name' , 'name' => 'name'],
				            ['data' => 'role' , 'name' => 'role'],
				            ['data' => 'address' , 'name' => 'address'],
				            ['data' => 'opsi' , 'name' => 'opsi'],
        				]) !!}
	                </div>

			</div>
	</div>

@stop