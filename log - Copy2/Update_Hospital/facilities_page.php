<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilities</title>
    <link rel="stylesheet" href="facilities_page.css">
</head>
<body>
    
    <div class="Hospital-Name">Hospital Name</div>
    <div class="container">
    
    
    <!-- 3 sample faclilities. use loop and take from db -->
    <!--
    <div class="facility">
        <div class="facility-box"> 
            <h3 class="facility-heading">X-Ray</h3>
                    <div class="time-box">
                         <div class="start-time">
                            <h4>Start time</h4>
                            <div class="time">08:00</div>
                        </div>

                        <div class="end-time">
                            <h4>End time</h4>
                            <div class="time">10:00</div>
                        </div>
                    </div>
        </div>
         <div class="del"> 
                <img class="close" src="del.jpeg" >
        </div>
    </div>
    
    <div class="facility">
        <div class="facility-box"> 
            <h3 class="facility-heading">MRI-Scan</h3>
                    <div class="time-box">
                         <div class="start-time">
                            <h4>Start time</h4>
                            <div class="time">09:00</div>
                        </div>

                        <div class="end-time">
                            <h4>End time</h4>
                            <div class="time">11:00</div>
                        </div>
                    </div>
        </div>
         <div class="del"> 
                <img class="close" src="del.jpeg" >
        </div>
    </div>
   
    <div class="facility">
        <div class="facility-box"> 
            <h3 class="facility-heading">Dialysis</h3>
                    <div class="time-box">
                         <div class="start-time">
                            <h4>Start time</h4>
                            <div class="time">08:01</div>
                        </div>

                        <div class="end-time">
                            <h4>End time</h4>
                            <div class="time">10:30</div>
                        </div>
                    </div>
        </div>
         <div class="del"> 
                <img class="close" src="del.jpeg" >
        </div>
    </div>
    -->

    <?php
        require_once('../Main/credential.php');
        require_once ("../Main/Database.php");

        //$fetch_Record = new Database('127.0.0.1','root','','hospital management system');
        $fetch_Record = new Database(HOST, USER, DB_PASS, DB);
        $records = $fetch_Record -> fetch_facility ();

        /* $HospitalName = $_POST['HospitalName'];
        echo ".$HospitalName";
        $record = $fetch_Record -> fetch_hospitalID ($HospitalName);
        while($HospitalIDs = mysqli_fetch_row($record)){
            foreach ($HospitalIDs as $HospitalID){
                $records = $fetch_Record -> fetch_facility ($HospitalID);
            }
        }*/

        while ($facility = $records -> fetch_assoc()) {
    
            $data = $fetch_Record -> fetch_facilityName ($facility["FacilityID"]);
            while($facility_names = mysqli_fetch_row($data)){
                foreach ($facility_names as $facility_name){
                    
                    $div = '<div class="facility">
                                <div class="facility-box"> 
                                    <h3 class="facility-heading">' .$facility_name. '</h3>
                                    <div class="time-box">
                                        <div class="start-time">
                                            <h4>Start time</h4>
                                            <div class="time">' .$facility["StartTime"]. '</div>
                                        </div>
    
                                        <div class="end-time">
                                            <h4>End time</h4>
                                            <div class="time">' .$facility["EndTime"]. '</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="del"> 
                                    <img class="close" src="../Images/del.jpeg" >
                                </div>
                            </div> ';
                    echo $div;
                }
            }
        }
            
    ?>

    
    <!-- Add Facility block -->
    <div class="add-fac">
        +
    </div>
    </div>

    <!-- Form to add faclitiy -->
    <div class="model add-form-model">
        <div class="close-model"></div>
        <form action="add_facility.php" method="POST" class="add-form">
            
            <label for="fac">Facility</label>
            <input type="text" id="fac" name="fac" placeholder="Enter facility name.." required/>
           

            
            <label for="start-time">Start time</label>
            <input type="time" id="start-time" name="start-time"  required/>
            

            
            <label for="end-time">End time</label>
            <input type="time" id="end-time" name="end-time" required/>
            

            <button type="submit" name="add" class="submit add">Submit </button>
      
        </form>
    </div>

    <!-- Form to confirm deletion? -->

    <div class="model confirm-deletion-model">
        <div class="close-model"></div>
        <div class="content">
            <div class="model-heading">Confirm deletion?</div>
            <div class="buttons">
                <button class="button yes-delete"> Yes</button>
                <button class="button no-delete"> No</button>
            </div>
        </div>

    </div>

    <!-- Form to change hospital -->


    <div class="model change-hos-model">
        <div class="close-model"></div>
        <div class="content">
            <div class="model-heading">Want to change hospital?</div>
            <div class="buttons">
                <button class="button yes-change" onclick="window.location.href='update_hos_details.php';"> Yes</button>
                <button class="button no-change" onclick="window.location.href='../Admin_Page/admin_home.html';"> No</button>
            </div>
        </div>

    </div>

    <script src="facilities_page.js"></script>
</body>
</html>