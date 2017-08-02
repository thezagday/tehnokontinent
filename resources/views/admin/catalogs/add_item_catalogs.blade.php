@extends('admin')  
@section('content')
<div class="layout-content">
    <div class="layout-content-body">
        <h1 class="title-bar-title">Добавление нового каталога</h1>
        <p class="title-bar-description">Тут вы можете добавить новый каталог</p>
        <div class="row">
            <div class="col-md-8">
                <div class="demo-form-wrapper">
    <form action="add_item_catalogs" method="post" class="form form-horizontal" enctype="multipart/form-data">
    <p>
        {{ csrf_field() }}     
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Заголовок</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="title" value="" >
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Картинка по умолчанию</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="file" name="default_img" value="" >
            </div>
         </div>
    <h3>Выберите родительскую категорию</h3>
    <ul class="mail-list">
         @foreach ($catalogs as $catalog)
            <li class="mail-list-item">
                  <label class="mail-list-checkbox custom-control custom-control-primary custom-checkbox">
                      <input class="custom-control-input" type="checkbox" name="parent" value="{{$catalog->id}}">
                    <span class="custom-control-indicator pos-r"></span>
                  </label>
                  <a class="mail-list-link" href="" data-toggle="tab">
                    <div class="mail-list-name"></div>
                    <div class="mail-list-content">
                      <span class="mail-list-subject">{{$catalog->title}}</span>
                    </div>
                  </a>
                </li>
         @endforeach
    </ul>
    </p>
   
     <div class="form-group">
        <label class="col-sm-3 control-label" for="form-control-1"></label>
        <div class="col-sm-9">
           
            <button type="submit" class="btn-primary" id="input_btn">Добавить</button>
           
        </div>
    </div>
    </form>
</div>
                 </div>
       </div>
    </div>
</div>
@stop
