@extends('admin')  

@section('content')

    <div class="layout-content">

    <div class="layout-content-body">

        <h1 class="title-bar-title">Редактирование контактов</h1>

        <p class="title-bar-description">Тут вы можете отредактировать информацию о себе</p>

        <div class="row">

            <div class="col-md-8">

                <div class="demo-form-wrapper">



                    <form action="update_contacts" method="post" class="form form-horizontal">

                    

                    {{ csrf_field() }}

                    <div class="form-group">

                       <label class="col-sm-3 control-label" for="form-control-1">Телефон МТС</label>

                       <div class="col-sm-9">

                        <input id="form-control-1" class="form-control" type="text" name="phone_mts" value="{!!$contacts[0]->phone_mts!!}">

                       </div>

                    </div>

                    

                     <div class="form-group">

                       <label class="col-sm-3 control-label" for="form-control-1">Телефон VELCOM</label>

                       <div class="col-sm-9">

                        <input id="form-control-1" class="form-control" type="text" name="phone_velcome" value="{!!$contacts[0]->phone_velcome!!}">

                       </div>

                    </div>

                    

                    <div class="form-group">

                       <label class="col-sm-3 control-label" for="form-control-1">Городской</label>

                       <div class="col-sm-9">

                        <input id="form-control-1" class="form-control" type="text" name="phone" value="{!!$contacts[0]->phone!!}">

                       </div>

                    </div>

                    

                     <div class="form-group">

                       <label class="col-sm-3 control-label" for="form-control-1">Адрес</label>

                       <div class="col-sm-9">

                        <input id="form-control-1" class="form-control" type="text" name="address" value="{!!$contacts[0]->address!!}">

                       </div>

                    </div>

                    

                     <div class="form-group">

                       <label class="col-sm-3 control-label" for="form-control-1">Время работы</label>

                       <div class="col-sm-9">

                        <input id="form-control-1" class="form-control" type="text" name="work" value="{!!$contacts[0]->work!!}">

                       </div>

                    </div>

                    

                     <div class="form-group">

                       <label class="col-sm-3 control-label" for="form-control-1">Почта</label>

                       <div class="col-sm-9">

                        <input id="form-control-1" class="form-control" type="text" name="mail" value="{!!$contacts[0]->mail!!}">

                       </div>

                    </div>

                     <div class="form-group">
                       <label class="col-sm-3 control-label" for="form-control-1">Ссылка instagram.com</label>
                       <div class="col-sm-9">
                        <input id="form-control-1" class="form-control" type="text" name="inst" value="{!!$contacts[0]->inst!!}">
                       </div>
                    </div>
                    <div class="form-group">
                       <label class="col-sm-3 control-label" for="form-control-1">Ссылка vk.com</label>
                       <div class="col-sm-9">
                        <input id="form-control-1" class="form-control" type="text" name="vk" value="{!!$contacts[0]->vk!!}">
                       </div>
                    </div>
                    <div class="form-group">
                       <label class="col-sm-3 control-label" for="form-control-1">Ссылка facebook.com</label>
                       <div class="col-sm-9">
                        <input id="form-control-1" class="form-control" type="text" name="fb" value="{!!$contacts[0]->fb!!}">
                       </div>
                    </div>

                     <div class="form-group">

                       <label class="col-sm-3 control-label" for="form-control-1">Подвал</label>

                       <div class="col-sm-9">

                        <input id="form-control-1" class="form-control" type="text" name="footer" value="{!!$contacts[0]->footer!!}">

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



