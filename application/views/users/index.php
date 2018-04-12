<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Names</th>
      <th scope="col">Lastname</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($usersData as $key => $user){ ?>
        <tr>
          <td><?=$user->name ?></td>
          <td><?=$user->lastname ?></td>
          <td><?=$user->username ?></td>
          <td><?=$user->email ?></td>
          <td class="actions">
              <a href="<?=base_url('user/update').'/'.$user->id ?>" class="btn btn-warning">Update</a>
              <a href="<?=base_url('user/delete').'/'.$user->id ?>" class="btn btn-danger">Delete</a>
          </td>
        </tr>
      <?php } ?>
  </tbody>
</table>
<a href="<?=base_url('user/add') ?>" class="btn btn-success">Add</a>

<style>
  .table {
    text-align: center;
  }
</style>
