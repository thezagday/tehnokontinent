@extends('admin')  
@section('content')
<div class="layout-content">
    <div class="layout-content-body">
        <h1 class="title-bar-title">Добавление нового цвета</h1>
        <p class="title-bar-description">Тут вы можете добавить новый цвет</p>
        <div class="row">
            <div class="col-md-8">
                <div class="demo-form-wrapper">
                    <form action="add_item_color" method="post" class="form form-horizontal">
    <p>
        {{ csrf_field() }}     
       <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Код</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="title" value="">
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


