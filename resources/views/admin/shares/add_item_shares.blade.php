@extends('admin')  
@section('content')
<div class="layout-content">
    <div class="layout-content-body">
        <h1 class="title-bar-title">Добавление новой акции</h1>
        <p class="title-bar-description">Тут вы можете добавить новую акцию</p>
        <div class="row">
            <div class="col-md-8">
                <div class="demo-form-wrapper">
                    <form action="add_item_shares" method="post" class="form form-horizontal" enctype="multipart/form-data">
    <p>
        {{ csrf_field() }}     
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Заголовок</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="title" value="" >
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
                <textarea id="form-control-1" class="form-control" name="body" rows="55"></textarea>
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Цена</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="price" value="" >
            </div>
         </div>
       
         
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Актуальность</label>
            <div class="col-sm-9">
                <label class="custom-control custom-control-primary custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="relevance" checked="checked" value="1">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-label">Акция актуальна</span>
                </label>
            </div>
         </div>
    
        
    
    
    
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Картинка</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="file" name="img_path" value="" >
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


