<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PNRUPLANT ADMIN</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- table -->
    <link href="datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
<?php
if($_SESSION["user_login"]) {
?>
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
                <a class="nav-link" href="admin.php">
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

            <li class="nav-item">
                <a class="nav-link" href="imguploads.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>เพิ่มรูปภาพ</span></a>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["user_login"]; ?>.</span>
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                ต้นไม้ทั้งหมด</div>
                                            <?php
                                            //1. เชื่อมต่อ database: 
                                            include('connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                                            //2. query ข้อมูลจากตาราง tb_member: 
                                            $query = "SELECT COUNT(area.plantlocationID) AS plantlocationID FROM area" or die("Error:" . mysqli_error());
                                            //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
                                            $results = mysqli_query($conn, $query);
                                            //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 
                                            while ($row = mysqli_fetch_assoc($results)) {
                                                echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>" . $row["plantlocationID"] . "</div>";
                                            }
                                            mysqli_close($conn);
                                            ?>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-tree fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">พรรณไม้ทั้งหมด</div>

                                            <?php
                                            //1. เชื่อมต่อ database: 
                                            include('connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                                            //2. query ข้อมูลจากตาราง tb_member: 
                                            $query = "SELECT COUNT(plantdetail.PlandetailtID) AS PlandetailtID FROM plantdetail" or die("Error:" . mysqli_error());
                                            //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
                                            $results = mysqli_query($conn, $query);
                                            //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 
                                            while ($row = mysqli_fetch_assoc($results)) {
                                                echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>" . $row["PlandetailtID"] . "</div>";
                                            }
                                            mysqli_close($conn);
                                            ?>



                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-tree fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Row -->

                        <!-- Color System -->

                        <div class="col-lg-6 mb-4">
                            <div class="card bg-light text-white shadow">
                                <div class="card-body">
                                    <a class="nav-link" href="Insert_plant.php">เพิ่มต้นไม้ใหม่</a>
                                    <!-- <div class="text-white-50 small">#4e73df</div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-light text-white shadow">
                                <div class="card-body">
                                <a class="nav-link" href="Insert_detail.php">เพิ่มพรรณไม้ใหม่</a>
                                    
                                    <!-- <div class="text-white-50 small">#1cc88a</div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-light text-white shadow">
                                <div class="card-body">
                                    <a class="nav-link href=" #allplant">ดูต้นไม้ทั้งหมด</a>
                                    <!-- <div class="text-white-50 small"></div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-light text-white shadow">
                                <div class="card-body">
                                    <a class="nav-link" href="detail_Plant.php">ดูพรรณไม้ทั้งหมด</a>

                                    <!-- <div class="text-white-50 small">#f6c23e</div> -->
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6 mb-4">
                            <div class="card bg-danger text-white shadow">
                                <div class="card-body">
                                    Danger
                                    <div class="text-white-50 small">#e74a3b</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-secondary text-white shadow">
                                <div class="card-body">
                                    Secondary
                                    <div class="text-white-50 small">#858796</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-light text-black shadow">
                                <div class="card-body">
                                    Light
                                    <div class="text-black-50 small">#f8f9fc</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-dark text-white shadow">
                                <div class="card-body">
                                    Dark
                                    <div class="text-white-50 small">#5a5c69</div>
                                </div>
                            </div>
                        </div> -->

                    </div>
                    <!-- /.container-fluid -->
                    <!-- DataTales Example 1-->
                    <div class="card shadow mb-4" id="allplant">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ต้นไม้ทั้งหมด</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <?php

                                        //1. เชื่อมต่อ database: 
                                        include('connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                                        //2. query ข้อมูลจากตาราง tb_member: 
                                        $query3 = "SELECT * FROM `area` ORDER BY `PlandetailtID` ASC" or die("Error:" . mysqli_error());
                                        //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
                                        $result3 = mysqli_query($conn, $query3);
                                        ?>
                                        <tr>
                                            <th>รหัสต้นไม้</th>
                                            <th>รหัสพื้นที่</th>
                                            <th>รหัสพรรณไม้</th>
                                            <th>ลองจิจูด</th>
                                            <th>ละติจูด </th>
                                            <th>สถานะ</th>
                                            <th>วันที่เพิ่ม</th>
                                            <!-- <th>qrcode</th> -->
                                            <th>แก้ไข้</th>
                                            <th>ลบ</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>รหัสต้นไม้</th>
                                            <th>รหัสพื้นที่</th>
                                            <th>รหัสพรรณไม้</th>
                                            <th>ลองจิจูด</th>
                                            <th>ละติจูด </th>
                                            <th>สถานะ</th>
                                            <th>วันที่เพิ่ม</th>
                                            <!-- <th>qrcode</th> -->
                                            <th>แก้ไข้</th>
                                            <th>ลบ</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        while ($row3 = mysqli_fetch_array($result3)) {
                                            echo "<tr>";
                                            echo "<th><a href='adminPlantdetail.php?ID=$row3[0]'>" . $row3["plantlocationID"] .  "</th> ";
                                            echo "<td>" . $row3["ZoneID"] .  "</td> ";
                                            echo "<td><a href='admindetail.php?ID=$row3[2]'>" . $row3["PlandetailtID"] .  "</td> ";
                                            echo "<td>" . $row3["longtitudeY"] .  "</td> ";
                                            echo "<td>" . $row3["latitudeX"] .  "</td> ";
                                            echo "<td>" . $row3["status"] .  "</td> ";
                                            echo "<td>" . $row3["statusDate"] .  "</td> ";
                                            // echo "<td>" . $row3["qrcode"] .  "</td> ";
                                            //เมนูดูข้อมูลอัพเดท
                                            echo "<td><a href='adminPlantdetail.php?ID=$row3[0]'>แก้ไข้ข้อมูล</a><br></td>  ";
                                            //ลบข้อมูล
                                            echo "<td><a href='DeleteArea.php?ID=$row3[0]' onclick=\"return confirm('คุณต้องการลบพรรณไม้ " . $row3["plantlocationID"] . " ใช่ไหม')\">ลบข้อมูล</a></td> ";
                                            echo "</tr>";
                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; PNRU PLANT 2020</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
    <?php
}else echo "<h1>Please login first .</h1>";
?>
</body>

</html>