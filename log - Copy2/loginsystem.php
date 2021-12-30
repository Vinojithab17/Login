<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>admin home</title>
    <link rel="stylesheet" href="admin_home_style.css" />
  </head>
<body>

<?php 
require 'MainClerk.php';
$username = $_POST['username'];
$pass = $_POST['pass_w'];

echo $username;
echo " - ";
echo $pass;
echo "<br>";
//----------------------------

class Logger{
    public $Admin;

    public function __construct($username){
        
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "test";
        
        // Create connection
        $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
        
        if (mysqli_connect_error()){
          die('Connect Error ('. mysqli_connect_errno() .') '
            . mysqli_connect_error());
        }
        else{
            $saved_data = "SELECT * FROM register WHERE uname1 = '$username'";
        
        
            //make quary
            $result = mysqli_query($conn, $saved_data)
                        or die("connection Failed ");
        
            
            //data
            $data_list = mysqli_fetch_array($result);
            echo "got details";
            echo "<br>";
            echo $data_list['email'];
            echo "<br>";
            $this->Admin = new MainClerk($data_list["uname1"],$data_list["email"],$data_list["upswd1"]);
            echo "clerk created";
            $conn->close();
        }
    }

    public function validate_User($pass){
        echo "<br>";
        echo "validation on progress";
        echo "<br>";
        if($pass == $this->Admin->get_Password()){
            echo "validated";
            echo $this->Admin->get_Page();
            //header("location:Admin_Home/admin_home.html");
        }else{
            echo "wrong username or password";
        }
  
    }
     
}

$logger = new Logger($username);
$logger->validate_User($pass);
//echo "<script>alert('sucessfully!!!');</script>";

?>

</body>
</html>