<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login form shake effect</title>


  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="{!! asset('css/welcome.css') !!}">


</head>

<body>
  <form method="post" action="{{ route('login') }}" class="login-form">
      {{ csrf_field() }}
      <h1>Logo</h1>
     <div class="form-group ">
       <input type="text" class="form-control" placeholder="Usuario" id="username" name="username">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
       <input type="password" class="form-control" placeholder="Constraseña" id="password" name="password">
       <i class="fa fa-lock"></i>
     </div>
     <span class="alert">Credenciales inválidas</span>
     <button type="submit" class="log-btn" >Entrar</button>


   </form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>
</html>
