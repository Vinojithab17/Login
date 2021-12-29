<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Hospital Details</title>
    <link rel="stylesheet" href="../Delete_Hospital/del_hos.css" >
</head>
<body>
    
    <div class="container">
        <input class="search" type="text" placeholder="Search hospital.." />
    <?php

        require_once('../Main/credential.php');
        require_once ("../Main/Database.php");

        //$fetch_Record = new Database('127.0.0.1','root','','hospital management system');
        $fetch_Record = new Database(HOST, USER, DB_PASS, DB);
        $records = $fetch_Record -> fetch_hospital ();

        while ($hospitals = mysqli_fetch_row($records)) {
            foreach ($hospitals as $hospital){
                $div = "<div class=\"hospital\"> 
                            <img src=\"../Images/minus.png\"> 
                            <div class=\"hos-name\">".$hospital.
                            "</div> 
                        </div>";
                echo $div ;
            }
        }
            
    ?>
    </div>
    
    <script src="./update_hos_details_script.js"></script>
</body>
</html>