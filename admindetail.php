<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PNRUPLANT ADMIN ดูรายละเอียดต้นไม้</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-tree"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PNAU PLANT ADMIN </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="detail_Plant.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>ตารางพรรณไม้ทั้งหมด</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Insert_plant.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>เพิ่มต้นไม้ใหม่</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Insert_detail.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>เพิ่มพรรณไม้ใหม่</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Update_detail.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>แก้ไข้พรรณไม้</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Update_plant.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>แก้ไขต้นไม้</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Update_location.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>แก้ไข้พิกัดต้นไม้</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
        </ul>
        <!-- End of Sidebar -->



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <!-- <img class="img-profile rounded-circle"src="img/undraw_profile.svg"> -->
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->



                <!-- Begin Page Content -->
                <div class="container-fluid">

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
                        // echo $query;
                        $result = mysqli_query($conn, $query);
                        // จะแก้โดยการ เอาตัวแปร id แสดงรหัสและตักคำไป query มาจากฐานข้อมูล
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<div><p>รหัสพรรณไม้ : " . $ID . "</p></div>";
                            echo "<div><p>ชื่อพรรณไม้: " . $row['PlantName'] . "</p></div>";
                            echo "<div><p>ชื่อวิทยาศาสตร์ : <i>" . $row['PlantCommonname'] . "</i> " . $row['PlantDiscover'] . "</p></div>";
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
                            echo "<div><p>รายละเอียดดอก : " . $row['PlantFlower'] . "</p></div>";
                            echo "<div><p>PlantFlower : " . $row['PlantFlowerEng'] . "</p></div>";


                            echo "<div><p>รายละเอียดผล : " . $row['PlantRound'] . "</p></div>";
                            echo "<div><p>PlantRound : " . $row['PlantRoundEng'] . "</p></div>";


                            echo "<div><p>รายละเอียดเมล็ด : " . $row['PlantSeed'] . "</p></div>";
                            echo "<div><p>PlantSeed : " . $row['PlantSeedEng'] . "</p></div>";


                            echo "<div><p>รายละเอียดลำต้น : " . $row['PlantStem'] . "</p></div>";
                            echo "<div><p>PlantStemENG : " . $row['PlantStemEng'] . "</p></div>";


                            echo "<div><p>รายละเอียดใบ : " . $row['PlantLeaf'] . "</p></div>";
                            echo "<div><p>PlantLeaf : " . $row['PlantLeafEng'] . "</p></div>";



                            echo "<div><p>ฤดู : " . $row['SeasonID'] . "</p></div>";
                            echo "<div><p>Division :" . $row['DivisionID'] . "</p></div>";
                        }
                        mysqli_close($conn);
                        ?>
                        <a href="index.html" class="btn btn-primary">กลับหน้าเดิม</a>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ต้องการออกจากระบบใช้ไหม</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">กดปุ่ม ออกจากระบบ ถ้าคุณต้องการออกจากระบบ กดปุ่ม ยกเลิก ถ้าหากไม่ต้องการ</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                    <a class="btn btn-primary" href="login.html">ออกจากระบบ</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>