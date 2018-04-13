<?php echo validation_errors('<div class="ml-3 col-md-6 alert alert-danger">', '</div>'); ?>
<div class="container">
  <div class="row">
    <div class="col-md-5">
      <form method="POST" action="<?= base_url('route/add'); ?>" autocomplete="off">
        <div class="form-group">
          <label for="">Name</label>
          <input name="name" type="text" class="form-control" required value=""  placeholder="Name">
        </div>
        <div class="form-group">
          <label for="">Bus</label>
          <?=form_dropdown('bus_id', $buses, [],["class"=>"form-control", 'required' => 'required']);?>
        </div>
        <div class="form-group">
          <label for="">Origin City</label>
          <input name="city_origin" class="form-control" required autocomplete="off" placeholder="Origin">
        </div>
        <div class="form-group">
          <label for="">Destiny City</label>
          <input name="city_destiny" class="form-control" required autocomplete="off" placeholder="Destiny" />
        </div>
        <div class="form-group">
          <label for="">Price</label>
          <input name="value" class="form-control" required autocomplete="off" placeholder="Price"  />
        </div>
        <div class="form-group mt-3">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="<?=base_url('route/index') ?>" class="btn btn-warning">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
