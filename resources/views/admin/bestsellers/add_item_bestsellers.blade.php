@extends('admin')  
@section('content')
  <div class="layout-content">
    <div class="layout-content-body">
        <h1 class="title-bar-title">Добавьте продукт </h1>
        <p class="title-bar-description">Тут вы можете добавить товар в раздел "Хиты продаж"</p>
        <div class="row">
            <div class="col-md-8">
                <div class="demo-form-wrapper">
                    <form action="add_item_bestsellers" method="post" class="form form-horizontal">
                    {{csrf_field()}}
                    @if (count ($products))
                        <ul class="mail-list">
                            
                            @foreach ($products as $item)
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
                    @else
                    <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-1"></label>
                            <div class="col-sm-9">
                                <input type="button" class="btn-primary" id="input_btn" value="Назад" onClick='location.href="read_bestsellers"'>
                            </div>
                        </div>
                    @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

