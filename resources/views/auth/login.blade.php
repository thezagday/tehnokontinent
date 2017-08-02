<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Scroll Media</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" href="{{asset('favicon-32x32.png')}}" sizes="32x32">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="{{asset('css/vendor.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/elephant.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/application.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/profile.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/login-3.min.css')}}">
  </head>
  <body>
    <div class="login">
      <div class="login-body">
        <a class="login-brand" href="" target="">
          <img class="img-responsive" src="{{asset('images/logo.png')}}" alt="Elephant">
        </a>
        <h3 class="login-heading">Вход в систему</h3>
        <div class="login-form">
            <form data-toggle="md-validator" method="post" action="{{ route('login') }}" role="form">
            {{ csrf_field() }}

            <div class="md-form-group md-label-floating ">
                <input class="md-form-control " type="text" name="email" spellcheck="false" autocomplete="off" data-msg-required="Please enter your email address."  value="{{ old('email') }}">
               
                <label class="md-control-label">Логин </label>
            </div>
            
            
            <div class="md-form-group md-label-floating ">
                <input class="md-form-control" type="password" name="password" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
                            
                <label class="md-control-label">Пароль</label>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block" id="input_btn">Войти</button>
          </form>
        </div>
      </div>
    </div>
    <script src="{{asset('js/vendor.min.js')}}"></script>
    <script src="{{asset('js/elephant.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  </body>
</html>



