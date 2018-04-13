<div class="container">
  <div class="row">
    <div class="col-md-4">
      <form method="POST" action="<?= base_url('route/search'); ?>" autocomplete="off">
        <div class="form-group">
          <label for="">Origin City</label>
          <?=form_dropdown('origin', $origins, [],["class"=>"form-control", 'required' => 'required']);?>
        </div>
        <div class="form-group">
          <label for="">Destination City</label>
          <?=form_dropdown('destiny', $destination, [],["class"=>"form-control", 'required' => 'required']);?>
        </div>
        <div class="form-group mt-3">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
  <?php if (isset($routesData)) : ?>

    <table class="table table-responsive-md">
      <thead class="thead-dark ">
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Origin City</th>
          <th scope="col">Destination City</th>
          <th scope="col">Bus</th>
          <th scope="col">Price</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $total = 0;
          if( !empty($routesData) && count($routesData) > 1){
            foreach ($routesData as $key => $route){
               $origin = ( $key - 1 > 0 ) ? $routesData[$key-1]['node'] : $routesData[0];
               if(is_array($route)) : $total = $total + $route['price']; ?>
                <tr>
                  <td><?=$route['name']?></td>
                  <td><?=$origin ?></td>
                  <td><?=$route['node'] ?></td>
                  <td><?=$route['bus'] ?></td>
                  <td><?=number_format($route['price'], 0, '.', '.'); ?></td>
                </tr>
            <?php endif; ?>
          <?php } ?>
          <tr class="table-dark">
            <td colspan="3">
            </td>
            <td colspan="1" class="text-left font-weight-bold">
              Total
            </td>
            <td colspan="1" class="text-left">
              <?=number_format($total, 0, '.', '.');?>
            </td>
          </tr>
          <?php  }else{ ?>
            <tr class="text-center font-weight-bold table-danger">
              <td colspan="5" >
                There are no trips with this route
              </td>
            </tr>
          <?php } ?>
      </tbody>
    </table>
  <?php endif ; ?>
</div>
