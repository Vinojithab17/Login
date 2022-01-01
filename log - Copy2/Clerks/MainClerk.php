<?php
require 'Clerk.php';

class MainClerk extends Clerk{

    private $page = "<div class=\"banner\">
    <header><button class=\"log-out\" onclick=\"window.location.href='../User_Login/login.html';\">Log out</button></header>
  </div>

  <div class=\"container\">
    <button class=\"option\" onclick=\"window.location.href='../Add_Hospital/add_hos.html';\">Add new Hospital</button>
    <button class=\"option\" onclick=\"window.location.href='../Delete_Hospital/del_hos.php';\">Delete existing Hospital</button>
    <button class=\"option\" onclick=\"window.location.href='../Update_Hospital/update_hos_details.php';\">Update hospital Details</button>
    <button class=\"option\" onclick=\"window.location.href='../Add_Vaccination/add_vac.html';\">Add new vaccination center</button>
    <button class=\"option\">Remove vaccination center</button>
  </div>";
    
    public function get_Page(){
        return $this -> page;
        //header("location:login.html");
        //header("location:../Admin_Home/admin_home.html");

    }


}
//$clerktest = new MainClerk("vinojith","vino@17","u");
//$clerktest = new MainClerk()
//$clerktest->setDetails("vinojith","vino@17","u");
?>