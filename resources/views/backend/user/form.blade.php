@extends('backend.layouts.layout')

@section('content')
	
	<div class="row">
			
		<div class="col-md-12">
		<div class="box box-primary">
                {!! Form::model($model , ['id' => 'oblagio-form']) !!}
                  
                  <div id='unique' style="display:none;">{{ $model->id }}</div><!-- jika menggunakan validasi ajax dan ada unique validasi maka div ini wajib di tulis -->
                  
                  <div class="box-body">
                   
                    <div class="form-group">
                      <label>Username</label>
                   	  {!! Form::text('username' , null , ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                      <label>Email</label>
                      {!! Form::text('email' , null , ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                      <label>Password</label>
                      {!! Form::password('password' ,  ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                      <label>Verify Password</label>
                      {!! Form::password('verify_password' ,  ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                      <label>Name</label>
                      {!! Form::text('name' , null , ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                      <label>Role</label>
                      {!! Form::select('role_id' , $roles ,null , ['class' => 'form-control']) !!}
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