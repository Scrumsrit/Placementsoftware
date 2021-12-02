<?php
    include('config.php');
    session_start();
    $conn = $con;
    function createTable(){
        global $conn;
        $postColumns = $_POST['column'];
        $sslcFrom = $_POST['sslcFromSlider'];
        $hscFrom = $_POST['hscFromSlider'];
        $cgpaFrom = $_POST['cgpaFromSlider'];
        $sslcTo = $_POST['sslcToSlider'];
        $hscTo = $_POST['hscToSlider'];
        $cgpaTo = $_POST['cgpaToSlider'];
        // echo "$sslcFrom $hscFrom $sslcTo $hscTo $cgpaFrom $cgpaTo"; 
        $columns = array();
        foreach($postColumns as $values){
            if($values !== "none"){
                array_push($columns, $values);
            }
        }
        $columns = join($columns, ",");
        $query = "SELECT $columns FROM STUDENT_DETAILS WHERE SSLC>=$sslcFrom AND SSLC<=$sslcTo AND HSC>=$hscFrom AND HSC<=$hscTo AND CGPA>=$cgpaFrom AND CGPA<=$cgpaTo";
        // echo $query;
        $result = mysqli_query($conn, $query);
        echo "<br><br><h3 align='center'>REPORT</h3><br>";
        echo "<div align='center'><table id='result' border = 1 cellspacing = 0 cellpadding = 4 align = 'center'>";
        echo "<tr>";
        foreach($postColumns as $values){
            if($values !== "none"){
                echo "<th align='center' >$values</th>";
            }
        }
        echo "</tr>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            foreach($postColumns as $values){
                if($values !== "none"){
                    echo "<td align='center' >$row[$values]</td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    }

?>

<html>
    <head>
        <title>Report Generation</title>
        <link rel="stylesheet" href="../Css/reports.css" />
      
    </head>
    <body>
        <form action="" method="POST">
            <div id="columns">
                <select name="column[]" required>
                    <option value="none">COLUMN 1</option>
                    <option value="BATCH">BATCH</option>
                    <option value="REGISTER_NUMBER">REGISTER_NUMBER</option>
                    <option value="FIRST_NAME">FIRST_NAME</option>
                    <option value="MIDDLE_NAME">MIDDLE_NAME</option>
                    <option value="LAST_NAME">LAST_NAME</option>
                    <option value="DEPARTMENT">DEPARTMENT</option>
                    <option value="BRANCH">BRANCH</option>
                    <option value="PHONE_NUMBER">PHONE_NUMBER</option>
                    <option value="ALTERNATE_NUMBER">ALTERNATE_NUMBER</option>
                    <option value="PARENT_CONTACT_NUMBER">PARENT_CONTACT_NUMBER</option>
                    <option value="OFFICIAL_MAILID">OFFICIAL_MAILID</option>
                    <option value="PERSONAL_MAILID">PERSONAL_MAILID</option>
                    <option value="ADDRESS">ADDRESS</option>
                    <option value="PINCODE">PINCODE</option>
                    <option value="SSLC">SSLC</option>
                    <option value="HSC">HSC</option>
                    <option value="CGPA">CGPA</option>
                    <option value="HISTORY_OF_ARREARS">HISTORY_OF_ARREARS</option>
                </select><br>
                <select name="column[]">
                    <option value="none">COLUMN 2</option>
                    <option value="BATCH">BATCH</option>
                    <option value="REGISTER_NUMBER">REGISTER_NUMBER</option>
                    <option value="FIRST_NAME">FIRST_NAME</option>
                    <option value="MIDDLE_NAME">MIDDLE_NAME</option>
                    <option value="LAST_NAME">LAST_NAME</option>
                    <option value="DEPARTMENT">DEPARTMENT</option>
                    <option value="BRANCH">BRANCH</option>
                    <option value="PHONE_NUMBER">PHONE_NUMBER</option>
                    <option value="ALTERNATE_NUMBER">ALTERNATE_NUMBER</option>
                    <option value="PARENT_CONTACT_NUMBER">PARENT_CONTACT_NUMBER</option>
                    <option value="OFFICIAL_MAILID">OFFICIAL_MAILID</option>
                    <option value="PERSONAL_MAILID">PERSONAL_MAILID</option>
                    <option value="ADDRESS">ADDRESS</option>
                    <option value="PINCODE">PINCODE</option>
                    <option value="SSLC">SSLC</option>
                    <option value="HSC">HSC</option>
                    <option value="CGPA">CGPA</option>
                    <option value="HISTORY_OF_ARREARS">HISTORY_OF_ARREARS</option>
                </select><br>
                <select name="column[]">
                    <option value="none">COLUMN 3</option>
                    <option value="BATCH">BATCH</option>
                    <option value="REGISTER_NUMBER">REGISTER_NUMBER</option>
                    <option value="FIRST_NAME">FIRST_NAME</option>
                    <option value="MIDDLE_NAME">MIDDLE_NAME</option>
                    <option value="LAST_NAME">LAST_NAME</option>
                    <option value="DEPARTMENT">DEPARTMENT</option>
                    <option value="BRANCH">BRANCH</option>
                    <option value="PHONE_NUMBER">PHONE_NUMBER</option>
                    <option value="ALTERNATE_NUMBER">ALTERNATE_NUMBER</option>
                    <option value="PARENT_CONTACT_NUMBER">PARENT_CONTACT_NUMBER</option>
                    <option value="OFFICIAL_MAILID">OFFICIAL_MAILID</option>
                    <option value="PERSONAL_MAILID">PERSONAL_MAILID</option>
                    <option value="ADDRESS">ADDRESS</option>
                    <option value="PINCODE">PINCODE</option>
                    <option value="SSLC">SSLC</option>
                    <option value="HSC">HSC</option>
                    <option value="CGPA">CGPA</option>
                    <option value="HISTORY_OF_ARREARS">HISTORY_OF_ARREARS</option>
                </select><br>
                <select name="column[]">
                    <option value="none">COLUMN 4</option>
                    <option value="BATCH">BATCH</option>
                    <option value="REGISTER_NUMBER">REGISTER_NUMBER</option>
                    <option value="FIRST_NAME">FIRST_NAME</option>
                    <option value="MIDDLE_NAME">MIDDLE_NAME</option>
                    <option value="LAST_NAME">LAST_NAME</option>
                    <option value="DEPARTMENT">DEPARTMENT</option>
                    <option value="BRANCH">BRANCH</option>
                    <option value="PHONE_NUMBER">PHONE_NUMBER</option>
                    <option value="ALTERNATE_NUMBER">ALTERNATE_NUMBER</option>
                    <option value="PARENT_CONTACT_NUMBER">PARENT_CONTACT_NUMBER</option>
                    <option value="OFFICIAL_MAILID">OFFICIAL_MAILID</option>
                    <option value="PERSONAL_MAILID">PERSONAL_MAILID</option>
                    <option value="ADDRESS">ADDRESS</option>
                    <option value="PINCODE">PINCODE</option>
                    <option value="SSLC">SSLC</option>
                    <option value="HSC">HSC</option>
                    <option value="CGPA">CGPA</option>
                    <option value="HISTORY_OF_ARREARS">HISTORY_OF_ARREARS</option>
                </select><br>
                <select name="column[]">
                    <option value="none">COLUMN 5</option>
                    <option value="BATCH">BATCH</option>
                    <option value="REGISTER_NUMBER">REGISTER_NUMBER</option>
                    <option value="FIRST_NAME">FIRST_NAME</option>
                    <option value="MIDDLE_NAME">MIDDLE_NAME</option>
                    <option value="LAST_NAME">LAST_NAME</option>
                    <option value="DEPARTMENT">DEPARTMENT</option>
                    <option value="BRANCH">BRANCH</option>
                    <option value="PHONE_NUMBER">PHONE_NUMBER</option>
                    <option value="ALTERNATE_NUMBER">ALTERNATE_NUMBER</option>
                    <option value="PARENT_CONTACT_NUMBER">PARENT_CONTACT_NUMBER</option>
                    <option value="OFFICIAL_MAILID">OFFICIAL_MAILID</option>
                    <option value="PERSONAL_MAILID">PERSONAL_MAILID</option>
                    <option value="ADDRESS">ADDRESS</option>
                    <option value="PINCODE">PINCODE</option>
                    <option value="SSLC">SSLC</option>
                    <option value="HSC">HSC</option>
                    <option value="CGPA">CGPA</option>
                    <option value="HISTORY_OF_ARREARS">HISTORY_OF_ARREARS</option>
                </select><br>
              
            </div>
            <div id="section2">   
            <input id="addbtn" align="center" type="button" onclick="addSelectTag()" value="+"><br>
            <div class="SSLC">
                <h3 align="center">SSLC:
                <span id="sslcFrom">50%</span>-
                <span id="sslcTo">50%</span></h3>
                <input oninput="document.getElementById('sslcFrom').innerHTML=this.value+'%';" name="sslcFromSlider" type="range" min="1" max="99" value="50">
                <input oninput="document.getElementById('sslcTo').innerHTML=this.value+'%';" name="sslcToSlider" type="range" min="1" max="100" value="100">
            </div>
            <div class="HSC">
                <h3 align="center">HSC:
                <span id="hscFrom">50%</span>-
                <span id="hscTo">50%</span></h3>
                <input oninput="document.getElementById('hscFrom').innerHTML=this.value+'%';" name="hscFromSlider" type="range" min="1" max="99" value="50">
                <input oninput="document.getElementById('hscTo').innerHTML=this.value+'%';" name="hscToSlider" type="range" min="1" max="100" value="100">
            </div>
            <div class="CGPA">
                <h3 align="center">CGPA:
                <span id="cgpaFrom">5</span>-
                <span id="cgpaTo">5</span></h3>
                <input oninput="document.getElementById('cgpaFrom').innerHTML=this.value;" name="cgpaFromSlider" type="range" min="1" max="10" value="5">
                <input oninput="document.getElementById('cgpaTo').innerHTML=this.value;" name="cgpaToSlider" type="range" min="1" max="10" value="10">
            </div>
            <button>submit</button> </div>
          
        </form>
        <div class="table">
            <?php
                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    createTable();
                    echo "<br><button onclick='Export()'>EXPORT</button>";
                }
            ?>
        </div>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="table2excel.js" type="text/javascript"></script>
        <script type="text/javascript">
            function Export() {
                $("#result").table2excel({
                    filename: "StudentReport.xlsx"
                });
            }
        </script>
        <script>
            var count = 6
            function addSelectTag(){
                document.getElementById('columns').innerHTML += '<select name="column[]"><option value="none">COLUMN '+count+'</option><option value="BATCH">BATCH</option><option value="REGISTER_NUMBER">REGISTER_NUMBER</option><option value="FIRST_NAME">FIRST_NAME</option><option value="MIDDLE_NAME">MIDDLE_NAME</option><option value="LAST_NAME">LAST_NAME</option><option value="DEPARTMENT">DEPARTMENT</option><option value="BRANCH">BRANCH</option><option value="PHONE_NUMBER">PHONE_NUMBER</option><option value="ALTERNATE_NUMBER">ALTERNATE_NUMBER</option><option value="PARENT_CONTACT_NUMBER">PARENT_CONTACT_NUMBER</option><option value="OFFICIAL_MAILID">OFFICIAL_MAILID</option><option value="PERSONAL_MAILID">PERSONAL_MAILID</option><option value="ADDRESS">ADDRESS</option><option value="PINCODE">PINCODE</option><option value="SSLC">SSLC</option><option value="HSC">HSC</option><option value="CGPA">CGPA</option><option value="HISTORY_OF_ARREARS">HISTORY_OF_ARREARS</option></select><br>'
                count += 1;
            }
        </script>
    </body>
</html>
