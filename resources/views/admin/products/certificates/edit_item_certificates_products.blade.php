@extends('admin')  
@section('content')
    <div class="layout-content">
    <div class="layout-content-body">
        <h1 class="title-bar-title">Редактирование "{{$item_certificates->title}}"</h1>
        <p class="title-bar-description">Тут вы можете отредактировать преимущество "{{$item_certificates->title}}"</p>
        <div class="row">
            <div class="col-md-8">
                <div class="demo-form-wrapper">
    <form action="update_item_certificates_products" method="post" class="form form-horizontal" enctype="multipart/form-data">
    <p>
        {{ csrf_field() }}
               <input type="hidden" name="parent" value="{{$parent}}">
               <input type="hidden" name="id" value="{{$item_certificates->id}}"/>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Заголовок</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="title" value="{{$item_certificates->title}}">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Миниатюра</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="prev" value="{{$item_certificates->prev}}" >
                <input type="file" name="prev">
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Картинка</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="img_path" value="{{$item_certificates->img_path}}" >
                <input type="file" name="img_path">
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


