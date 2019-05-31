<div class="row">
  <div class="col-md-10 col-lg-10">
    <h1>New Customer</h1>
  </div>
  <div class="col-md-2 col-lg-2">
    <a href="<?php echo site_url('welcome/index'); ?>" class="btn btn-success">Go Back</a>
  </div>
</div>
<br/>

<?php echo validation_errors(); ?>

<div class="row">
  <div class="col-md-6 col-lg-6">
    <?php echo form_open('welcome/create'); ?>
      <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" name="first_name" placeholder="First Name">
      </div>
      <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" name="last_name" placeholder="Last Name">
      </div>
      <div class="form-group">
        <label for="designation">Designation</label>
          <select class="custom-select mr-sm-2" name="designation">
            <option value="0" selected>Choose...</option>
            <option value="Developer">Developer</option>
            <option value="Designer">Designer</option>
            <option value="DBA">DBA</option>
          </select>
      </div>
      <div class="form-group">
        <label for="lastName">City</label>
        <input type="text" class="form-control" name="city" placeholder="City">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    <?php echo form_close(); ?>
  </div>
</div>