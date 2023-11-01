<?php require_once "include/header.php";
$cats = $t->get_cat_list();
if(isset($_POST['add_todo']) && isset($_GET['catID']))  {
    $t->add_todo(htmlspecialchars($_GET['catID']));
}
?>
<div class="col-md-12 row">
    <?php
    if ($cats->rowCount() == 0) {
        echo "NO category yet";
    } else {
        
        foreach ($cats as $cat) {
            $t->display_list($cat);
        }
    }   ?>
    <!-- second one -->



</div>

<?php require_once "include/footer.php"; ?>