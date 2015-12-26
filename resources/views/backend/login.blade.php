<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>{{ helper()->appName }} | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ helper()->adminLte() }}bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ helper()->adminLte() }}dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{ helper()->adminLte() }}plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    <link href="{{ helper()->assetUrl() }}oblagio/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css" />
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html">Login <b>{{ helper()->appName }}</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        {!! Form::open() !!}
          <div class="form-group has-feedback">
            {!! Form::text('username' , null , ['class' => 'form-control' , 'placeholder' => 'USERNAME']) !!}
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            {!! Form::password('password'  , ['class' => 'form-control' , 'placeholder' => 'PASSWORD']) !!}
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        {!! Form::close() !!}
        <p>&nbsp;</p>
        <a style="cursor:pointer;" onclick="forgotPassword()">I forgot my password</a><br>
        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="{{ helper()->adminLte() }}plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ helper()->adminLte() }}bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{{ helper()->adminLte() }}plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script src="{{ helper()->assetUrl() }}oblagio/js/app.js" type="text/javascript"></script>
    <script src="{{ helper()->assetUrl() }}oblagio/sweetalert/dist/sweetalert.min.js" type="text/javascript"></script>



     {!! helper()->flashSuccess() !!}
     {!! helper()->flashError() !!}
     {!! helper()->flashInfo() !!}

    <script type="text/javascript">
     
      function urlAction(url)
      {
        return '{{ helper()->urlAction() }}/' + url;
      }

      function url(urls)
      {
        return '{{ url() }}' + urls;
      }
     
    </script>
    <script type="text/javascript">
    function forgotPassword()

      {
        swal({
            title: "Forgot Password",
            text: "Insert Your Email:",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: "E-MAIL"
          },
          function(inputValue){
            if (inputValue === false) return false;
            
            if (inputValue === "") {
              swal.showInputError("You need to write email!");
              return false
            }else{
              $.ajax({
                type : 'get',
                url : url('/forgot-password'),
                data :{
                  email : inputValue,
                },
                success : function(data)
                {
                  if(data.result == 'not_found')
                  {
                    swal('Email not Found!');
                  }else{
                    swal('Success' , 'The new password has been sent to your email' , 'success');
                  }
                }
               });
            }
            
            
          });
      }
    </script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>