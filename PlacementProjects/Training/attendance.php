<?php
    include('../config/config.php');
    session_start();
    $conn = $con;
    function Details(){
        global $conn;
        $arr = array();
        $query = "SELECT * FROM ATTENDANCE WHERE REGISTER_NUMBER=ANY(SELECT REGISTER_NUMBER FROM SAMPLE WHERE DEPARTMENT='".$_POST['department']."' AND BATCH='".$_POST['batch']."') AND DATE='".date("d/m/Y", strtotime($_POST['date']))."' AND SUBJECT='".$_POST['subject']."'";
//         echo $query;
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)){
            $r = $row;
            array_push($arr, $r);
        }
        if(isset($r)){
            echo "<div align='center'><form action='' method='post'><input type='Text' name='subject' value='".$_POST['subject']."' hidden/><input type='Text' name='batch' value='".$_POST['batch']."' hidden/><input type='Text' name='department' value='".$_POST['department']."' hidden/><input type='date' name='date' value='".$_POST['date']."' hidden/><table id='result' border = 1 cellspacing = 0 cellpadding = 4 align = 'center'>";
            echo "<tr><th>REGISTER NUMBER</th><th>".date("d/m/Y", strtotime($_POST['date']))."</th></tr>";
            foreach ($arr as $row){
                if($row['PRESENCE']=='ABSENT'){
                    $tr = "<option value='".$row["REGISTER_NUMBER"]."-".date("d/m/Y", strtotime($_POST['date']))."-PRESENT'>PRESENT</option><option value='".$row["REGISTER_NUMBER"]."-".date("d/m/Y", strtotime($_POST['date']))."-ABSENT' selected>ABSENT</option></select></td></tr>";
                }
                else{
                    $tr = "<option value='".$row["REGISTER_NUMBER"]."-".date("d/m/Y", strtotime($_POST['date']))."-PRESENT' selected>PRESENT</option><option value='".$row["REGISTER_NUMBER"]."-".date("d/m/Y", strtotime($_POST['date']))."-ABSENT' >ABSENT</option></select></td></tr>";
                }
                echo "<tr><td>".$row["REGISTER_NUMBER"]."</td><td><select name='attendnce[]'>".$tr;
            }
            echo "</table><button name='update'>Update</button></form></div>";
        }
        else{
            $query = "SELECT REGISTER_NUMBER FROM SAMPLE WHERE DEPARTMENT='".$_POST['department']."' AND BATCH='".$_POST['batch']."' ORDER BY REGISTER_NUMBER ASC";
//             echo $query;
            $result = mysqli_query($conn, $query);
            echo "<div align='center'><form action='' method='post'><input type='Text' name='subject' value='".$_POST['subject']."' style='text-align:center' hidden/><input type='Text' name='batch' value='".$_POST['batch']."' style='text-align:center' hidden/><input type='Text' name='department' value='".$_POST['department']."' style='text-align:center' hidden/><input type='date' name='date' value='".$_POST['date']."' hidden/><table id='result' border = 1 cellspacing = 0 cellpadding = 4 align = 'center'>";
            echo "<tr><th>REGISTER NUMBER</th><th>".date("d/m/Y", strtotime($_POST['date']))."</th></tr>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr><td>".$row["REGISTER_NUMBER"]."</td><td><select name='attendnce[]'><option value='".$row["REGISTER_NUMBER"]."-".date("d/m/Y", strtotime($_POST['date']))."-PRESENT'>PRESENT</option><option value='".$row["REGISTER_NUMBER"]."-".date("d/m/Y", strtotime($_POST['date']))."-ABSENT'>ABSENT</option></select></td></tr>";
            }
            echo "</table><button name='submit'>Submit</button></form></div>";
        }
    }
    function Submit() {
        global $conn;
        $a = 0;
        foreach ($_POST['attendnce'] as $res){
            $query = "INSERT INTO ATTENDANCE VALUES('".explode('-', $res)[0]."','".$_POST['subject']."','".explode('-', $res)[1]."','".explode('-', $res)[2]."')";
            if (mysqli_query($conn, $query)) {
                $a = 1;
            }
        }
        if($a===1){
            Details();
        }
    }
    function Update() {
        global $conn;
        foreach ($_POST['attendnce'] as $res){
            $query = "UPDATE ATTENDANCE SET PRESENCE='".explode('-', $res)[2]."' WHERE REGISTER_NUMBER='".explode('-', $res)[0]."' AND SUBJECT='".$_POST['subject']."' AND DATE='".explode('-', $res)[1]."'";
//             echo $query;
            if (mysqli_query($conn, $query)) {
                echo "";
            }
        }
        if (mysqli_query($conn, $query)) {
                Details();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Details Update</title>
    <link rel="stylesheet" href="../Css/reports.css" />
</head>
<body>
    <form action="" method="post">
        <select name="subject">
            <option value="none">SUBJECT</option>
            <option value="APPTITUDE" <?php echo (isset($_POST["subject"]))?($_POST["subject"]=='APPTITUDE'?'selected':''):''; ?> >APPTITUDE</option>
            <option value="TECHNICAL" <?php echo (isset($_POST["subject"]))?($_POST["subject"]=='TECHNICAL'?'selected':''):''; ?> >TECHNICAL</option>
            <option value="COMMUNICATION" <?php echo (isset($_POST["subject"]))?($_POST["subject"]=='COMMUNICATION'?'selected':''):''; ?> >COMMUNICATION</option>
        </select>
        <select name="batch">
            <option value="none">BATCH</option>
            <option value="2023" <?php echo (isset($_POST["batch"]))?($_POST["batch"]=='2023'?'selected':''):''; ?> >2023</option>
            <option value="2022" <?php echo (isset($_POST["batch"]))?($_POST["batch"]=='2022'?'selected':''):''; ?> >2022</option>
        </select>
        <select name="department">
            <option value="none">DEPARTMENT</option>
            <option value="CSE" <?php echo (isset($_POST["department"]))?($_POST["department"]=='CSE'?'selected':''):''; ?> >CSE</option>
            <option value="IT" <?php echo (isset($_POST["department"]))?($_POST["department"]=='IT'?'selected':''):''; ?> >IT</option>
            <option value="ECE" <?php echo (isset($_POST["department"]))?($_POST["department"]=='ECE'?'selected':''):''; ?> >ECE</option>
            <option value="EEE" <?php echo (isset($_POST["department"]))?($_POST["department"]=='EEE'?'selected':''):''; ?> >EEE</option>
            <option value="MECH" <?php echo (isset($_POST["department"]))?($_POST["department"]=='MECH'?'selected':''):''; ?> >MECH</option>
            <option value="CIVIL" <?php echo (isset($_POST["department"]))?($_POST["department"]=='CIVIL'?'selected':''):''; ?> >CIVIL</option>
        </select>
        <input name='date' type="date" value="<?php echo $_POST['date']; ?>"/>
        <button name="details">Submit</button>
    </form>
    <?php
        if (isset($_POST['details'])) {
            Details();
        }
        if (isset($_POST['submit'])) {
            Submit();
        }
        if (isset($_POST['update'])) {
            Update();
        }
    ?>
</body>
</html>