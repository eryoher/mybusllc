<div class="container">
  <div class="row">
    <div class="col-md-5">
      <form method="POST" action="<?= base_url('route/update'); ?>" autocomplete="off">
        <div class="form-group">
          <label for="">Name</label>
          <input name="name" type="text" class="form-control" required value="<?=$routeData->name?>"  placeholder="Enter Name" />
          <input name="id" type="hidden" value="<?=$routeData->id?>" />
        </div>
        <div class="form-group">
          <label for="">Bus</label>
          <?=form_dropdown('bus_id', $buses, [$routeData->bus_id],["class"=>"form-control", 'required' => 'required']);?>
        </div>
        <div class="form-group">
          <label for="">Origin City</label>
          <input name="city_origin" class="form-control" value="<?=$routeData->city_origin?>" required autocomplete="off" placeholder="Origin">
        </div>
        <div class="form-group">
          <label for="">Destiny City</label>
          <input name="city_destiny" class="form-control" value="<?=$routeData->city_destiny?>" required autocomplete="off" placeholder="Destiny"
        </div>
        <div class="form-group">
          <label for="">Price</label>
          <input name="value" class="form-control" value="<?=$routeData->value?>" required autocomplete="off" placeholder="Price" />
        </div>
        <div class="form-group mt-3">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="<?=base_url('route/index') ?>" class="btn btn-warning">Cancel</a>
        </div>

      </form>
    </div>
  </div>
</div>
