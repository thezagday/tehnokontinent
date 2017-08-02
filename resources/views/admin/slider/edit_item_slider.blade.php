@extends('admin')  
@section('content')
<div class="layout-content">
    <div class="layout-content-body">
        <h1 class="title-bar-title">Редактирование слайдера</h1>
        <p class="title-bar-description">Тут вы можете отредактировать слайдер</p>
        <div class="row">
            <div class="col-md-8">
                <div class="demo-form-wrapper">
                    <form action="update_item_slider" method="post" class="form form-horizontal" enctype="multipart/form-data">
    <p>
        {{ csrf_field() }} 
        <input type="hidden" name="id" value="{{$item_slider->id}}">
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Картинка</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="img_path" value="{{$item_slider->img_path}}" >
                <input type="file" name="img_path">
            </div>
         </div>   
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Заголовок</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="title" value="{{$item_slider->title}}" >
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Текст</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="body" value="{{$item_slider->body}}" >
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Цена</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="price" value="{{$item_slider->price}}" >
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Акция</label>
            <div class="col-sm-9">
              @if ($share==null)
                <select id="form-control-6" class="form-control" name="share">
                    <option value="null" selected>Без акции</option>
                        @foreach ($shares as $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                        @endforeach
                </select>
              @else
                <select id="form-control-6" class="form-control" name="share">
                    <option selected>{{$share->title}}</option>
                        @foreach ($shares as $item)
                            @if ($item->id != $share->id)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                            @endif
                        @endforeach
                            <option value="null">Без акции</option>
                </select>
              @endif
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


