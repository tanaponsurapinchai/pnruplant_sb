<?php
session_start();
$message = "";
if (isset($_POST['Username'])) {
  //connection
  include("connection.php");
  //รับค่า user & password
  $Username = $_POST['Username'];
  $Password = $_POST['Password'];
  //query 
  $sql = "SELECT * FROM admin Where user_login='" . $Username . "' and pass_login='" . $Password . "' ";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_array($result);


    if (is_array($row)) {
      $_SESSION["AdminID"] = $row["AdminID "];
      $_SESSION["user_login"] = $row["user_login"];
    } else {
      $message = "Invalid Username or Password!";
    }
  }
  if (isset($_SESSION["id"])) {
    header("Location:admin.php");
  } else {
    echo "<script>";
    echo "alert(\" user หรือ  password ไม่ถูกต้อง\");";
    echo "window.history.back()";
    echo "</script>";
  }
} else {

  Header("Location: index.html"); //user & password incorrect back to login again

}

// $_SESSION["AdminID"] = $row["AdminID "];
//                       $_SESSION["user_login"] = $row["user_login"];
//                         // ใช้ตัวแปรในการเช็คว่า ID นี้ใช้งานอยู่รึป่าว
//                       $_SESSION["status"] = $row["status"];
                
//                       if($_SESSION["status"]=="1"){ 
 
//                         Header("Location: admin.php");
//                       }
//                   if ($_SESSION["status"]=="member"){ 
 
//                         Header("Location: member.php");
//                       }