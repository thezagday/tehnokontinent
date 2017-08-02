@extends('admin')  
@section('content')
    <div class="layout-content">
    <div class="layout-content-body">
        <h1 class="title-bar-title">Редактирование "{{$item_advantages->title}}"</h1>
        <p class="title-bar-description">Тут вы можете отредактировать преимущество "{{$item_advantages->title}}"</p>
        <div class="row">
            <div class="col-md-8">
                <div class="demo-form-wrapper">
    <form action="update_item_advantages" method="post" class="form form-horizontal" enctype="multipart/form-data">
    <p>
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$item_advantages->id}}"/>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Заголовок</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="title" value="{{$item_advantages->title}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Текст</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="body" value="{{$item_advantages->body}}" >
            </div>
         </div>
  
        
    </p>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="form-control-1"></label>
        <div class="col-sm-9">
            <button type="submit" class="btn-primary" id="input_btn">Сохранить</button>
        </div>
    </div>
    </form>
  </div>
            </div>
       </div>
    </div>
</div>
@stop

