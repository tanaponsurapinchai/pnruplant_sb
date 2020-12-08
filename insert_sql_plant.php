<?php
//$db_servername = "localhost";
//$db_database = "pnruplant";
//$db_tablename = "testplant";
//$db_username = "root";
//$db_password = "";
include('connection.php');

    $PlantID = $_POST['PlantID'];
    $PlantName= $_POST['PlantName'];
    $PlandetailtID= $_POST['PlandetailtID'];
    $ZoneID= $_POST['ZoneID'];
    $longtitudeY= $_POST['longtitudeY'];
    $latitudeX= $_POST['latitudeX'];
    $status= $_POST['status'];

    $sql = "INSERT INTO  plant (`PlantID`,`PlantName`, `PlandetailtID`)"
    ."  VALUES ('$PlantID','$PlantName','$PlandetailtID');  ";
if (mysqli_query($conn, $sql)) {
    $sql2 = "INSERT INTO `area` (`plantlocationID`, `ZoneID`, `PlantID`, `longtitudeY`, `latitudeX`, `status`, `statusDate`, `qrcode`)"
    ."  VALUES ('$PlantID','$ZoneID','$PlantID' ,'$longtitudeY' ,'$latitudeX' ,'$status', NOW(), '')";
    mysqli_query($conn, $sql2);
    echo "บันทึกข้อมูลพรรณไม้เรียบร้อย <br>";
    echo "<a href='index.php'>กลับหน้าหลัก</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    echo "<a href='index.php'>กลับหน้าหลัก</a>";
}

mysqli_close($conn);
