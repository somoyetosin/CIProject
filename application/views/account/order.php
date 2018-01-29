<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header"><?= $title ?></h1>

      <div class="col-md-4">
      <?php echo validation_errors(); ?>
      <?php echo form_open('account/create'); ?>
        <div class="form-group">
          <label>Name:</label>
          <input type="text" id="element-1" name="name" class="form-control" placeholder="Enter Name" value="<?php echo set_value('name'); ?>" autofocus>
        </div>
        <div class="form-group">
          <label>Number:</label>
          <input type="text" id="element-1" name="number" class="form-control" placeholder="Enter Number" value="<?php echo set_value('number'); ?>">
        </div>
        <input type="submit" class="btn btn-success" value="Order">
      <?php echo form_close(); ?>
    </div>
    

</div>