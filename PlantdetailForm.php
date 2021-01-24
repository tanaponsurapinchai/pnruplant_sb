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

    <title>รายละเอียดต้นไม้</title>
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
        // list($locationIDD, $detailIDD) = split('_', $ID)
        //1. เชื่อมต่อ database: 
        include('connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
        $widthIMG = '350';
        $heightIMG = '350';
        //2. query ข้อมูลจากตาราง plant: 
        $query = "SELECT area.plantlocationID,plantdetail.* FROM area RIGHT JOIN plantdetail ON area.PlandetailtID = plantdetail.PlandetailtID WHERE area.plantlocationID = '" . $ID . "' ";

        $result = mysqli_query($conn, $query);

        // จะแก้โดยการ เอาตัวแปร id แสดงรหัสและตักคำไป query มาจากฐานข้อมูล
        while ($row = mysqli_fetch_array($result)) {
            echo "<div><p>รหัสต้นไม้ : " . $ID . "</p></div>";
            echo "<div><p>ชื่อพรรณไม้: " . $row['PlantName'] . "</p></div>";
            echo "<div><p>ชื่อวิทยาศาสตร์ : <i>" . $row['PlantScience'] . "</i> " . $row['PlantDiscover'] . "</p></div>";
            echo "<div><p>ชื่อผู้ค้นพบ : " . $row['PlantDiscover'] . "</p></div>";
            echo "<div><p>ชื่อสามัญ : " . $row['PlantCommonname'] . "</p></div>";
            echo "<div><p>ประเภท : " . $row['PlantType'] . "</p></div>";
            echo "<div><p>PlantType : " . $row['PlantTypeENG'] . "</p></div>";
            echo "<div><p>สถานที่ค้นพบ : " . $row['PlantDistrbution'] . "</p></div>";
            echo "<div><p>PlantDistrbution : " . $row['PlantDistrbutionEng'] . "</p></div>";
            echo "<div><p>ประโยชน์ : " . $row['PlantBenefit'] . "</p></div>";
            echo "<div><p>PlantBenefit : " . $row['PlantBenefitEng'] . "</p></div>";
            echo "<div><p>ประโยชน์อื่นๆ : " . $row['PlantBanefity'] . "</p></div>";
            echo "<div><p>PlantBanefity : " . $row['PlantBanefityEng'] . "</p></div>";



            echo "<div class='container'>";
            $sqlflower = "SELECT * FROM images WHERE images.plantlocationID='" . $ID . "'AND images.ImageType='1'";
            $resultflower = mysqli_query($conn, $sqlflower);
            while ($rowflower = mysqli_fetch_array($resultflower)) {
                echo "<div class='col'><img src='plant/" . $rowflower['ImageLocationType'] . "' alt='PlantFlowerimg' width='" . $widthIMG . "' height='" . $heightIMG . "'/></div>";
            }
            echo "</div>";

            echo "<div class='container'>";
            echo "<div class='row'>";
            $sqlflower = "SELECT * FROM images WHERE images.plantlocationID='" . $ID . "'AND images.ImageType='2'";
            $resultflower = mysqli_query($conn, $sqlflower);
            while ($rowflower = mysqli_fetch_array($resultflower)) {
                echo "<div class='col'><img src='plant/" . $rowflower['ImageLocationType'] . "' alt='PlantFlowerimg' width='" . $widthIMG . "' height='" . $heightIMG . "'/></div>";
            }
            echo "<div class='col'>";
            echo "<div><p>รายละเอียดดอก : " . $row['PlantFlower'] . "</p></div>";
            echo "<div><p>PlantFlower : " . $row['PlantFlowerEng'] . "</p></div>";
            echo "</div>";
            echo "</div>";
            echo "<br>";
            echo "</div>";
            echo "<div class='container'>";
            echo "<div class='row'>";
            $sqlRound = "SELECT * FROM images WHERE images.plantlocationID='" . $ID . "'AND images.ImageType='6'";
            $resultRound = mysqli_query($conn, $sqlRound);
            while ($rowRound = mysqli_fetch_array($resultRound)) {
                echo "<div class='col'><img src='plant/" . $rowRound['ImageLocationType'] . "' alt='PlantRoundimg' width='" . $widthIMG . "' height='" . $heightIMG . "'/></div>";
            }
            echo "<div class='col'>";
            echo "<div><p>รายละเอียดผล : " . $row['PlantRound'] . "</p></div>";
            echo "<div><p>PlantRound : " . $row['PlantRoundEng'] . "</p></div>";
            echo "</div>";
            echo "</div>";
            echo "<br>";
            echo "</div>";
            echo "<div class='container'>";
            echo "<div class='row'>";
            $sqlSeed = "SELECT * FROM images WHERE images.plantlocationID='" . $ID . "'AND images.ImageType='5'";
            $resultSeed = mysqli_query($conn, $sqlSeed);
            while ($rowSeed = mysqli_fetch_array($resultSeed)) {
                echo "<div class='col'><img src='plant/" . $rowSeed['ImageLocationType'] . "' alt='PlantSeedimg' width='" . $widthIMG . "' height='" . $heightIMG . "'/></div>";
            }
            echo "<div class='col'>";
            echo "<div><p>รายละเอียดเมล็ด : " . $row['PlantSeed'] . "</p></div>";
            echo "<div><p>PlantSeed : " . $row['PlantSeedEng'] . "</p></div>";
            echo "</div>";
            echo "</div>";
            echo "<br>";
            echo "</div>";
            echo "<div class='container'>";
            echo "<div class='row'>";
            $sqlStem = "SELECT * FROM images WHERE images.plantlocationID='" . $ID . "'AND images.ImageType='3'";
            $resultStem = mysqli_query($conn, $sqlStem);
            while ($rowStem = mysqli_fetch_array($resultStem)) {
                echo "<div class='col'><img src='plant/" . $rowStem['ImageLocationType'] . "' alt='PlantStemimg' width='" . $widthIMG . "' height='" . $heightIMG . "'/></div>";
            }
            echo "<div class='col'>";
            echo "<div><p>รายละเอียดลำต้น : " . $row['PlantStem'] . "</p></div>";
            echo "<div><p>PlantStem : " . $row['PlantStemEng'] . "</p></div>";
            echo "</div>";
            echo "</div>";
            echo "<br>";
            echo "</div>";
            echo "<div class='container'>";
            echo "<div class='row'>";
            $sqlLeaf = "SELECT * FROM images WHERE images.plantlocationID='" . $ID . "'AND images.ImageType='4'";
            $resultLeaf = mysqli_query($conn, $sqlLeaf);
            while ($rowLeaf = mysqli_fetch_array($resultLeaf)) {
                echo "<div class='col'><img src='plant/" . $rowLeaf['ImageLocationType'] . "' alt='PlantLeafimg' width='" . $widthIMG . "' height='" . $heightIMG . "'/></div>";
            }
            echo "<div class='col'>";
            echo "<div><p>รายละเอียดใบ : " . $row['PlantLeaf'] . "</p></div>";
            echo "<div><p>PlantLeaf : " . $row['PlantLeafEng'] . "</p></div>";
            echo "</div>";
            echo "</div>";
            echo "<br>";
            echo "</div>";


            echo "<div><p>ฤดู : " . $row['SeasonID'] . "</p></div>";
            echo "<div><p>Division :" . $row['DivisionID'] . "</p></div>";
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
                    <img src="image/logo.png" width="35" height="35" class="d-inline-block align-top" alt="">
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