<?php

function massDataUpload(){
    include('../config/config.php');
    session_start();
    $conn = $con;
    $uploadFile = $_FILES['uploadFile']['tmp_name'];
    // echo $uploadFile;
    require 'Classes/PHPExcel.php';
    require_once 'Classes/PHPExcel/IOFactory.php';
    $objExcel = PHPExcel_IOFactory::load($uploadFile);
    foreach($objExcel->getWorksheetIterator() as $worksheet){
        $highestRow = $worksheet->getHighestRow();
        for($row=2; $row<=$highestRow; $row++){
            $batch = $worksheet->getCellByColumnAndRow(0,$row)->getValue();
            $registerNumber = $worksheet->getCellByColumnAndRow(1,$row)->getValue();
            $firstName = strtoupper($worksheet->getCellByColumnAndRow(2,$row)->getValue());
            $middleName = strtoupper($worksheet->getCellByColumnAndRow(3,$row)->getValue());
            $lastName = strtoupper($worksheet->getCellByColumnAndRow(4,$row)->getValue());
            $department = strtoupper($worksheet->getCellByColumnAndRow(5,$row)->getValue());
            $branch = $worksheet->getCellByColumnAndRow(6,$row)->getValue();
            $phoneNumber = $worksheet->getCellByColumnAndRow(7,$row)->getValue();
            $alternateNumber = $worksheet->getCellByColumnAndRow(8,$row)->getValue();
            $parentNumber = $worksheet->getCellByColumnAndRow(9,$row)->getValue();
            $officialMail = $worksheet->getCellByColumnAndRow(10,$row)->getValue();
            $personalMail = $worksheet->getCellByColumnAndRow(11,$row)->getValue();
            $address = $worksheet->getCellByColumnAndRow(12,$row)->getValue();
            $pincode = $worksheet->getCellByColumnAndRow(13,$row)->getValue();
            $sslc = $worksheet->getCellByColumnAndRow(14,$row)->getValue();
            $hsc = $worksheet->getCellByColumnAndRow(15,$row)->getValue();
            $cgpa = $worksheet->getCellByColumnAndRow(16,$row)->getValue();
            $hoa = $worksheet->getCellByColumnAndRow(17,$row)->getValue();
            $query = "INSERT INTO STUDENT_DETAILS VALUES ('$batch','$registerNumber','$firstName','$middleName','$lastName','$department','$branch','$phoneNumber','$alternateNumber','$parentNumber','$officialMail','$personalMail','$address','$pincode','$sslc','$hsc','$cgpa','$hoa')";
            if (!mysqli_query($conn, $query)) {
              echo "alert('Error At Row $row <br>')";
            }
        }
        echo "alert('UPLOAD SUCCESSFULL')";
    }
}

?>

<html>
    <head>
        <title>Mass Data Upload</title>
        <link href="../Css/massupload.css" rel="stylesheet" type="text/css" />
    </head>
    <body>

        <div id="totalcontent">
            <div id="boxofmass">
                <img src="../Assets/Images/banner00.jpg" width="600px" height="350px"><br>

                <h1>
                    SRIT DATA UPLOAD
                </h1>

                <h3>
                  WELCOME TO THE SRIT DATA UPLOAD PORTAL
                </h3>
                <p>Upload the file in XLSX Format</p><br>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="file" name="uploadFile" required/>
                    <input  id="submit"  type="submit" >
            </div>
        </div>
        <script type="text/javascript">
            <?php
                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    massDataUpload();
                }
            ?>
        </script>
    </body>
</html>