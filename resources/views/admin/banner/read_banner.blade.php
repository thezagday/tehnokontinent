@extends('admin')  

@section('content')

    <div class="layout-content">

    <div class="layout-content-body">

        <h1 class="title-bar-title">Редактирование баннера</h1>

        <p class="title-bar-description">Тут вы можете отредактировать баннер</p>

        <div class="row">

            <div class="col-md-8">

                <div class="demo-form-wrapper">



                    <form action="update_banner" method="post" class="form form-horizontal" enctype="multipart/form-data">

                    

                    {{ csrf_field() }}

                    <div class="form-group">

                       <label class="col-sm-3 control-label" for="form-control-1">Заголовок</label>

                       <div class="col-sm-9">

                        <input id="form-control-1" class="form-control" type="text" name="title" value="{!!$banner[0]->title!!}">

                       </div>

                    </div>

                    

                     <div class="form-group">

                       <label class="col-sm-3 control-label" for="form-control-1">Текст</label>

                       <div class="col-sm-9">

                        <input id="form-control-1" class="form-control" type="text" name="body" value="{!!$banner[0]->body!!}">

                       </div>

                    </div>

                    

                    <div class="form-group">

                       <label class="col-sm-3 control-label" for="form-control-1">Картинка</label>

                       <div class="col-sm-9">

                        <input id="form-control-1" class="form-control" type="text" name="img_path" value="{!!$banner[0]->img_path!!}">
                        <input type="file" name="img_path">

                       </div>

                    </div>


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



