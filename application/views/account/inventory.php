        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><?= $title ?></h1>
          
          <!-- Flash message -->
          <?php if($this->session->flashdata('invent_insert')): ?>
            <?php echo '<p class="alert alert-success">'. $this->session->flashdata('invent_insert') .'</p>'; ?>
          <?php endif; ?>

          <?php if($this->session->flashdata('invent_delete')): ?>
            <?php echo '<p class="alert alert-success">'. $this->session->flashdata('invent_delete') .'</p>'; ?>
          <?php endif; ?>

          <?php if($this->session->flashdata('invent_update')): ?>
            <?php echo '<p class="alert alert-success">'. $this->session->flashdata('invent_update') .'</p>'; ?>
          <?php endif; ?>

          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Posted Date</th>
                  <th>Name</th>
                  <th>Number</th>
                  <th>View</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php $num = 1; ?>
                <?php foreach($inventory_item as $inv) : ?>
                <tr>
                  <td><?php echo $num++; ?></td>
                  <td><?php echo $inv['reg_date'] ?></td>
                  <td><?php echo $inv['name'] ?></td>
                  <td><?php echo $inv['number'] ?></td>
                  <td>
                    <a class="btn btn-primary" href="<?php echo site_url('/account/view/'.$inv['id']); ?>">View</a>
                  </td>
                  <?php if($this->session->userdata('user_id') == $inv['user_id']): ?>
                    <td>
                      <a class="btn btn-warning" href="<?php echo site_url('/account/edit/'.$inv['id']); ?>">Edit</a>
                    </td>
                    <td>
                      <?php echo form_open('/account/delete/'.$inv['id']); ?>
                        <input type="submit" value="Delete" class="btn btn-danger">
                      <?php echo form_close(); ?>
                    </td>
                  <?php endif;?>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


