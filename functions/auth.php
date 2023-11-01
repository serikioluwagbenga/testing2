<?php 
    class auth extends database {
        function register(){
            // get data from form
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            // check if all is inputed
            if(empty($full_name) || empty($email) || empty($password) || empty($confirm_password)){
                $this->message("Fill all fields");
                return ;
            }
            // validate the data
            if($password !=  $confirm_password) {
                $this->message("Password and confirm password do not match");
                return ;
            }
            $user = $this->db->prepare("SELECT email FROM users WHERE email = ?");
            $user->execute([$email]);
            if($user->rowCount() > 0) {
                $this->message("Email already exists");
                return ;
            }
            // hash password
             $password = password_hash($password, PASSWORD_DEFAULT);
            // insert data into db
            $insert = $this->db->prepare("INSERT INTO users (ID, full_name, email, password) values (?, ?, ?, ?)");
            if($insert->execute([uniqid(), $full_name, $email, $password])){
                $this->message("Account created successfully <a href='login.php'>Login here</a>.", "success");
            }else{
                $this->message("Something went wrong.");
            }
        }

        function login() {
            // get data from form
            $email = $_POST['email'];
            $password = $_POST['password'];
            // check data
            if(empty($email) || empty($password)){
                $this->message("Fill all fileds");
                return ;
            }
            // check if email exit
            $user = $this->db->prepare("SELECT ID, email, password FROM users WHERE email = ?");
            $user->execute([$email]);
            if($user->rowCount() == 0) {
                $this->message("This email do not exists");
                return ;
            }
            $info = $user->fetch(PDO::FETCH_ASSOC);
            // check passeword 
            if(!password_verify($password, $info["password"])){
                $this->message("Wrong password");
                return ;
            }
            // create session for user
            $_SESSION['userSession'] = $info['ID'];
            // redirect to index page
           $this->loadpage("index.php");
        }


    }