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
                          <div id = 'image_display'>
                            <img src= "{{ helper()->assetUrl() }}oblagio/images/image.png" />
                          </div>
                          {!! Form::hidden('image' , null , ['class' => 'form-control' , 'style' => 'width:60%;']) !!}
                          <a data-toggle="modal" data-target="#elfinder_modal" style = 'cursor:pointer;' onclick = 'addElfinder()'>Browse</a>  
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
      
  <div class="col-md-12">
    <div class="modal fade" id="elfinder_modal" role="dialog" >
      <div class="modal-lg">
      
        <!-- Modal content-->
        <div class="modal-content" style="width:100%;margin-left:30%;"> 
          <div class="modal-header">
            <button type="button" id = 'elfinder_close' class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Libraries</h4>
          </div>
          <div class="modal-body">
              
              <iframe scrolling="no" style="border:none;width:100%;height:450px;overflow:hidden;" src = '{{ helper()->urlBackend("popup-elfinder") }}'>
        
              </iframe>



          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  </div>

@stop