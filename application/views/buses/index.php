<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Driver</th>
      <th scope="col">Model</th>
      <th scope="col">License</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($busesData as $key => $bus){ ?>
        <tr>
          <td><?=$bus->driver ?></td>
          <td><?=$bus->model ?></td>
          <td><?=$bus->license ?></td>
          <td class="actions">
              <a href="<?=base_url('bus/update').'/'.$bus->id ?>" class="btn btn-warning">Update</a>
              <a href="<?=base_url('bus/delete').'/'.$bus->id ?>" class="btn btn-danger">Delete</a>
          </td>
        </tr>
      <?php } ?>
  </tbody>
</table>
<a href="<?=base_url('bus/add') ?>" class="btn btn-success">Add</a>

<style>
  .table {
    text-align: center;
  }
</style>
