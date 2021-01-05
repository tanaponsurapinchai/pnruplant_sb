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

    <title>รายละเอียดพรรณไม้ไม้</title>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>

<body>


    <!-- !Section Navbar -->
    <nav id="navbar" class="navbar navbar-expand-lg position-sticky navbar-dark bg-alpha">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="assets/image/logo.jpg" width="35" height="35" class="d-inline-block align-top" alt="">
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


    <!-- main -->
    <div class="container">
        <h1>แสดงข้อมูล</h1>
        <?php
        //รับ parameter มาเก็บในตัวแปร ID
        $ID = $_GET["ID"];
        //1. เชื่อมต่อ database: 
        include('connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

        //2. query ข้อมูลจากตาราง plant: 
        $query = "SELECT * FROM `plantdetail` WHERE plantdetail.PlandetailtID = '" . $ID . "' ";
        $query2 = "SELECT * FROM images WHERE images.plantlocationID= '" . $ID . "' ";
        // echo $query;
        $result = mysqli_query($conn, $query);
        $result2 = mysqli_query($conn, $query);
        // จะแก้โดยการ เอาตัวแปร id แสดงรหัสและตักคำไป query มาจากฐานข้อมูล
        while ($row = mysqli_fetch_array($result)) {
            echo "<div><p>PlandetailtID : " . $ID . "</p></div>";
            echo "<div><p>PlantName: " . $row['PlantName'] . "</p></div>";
            echo "<div><p>PlantScience : <i>" . $row['PlantCommonname'] . "</i> " . $row['PlantDiscover'] . "</p></div>";
            echo "<div><p>PlantDiscover : " . $row['PlantDiscover'] . "</p></div>";
            echo "<div><p>PlantCommonname : " . $row['PlantCommonname'] . "</p></div>";
            echo "<div><p>PlantType : " . $row['PlantType'] . "</p></div>";
            echo "<div><p>PlantTypeENG : " . $row['PlantTypeENG'] . "</p></div>";
            echo "<div><p>PlantDistrbution : " . $row['PlantDistrbution'] . "</p></div>";
            echo "<div><p>PlantDistrbutionENG : " . $row['PlantDistrbutionEng'] . "</p></div>";
            echo "<div><p>PlantBenefit : " . $row['PlantBenefit'] . "</p></div>";
            echo "<div><p>PlantBenefitENG : " . $row['PlantBenefitEng'] . "</p></div>";
            echo "<div><p>PlantBanefity : " . $row['PlantBanefity'] . "</p></div>";
            echo "<div><p>PlantBanefityENG : " . $row['PlantBanefityEng'] . "</p></div>";




            echo "<div><p>PlantFlower : " . $row['PlantFlower'] . "</p></div>";
            echo "<div><p>PlantFlowerENG : " . $row['PlantFlowerEng'] . "</p></div>";


            echo "<div><p>PlantRound : " . $row['PlantRound'] . "</p></div>";
            echo "<div><p>PlantRoundENG : " . $row['PlantRoundEng'] . "</p></div>";


            echo "<div><p>PlantSeed : " . $row['PlantSeed'] . "</p></div>";
            echo "<div><p>PlantSeedENG : " . $row['PlantSeedEng'] . "</p></div>";


            echo "<div><p>PlantStem : " . $row['PlantStem'] . "</p></div>";
            echo "<div><p>PlantStemENG : " . $row['PlantStemEng'] . "</p></div>";


            echo "<div><p>PlantLeaf : " . $row['PlantLeaf'] . "</p></div>";
            echo "<div><p>PlantLeafENG : " . $row['PlantLeafEng'] . "</p></div>";



            echo "<div><p>SeasonID : " . $row['SeasonID'] . "</p></div>";
            echo "<div><p>PlantfamilyID :" . $row['PlantfamilyID'] . "</p></div>";
        }
        mysqli_close($conn);
        ?>
        <a href="index.html" class="btn btn-primary">กลับหน้าเดิม</a>
    </div>


    <!--!contact-->
    <div class="jumbotron jumbotron-fluid p-5 text-center text-md-left">
        <div class="row" id="footer">
            <div class="col-md-4">
                <a class="navbar-brand" href="index.html">
                    <img src="assets/image/logo.jpg" width="35" height="35" class="d-inline-block align-top" alt="">
                    PNRU
                </a>
                <p>
                    <i class="fa fa-phone-square"></i> 09-999-9999 <br>
                    <i class="fa fa-envelope"></i> email@example.com <br>
                    <i class="fa fa-address-card"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Culpa,
                    aspernatur!
                </p>
                <a href="https://www.facebook.com/PhranakhonRajabhatUniversity" target="_blank">
                    <i class="fab fa-facebook-square fa-2x"></i>
                </a>
            </div>
            <!-- <div class="col-md-3">
                <h4>เมนู</h4>
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#search">หน้าหลัก <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#footer">เกี่ยวกับเรา</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#input">เพิ่มข้อมูล</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#all">รายชื่อพรรณไม้ทั้งหมด</a>
                    </li>
                </ul>
            </div> -->
            <!-- <div class="col-md-5">
                <h4>แผนที่</h4>
                <div id="map"></div>
            </div> -->
        </div>
    </div>

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