<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Origin City</th>
      <th scope="col">Destination City</th>
      <th scope="col">Bus</th>
      <th scope="col">Price</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($routesData as $key => $route){ ?>
        <tr>
          <td><?=$route->name ?></td>
          <td><?=$route->city_origin ?></td>
          <td><?=$route->city_destiny ?></td>
          <td><?=$route->license ?></td>
          <td><?= number_format($route->value, 0, '.', '.'); ?></td>
          <td class="actions">
              <a href="<?=base_url('route/update').'/'.$route->id ?>" class="btn btn-warning">Update</a>
              <a href="<?=base_url('route/delete').'/'.$route->id ?>" class="btn btn-danger">Delete</a>
          </td>
        </tr>
      <?php } ?>
  </tbody>
</table>
<a href="<?=base_url('route/add') ?>" class="btn btn-success">Add</a>

<style>
  .table {
    text-align: center;
  }
</style>
