<?php
session_start();
require 'Clerk.php';
require '../Main/credential.php';
require '../Main/Database.php';
class HospitalClerk extends Clerk{
    public  function get_Page(){
        $id  = $this->get_ID() - 1;
        
        $Record = new mysqli(HOST, USER, DB_PASS, DB);
        $saved_data = "SELECT * FROM hospitals WHERE HospitalID =  $id ";
        $result = mysqli_query($Record, $saved_data)
        or die("connection Failed ");

        //data
        $hospital = mysqli_fetch_array($result);
        //echo $hospital['HospitalName'];
        $_SESSION["Hospital_Clerk"] = $hospital['HospitalName'];
        header("location:../Update_Hospital/facilities_page.php");

                
        
    }
}




?>