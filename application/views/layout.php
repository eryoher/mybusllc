<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="icon" href="<?=base_url()?>/bus.png" type="image/png">
</head>
<title>MYBUS LLC</title>
<body>
  <div class="" >
    <div class="container col-md-10 col-md-offset-1 mt-3">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?=base_url('route/search')?>">Select your trip </a>
            </li>
            <?php if($this->session->userdata('username')): ?>
              <li class="nav-item active">
                <a class="nav-link" href="<?=base_url('user/index')?>">Users </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('bus/index')?>">Buses</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('route/index')?>">Routes</a>
              </li>
            <?php endif; ?>
          </ul>
          <span class="navbar-text">
           <?php
               if(!$this->session->userdata('username')){
                 echo "<a href=".base_url('user/login') ." class=\"\">Login</a>";
               }else{
                 echo "<a href=".base_url('user/logout') ." class=\"\">Logout</a>";
               }
            ?>
          </span>
        </div>
      </nav>
      <div class="row mt-3">
        <div class="col-md-12">
          <?php
            $this->load->view($view);
          ?>
        </div>
      </div>
    </div>
  </div>
  <footer>  </footer>
</body>
</html>
