<?php

require 'validate.php';
class MailValidator{
    public function validate_Me($email){

        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
        if (preg_match($regex, $email)) {
            echo "<script>alert('Invalid Email!!!!');</script>";
        } else { 
            return true;
        } 

    }
}




?>