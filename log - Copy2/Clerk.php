<?php
$password = "Vinono18";
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$special = preg_match('/[#$@!%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/',  $password);

if(!$special||!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
  echo "can't accept  $password <br>";
}else{
  header("location:login.html");
  //echo "password Accepted<br>";
}
$email = "abc123@sdsd.com"; 
//$email = "abc@sdsd.com";
$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
if (preg_match($regex, $email)) {
 echo $email . " is a valid email.<br> We can accept it.";
} else { 
 echo $email . " is an invalid email.<br> Please try again.";
}           

abstract class Clerk{
    private $name;
    private $Email;
    private $password;

    private static $Admin;
    //private $ID;

    private final function __construct() {
      echo __CLASS__ . " initialize only once ";
    }
    public static function getConnect() {
      if (!isset(self::$Admin)) {
          self::$Admin = new Clerk();
      }
       
      return self::$Admin;
  }
    public function setDetails($name, $E , $P) {
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

//$clerktest = new Clerk("vinojith","vino@17","fuck_u");

/*
private static $obj;
                 
private final function __construct() {
    echo __CLASS__ . " initialize only once ";
}
 
public static function getConnect() {
    if (!isset(self::$obj)) {
        self::$obj = new DataBaseConnector();
    }
     
    return self::$obj;
}
}*/
?>