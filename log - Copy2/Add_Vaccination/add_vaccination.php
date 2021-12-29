<?php
    require_once('../Main/credential.php');
    require_once("../Main/Database.php");

    $Insert_Record = new Database(HOST, USER, DB_PASS, DB);
    //$Insert_Record = new Database('127.0.0.1','root','','hospital management system');

    //Check whether all fields are duly filled or not.
    if (!empty($_POST['name']) && !empty($_POST['lat']) && !empty($_POST['lon']) && !empty($_POST['for'])) {

        $VaccinationCenterName = $_POST['name'];
        $Latitude = $_POST['lat'];
        $Longitude = $_POST['lon'];
        $Information = $_POST['for'];

        // Check whether the vaccination center name is duplicated or not.
        $duplicate_times = $Insert_Record -> duplicate_vaccination_center ($VaccinationCenterName);
        if($duplicate_times > 0) {
            require_once('duplicate_vaccination_center.html');
        }
        else {
            // Add new vaccination center to the system.
            $add_Record = $Insert_Record -> insert_vaccination_center ($VaccinationCenterName, $Latitude, $Longitude, $Information);
            if($add_Record) {
                require_once('add_success_vaccination_center.html');
            }
            else {
                echo "<script>alert('New Vaccination Center is not added to the system.');</script>";
            }
        }
    }

    else{
        require_once('fields_require_vaccination_center.html');
    }

 ?>