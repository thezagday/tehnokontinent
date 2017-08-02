@extends('admin')  
@section('content')
    <div class="layout-content">
    <div class="layout-content-body">
        <h1 class="title-bar-title">Редактирование "{{strip_tags($item_shares->title)}}"</h1>
        <p class="title-bar-description">Тут вы можете отредактировать преимущество "{{strip_tags($item_shares->title)}}"</p>
        <div class="row">
            <div class="col-md-8">
                <div class="demo-form-wrapper">
    <form action="update_item_shares" method="post" class="form form-horizontal" enctype="multipart/form-data">
    <p>
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$item_shares->id}}"/>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Заголовок</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="title" value="{{$item_shares->title}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Предварительный текст</label>
            <div class="col-sm-9">
                <textarea id="form-control-1" class="form-control" name="short_body" rows="5">{{$item_shares->short_body}}</textarea>
            </div>
         </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Текст</label>
            <div class="col-sm-9">
                <textarea id="form-control-1" class="form-control" name="body" rows="55">{{$item_shares->body}}</textarea>
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Цена</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="price" value="{{$item_shares->price}}" >
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Актуальность</label>
            <div class="col-sm-9">
                <label class="custom-control custom-control-primary custom-checkbox">
                    @if ($item_shares->relevance == 1)
                    <input class="custom-control-input" type="checkbox" name="relevance" checked="checked" value="1">
                    @else
                    <input class="custom-control-input" type="checkbox" name="relevance"  value="1">
                    @endif
                    <!-- если актуально , то передает 1 , если не актуально, то передает NULL -->
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-label">Акция актуальна</span>
                </label>
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Картинка</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="img_path" value="{{$item_shares->img_path}}" >
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

