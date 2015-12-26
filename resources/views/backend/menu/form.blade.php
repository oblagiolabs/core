@extends('backend.layouts.layout')

@section('content')
	
	<div class="row">
			
		<div class="col-md-12">
		<div class="box box-primary">
                {!! Form::model($model , ['id' => 'oblagio-form']) !!}
                  
                  <div id='unique' style="display:none;">{{ $model->id }}</div><!-- jika menggunakan validasi ajax dan ada unique validasi maka div ini wajib di tulis -->
                  
                  <div class="box-body">
                   
                    <div class="form-group">
                      <label>Parent</label>
                   	  {!! Form::select('parent_id' , $parents , null , ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                      <label>Label</label>
                      {!! Form::text('label' , null , ['class' => 'form-control']) !!}
                    </div>  
                    @if($model->id == '')
                    <div class="form-group">
                      <label>Controller</label>
                      {!! Form::text('controller' , null , ['class' => 'form-control']) !!}
                    </div>  
                    @endif
                    
                    <div class="form-group">
                      <label>Permalink</label>
                      {!! Form::text('permalink' , null , ['class' => 'form-control']) !!}
                    </div>  
                    
                    <div class="form-group">
                      <label>Model</label>
                      {!! Form::text('model' , null , ['class' => 'form-control']) !!}
                    </div>  
                    
                    <div class="form-group">
                      <label>Order</label>
                      {!! Form::text('order' , null , ['class' => 'form-control']) !!}
                    </div>  
                    
                   
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button onclick = 'oblagioValidate();' class="btn btn-primary" type="button">
                      <i class="fa fa-save"></i> 
                      {{ helper()->segmentAction() == 'create' ? 'Save' : 'Update' }}
                    </button>
                  </div>
                {!! Form::close() !!}
              </div>

		</div>
	</div>

@stop