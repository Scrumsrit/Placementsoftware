<?php
    include('../config/config.php');
    session_start();
    $conn = $con;
    function studentForm(){
        global $conn;
        $batch = $_POST["batch"];
        $registerNumber = $_POST["registerNumber"];
        $firstName = $_POST["firstName"];
        $middleName = $_POST["middleName"];
        if(strlen($middleName)<1){
            $middleName = " ";
        }
        $lastName = $_POST["lastName"];
        $department = $_POST["department"];
        $branch = $_POST["branch"];
        $phoneNumber = $_POST["phoneNumber"];
        $alternateNumber = $_POST["alternateNumber"];
        if(strlen($alternateNumber)<1){
            $alternateNumber = " ";
        }
        $parentNumber = $_POST["parentNumber"];
        $officialMail = $_POST["officialMail"];
        $personalMail = $_POST["personalMail"];
        $address = $_POST["address"];
        $pincode = $_POST["pincode"];
        $sslc = $_POST["sslc"];
        $hsc = $_POST["hsc"];
        $cgpa = $_POST["cgpa"];
        $hoa = $_POST["hoa"];
//         $query = "INSERT INTO STUDENT_DETAILS (BATCH, REGISTER_NUMBER, FIRST_NAME, MIDDLE_NAME, LAST_NAME, DEPARTMENT, BRANCH, PHONE_NUMBER, ALTERNATE_NUMBER, PARENT_CONTACT_NUMBER, OFFICIAL_MAILID, PERSONAL_MAILID, ADDRESS, PINCODE, SSLC, HSC, CGPA, HISTORY_OF_ARREARS) VALUES ('$batch','$registerNumber','$firstName','$middleName','$lastName','$department','$branch','$phoneNumber','$alternateNumber','$parentNumber','$officialMail','$personalMail','$address','$pincode','$sslc','$hsc','$cgpa','$hoa')";
        $query = "INSERT INTO STUDENT_DETAILS VALUES ('$batch','$registerNumber','$firstName','$middleName','$lastName','$department','$branch','$phoneNumber','$alternateNumber','$parentNumber','$officialMail','$personalMail','$address','$pincode','$sslc','$hsc','$cgpa','$hoa')";
        if (mysqli_query($conn, $query)) {
          echo "alert('New record created successfully')";
//         } else {
//           echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation Form</title>
    <link rel="stylesheet" href="../Css/style.css">
</head>
<body>
    <div id="titlebar"><center>Student's Entry Form </center></div>
    <form action="" method="POST">
        <fieldset>
            <legend>Students Details </legend>
            <label>Batch</label>
            <select name="batch">
                <option>2021</option>
                <option>2022</option>
                <option>2023</option>
                <option>2024</option>
                <option>2025</option>
                <option>2026</option>
            </select><br>

            <label>Register Number</label>
            <input name="registerNumber" type="number" placeholder=" x x x x x x x" required/><br>
            <label>First Name </label>
            <input name="firstName" type="text" placeholder="FIRSTNAME" style="text-transform:uppercase" required/><br>
            <label>Middle Name</label>
            <input name="middleName" type="text" placeholder="MIDDLENAME" style="text-transform:uppercase"/><br><br>
            <label>Last Name</label>
            <input name="lastName" type="text" placeholder="LASTTNAME" style="text-transform:uppercase" required/><br>
            <label>Department</label>
            <select name="department">
                <option>CIVIL</option>
                <option>CSE</option>
                <option>ECE</option>
                <option>EEE</option>
                <option>MECH</option>
                <option>IT</option>
            </select><br>
            <label>Branch</label>
            <select name="branch">
                <option> B.E</option>
                <option value="B.TECH">B.TECH</option>
            </select>            
            

        </fieldset>
        <fieldset>
            <legend> Personal Details</legend>
            <div id="personflex">
            <label>Phone Number</label>
            <input name="phoneNumber" type="number" placeholder="X X X X X X X X X X" required><br>
            <label>Alternate Number</label>
            <input name="alternateNumber" type="number" value="-" placeholder="X X X X X X X X X X"><br>
            <label>Parent's Number</label>
            <input name="parentNumber" type="number" placeholder="X X X X X X X X X X" required><br>
            <label>Official Mail</label>
            <input name="officialMail" type="email" placeholder="abc@srit.org" required><br>
            <label>Personal Mail</label>
            <input name="personalMail" type="email" placeholder="abc@gmail.com" required><br>
            <label>Address</label>
            <textarea name="address" placeholder="Enter the Address" required></textarea><br>
            <label>Pincode</label>
            <input name="pincode" type="number" placeholder=" 6 - - - - - " required><br>
            </div>
        </fieldset>
        <fieldset>
            <legend>Education Details</legend>
            <label>SSLC</label>
            <input name="sslc" type="number" placeholder="In Percentage" required><br>
            <label>HSC</label>
            <input name="hsc" type="number"  placeholder="In Percentage" required><br>
            <label>CGPA</label>
            <input name="cgpa" type="number"  placeholder="In Percentage" required><br>
            <label>History of Arrear</label>
            <input name="hoa" type="number" placeholder="eg:- 2 " required><br>
            
        </fieldset>
        <button class="btn1" onclick="">Submit</button>
        <button class="btn2" type="reset">Reset</button>
    </form>
    <script>
        <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            studentForm();
        }
        ?>
    </script>
</body>
</html>