@extends('admin')  
@section('content')
    <div class="layout-content">
    <div class="layout-content-body">
        <h1 class="title-bar-title">Редактирование "{{strip_tags($item_product->title)}}"</h1>
        <p class="title-bar-description">Тут вы можете отредактировать новость "{{strip_tags($item_product->title)}}"</p>
        <div class="row">
            <div class="col-md-8">
                <div class="demo-form-wrapper">
    <form action="update_item_product" method="post" class="form form-horizontal" enctype="multipart/form-data">
    <p>
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$item_product->id}}"/>
        <input type="hidden" name="parent" value="{{$item_product->parent}}"/>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Заголовок</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="title" value="{{$item_product->title}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Скидка</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="discount" value="{{$item_product->discount}}" >
            </div>
         </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Новинка ли</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="is_new" value="{{$item_product->is_new}}" >
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Ширина полная, мм</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="width_full" value="{{$item_product->width_full}}" >
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Ширина полезная, мм</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="width_useful" value="{{$item_product->width_useful}}" >
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Шаг волны, мм</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="wave" value="{{$item_product->wave}}" >
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Высота профиля, мм</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="height" value="{{$item_product->height}}" >
            </div>
         </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Цена</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="price" value="{{$item_product->price}}" >
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Картинка по умолчанию</label>
            <div class="col-sm-9">
                <input id="form-control-1" class="form-control" type="text" name="default_img" value="{{$item_product->default_img}}" >
                <input type="file" name="default_img">
            </div>
         </div>
         
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1"></label>
            <div class="col-sm-9">
                <a class="list-group-item" href="read_images_products?parent={{$item_product->id}}&parprod={{$item_product->parent}}">
                    <div class="media">
                        <div class="media-middle media-body">
                            <h5 class="media-heading">Картинки</h5>
                        </div>
                        <div class="media-middle media-right">
                            <span class="icon icon-pencil"></span>
                        </div>
                    </div>
                </a>
            </div>
         </div>
         
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1"></label>
            <div class="col-sm-9">
                <a class="list-group-item" href="read_colors_products?parent={{$item_product->id}}&parprod={{$item_product->parent}}">
                    <div class="media">
                        <div class="media-middle media-body">
                            <h5 class="media-heading">Цвета</h5>
                        </div>
                        <div class="media-middle media-right">
                            <span class="icon icon-pencil"></span>
                        </div>
                    </div>
                </a>
            </div>
         </div>
    
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1"></label>
            <div class="col-sm-9">
                <a class="list-group-item" href="read_descriptions_products?parent={{$item_product->id}}&parprod={{$item_product->parent}}">
                    <div class="media">
                        <div class="media-middle media-body">
                            <h5 class="media-heading">Подробное описание</h5>
                        </div>
                        <div class="media-middle media-right">
                            <span class="icon icon-pencil"></span>
                        </div>
                    </div>
                </a>
            </div>
         </div>
    
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1"></label>
            <div class="col-sm-9">
                <a class="list-group-item" href="read_accessories_products?parent={{$item_product->id}}&parprod={{$item_product->parent}}">
                    <div class="media">
                        <div class="media-middle media-body">
                            <h5 class="media-heading">Аксессуары</h5>
                        </div>
                        <div class="media-middle media-right">
                            <span class="icon icon-pencil"></span>
                        </div>
                    </div>
                </a>
            </div>
         </div>
    
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1"></label>
            <div class="col-sm-9">
                <a class="list-group-item" href="read_instructions_products?parent={{$item_product->id}}&parprod={{$item_product->parent}}">
                    <div class="media">
                        <div class="media-middle media-body">
                            <h5 class="media-heading">Инструкции</h5>
                        </div>
                        <div class="media-middle media-right">
                            <span class="icon icon-pencil"></span>
                        </div>
                    </div>
                </a>
            </div>
         </div>
            
         <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1"></label>
            <div class="col-sm-9">
                <a class="list-group-item" href="read_certificates_products?parent={{$item_product->id}}&parprod={{$item_product->parent}}">
                    <div class="media">
                        <div class="media-middle media-body">
                            <h5 class="media-heading">Сертификаты</h5>
                        </div>
                        <div class="media-middle media-right">
                            <span class="icon icon-pencil"></span>
                        </div>
                    </div>
                </a>
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

