<?php
    require_once('../Main/credential.php');
    require_once("../Main/Database.php");

    $Insert_Record = new Database(HOST, USER, DB_PASS, DB);
    //$Insert_Record = new Database('127.0.0.1','root','','hospital management system');

    //Check whether all fields are duly filled or not.
    if (!empty($_POST['name']) && !empty($_POST['dis']) && !empty($_POST['for']) && !empty($_POST['img'])) {

        $HospitalName = $_POST['name'];
        $District = $_POST['dis'];
        $Information = $_POST['for'];
        $HospitalImage = $_POST['img'];

        // Check whether the hospital name is duplicated or not.
        $duplicate_times = $Insert_Record -> duplicate_hospital ($HospitalName);
        if($duplicate_times > 0) {
            require_once('duplicate_hospital.html');
        }
        else {
            // Add new hospital to the system.
            $add_Record = $Insert_Record -> insert_hospital ($HospitalName, $District, $Information, $HospitalImage);
            if($add_Record) {
                require_once('add_success.html');
            }
            else {
                echo "<script>alert('New Hospital is not added to the system.');</script>";
            }
        }
    }

    else{
        require_once('fields_require.html');  

    }

 ?>