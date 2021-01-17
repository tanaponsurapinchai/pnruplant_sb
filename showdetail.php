<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">

    <title>PNRUPLANT แสดงพรรณไม้</title>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>

<body>


    <!-- !Section Navbar -->
    <nav id="navbar" class="navbar navbar-expand-lg position-sticky navbar-dark bg-alpha">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="image/logo.png" width="35" height="35" class="d-inline-block align-top" alt="">
                PNRUPLANT
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarKey" aria-controls="navbarKey" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarKey">
                <ul class="navbar-nav ml-auto text-center">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">หน้าหลัก <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#footer">เกี่ยวกับเรา</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#input">เพิ่มข้อมูล</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="singin.php">Admin login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--! main -->

    <?php
    //1. เชื่อมต่อ database: 
    include('connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

    //2. query ข้อมูลจากตาราง tb_member: 
    $query = "SELECT PlandetailtID, PlantName FROM `plantdetail` ORDER BY `PlandetailtID` ASC" or die("Error:" . mysqli_error());
    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
    $result = mysqli_query($conn, $query);
    //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 

    echo "<table class='table table-striped '>";
    echo "<thead>";
    //หัวข้อตาราง
    echo "<tr>
        <th>PlandetailtID</th>
        <th>PlantName</th>
        <th>action</th>
        
    </tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<th>" . $row["PlandetailtID"] .  "</th> ";
        echo "<td>" . $row["PlantName"] .  "</td> ";
        //เมนูดูข้อมูลอัพเดท
        echo "<td><a href='detail.php?ID=$row[0]'>ดูข้อมูลต้นไม้</a> <br>
        ";
        //ลบข้อมูล
        // echo "<td><a href='AreaDelete.php?ID=$row[0]' onclick=\"return confirm('คุณต้องการลบพรรณไม้ " . $row["plantlocationID"] . " ใช่ไหม')\">ลบข้อมูล</a></td> ";
        echo "</tr>";
    }
    echo "</table>";
    //5. close connection
    mysqli_close($conn);
    ?>

    <footer class="footer">
        <span> COPYRIGHT © 2020
            <a href="#" target="_blank">Soymilk</a>
            ALL Right Reserved
        </span>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>