<?php   

//use MainClerk as GlobalMainClerk;
abstract class Clerk{
  private $name;
  private $Email;
  private $password;
  private $ID;
  private $role;
  

  public function __construct($name, $E , $P, $ID, $role) {
    //echo __CLASS__ . " initialize only once ";
      $this->name = $name;
      $this->Email = $E;
      $this->password = $P;
      $this->role = $role;
      $this->ID = $ID;
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

    public function get_ID() {
      return $this->ID;
    }
    public function get_Role() {
      return $this->role;
    }


    public abstract function get_Page();


}

?>