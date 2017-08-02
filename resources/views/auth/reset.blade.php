@extends('admin')  
@section('content')
 <div class="layout-content">
    <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">Cброс пароля</span>
              <span class="d-ib">
                <a class="title-bar-shortcut" href="#" title="" data-container="body" data-toggle-text="Remove from shortcut list" data-trigger="hover" data-placement="right" data-toggle="tooltip" data-original-title="Add to shortcut list">
                  <span class="sr-only">Add to shortcut list</span>
                </a>
              </span>
            </h1>
          </div>
           <div class="row">
            <div class="col-xs-12">
              <p class="lead">Тут вы можете поменять свой старый пароль</p>
            </div>
          </div>         
        
        <div class="col-md-6 col-md-offset-3 m-b-lg">
            @if (isset($message))
                {{$message}}
            @endif
            <form data-toggle="md-validator" method="post" action="reset" role="form">
            {{ csrf_field() }}

            <div class="md-form-group md-label-floating ">
                <input class="md-form-control" type="password" name="old" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
                            
                <label class="md-control-label">Старый пароль</label>
            </div>
            
            
            <div class="md-form-group md-label-floating ">
                <input class="md-form-control" type="password" name="new" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
                            
                <label class="md-control-label">Новый пароль</label>
            </div>
            
            <div class="md-form-group md-label-floating ">
                <input class="md-form-control" type="password" name="confirm" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
                            
                <label class="md-control-label">Подтверждение новго пароля</label>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block" id="input_btn">Изменить</button>
          </form>

        </div>
    </div>
</div>
@stop

