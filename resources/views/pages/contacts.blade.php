@extends('index')  
@section('content')
@include('_common._banner')
    <div class="container-fluid">
    <div class="row breadcrumb-wrapper">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li>
                    <a href="/">Главная</a>
                </li>
                <li class="active">Контакты</li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid page-content company">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-uppercase">Контакты</h1>
            <div class="row">
                <div class="col-sm-6">
                    <ul class="contacts-list">
                        <li><span class="fa fa-phone"></span>{!!$contacts[0]->phone_mts!!}<br>{!!$contacts[0]->phone_velcome!!}<br>{!!$contacts[0]->phone!!}</li>
                        <li><span class="fa fa-map-marker"></span>{!!$contacts[0]->address!!}</li>
                        <li><span class="fa fa-clock-o"></span>{!!$contacts[0]->work!!}</li>
                        <li><span class="fa fa-envelope" style="font-size: 1em"></span>{!!$contacts[0]->mail!!}</li>
                    </ul>
                </div>
                <div class="col-sm-6 contact-form">    
                  <p><small>Отправьте нам сообщение, и мы обязательно ответим Вам</small></p>  
                  <form action="message" method="POST" class="form-horizontal form-contacts" role="form">
                  {{csrf_field()}}       
                  <div>           
                      <input type="text" name="name" required="required" pattern="^[А-Яа-яЁё\s]+$" value="" onkeyup="this.setAttribute('value', this.value);">   
                      <label for="">Ваше имя</label>  
                      <div class="clearfix"></div>  
                  </div>              
                  <div>         
                      <input type="text" name="phone" required="required" value="" onkeyup="this.setAttribute('value', this.value);">   
                      <label for="">Номер телефона</label>  
                  </div>       
                  <div>      
                      <textarea name="text" id="" rows="6" required="required" class="form-control" pattern="^[А-Яа-яЁё\s]+$" value="" onkeyup="this.setAttribute('value', this.value);"></textarea>    
                      <label for="">Текст сообщения</label>    
                  </div>          
                  <button type="submit" class="btn btn-warning text-uppercase" style="margin-top: 10px;"><span class="fa fa-envelope btn-icon" style="font-size: 1.1em;margin-right: 5px;"></span>Отправить сообщение</button>   
                  </form> 
                </div>    
            </div>
        </div>
    </div>
</div>
@stop

