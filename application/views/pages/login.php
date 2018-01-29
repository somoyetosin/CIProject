<div class="container">
	<!-- Flash message -->
	  <?php if($this->session->flashdata('user_registered')): ?>
	    <?php echo '<p class="alert alert-success">'. $this->session->flashdata('user_registered') .'</p>'; ?>
	  <?php endif; ?>

	  <?php if($this->session->flashdata('loginfailed')): ?>
	    <?php echo '<p class="alert alert-danger">'. $this->session->flashdata('loginfailed') .'</p>'; ?>
	  <?php endif; ?>

	  <?php if($this->session->flashdata('user_logout')): ?>
	    <?php echo '<p class="alert alert-danger">'. $this->session->flashdata('user_logout') .'</p>'; ?>
	  <?php endif; ?>
	  
	<div class="panel panel-success ">
		<div class="panel-heading "><i class="fa fa-lock pull-left"></i><b><?= $title ?></b></div>
		<div class="panel-body">
			<?php echo validation_errors(); ?>
			<?php echo form_open('users/login'); ?>
				<div class="form-group">
					<label form="element-1">Email:</label>
					<input type="text" id="element-1" name="email" class="form-control" placeholder="Enter Email" value="<?php echo set_value('email'); ?>" autofocus>
				</div>
				<div class="form-group">
					<label form="element-2">Password:</label>
					<input type="password" id="element-2" name="password" class="form-control" placeholder="Enter Password">
				</div>
				<input type="submit" class="btn btn-success" value="Login" name="#">
			<?php echo form_close(); ?>
		</div>
		<div class="panel-footer">Contact Administrator for Login Details</div>
	</div>
</div>