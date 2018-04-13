<div class="container">
  <div class="row">
    <div class="col-md-5">
      <form method="POST" action="<?= base_url('bus/update'); ?>" autocomplete="off">
        <div class="form-group">
          <label for="">Driver</label>
          <input name="driver" type="text" class="form-control" required value="<?=$busData->driver?>"  placeholder="Enter Driver">
          <input name="id" type="hidden" value="<?=$busData->id?>"
        </div>
        <div class="form-group">
          <label for="">Model</label>
          <input name="model" class="form-control" required value="<?=$busData->model?>" placeholder="Enter Model">
        </div>
        <div class="form-group">
          <label for="">License</label>
          <input name="license" class="form-control" required value="<?=$busData->license?>" autocomplete="off" placeholder="Enter License">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="<?=base_url('bus/index') ?>" class="btn btn-warning">Cancel</a>
      </form>
    </div>
  </div>
</div>
