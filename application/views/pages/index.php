<div class="row">
	<div class="col-md-10 col-lg-10">
		<h1>Customers</h1>
	</div>
	<div class="col-md-2 col-lg-2">
		<a href="<?php echo site_url('welcome/new'); ?>" class="btn btn-success">New Customer</a>
	</div>
</div>

<br/>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Designation</th>
      <th scope="col">City</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if(!empty($items)): ?>
      <?php foreach($items as $key => $item): ?>
        <tr>
          <th scope="row"><?php echo ($key+1); ?></th>
          <td><?php echo $item['first_name']; ?></td>
          <td><?php echo $item['last_name']; ?></td>
          <td><?php echo $item['designation']; ?></td>
          <td><?php echo $item['city']; ?></td>
          <td>
            <a href="<?php echo site_url('welcome/edit/'); ?><?php echo getId($item['_id']); ?>" class="btn btn-primary">Edit</a>
            <a href="<?php echo site_url().'/welcome/delete/'; ?><?php echo getId($item['_id']); ?>" class="btn btn-danger">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>