<?php

session_start();

include '../config/database.php';
include '../includes/autoLoader.php';
include '../includes/userInfo.php';
include '../includes/resetInc.php';

if ($_SESSION['valid_user']) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Change Password</title>

        <script src="https://kit.fontawesome.com/e99c038151.js" crossorigin="anonymous"></script>

        <!-- Custom fonts for this template-->
        <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="../../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                    <div class="sidebar-brand-icon">
                        <img src="../img/logo.png" class="img-fluid" style="height: 60px;">
                    </div>
                    <div class="sidebar-brand-text mx-3"> CSSX </div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">
                        <img src="../img/dashboard.png" class="img-fluid" style="height: 25px;">
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmp" aria-expanded="true" aria-controls="collapseEmp">
                        <i class='fas fa-user-cog'></i>
                        <span>Employee</span>
                    </a>
                    <div id="collapseEmp" class="collapse" aria-labelledby="headingEmp" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="manage_emp.php">Manage Employees</a>
                            <a class="collapse-item" href="add_employee.php">Add Employee</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePayroll" aria-expanded="true" aria-controls="collapsePayroll">
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                        <span>Payroll</span>
                    </a>
                    <div id="collapsePayroll" class="collapse" aria-labelledby="headingPayroll" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="utilities-color.html">Manage Payslips</a>
                            <a class="collapse-item" href="utilities-color.html">Add Payslip</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLeave" aria-expanded="true" aria-controls="collapseLeave">
                        <i class="fa-solid fa-bed"></i>
                        <span>Leave</span>
                    </a>
                    <div id="collapseLeave" class="collapse" aria-labelledby="headingLeave" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="404.html">Manage Leaves</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAttendance" aria-expanded="true" aria-controls="collapseAttendance">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>Attendance</span>
                    </a>
                    <div id="collapseAttendance" class="collapse" aria-labelledby="headingAttendance" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="404.html">View Attendance Records</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Department -->
                <li class="nav-item">
                    <a class="nav-link" href="department.php">
                        <i class="fa-solid fa-building"></i>
                        <span>Department</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <?php include '../includes/static_content/topBar.php' ?>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <div class="row justify-content-center">

                            <div class="col-md-5">
                                <div class="card mb-3">
                                    <div class="card-header text-center">
                                        <h4><strong> Change Your Password </strong></h4>
                                        Enter your current password and a new password.
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        if (isset($_GET['changepw'])) {
                                            $pwCheck = $_GET['changepw'];

                                            if ($pwCheck == "empty") {
                                                echo "<div class='alert alert-danger alert-dismissible text-center'> 
                                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            <strong> All Fields Are Required! </strong>
                                            </div>";
                                            } elseif ($pwCheck == "invalidCurrentPass") {
                                                echo "<div class='alert alert-danger alert-dismissible text-center'> 
                                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            <strong> Invalid Current Password! </strong>
                                            </div>";
                                            } elseif ($pwCheck == "mismatch") {
                                                echo "<div class='alert alert-danger alert-dismissible text-center'> 
                                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            <strong> Password does not match! </strong>
                                            </div>";
                                            } elseif ($pwCheck == "invalid") {
                                                echo "<div class='alert alert-danger alert-dismissible text-center'> 
                                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            <strong> Invalid current password and pasword does not match! </strong>
                                            </div>";
                                            } else {
                                                echo "<div class='alert alert-success alert-dismissible text-center'> 
                                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            <strong> Password has been changed! </strong>
                                            </div>";
                                            }
                                        }
                                        ?>

                                        <form action="change-password.php" method="POST">
                                            <div class="form-group">
                                                <label for="currentpass">Current Password:</label>
                                                <input type="password" id="currentpass" name="currentpass" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="newpass">New Password:</label>
                                                <input type="password" name="newpass" class="form-control" id="newpass">
                                            </div>
                                            <div class="form-group">
                                                <label for="repassword">Confirm New Password:</label>
                                                <input type="password" name="repassword" class="form-control" id="repassword">
                                            </div>

                                            <input type="submit" name="submitPass" class="btn btn-primary" value="Update" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <?php include "../includes/static_content/footer.html" ?>
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
        <?php include "../includes/static_content/logoutModal.html" ?>

        <!-- Bootstrap core JavaScript-->
        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../../js/sb-admin-2.min.js"></script>

    </body>

    </html>

<?php
} else {
    header("Location: ../view/login.php");
}
?>