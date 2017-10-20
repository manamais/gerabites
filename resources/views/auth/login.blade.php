
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-tap-highlight" content="no" />


        <!-- Chrome, Firefox OS and Opera -->
        <meta name="theme-color" content="#49CEFF">
        <!-- Windows Phone -->
        <meta name="msapplication-navbutton-color" content="#49CEFF" />
        <!-- iOS Safari -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

        <title>Pacificonis - Login</title>
        <link rel="stylesheet" href="assets/restrito/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/restrito/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="assets/restrito/bower_components/animate.css/animate.min.css">
        <link rel="stylesheet" href="assets/restrito/bower_components/metisMenu/dist/metisMenu.min.css">
        <link rel="stylesheet" href="assets/restrito/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
        <link rel="stylesheet" href="assets/restrito/bower_components/Waves/dist/waves.min.css">
        <link rel="stylesheet" href="assets/restrito/bower_components/toastr/toastr.css">
        <link rel="stylesheet" href="assets/restrito/css/style.css">
        <!--[if lt IE 9]>
          <script src="bower_components/html5shiv/dist/html5shiv.min,js"></script>
          <script src="bower_components/respondJs/dest/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="user-page">
        <div class="wrapper warning-bg">
            <div class="table-wrapper text-center">
                <div class="table-row">
                    <div class="table-cell">
                        <div class="login">
                            <h4 class="text-center">Login to continue</h4>
                            <form method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}
                                <div class="{{ $errors->has('email') ? ' has-error' : '' }}">




                                    <div>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="email" />
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <hr/>

                                <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div>
                                        <input id="password" type="password" class="form-control" name="password" required  placeholder="password"/>
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <hr/>

                                <div class="form-group">
                                    <div >
                                        <button type="submit" class="btn btn-primary">
                                            Login
                                        </button>
                                        <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                            <!--Forgot Your Password?-->
                                            Esqueceu a senha?
                                        </a>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script src="assets/restrito/bower_components/jquery/dist/jquery.min.js"></script>
        <script>
$('#preloader').height($(window).height() + "px");
$(window).on('load', function() {
    setTimeout(function() {
        $('body').css("overflow-y", "visible");
        $('#preloader').fadeOut(400);
    }, 800);
});
        </script>

    </body>
</html>
