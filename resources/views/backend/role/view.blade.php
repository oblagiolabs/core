@extends('backend.layouts.layout')

@section('content')
	
	<div class="row">
			
		<div class="col-md-12">
		<div class="box box-primary">
                {!! Form::model($model , ['id' => 'oblagio-form']) !!}
                  
                  <div class="box-body">
                    
                  <div class="form-group">
                   <h4> Update Privilage : {{ $model->role }}</h4>
                  </div>

                    <table class="table">
                      
                      @foreach($menu->whereParentId(0)->orderBy('order' , 'asc')->get() as $row)  
                        <tr>
                          <td>{{ $row->label }}</td>
                        </tr>

                              @foreach($menu->whereParentId($row->id)->orderBy('order' , 'asc')->get() as $row2)  
                      
                                <tr>
                                  <td style="padding-left:5%;">{{ $row2->label }}</td>
                                </tr>
                                      @foreach($menuAction->whereMenuId($row2->id)->get() as $row3)  
                            
                                        <tr>
                                          <td style="padding-left:10%;"><input <?= $cek($row3->id) ?> type = 'checkbox' name = 'action[]' value = '{{ $row3->id }}' />&nbsp;{{ $row3->action->label }}</td>
                                        </tr>
                            
                                      @endforeach
                              @endforeach
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