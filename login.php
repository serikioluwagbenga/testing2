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
                <h3>Login.</h3>
            </div>
            <div class="card-body">
                <?php
                if (isset($_POST['login'])) {
                    $auth->login();
                }
                ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password *</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="*******">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Login" name="login">
                    <p>Don't have an account? <a href="register.php">Create Account</p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>