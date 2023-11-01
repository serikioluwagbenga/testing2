<?php
class database {
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "todo";
    protected $db;
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch (PDOException $e) {
            // echo "Connection failed: " . $e->getMessage();
        }
    }

    function message($message, $type = "danger") {
        echo "<p class='text-$type'>$message</p>";
    }

    function loadpage($url) {
        echo '<script>window.location.href = "'.$url.'";</script>';
    }

    function get_user() {
        if(isset($_SESSION['userSession'])) {
            return htmlspecialchars($_SESSION['userSession']);
        }

        return null;
    }
}



