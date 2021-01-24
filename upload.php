<?php
// Include the database configuration file
include 'connection.php';
$statusMsg = '';

$PlandetailtIDimg = $_POST["PlandetailtIDimg"];
$typeimg = $_POST["typeimg"];

// File upload path

$fileName = basename($_FILES["file"]["name"]);

$temp = explode(".",$_FILES["file"]["name"]);
$newName = basename($PlandetailtIDimg."-".$typeimg.".".end($temp));
$targetDir = "plant/".$newName;


move_uploaded_file($_FILES["file"]["tmp_name"], $targetDir);
$sql = "INSERT INTO `images` (`plantlocationID`, `ImageType`, `ImageLocationType`) VALUES ('" . $PlandetailtIDimg . "', '" . $typeimg . "', '" . $newName . "')";
if (mysqli_query($conn, $sql)) {
   echo "เพิ่มรูปภาพเรียบร้อย <br>";
   echo "<a href='imguploads.php'>กลับหน้าเพิ่มรูปภาพ</a>";
} else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<br>";
   echo "<a href='imguploads.php'>กลับหน้าเพิ่มรูปภาพ</a>";
}
?>

