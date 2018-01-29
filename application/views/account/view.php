        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><?= $title ?></h1>

          <div class="container">

            <h5><strong>Name:</strong>   <?php echo $inventory_item['name']; ?></h5> 

            <h6><strong>Number:</strong>   <?php echo $inventory_item['number']; ?></h6>

            <h6><strong>Posted Date:</strong>   <i><?php echo $inventory_item['reg_date']; ?></i></h6>

            <a class="btn btn-primary" href="<?php echo site_url('/account/dashboard'); ?>">Back</a>
            
          </div>
        </div>
      </div>
    </div>


