<?php
    include('config.php');
    session_start();
    $conn = $con;
    if (isset($_POST['search'])) {
        $query = "SELECT * FROM STUDENT_DETAILS WHERE REGISTER_NUMBER='".$_POST["g_regiser_n"]."'";
        $result = mysqli_query($conn, $query);
        while($r = mysqli_fetch_assoc($result)){
            $row = $r;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Details Update</title>
    <link rel="stylesheet" href="../Css/style.css">
</head>
<body>
    <form method="post" action="">
        <label>Register Number</label>
        <input name="g.regiser.n" type="number" placeholder=" x x x x x x x"/><br>
        <button class="btn1" name="search">Submit</button>
    </form>

    <div class="form-results">
        <form action="" method="post">
            <fieldset>
                <legend>Students Details </legend>
                <label>Batch</label>
                <select name="batch">
                    <option <?php echo (isset($row))?($row['BATCH']=='2021'?'selected':''):'';?> >2021</option>
                    <option <?php echo (isset($row))?($row['BATCH']=='2022'?'selected':''):'';?> >2022</option>
                    <option <?php echo (isset($row))?($row['BATCH']=='2023'?'selected':''):'';?> >2023</option>
                    <option <?php echo (isset($row))?($row['BATCH']=='2024'?'selected':''):'';?> >2024</option>
                    <option <?php echo (isset($row))?($row['BATCH']=='2025'?'selected':''):'';?> >2025</option>
                    <option <?php echo (isset($row))?($row['BATCH']=='2026'?'selected':''):'';?> >2026</option>
                </select><br>

                <label>Register Number</label>
                <input name="registerNumber" type="number" placeholder=" x x x x x x x" value="<?php echo (isset($row))?$row['REGISTER_NUMBER']:'';?>" readonly/><br>
                <label>First Name </label>
                <input name="firstName" type="text" placeholder="FIRSTNAME" style="text-transform:uppercase" value="<?php echo (isset($row))?$row['FIRST_NAME']:'';?>" required/><br>
                <label>Middle Name</label>
                <input name="middleName" type="text" placeholder="MIDDLENAME" style="text-transform:uppercase" value="<?php echo (isset($row))?$row['MIDDLE_NAME']:'';?>"/><br><br>
                <label>Last Name</label>
                <input name="lastName" type="text" placeholder="LASTTNAME" style="text-transform:uppercase" value="<?php echo (isset($row))?$row['LAST_NAME']:'';?>" required/><br>
                <label>Department</label>
                <select name="department">
                    <option <?php echo (isset($row))?($row['DEPARTMENT']=='CIVIL'?'selected':''):'';?> >CIVIL</option>
                    <option <?php echo (isset($row))?($row['DEPARTMENT']=='CSE'?'selected':''):'';?> >CSE</option>
                    <option <?php echo (isset($row))?($row['DEPARTMENT']=='ECE'?'selected':''):'';?> >ECE</option>
                    <option <?php echo (isset($row))?($row['DEPARTMENT']=='EEE'?'selected':''):'';?> >EEE</option>
                    <option <?php echo (isset($row))?($row['DEPARTMENT']=='MECH'?'selected':''):'';?> >MECH</option>
                    <option <?php echo (isset($row))?($row['DEPARTMENT']=='IT'?'selected':''):'';?> >IT</option>
                </select><br>
                <label>Branch</label>
                <select name="branch">
                    <option  <?php echo (isset($row))?($row['BRANCH']=='B.E'?'selected':''):'';?> > B.E</option>
                    <option  <?php echo (isset($row))?($row['BRANCH']=='B.TECH'?'selected':''):'';?>  >B.TECH</option>
                </select>


            </fieldset>
            <fieldset>
                <legend> Personal Details</legend>
                <div id="personflex">
                <label>Phone Number</label>
                <input name="phoneNumber" type="number" placeholder="X X X X X X X X X X" value="<?php echo (isset($row))?$row['PHONE_NUMBER']:'';?>" required><br>
                <label>Alternate Number</label>
                <input name="alternateNumber" type="number" placeholder="X X X X X X X X X X" value="<?php echo (isset($row))?$row['ALTERNATE_NUMBER']:'';?>"><br>
                <label>Parent's Number</label>
                <input name="parentNumber" type="number" placeholder="X X X X X X X X X X" value="<?php echo (isset($row))?$row['PARENT_CONTACT_NUMBER']:'';?>" required><br>
                <label>Official Mail</label>
                <input name="officialMail" type="email" placeholder="abc@srit.org" value="<?php echo (isset($row))?$row['OFFICIAL_MAILID']:'';?>" required><br>
                <label>Personal Mail</label>
                <input name="personalMail" type="email" placeholder="abc@gmail.com" value="<?php echo (isset($row))?$row['PERSONAL_MAILID']:'';?>" required><br>
                <label>Address</label>
                <textarea name="address" placeholder="Enter the Address" required><?php echo (isset($row))?$row['ADDRESS']:'';?></textarea><br>
                <label>Pincode</label>
                <input name="pincode" type="number" placeholder=" 6 - - - - - " value="<?php echo (isset($row))?$row['PINCODE']:'';?>" required><br>
                </div>
            </fieldset>
            <fieldset>
                <legend>Education Details</legend>
                <label>SSLC</label>
                <input name="sslc" type="number" placeholder="In Percentage" value="<?php echo (isset($row))?$row['SSLC']:'';?>" required><br>
                <label>HSC</label>
                <input name="hsc" type="number"  placeholder="In Percentage" value="<?php echo (isset($row))?$row['HSC']:'';?>" required><br>
                <label>CGPA</label>
                <input name="cgpa" type="number"  placeholder="In Percentage" value="<?php echo (isset($row))?$row['CGPA']:'';?>" required><br>
                <label>History of Arrear</label>
                <input name="hoa" type="number" placeholder="eg:- 2 " value="<?php echo (isset($row))?$row['HISTORY_OF_ARREARS']:'';?>" required><br>

            </fieldset>
            <button class="btn1" type="submit" name="update">Submit</button>
            <button class="btn2" type="reset">Reset</button>
        </form>
    </div>
    <script type="text/javascript">
        <?php
            if (isset($_POST['update'])) {
                $v = $_POST;
                $query = "UPDATE STUDENT_DETAILS SET BATCH='".$v['batch']."',REGISTER_NUMBER='".$v['registerNumber']."',FIRST_NAME='".$v['firstName']."',MIDDLE_NAME='".$v['middleName']."',LAST_NAME='".$v['lastName']."',DEPARTMENT='".$v['department']."',BRANCH='".$v['branch']."',PHONE_NUMBER='".$v['phoneNumber']."',ALTERNATE_NUMBER='".$v['alternateNumber']."',PARENT_CONTACT_NUMBER='".$v['parentNumber']."',OFFICIAL_MAILID='".$v['officialMail']."',PERSONAL_MAILID='".$v['personalMail']."',ADDRESS='".$v['address']."',PINCODE='".$v['pincode']."',SSLC='".$v['sslc']."',HSC='".$v['hsc']."',CGPA='".$v['cgpa']."',HISTORY_OF_ARREARS='".$v['hoa']."' WHERE REGISTER_NUMBER='".$v['registerNumber']."'";
                if (mysqli_query($conn, $query)) {
                  echo "alert('Updated successfully')";
                } else {
                  echo "alert('Something Went Wrong')";
                }
            }
        ?>
    </script>

</body>
</html>