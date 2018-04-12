
<form method="POST" action="<?= base_url('user/add'); ?>" autocomplete="off">
  <div class="form-group">
    <label for="">Name</label>
    <input name="name" type="text" class="form-control" required value=""  placeholder="Enter Name">
  </div>
  <div class="form-group">
    <label for="">Lastname</label>
    <input name="lastname" class="form-control" required placeholder="Enter Lastname">
  </div>
  <div class="form-group">
    <label for="">Username</label>
    <input name="username" class="form-control" required autocomplete="off" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="">Email address</label>
    <input name="email" type="email" class="form-control"  placeholder="Enter Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" autocomplete="off" required class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="<?=base_url('user/index') ?>" class="btn btn-warning">Cancel</a>

</form>
