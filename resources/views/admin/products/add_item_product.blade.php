@extends('admin')  
@section('content')
    <div class="layout-content">
    <div class="layout-content-body">
        <h1 class="title-bar-title">Редактирование </h1>
        <p class="title-bar-description">Тут вы можете отредактировать новость ""</p>
        <div class="row">
            <div class="col-md-8">
                <div class="demo-form-wrapper">
    <form action="add_item_product" method="post" class="form form-horizontal" enctype="multipart/form-data">
    <p>
        {{ csrf_field() }}
        <input type="hidden" name="id" value=""/>
        <input type="hidden" name="parent" value="{{$parent}}"/>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Заголовок</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="title" value="">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Скидка</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="discount" value="" >
            </div>
         </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Новинка ли</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="is_new" value="" >
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Ширина полная, мм</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="width_full" value="" >
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Ширина полезная, мм</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="width_useful" value="" >
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Шаг волны, мм</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="wave" value="" >
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Высота профиля, мм</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="height" value="" >
            </div>
         </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Цена</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="price" value="" >
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Картинка по умолчанию</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="file" name="default_img" value="" >
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

