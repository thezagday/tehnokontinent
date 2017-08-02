@extends('admin')  
@section('content')
<div class="layout-content">
    <div class="layout-content-body">
        <h1 class="title-bar-title">Добавление новго описание такого-то товара</h1>
        <p class="title-bar-description">Тут вы можете добавить новуое описание такого-то товара</p>
        <div class="row">
            <div class="col-md-8">
                <div class="demo-form-wrapper">
                    <form action="add_item_certificates_products" method="post" class="form form-horizontal" enctype="multipart/form-data">
    <p>
        {{ csrf_field() }} 
        <input type="hidden" name="parent" value="{{$parent}}"/>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Заголовок</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="title" value="" >
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Маленькое изображение</label>
            <div class="col-sm-9">
                <input class="drive-uploader-input" type="file" name="prev">
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Основное изображение</label>
            <div class="col-sm-9">
                <input class="drive-uploader-input" type="file" name="img_path">
            </div>
         </div>
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