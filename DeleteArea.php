<?php
include('connection.php');
$ID=$_GET["ID"];
$sql = "DELETE FROM `area` WHERE `area`.`plantlocationID` = '".$ID."'";
if (mysqli_query($conn, $sql)) {
           echo "ลบข้อมูลเรัยบร้อย";
           echo "<a href='admin.php'>กลับหน้าเดิม</a>";
    
} else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>