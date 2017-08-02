@extends('admin')  
@section('content')
<div class="layout-content">
    <div class="layout-content-body">
        <h1 class="title-bar-title">Редактирование раздела "Сертификаты" товара</h1>
        <p class="title-bar-description">Тут вы можете отредактировать сертификаты товара </p>
        <div class="row">
            <div class="col-md-8">
                <div class="demo-form-wrapper">
                    <form action="" method="" class="form form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" name="parent" value="{{$parent}}">
                        <input type="hidden" name="parprod" value="{{$parprod}}"/>
                        @foreach ($certificates as $item)
                        <p>
                            <input type="hidden" name="id" value="{{$item->id}}" disabled=""/>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1"></label>
                                <div class="col-sm-9">
                                    <div class="list-group">
                                        <a class="list-group-item" href="edit_item_certificates_products?id={{$item->id}}&parent={{$parent}}">
                                            <div class="media">
                                                <div class="media-middle media-body">
                                                    <h5 class="media-heading">{{$item->title}}</h5>
                                                </div>
                                                <div class="media-middle media-right">
                                                    <span class="icon icon-pencil"></span>
                                                </div>
                                            </div>
                                        </a>
                                         <a class="list-group-item" href="delete_certificates_products?id={{$item->id}}&parent={{$parent}}">
                                            <div class="media">
                                                <div class="media-middle media-body">
                                                    <h5 class="media-heading"><small>Удалить</small></h5>
                                                </div>
                                                <div class="media-middle media-right">
                                                    <span class="icon icon-remove"></span>
                                                </div>
                                            </div>
                                        </a>
                                    </div> 
                                </div>
                            </div>
                           
                        </p>
                    @endforeach
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-1"></label>
                            <div class="col-sm-9">
                                <input type="button" class="btn-primary" id="input_btn" value="Добавить" onClick='location.href="add_item_certificates_products?parent={{$parent}}"'>
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

