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
                      <tr>
                        <td style="padding-left:0%;"><input id = "cek_all"  onclick = 'cekAll("cek_all")' type = 'checkbox' /> CEK ALL</td>
                      </tr>


                      @foreach($menu->whereParentId(0)->orderBy('order' , 'asc')->get() as $row)  
                        <tr>
                          <td style="padding-left:5%;"><input id = 'parent{{ $row->id }}' onclick = 'cekAllParentToChild("parent{{ $row->id }}" , "child{{ $row->id }}-" , "action{{ $row->id }}")' type = 'checkbox' /> {{ $row->label }}</td>
                        </tr>

                              @foreach($menu->whereParentId($row->id)->orderBy('order' , 'asc')->get() as $row2)  
                                
                                <?php
                                $childId = "child$row->id-$row2->id";
                                ?>

                                <tr>
                                  <td style="padding-left:10%;"><input id = "{{ $childId }}" onclick = 'cekAllChildToAction("{{ $childId }}","action{{ $row->id."-".$row2->id }}")' type = 'checkbox' />  {{ $row2->label }}</td>
                                </tr>
                                      @foreach($menuAction->whereMenuId($row2->id)->get() as $row3)  
                            
                                        <tr>
                                          <td style="padding-left:15%;"><input id = 'action{{ $row->id."-".$row2->id."-".$row3->id }}' <?= $cek($row3->id) ?> type = 'checkbox' name = 'action[]' value = '{{ $row3->id }}' />&nbsp;{{ $row3->action->label }}</td>
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