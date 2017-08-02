@extends('admin')  
@section('content')
    <div class="layout-content">
    <div class="layout-content-body">
        <h1 class="title-bar-title">Редактирование "{{strip_tags($item_articles->title)}}"</h1>
        <p class="title-bar-description">Тут вы можете отредактировать новость "{{strip_tags($item_articles->title)}}"</p>
        <div class="row">
            <div class="col-md-8">
                <div class="demo-form-wrapper">
    <form action="update_item_articles" method="post" class="form form-horizontal" enctype="multipart/form-data">
    <p>
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$item_articles->id}}"/>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Заголовок</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="title" value="{{$item_articles->title}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Предварительный текст</label>
            <div class="col-sm-9">
                <textarea id="form-control-1" class="form-control" name="short_body" rows="5">{{$item_articles->short_body}}</textarea>
            </div>
         </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Текст</label>
            <div class="col-sm-9">
                <textarea id="form-control-1" class="form-control" name="body" rows="55">{{$item_articles->body}}</textarea>
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Картинка</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="img_path" value="{{$item_articles->img_path}}" >
                <input type="file" name="img_path">
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Дата</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="date" value="{{$item_articles->date}}" >
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

