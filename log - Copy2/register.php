<?php


require 'Email.php';
require 'Password.php';

$uname1 = $_POST['uname1'];
$email  = $_POST['email'];
$upswd1 = $_POST['upswd1'];
$upswd2 = $_POST['upswd2'];

class Register {
  private  $email_checker;
  private $password_checker;
  public function __construct(){
    $this->email_checker = new MailValidator();
    $this ->password_checker = new Password_validater();
  }
  public function register_Me($uname1,$email,$upswd1,$upswd2){
    if ($upswd1 === $upswd2){
      if($this->email_checker->validate_Me($email) && $this->password_checker->validate_Me($upswd1)){

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
        $SELECT = "SELECT email From register Where email = ? Limit 1";
        $INSERT = "INSERT Into register (uname1 , email ,upswd1, upswd2 )values(?,?,?,?)";

      //Prepare statement
          $stmt = $conn->prepare($SELECT);
          $stmt->bind_param("s", $email);
          $stmt->execute();
          $stmt->bind_result($email);
          $stmt->store_result();
          $rnum = $stmt->num_rows;

          //checking username
            if ($rnum==0) {
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssss", $uname1,$email,$upswd1,$upswd2);
            $stmt->execute();
            echo "<script>alert('New record inserted sucessfully!!!');</script>";
          } else {
            echo "Someone already register using this email";
          }
          $stmt->close();
          $conn->close();
          }
      } else {
      echo "<script>not same password</script>";
      die();
      }

      }
    }
  
}

$register = new Register();
$register->register_Me($uname1,$email,$upswd1,$upswd2);
?>