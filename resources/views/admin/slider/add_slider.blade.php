@extends('admin')  
@section('content')
<div class="layout-content">
    <div class="layout-content-body">
        <h1 class="title-bar-title">Редактирование раздела "Слайдер"</h1>
        <p class="title-bar-description">Тут вы можете добавить информацию в раздел "Слайдер"</p>
        <div class="row">
            <div class="col-md-8">
                <div class="demo-form-wrapper">
                    <form action="add_slider" method="post" class="form form-horizontal" enctype="multipart/form-data">
                    {{csrf_field()}}

                      <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-control-1">Картинка</label>
                        <div class="col-sm-9">
                          <input id="form-control-1" class="form-control" type="file" name="img_path" value="" >
                        </div>
                      </div>


                     <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-control-1">Заголовок</label>
                        <div class="col-sm-9">
                            <input id="form-control-1" class="form-control" type="text" name="title" value="" >
                        </div>
                     </div>

                     <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-control-1">Текст</label>
                        <div class="col-sm-9">
                            <input id="form-control-1" class="form-control" type="text" name="body" value="" >
                        </div>
                     </div>


                    <div class="form-group">
                      <label class="col-sm-3 control-label" for="form-control-1">Цена</label>
                      <div class="col-sm-9">
                          <input id="form-control-1" class="form-control" type="text" name="price" value="" >
                      </div>
                    </div>
                
                    <div class="form-group">
                      <label class="col-sm-3 control-label" for="form-control-1">Акция</label>
                      <div class="col-sm-9">
                          <input id="form-control-1" class="form-control" type="text" name="share" value="" >
                      </div>
                    </div>  




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
@stop
