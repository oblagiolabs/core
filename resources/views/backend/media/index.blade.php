@extends('backend.layouts.layout')

@section('content')
		
	<div class="row">
		<div class="col-md-12">
		<iframe scrolling="no" style="border:none;width:100%;height:1000px;overflow:hidden;" src = '{{ helper()->urlBackend("media-library-core") }}'>
			
		</iframe>
		</div>
	</div>

@stop