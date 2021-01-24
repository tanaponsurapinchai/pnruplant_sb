<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PLANT PNRU DETAIL</title>

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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-tree"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PNRU PLANT ADMIN </div>
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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">เพิ่มข้อมูลพรรณไม้ใหม่</h1>
                    <div class="container">
                        <form action="insert_sql_detail.php" method="post">
                            <div class="form-row">

                                <!-- PlantID -->
                                <?php
                                //1. เชื่อมต่อ database: 
                                include('connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

                                //2. query ข้อมูลจากตาราง tb_member: 
                                $query = "SELECT PlandetailtID FROM plantdetail ORDER BY PlandetailtID DESC LIMIT 1" or die("Error:" . mysqli_error());
                                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
                                $results = mysqli_query($conn, $query);

                                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 
                                while ($row = mysqli_fetch_assoc($results)) {
                                    // ต้องหาวิธี + รหัสเพิ่ม
                                    echo "<div class='form-group col-md-6'>
                            <label for='PlandetailtID'>PlandetailtID</label>
                            <input type='text' class='form-control' name='PlandetailtID' value='" . $row["PlandetailtID"] . "'>
                            </div>";
                                }
                                mysqli_close($conn);
                                ?>


                                <!-- PlantName -->
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">ชื่อพรรณไม้ PlantName</label>
                                    <input type="text" class="form-control" name="PlantName">
                                </div>
                                <!-- PlantScience -->
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">ชื่อวิทยาศาสตร์ PlantScience</label>
                                    <input type="text" class="form-control" name="PlantScience">
                                </div>
                                <!-- PlantDiscover -->
                                <div class="form-group col-md-6">
                                    <label for="PlantDiscover">ชื่อผู้ค้นพบ PlantDiscover</label>
                                    <input type="text" class="form-control" name="PlantDiscover">
                                </div>
                            </div>
                            <!-- PlantCommonname -->
                            <div class="form-group">
                                <label for="PlantCommonname">ชื่อสามัญ PlantCommonname</label>
                                <input type="text" class="form-control" name="PlantCommonname" placeholder="">
                            </div>
                            <!-- PlantType -->
                            <div class="form-group">
                                <label for="PlantType">ประเภท</label>
                                <input type="text" class="form-control" name="PlantType" placeholder="ประเภท เช่น ไม้ยืนต้น">
                            </div>
                            <!-- PlantTypeENG -->
                            <div class="form-group">
                                <label for="PlantTypeENG">PlantType</label>
                                <input type="text" class="form-control" name="PlantTypeEng" placeholder="ประเภท เช่น ไม้ยืนต้น">
                            </div>
                            <!-- PlantDistrbution -->
                            <div class="form-group">
                                <label for="PlantDistrbution">สถานที่ค้นพบ</label>
                                <textarea class="form-control" name="PlantDistrbution" rows="4"></textarea>
                            </div>
                            <!-- PlantDistrbutionEng -->
                            <div class="form-group">
                                <label for="PlantDistrbutionEng">PlantDistrbution</label>
                                <textarea class="form-control" name="PlantDistrbutionEng" rows="4"></textarea>
                            </div>
                            <!-- PlantBenefit -->
                            <div class="form-group">
                                <label for="PlantBenefit">ประโยชน์</label>
                                <textarea class="form-control" name="PlantBenefit" rows="4"></textarea>
                            </div>
                            <!-- PlantBenefitEng -->
                            <div class="form-group">
                                <label for="PlantBenefitEng">PlantBenefit</label>
                                <textarea class="form-control" name="PlantBenefitEng" rows="4"></textarea>
                            </div>
                            <!-- PlantBanefity -->
                            <div class="form-group">
                                <label for="PlantBanefity">ประโยชน์อื่นๆ</label>
                                <textarea class="form-control" name="PlantBanefity" rows="4"></textarea>
                            </div>
                            <!-- PlantBanefityEng -->
                            <div class="form-group">
                                <label for="PlantBanefityEng">PlantBanefity</label>
                                <textarea class="form-control" name="PlantBanefityEng" rows="4"></textarea>
                            </div>
                            <!-- PlantFlower -->
                            <div class="form-group">
                                <label for="PlantFlower">รายละเอียดดอก</label>
                                <textarea class="form-control" name="PlantFlower" rows="4"></textarea>
                            </div>
                            <!-- PlantFlowerEng -->
                            <div class="form-group">
                                <label for="PlantFlowerEng">PlantFlower</label>
                                <textarea class="form-control" name="PlantFlowerEng" rows="4"></textarea>
                            </div>
                            <!-- PlantRound -->
                            <div class="form-group">
                                <label for="PlantRound">รายละเอียดผล</label>
                                <textarea class="form-control" name="PlantRound" rows="4"></textarea>
                            </div>
                            <!-- PlantRoundEng -->
                            <div class="form-group">
                                <label for="PlantRoundEng">PlantRound</label>
                                <textarea class="form-control" name="PlantRoundEng" rows="4"></textarea>
                            </div>
                            <!-- PlantSeed -->
                            <div class="form-group">
                                <label for="PlantSeed">รายละเอียดเมล็ด</label>
                                <textarea class="form-control" name="PlantSeed" rows="4"></textarea>
                            </div>
                            <!-- PlantSeedEng -->
                            <div class="form-group">
                                <label for="PlantSeedEng">PlantSeed</label>
                                <textarea class="form-control" name="PlantSeedEng" rows="4"></textarea>
                            </div>
                            <!-- PlantStem -->
                            <div class="form-group">
                                <label for="PlantStem">รายละเอียดลำต้น</label>
                                <textarea class="form-control" name="PlantStem" rows="4"></textarea>
                            </div>
                            <!-- PlantStemEng -->
                            <div class="form-group">
                                <label for="PlantStemEng">PlantStem</label>
                                <textarea class="form-control" name="PlantStemEng" rows="4"></textarea>
                            </div>
                            <!-- PlantLeaf -->
                            <div class="form-group">
                                <label for="PlantLeaf">รายละเอียดใบ</label>
                                <textarea class="form-control" name="PlantLeaf" rows="4"></textarea>
                            </div>
                            <!-- PlantLeafEng -->
                            <div class="form-group">
                                <label for="PlantLeafEng">PlantLeaf</label>
                                <textarea class="form-control" name="PlantLeafEng" rows="4"></textarea>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputSeasonID">ฤดู</label>
                                    <select name="inputSeasonID" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPlantfamilyID">DivisionID</label>
                                    <select name="inputPlantfamilyID" class="form-control">
                                        <option value="Bryophyta">Bryophyta</option>
                                        <option value="Psilophyta">Psilophyta</option>
                                        <option value="Lycophyta">Lycophyta</option>
                                        <option value="Sphenophyta">Sphenophyta</option>
                                        <option value="Pterophyta">Pterophyta</option>
                                        <option value="Coniferophyta">Coniferophyta</option>
                                        <option value="Cycadophyta">Cycadophyta</option>
                                        <option value="Ginkgophyta">Ginkgophyta</option>
                                        <option value="Gnetophyta">Gnetophyta</option>
                                        <option value="Anthophyta">Anthophyta</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                        </form>
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
                    <a class="btn btn-primary" href="logout.php">ออกจากระบบ</a>
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