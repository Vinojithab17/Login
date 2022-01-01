<?php
require 'validate.php';
class Password_validater{
    public function validate_Me($password){
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $special = preg_match('/[#$@!%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/',  $password);


        if(strlen($password) < 8){
            echo "<script>alert('Too Small!!!!');</script>";
        }elseif(!$uppercase){
            echo "<script>alert('Must contain an Uppercase!!!');</script>";
        }elseif(!$lowercase){
            echo "<script>alert('Must contain an lowercase!!!');</script>";
        }elseif(!$number){
            echo "<script>alert('Must contain a number!!!');</script>";
        }elseif(!$special){
            echo "<script>alert('Must contain a Special character!!!');</script>";
        }else{return true;}
    }
}

?>