<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>admin home</title>
    <link rel="stylesheet" href="./admin_home_style.css" />
  </head>
<body>

<?php 

$username = $_POST['username'];
$pass = $_POST['pass_w'];

echo $username;
echo " - ";
echo $pass;
echo "<br>";
//----------------------------
abstract class Clerk{
    private $name;
    private $Email;
    private $password;
    //private $ID;


    function __construct($name, $E , $P) {
        $this->name = $name;
        $this->Email = $E;
        $this->password = $P;
        echo "clerk constructed";
        echo "<br>";
       // $this->ID = $id;
      }
      public function get_name() {
        return $this->name;
      }
      public function get_Email() {
        return $this->Email;
      }
      public function get_Password() {
        return $this->password;
      }
     /* public function get_ID() {
        return $this->ID;
      }*/

      public abstract function get_Page();

}



//----------------------------
class MainClerk extends Clerk{

    private $page = "<div class=\"banner\">
    <header><button class=\"log-out\" onclick=\"window.location.href='login.html';\">Log out</button></header>
  </div>

  <div class=\"container\">
    <button class=\"option\" onclick=\"window.location.href='Add_Hospital/add_hos.html';\">Add new Hospital</button>
    <button class=\"option\" onclick=\"window.location.href='Delete_Hospital/del_hos.php';\">Delete existing Hospital</button>
    <button class=\"option\" onclick=\"window.location.href='Update_Hospital/update_hos_details.php';\">Update hospital Details</button>
    <button class=\"option\" onclick=\"window.location.href='Add_Vaccination/add_vac.html';\">Add new vaccination center</button>
    <button class=\"option\">Remove vaccination center</button>
  </div>";
    
    public function get_Page(){
        echo "<br>";
        echo "returns page";

        return $this ->page;


    }
}
$clerktest = new MainClerk("vinojith","vino@17","fuck_u");
//----------------------------
class Logger{
    private $Admin;

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
        }else{
            echo "wrong username or password";
        }
  
    }
     
}

$clerktest = new MainClerk("vinojith","vino@17","fuck_u");
$logger = new Logger($username);
$logger->validate_User($pass);
echo "<script>alert('sucessfully!!!');</script>";

?>

</body>
</html>