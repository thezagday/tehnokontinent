@extends('admin')  
@section('content')
<div class="layout-content">
    <div class="layout-content-body">
        <h1 class="title-bar-title">Редактирование раздела "Материалы"</h1>
        <p class="title-bar-description">Тут вы можете отредактировать материалы сайта </p>
        <div class="row">
            <div class="col-md-8">
                <div class="demo-form-wrapper">
                    <form action="" method="post" class="form form-horizontal">
                        @foreach ($materials as $item)
                        <p>
                            <input type="hidden" name="id" value="{{$item->id}}" disabled=""/>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1"></label>
                                <div class="col-sm-9">
                                    <div class="list-group">
                                        <a class="list-group-item" href="edit_item_materials?id={{$item->id}}">
                                            <div class="media">
                                                <div class="media-middle media-body">
                                                    <h5 class="media-heading">{{$item->title}}</h5>
                                                </div>
                                                <div class="media-middle media-right">
                                                    <span class="icon icon-pencil"></span>
                                                </div>
                                            </div>
                                        </a>
                                        </a>
                                    </div> 
                                </div>
                            </div>
                           
                        </p>
                    @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop