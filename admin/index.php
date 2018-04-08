<!DOCTYPE html>
  <head>
        <meta charset="utf-8">

        <title>Login - Dance Studio Focus Admin Panel</title>


        <link rel="stylesheet" href="admin/css/bootstrap.min.css">
        <link rel="stylesheet" href="admin/css/plugins.css">
        <link rel="stylesheet" href="admin/css/main.css">
        <script src="admin/js/vendor/modernizr-3.3.1.min.js"></script>
    </head>
    <body>
        <div id="login-container">
            <img src="admin/img/logo.png" alt="logo">
            <h1 class="h2 text-light text-center push-top-bottom animation-pullDown">
                 <strong>Dance Studio Focus</strong>
            </h1>

            <div class="block animation-fadeInQuick">
                <div class="block-title">
                    <h2>Please Login</h2>
                </div>

                <form id="form-login" action="admin/clients" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label for="login" class="col-xs-12">Login</label>
                        <div class="col-xs-12">
                            <input type="text" id="login" name="login" class="form-control" placeholder="Your login..">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="login-password" class="col-xs-12">Password</label>
                        <div class="col-xs-12">
                            <input type="password" id="login-password" name="login-password" class="form-control" placeholder="Your password..">
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-8">
                            <label class="csscheckbox csscheckbox-primary">
                                <input type="checkbox" id="login-remember-me" name="login-remember-me"><span></span> Remember Me?
                            </label>
                        </div>
                        <div class="col-xs-4 text-right">
                            <button type="submit" class="btn btn-effect-ripple btn-sm btn-success">Log In</button>
                        </div>
                    </div>
                </form>

            </div>
            <footer class="text-muted text-center animation-pullUp">
                <small><span id="year-copy"></span> &copy; <a href="http://goo.gl/RcsdAh" target="_blank" style="color: #fff">Focus</a></small>
            </footer>
        </div>

        <script src="admin/js/vendor/jquery-2.2.4.min.js"></script>
        <script src="admin/js/vendor/bootstrap.min.js"></script>
        <script src="admin/js/plugins.js"></script>
        <script src="admin/js/app.js"></script>
        <script src="js/pages/readyLogin.js"></script>
        <script>$(function(){ ReadyLogin.init(); });</script>
    </body>
</html>
