<!DOCTYPE html>
<html lang="en">
<?php 
    require_once "include/ini.php";
    require_once "include/head.php";
    require_once "functions/auth.php";
    $auth = new auth;
?>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h3>Create Account.</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <?php 
                       if(isset($_POST['register'])) {
                            $auth->register();
                       }
                    ?>
                    <div class="form-group">
                        <label for="full_name">full Name *</label>
                        <input type="text" name="full_name" id="full_name" class="form-control"  placeholder="John Smith">
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" name="email" id="email" class="form-control"  placeholder="email@holder.ex">
                    </div>
                    <div class="form-group">
                        <label for="password">Password *</label>
                        <input type="password" name="password" id="password" class="form-control"  placeholder="****">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confrim Password *</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control"  placeholder="****">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Register" name="register">
                    <p>Aleady have an accoount? <a href="login.php">Login</p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>