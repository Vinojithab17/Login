<?php

//use MainClerk as GlobalMainClerk;
class Clerk{
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
      echo "<br>";
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

    public function get_Page(){}

}
class MainClerk extends Clerk{

    private $page = "<div class=\"banner\">
    <header><button class=\"log-out\">Log out</button></header>
  </div>

  <div class=\"container\">
    <button class=\"option\" onclick=\"window.location.href='../Add_Hospital/add_hos.html';\">Add new Hospital</button>
    <button class=\"option\" onclick=\"window.location.href='../Delete_Hospital/del_hos.php';\">Delete existing Hospital</button>
    <button class=\"option\" onclick=\"window.location.href='../Update_Hospital/update_hos_details.php';\">Update hospital Details</button>
    <button class=\"option\" onclick=\"window.location.href='../Add_Vaccination/add_vac.html';\">Add new vaccination center</button>
    <button class=\"option\">Remove vaccination center</button>
  </div>";
    
    public function get_Page(){
        return $this ->page;


    }
}
//$clerktest = new MainClerk("vinojith","vino@17","u");
$clerktest = MainClerk::getConnect();
$clerktest->setDetails("vinojith","vino@17","u");
?>
