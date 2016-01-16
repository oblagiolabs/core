@extends('backend.layouts.layout')

@section('content')
	
	<div class="row">
			
		<div class="col-md-12">
		<div class="box box-primary">
                {!! Form::model($model , ['id' => 'oblagio-form']) !!}
                  
                  <div id='unique' style="display:none;">{{ $model->id }}</div><!-- jika menggunakan validasi ajax dan ada unique validasi maka div ini wajib di tulis -->
                  
                  <div class="box-body">
                   
                    <div class="form-group">
                      <label>Name</label>
                   	  {!! Form::text('name' , null , ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                      <label>Role</label>
                      {!! Form::text('role' , null , ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                      <label>Address</label>
                      {!! Form::textarea('address' , null , ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        
                          <label>Image</label><br/>
                          {!! html()->oblagioFile('image' , ['name' => 'image' ,'pathName' => $imagePath]) !!}  
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



  <div class="row">
      
  
@stop