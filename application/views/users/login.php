<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/css/login.css">
  </head>
  <body>
    <div class="container ">
        <div class="row">
            <div class="container col-md-offset-5 col-md-4">
                <div class="form-login">
                  <h4>Welcome back.</h4>
                  <form method="POST" action="">
                    <input type="text" name="username" id="userName" class="form-control input-sm chat-input" placeholder="username" />
                    </br>
                    <input type="password" name="password"  class="form-control input-sm chat-input" placeholder="password" />
                    </br>
                    <div class="wrapper">
                    <span class="group-btn">
                        <!-- <a href="#" class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></a> -->
                        <input type="submit" value="Login" class="btn btn-primary btn-md" />
                    </span>
                  </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
