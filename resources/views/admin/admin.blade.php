@extends('admin')  
@section('content')
   <div class="layout-content">
    <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">Административная панель</span>
              <span class="d-ib">
                <a class="title-bar-shortcut" href="#" title="" data-container="body" data-toggle-text="Remove from shortcut list" data-trigger="hover" data-placement="right" data-toggle="tooltip" data-original-title="Add to shortcut list">
                  <span class="sr-only">Add to shortcut list</span>
                </a>
              </span>
            </h1>
          </div>
           <div class="row">
            <div class="col-xs-12">
              <p class="lead">Административная панель предназначена для редактирования контента на сайте.Слева Вы можете выбрать раздел, который необходимо изменить.</p>
            </div>
          </div>         

        <div class="col-md-6 col-md-offset-3 m-b-lg">
              <h1>Admin,
                <small>добро пожаловать !</small>
              </h1>
              <hr>
              <h2>
                <small>Начните свою работу с выбора раздела, который необходимо отредактировать.</small>
                <small>Каждый пункт меню соответствует определенному разделу на сайте.</small>
                <small>Чтобы выйти из административной панели, кликните на "Выйти" в верхней части панели.</small>
              </h2>

        </div>
    </div>
</div>
@stop

