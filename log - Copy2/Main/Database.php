<?php

class Database {

    private mysqli $db;
    private string $host;
    private string $user;
    private string $password;
    private string $database;

    // Create new Database Connection.
    function __construct(string $host, string $user, string $password, string $database)
    {
        $this->host = $host;
        $this->user = $user;
        $this->database = $database;
        $this->password = $password;
        $this->db = new mysqli($host, $user, $password, $database);
        if(mysqli_connect_errno()) {
            echo "<h1>ERROR</h2>";
            exit;
        }
    }


    // Function to add new hospital to the system.
    public function insert_hospital ($HospitalName, $District, $Information, $HospitalImage) { 
        $record = mysqli_query($this->db, "Insert into hospitals(HospitalName,District,Information,HospitalImage)
        values('$HospitalName', '$District', '$Information', '$HospitalImage')");
        return $record;
    }

    // Function to add new facility to the specific hospital.
    public function insert_facility ($FacilityID, $StartTime, $EndTime) { 
        $record = mysqli_query($this->db, "Insert into facilitymanager(FacilityID, StartTime, EndTime)
        values('$FacilityID', '$StartTime', '$EndTime')");
        return $record;
    }

    // Function to add new vaccination center to the system.
    public function insert_vaccination_center ($VaccinationCenterName, $Latitude, $Longitude, $Information) { 
        $record = mysqli_query($this->db, "Insert into vaccinationCenters(VaccinationCenterName, Latitude, Longitude, Information)
        values('$VaccinationCenterName', '$Latitude', '$Longitude', '$Information')");
        return $record;
    }



    // Function to check newly added hospital is duplicated or not.
    public function duplicate_hospital ($HospitalName){
        $duplicate = mysqli_query($this->db, "select * from hospitals where HospitalName ='$HospitalName'");
        return (mysqli_num_rows($duplicate));
    }

    // Function to check newly added facility is duplicated or not.
    public function duplicate_facility ($FacilityName){
        $duplicate = mysqli_query($this->db, "select * from facilitymanager where FacilityName ='$FacilityName'");
        return (mysqli_num_rows($duplicate));
    }

    // Function to check newly added vaccination center is duplicated or not.
    public function duplicate_vaccination_center ($VaccinationCenterName){
        $duplicate = mysqli_query($this->db, "select * from vaccinationCenters where VaccinationCenterName ='$VaccinationCenterName'");
        return (mysqli_num_rows($duplicate));
    }


    // Function to retrieve hospital names from the database.
    public function fetch_hospital () { 
        $records = mysqli_query($this->db,"select HospitalName from hospitals");
        return $records;
    }

    /* public function fetch_facility ($HospitalID) { 
        $records = mysqli_query($this->db,"select FacilityID, StartTime, EndTime from facilitymanager where FacilityID = $HospitalID");
        return $records;
    } */

    // Function to retrieve facility details of particular hospital from the database.
    public function fetch_facility () { 
        $records = mysqli_query($this->db,"select FacilityID, StartTime, EndTime from facilitymanager");
        return $records;
    }

    // Function to retrieve facility names from the database using facility ID.
    public function fetch_facilityName ($FacilityID) { 
        $facilityName = mysqli_query($this->db,"select FacilityName from facilities where FacilityID = $FacilityID");
        return $facilityName;
    }

    // Function to retrieve facility ID from the database using facility name.
    public function fetch_facilityID ($FacilityName) { 
        $FacilityID = mysqli_query($this->db,"select FacilityID from facilities where FacilityName = $FacilityName");
        return $FacilityID;
    }
    
}

?>