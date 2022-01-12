<?php
    include('../config/config.php');
    session_start();
    $conn = $con;
    function Details(){
        global $conn;
        $registerNumbers = array();
        $dates = array();
        $presences = array();
        $query = "SELECT UNIQUE DATE FROM ATTENDANCE WHERE REGISTER_NUMBER=ANY(SELECT REGISTER_NUMBER FROM SAMPLE WHERE DEPARTMENT='".$_POST['department']."' AND BATCH='".$_POST['batch']."') AND SUBJECT='".$_POST['subject']."' ORDER BY DATE ASC";
//         echo $query;
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)){
            array_push($dates, $row['DATE']);
        }
        $query = "SELECT REGISTER_NUMBER FROM SAMPLE WHERE DEPARTMENT='".$_POST['department']."' AND BATCH='".$_POST['batch']."' ORDER BY REGISTER_NUMBER ASC";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)){
            array_push($registerNumbers, $row['REGISTER_NUMBER']);
        }
        echo "<div align='center'><table class='attendnce' id='result' border = 1 cellspacing = 0 cellpadding = 4 align = 'center'><tr><th>REGISTER NUMBER</th>";
        foreach($dates as $date){
            if(date("m")===explode('/', $date)[1] && date("Y")===explode('/', $date)[2]){
                echo "<th>".$date."</th>";
            }
        }
        echo "</tr>";
        foreach($registerNumbers as $regNo){
            echo "<tr><td>".$regNo."</td>";
            foreach($dates as $date){
                if(date("m")===explode('/', $date)[1] && date("Y")===explode('/', $date)[2]){
                    $q = "SELECT (SELECT PRESENCE FROM ATTENDANCE WHERE DATE='".$date."' AND REGISTER_NUMBER='".$regNo."' AND SUBJECT='".$_POST['subject']."') AS '".$date."'";
//                     echo $q;
                    $result = mysqli_query($conn, $q);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<td>".$row[$date]."</td>";
                    }
                }
            }
            echo "</tr>";
        }
        echo "</table><button onclick='Export()'>EXPORT</button></div>";
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
        <button name="details">Submit</button>
    </form>
    <?php
        if (isset($_POST['details'])) {
            Details();
        }
        if (isset($_POST['submit'])) {
            Submit();
        }
    ?>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="../Assets/js/table2excel.js" type="text/javascript"></script>
    <script type="text/javascript">
        function Export() {
            $("#result").table2excel({
                filename: "Attendance.xlsx"
            });
        }
    </script>
</body>
</html>