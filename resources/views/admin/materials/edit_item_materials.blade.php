@extends('admin')  
@section('content')
    <div class="layout-content">
    <div class="layout-content-body">
        <h1 class="title-bar-title">Редактирование "{{$item_materials->title}}"</h1>
        <p class="title-bar-description">Тут вы можете отредактировать пункт каталога "{{$item_materials->title}}" Пользуйтесь html-тегами для форматного вывода.</p>
        <div class="row">
            <div class="col-md-8">
                <div class="demo-form-wrapper">
    <form action="update_item_materials" method="post" class="form form-horizontal" enctype="multipart/form-data">
    <p>
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$item_materials->id}}"/>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Заголовок</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="title" value="{{$item_materials->title}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Предварительный текст</label>
            <div class="col-sm-9">
                <textarea id="form-control-1" class="form-control" name="short_body" rows="25">{{$item_materials->short_body}}</textarea>
            </div>
        </div>



        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Картинки</label>
            <div class="col-sm-9"> 
                <ul class="file-list">
                @foreach ($images as $image)
                    <li class="file">
                        <a class="file-link" href="{{$image->img_path}}" title="{{$image->img_path}}" download="{{$image->img_path}}">
                            <div class="file-thumbnail" style="background-image: url({{$image->img_path}})"></div>
                            <div class="file-info">
                                <span class="file-ext"></span>
                                <span class="file-name"></span>
                            </div>
                        </a>
                        <a href="delete_images_material_company?id={{$image->id}}">
                            <span class="icon icon-remove"> Удалить</span>
                        </a>
                    </li>
                @endforeach
                </ul>
                <label class="drive-uploader-btn btn btn-primary">
                    <input class="drive-uploader-input" type="file" name="img_path">
                </label>
            </div>
        </div>



         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Текст</label>
            <div class="col-sm-9">
                <textarea id="form-control-1" class="form-control" name="body" rows="55">{{$item_materials->body}}</textarea>
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



