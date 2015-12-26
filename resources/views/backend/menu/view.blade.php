@extends('backend.layouts.layout')

@section('content')
	
	<div class="row">
			
		<div class="col-md-12">
		<div class="box box-primary">
                {!! Form::model($menuAction , ['id' => 'oblagio-form']) !!}
                  
                  
                  <div class="box-body">
                    
                    <div class="form-group">
                      <label>Update Action Menu : {{ $model->label }}</label>
                    </div>  
                    
                    <table class="table">
                      @foreach($action as $row)
                      <?php
                        $modelCek = $menuAction->whereMenuId($model->id)->whereActionId($row->id)->first();
                        (!empty($modelCek)) ? $cek = 'checked' : $cek = '';
                      ?>
                      <tr>
                        <td><input {{ $cek }} value = '{{ $row->id }}' name = 'action[]' type = 'checkbox' /> {{ $row->label }}</td>
                      </tr>
                      
                      @endforeach
                    </table>                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type = 'submit' class="btn btn-primary" type="button">
                      <i class="fa fa-save"></i> 
                      {{ helper()->segmentAction() == 'create' ? 'Save' : 'Update' }}
                    </button>
                  </div>
                {!! Form::close() !!}
              </div>

		</div>
	</div>

@stop