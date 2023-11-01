<?php
require_once "include/header.php";
?>
<div class="col-md-12">
    <div class="card px-3">
        <div class="card-body">
            <h2 class="card-title">Add Category</h2>
            <?php 
              if(isset($_POST['add_cat'])){
                $t->add_cat();
              }
            ?>
            <form class="add-items d-flex" method="POST">
                <input type="text" class="form-control" name="name_cat" placeholder="Name of category">
                <input class="add btn btn-primary font-weight-bold" name="add_cat" type="submit" value="ADD">
            </form>
        </div>
    </div>
</div>
<?php
require_once "include/footer.php";
?>