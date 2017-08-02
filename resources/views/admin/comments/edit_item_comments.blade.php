@extends('admin')  
@section('content')
    <div class="layout-content">
    <div class="layout-content-body">
        <h1 class="title-bar-title">Редактирование отзыва от "{{strip_tags($item_comments->name)}}"</h1>
        <p class="title-bar-description">Тут вы можете отредактировать отзыв от "{{strip_tags($item_comments->name)}}"</p>
        <div class="row">
            <div class="col-md-8">
                <div class="demo-form-wrapper">
    <form action="update_item_comments" method="post" class="form form-horizontal" enctype="multipart/form-data">
    <p>
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$item_comments->id}}"/>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Имя</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="name" value="{{$item_comments->name}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Город</label>
            <div class="col-sm-9">
                <textarea id="form-control-1" class="form-control" name="city" rows="5">{{$item_comments->city}}</textarea>
            </div>
         </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Предварительный текст</label>
            <div class="col-sm-9">
                <textarea id="form-control-1" class="form-control" name="short_body" rows="5">{{$item_comments->short_body}}</textarea>
            </div>
         </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Текст</label>
            <div class="col-sm-9">
                <textarea id="form-control-1" class="form-control" name="body" rows="35">{{$item_comments->body}}</textarea>
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Картинка</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="img_path" value="{{$item_comments->img_path}}" >
                <input type="file" name="img_path">
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Дата</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="date" value="{{$item_comments->date}}" >
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

