@extends('admin')  
@section('content')
<div class="layout-content">
    <div class="layout-content-body">
        <h1 class="title-bar-title">Добавление нового отзыва</h1>
        <p class="title-bar-description">Тут вы можете добавить новый озыв</p>
        <div class="row">
            <div class="col-md-8">
                <div class="demo-form-wrapper">
                    <form action="add_item_comments" method="post" class="form form-horizontal" enctype="multipart/form-data">
    <p>
        {{ csrf_field() }}     
       <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Имя</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="name" value="">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Город</label>
            <div class="col-sm-9">
                <textarea id="form-control-1" class="form-control" name="city" rows="5"></textarea>
            </div>
         </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Предварительный текст</label>
            <div class="col-sm-9">
                <textarea id="form-control-1" class="form-control" name="short_body" rows="5"></textarea>
            </div>
         </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Текст</label>
            <div class="col-sm-9">
                <textarea id="form-control-1" class="form-control" name="body" rows="35"></textarea>
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Картинка</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="file" name="img_path" value="" >
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Дата</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="date" value="" >
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


