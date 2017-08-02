@extends('admin')  
@section('content')
  <div class="layout-content">
    <div class="layout-content-body">
        <h1 class="title-bar-title">Редактирование </h1>
        <p class="title-bar-description">Тут вы можете отредактировать цвета для продукта ""</p>
        <div class="row">
            <div class="col-md-8">
                <div class="demo-form-wrapper">
                    <form action="add_accessories_products" method="post" class="form form-horizontal">            
<ul class="mail-list">
    {{csrf_field()}}
    <input type="hidden" name="parent" value="{{$parent}}">
                @foreach ($accessories as $item)
                <li class="mail-list-item">
                  <label class="mail-list-checkbox custom-control custom-control-primary custom-checkbox">
                      <input class="custom-control-input" type="checkbox" name="ids[]" value="{{$item->id}}">
                    <span class="custom-control-indicator pos-r"></span>
                  </label>
                  <a class="mail-list-link" href="" data-toggle="tab">
                    <div class="mail-list-name">{{$item->title}}</div>
                    <div class="mail-list-content">
                      <span class="mail-list-subject">{{$item->title}}</span>
                    </div>
                  </a>
                </li>
                @endforeach
            </ul>
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
