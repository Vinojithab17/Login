<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Hospital</title>
    <link rel="stylesheet" href="del_hos.css" >
</head>
<body>
    
    <div class="container">
        <input class="search" type="text" placeholder="Search hospital.." />
    <?php
        require_once('../Main/credential.php');
        require_once("../Main/Database.php");

        //$fetch_Record = new Database('127.0.0.1','root','','hospital management system');
        $fetch_Record = new Database(HOST, USER, DB_PASS, DB);
        $records = $fetch_Record -> fetch_hospital ();

        while ($hospitals = mysqli_fetch_row($records)) {
            foreach ($hospitals as $hospital){
                $div = " <div class=\"hospital\"> <img src=\"../Images/minus.png\"> <div class=\"hos-name\">".$hospital.
                    "</div> </div>";
                echo $div ;
            }
        }
   
    ?>
    </div>
    
    <div class="window">
        <div class="overlay"></div>
        <div class="model">
            <h3>Confirm deletion?</h3>
            <div class="buttons">
                <button class="button"> Yes</button>
                <button class="button"> No</button>
            </div>
        </div>

    </div>
    
    <script src="./del_hos_script.js"></script>
</body>
</html>