@extends('admin')  
@section('content')
    <div class="layout-content">
    <div class="layout-content-body">
        <h1 class="title-bar-title">Редактирование информации в модальных окнах</h1>
        <p class="title-bar-description">Тут вы можете отредактировать информацию, которая распологается в модальных окнах</p>
        <div class="row">
            <div class="col-md-8">
                <div class="demo-form-wrapper">

                    <form action="update_modals" method="post" class="form form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                       <label class="col-sm-3 control-label" for="form-control-1">Партнерам</label>
                       <div class="col-sm-9">
                           <textarea id="form-control-1" class="form-control" name="partners" rows="15">{!!$modals[0]->partners!!}</textarea>
                       </div>
                    </div>
                    
                     <div class="form-group">
                       <label class="col-sm-3 control-label" for="form-control-1">Оплата</label>
                       <div class="col-sm-9">
                           <textarea id="form-control-1" class="form-control" name="payment" rows="15">{!!$modals[0]->payment!!}</textarea>
                       </div>
                    </div>
                    
                     <div class="form-group">
                       <label class="col-sm-3 control-label" for="form-control-1">Доставка</label>
                       <div class="col-sm-9">
                           <textarea id="form-control-1" class="form-control" name="leave" rows="15">{!!$modals[0]->leave!!}</textarea>
                       </div>
                    </div>
                    
                     <div class="form-group">
                       <label class="col-sm-3 control-label" for="form-control-1">Купить</label>
                       <div class="col-sm-9">
                           <textarea id="form-control-1" class="form-control" name="buy" rows="15">{!!$modals[0]->buy!!}</textarea>
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

