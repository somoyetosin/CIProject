<div class="container">
  <div class="panel panel-success ">
    <div class="panel-heading "><i class="fa fa-lock pull-left"></i><b><?= $title ?></b></div>
    <div class="panel-body">
      <?php echo validation_errors(); ?>
      <?php echo form_open('users/register'); ?>
        <div class="form-group">
          <label form="element-1">Name:</label>
          <input type="text" id="element-1" name="name" class="form-control" placeholder="Enter Full Name" value="<?php echo set_value('name'); ?>">
        </div>
        <div class="form-group">
          <label form="element-1">Email:</label>
          <input type="text" id="element-1" name="email" class="form-control" placeholder="Enter Email" value="<?php echo set_value('email'); ?>">
        </div>
        <div class="form-group">
          <label form="element-2">Password:</label>
          <input type="password" id="element-2" name="password" class="form-control" placeholder="Enter Password" value="<?php echo set_value('password'); ?>">
        </div>
        <div class="form-group">
          <label form="element-2">Confirm Password:</label>
          <input type="password" id="element-2" name="confirm_password" class="form-control" placeholder="Confirm Password" value="<?php echo set_value('confirm_password'); ?>">
        </div>
        <input type="submit" class="btn btn-success" value="Register">
      <?php echo form_close(); ?>
    </div>
    <div class="panel-footer">Contact Administrator for help</div>
  </div>
</div>