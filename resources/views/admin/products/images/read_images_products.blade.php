@extends('admin')  
@section('content')
<div class="layout-content">
    <div class="layout-content-body">
        <h1 class="title-bar-title">Редактирование раздела "Картинки" для товара</h1>
        <p class="title-bar-description">Тут вы можете отредактировать картинки товара </p>
        <div class="row">
            <div class="col-md-8">
                <div class="demo-form-wrapper">
                    <form action="add_images_products" method="post" class="form form-horizontal" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="parent" value="{{$parent}}"/>
                        <input type="hidden" name="parprod" value="{{$parprod}}"/>
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
                                        <a href="delete_images_products?id={{$image->id}}&parent={{$parent}}">
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
                            <label class="col-sm-3 control-label" for="form-control-1"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn-primary">Сохранить</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-1"></label>
                            <div class="col-sm-9">
                                <input type="button" class="btn-primary" id="input_btn" value="Назад к продукту" onClick='location.href="edit_item_product?id={{$parent}}&parent={{$parprod}}"'>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@stop



