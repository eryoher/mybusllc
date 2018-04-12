<form method="POST" action="<?= base_url('user/update'); ?>">
  <div class="form-group">
    <label for="">Name</label>
    <input name="name" type="text" class="form-control" value="<?=$userData->name?>"  placeholder="Enter Name">
    <input name="id" type="hidden" value="<?=$userData->id?>"
  </div>
  <div class="form-group">
    <label for="">Lastname</label>
    <input name="lastname" class="form-control" value="<?=$userData->lastname?>"  placeholder="Enter Lastname">
  </div>
  <div class="form-group">
    <label for="">Username</label>
    <input name="username" class="form-control" value="<?=$userData->username?>"  placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="">Email address</label>
    <input name="email" type="email" class="form-control" value="<?=$userData->email?>"  placeholder="Enter Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" value="<?=$userData->password?>" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
  <a href="<?=base_url('user/index') ?>" class="btn btn-warning">Cancel</a>
</form>
