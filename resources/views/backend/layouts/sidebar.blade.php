<?php

  $model = helper()->injectModel('Menu');
  @$parent_id = helper()->getMenuParent()->id;
  $active = function($id) use($parent_id)
  {
    if($id == $parent_id)
    {
      return ' active';
    }
  };
?>
<ul class="sidebar-menu">
  <li class="header">MENU</li>
  <!-- Optionally, you can add icons to the links -->
  
  <?php
    $statusProject = config('config.statusProject');
    if($statusProject == 'live')
    {
      $parents = $model->whereParentId(0)->where('id' , '!=' ,1)->orderBy('order' , 'asc')->get();
    }elseif($statusProject == 'dev'){
      $parents = $model->whereParentId(0)->orderBy('order' , 'asc')->get();
    }
    
  ?>

  @foreach($parents as $row)
  
  <?php
    $childs = $model->whereParentId($row->id)->orderBy('order' , 'asc');
  ?>

    <li class="{{ ($childs->count() > 0 ? 'treeview'.$active($row->id) : '') }}">
      <a href="{{ ($row->controller != '#') ? helper()->urlBackend($row->permalink) : '#' }}">
        <span>{{ $row->label }}</span> {!! ($childs->count() > 0 ? '<i class="fa fa-angle-left pull-right"></i>' : '') !!}
      </a>

      @if($childs->count() > 0)

        <ul class="treeview-menu">

        @foreach($childs->get() as $child)
        
          <li><a href="{{ helper()->urlBackend($child->permalink) }}">{{ $child->label }}</a></li>
        
        @endforeach

        </ul>

      @endif

    </li>
  
  @endforeach
  <li class=""><a href = "{{ url('login/logout') }}">Logout</a></li>
  
</ul><!-- /.sidebar-menu -->
        