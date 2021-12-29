<?php
    require_once('../Main/credential.php');
    require_once("../Main/Database.php");

    $Insert_Facility = new Database(HOST, USER, DB_PASS, DB);
    //$Insert_Facility = new Database('127.0.0.1','root','','hospital management system');

    //Check whether all fields are duly filled or not.
    if (!empty($_POST['fac']) && !empty($_POST['start-time']) && !empty($_POST['end-time'])) {

        $FacilityName = $_POST['fac'];
        $StartTime = $_POST['start-time'];
        $EndTime = $_POST['end-time'];

        $data = $Insert_Facility -> fetch_facilityID ($FacilityName);
        while($facility_IDs = mysqli_fetch_row($data)){
            foreach ($facility_IDs as $facility_ID){
                $duplicate_times = $Insert_Facility -> duplicate_facility ($FacilityName);
                if($duplicate_times > 0) {
                    require_once("duplicate_facility.html");
                }
                else {
                    $add_Facility = $Insert_Facility -> insert_facility ($Facility_ID, $StartTime, $EndTime);
                    if($add_Facility) {
                        echo "<script>alert('New Facility is added to the Hospital.');</script>";
                        require_once("update_hos_details.php");
                    }
                    else {
                        echo "<script>alert('New Facility is not added to the Hospital.');</script>";
                    }
                }
            }
        }
    }
    else{
        echo "<script>alert('All fields required to be filled.');</script>";
        require_once("facilities_page.php");
    }

 ?>