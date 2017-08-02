@extends('admin')  
@section('content')
    <div class="layout-content">
    <div class="layout-content-body">
        <h1 class="title-bar-title">Редактирование "{{$item_catalogs->title}}"</h1>
        <p class="title-bar-description">Тут вы можете отредактировать пункт каталога "{{$item_catalogs->title}}"</p>
        <div class="row">
            <div class="col-md-8">
                <div class="demo-form-wrapper">
    <form action="update_item_catalogs" method="post" class="form form-horizontal" enctype="multipart/form-data">
    <p>
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$item_catalogs->id}}"/>
        
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Заголовок</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="title" value="{{$item_catalogs->title}}">
            </div>
        </div>
    
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Картинка по умолчанию</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="default_img" value="{{$item_catalogs->default_img}}">
                <input type="file" name="default_img">
            </div>
        </div>
    
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Родительская категория</label>
            <div class="col-sm-9">
              @if ($parent_catalog==null)
                <select id="form-control-6" class="form-control" name="parent">
                    <option value="null" selected>Без родителя</option>
                        @foreach ($catalogs as $catalog)
                            <option value="{{$catalog->id}}">{{$catalog->title}}</option>
                       @endforeach
                </select>
              @else
                <select id="form-control-6" class="form-control" name="parent">
                    <option value="{{$parent_catalog->id}}" selected>{{$parent_catalog->title}}</option>
                        @foreach ($catalogs as $catalog)
                            <option value="{{$catalog->id}}">{{$catalog->title}}</option>
                        @endforeach
                            <option value="null">Без родителя</option>
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

