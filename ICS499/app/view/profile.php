<?php

session_start();

include '../config/database.php';
include '../includes/autoLoader.php';
include '../includes/profileInc.php';
include '../includes/userInfo.php';

if (isset($_SESSION['valid_user'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Profile | CSSX</title>

        <script src="https://kit.fontawesome.com/e99c038151.js" crossorigin="anonymous"></script>

        <!-- MDB -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet" />

        <!-- Custom fonts for this template-->
        <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
                        <img src="../img/weblogo.png" class="img-responsive" style="height: 120px;">
                    </div>
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

                <!-- Nav Item - Employees Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmp" aria-expanded="true" aria-controls="collapseEmp">
                        <i class='fas fa-user-cog'></i>
                        <span>Employee</span>
                    </a>
                    <div id="collapseEmp" class="collapse" aria-labelledby="headingEmp" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <?php
                            if ($_SESSION['role'] == "Admin") {
                            ?>
                                <a class="collapse-item" href="manage-emp.php">Manage Employees</a>
                                <a class="collapse-item" href="add-emp.php">Add Employee</a>
                            <?php } else { ?>
                                <a class="collapse-item" href="manage-emp.php">View Employees</a>
                            <?php } ?>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Payslip Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePayroll" aria-expanded="true" aria-controls="collapsePayroll">
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                        <span>Payroll</span>
                    </a>
                    <div id="collapsePayroll" class="collapse" aria-labelledby="headingPayroll" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <?php
                            if ($_SESSION['role'] == "Admin") {
                            ?>
                                <a class="collapse-item" href="manage-payslip.php">Manage Payslips</a>
                                <a class="collapse-item" href="add-payslip.php">Add Payslip</a>
                            <?php } else { ?>
                                <a class="collapse-item" href="manage-payslip.php">View Payslips</a>
                            <?php } ?>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Leave Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLeave" aria-expanded="true" aria-controls="collapseLeave">
                        <i class="fa-solid fa-bed"></i>
                        <span>Leave</span>
                    </a>
                    <div id="collapseLeave" class="collapse" aria-labelledby="headingLeave" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <?php
                            if ($_SESSION['role'] == "Admin") {
                            ?>
                                <a class="collapse-item" href="manage-leave.php">Manage Leaves</a>
                            <?php } else { ?>
                                <a class="collapse-item " href="manage-leave.php">Request Leaves</a>
                            <?php } ?>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Attendance -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAttendance" aria-expanded="true" aria-controls="collapseAttendance">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>Attendance</span>
                    </a>
                    <div id="collapseAttendance" class="collapse" aria-labelledby="headingAttendance" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="view-attendance.php">View Attendance</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Department -->
                <li class="nav-item">
                    <a class="nav-link" href="department.php">
                        <i class="fa-solid fa-building"></i>
                        <span>Department</span></a>
                </li>

                <!-- Nav Item - Company News -->
                <li class="nav-item">
                    <a class="nav-link" href="company-news.php">
                        <i class="fa-solid fa-newspaper"></i>
                        <span>Company News</span></a>
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

                        <div class="row gutters-sm">
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <?php
                                            if ($error != "") {
                                                echo "<div class='alert alert-danger alert-dismissible text-center'>
                                                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                                <strong>" . $error . "</strong>
                                                </div>";
                                            }
                                            ?>
                                            <img src="../img/<?php echo $user[0]['photo'] ?>" alt="profile pic" class="rounded-circle" width="150">
                                            <div class="mt-3">
                                                <h4><strong><?php echo $user[0]['first_name'] . ' ' . $user[0]['last_name'] ?></strong></h4>

                                                <?php
                                                if ($_SESSION['role'] == "Admin") {
                                                    echo '<p class="text-secondary mb-2"> Role: Admin </p>';
                                                    echo '<p class="text-secondary mb-1">Employee Manager</p>';
                                                } else {
                                                    echo '<p class="text-secondary mb-2"> Role: Employee </p>';
                                                    $deptContr = new DepartmentContr();
                                                    $dept = $deptContr->selectDepartment($user[0]['dept_id']);
                                                    echo '<p class="text-secondary mb-1"> Department: ' . $dept[0]['name'] . '</p>';
                                                }
                                                ?>
                                                <br>
                                                <button type="button" class="btn btn-primary text-capitalize" data-toggle="modal" data-target="#pfp">Change Profile Photo</button>
                                            </div>

                                            <!-- Change Profile Pic Modal -->
                                            <div class="modal fade" id="pfp" tabindex="-1" role="dialog" aria-labelledby="pfp" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="pfp">Change Your Profile Picture</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <form action="profile.php" method="POST" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <img src="https://bootstrapious.com/i/snippets/sn-file-upload/img.png" width="150">
                                                                <div class="form-group mb-3 mt-3">
                                                                    <input id="file" name="file" type="file" class="col-md-10 form-control" required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary text-capitalize" data-dismiss="modal">Cancel</button>
                                                                <input type="submit" name="submitPhoto" class="btn btn-primary text-capitalize" value="Update" />
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Full Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $user[0]['first_name'] . ' ' . $user[0]['last_name'] ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Email</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $user[0]['email_address'] ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Gender</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $user[0]['gender'] ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Birthday</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo date('F j, Y', strtotime($user[0]['birth_date'])) ?>
                                            </div>
                                        </div>
                                        <?php
                                        if ($_SESSION['role'] == 'Employee') {
                                        ?>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Address</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <?php echo $user[0]['address'] ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Phone</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $user[0]['phone'] ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <button type="button" class="btn btn-primary text-capitalize" data-toggle="modal" data-target="#profile">Edit Profile</button>
                                                <a href="change-password.php" class="btn btn-primary text-capitalize">Change Password</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Profile Modal -->
                                    <div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="profile" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="profile">Edit Your Profile</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form action="profile.php" method="POST">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <div class="form-row">
                                                                <div class="col">
                                                                    <label for="fname">First Name:</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-text">
                                                                            <i class="fa-solid fa-user"></i>
                                                                        </div>
                                                                        <input type="text" id="fname" name="fname" class="form-control" value="<?php echo $user[0]['first_name'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <label for="lname">Last Name:</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-text">
                                                                            <i class="fa-solid fa-user"></i>
                                                                        </div>
                                                                        <input type="text" id="lname" name="lname" class="form-control" value="<?php echo $user[0]['last_name'] ?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="gender">Gender:</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="gender" id="Radios1" value="Male" <?php echo ($user[0]['gender'] == 'Male' ? ' checked=checked' : ''); ?> required>
                                                                <label class="form-check-label" for="Radios1">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="gender" id="Radios2" value="Female" <?php echo ($user[0]['gender'] == 'Female' ? ' checked=checked' : ''); ?> required>
                                                                <label class="form-check-label" for="Radios2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="gender" id="Radios3" value="Others" <?php echo ($user[0]['gender'] == 'Others' ? ' checked=checked' : ''); ?> required>
                                                                <label class="form-check-label" for="Radios3">
                                                                    Others
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="birthday">Birthday:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-text">
                                                                    <i class="fa-solid fa-cake-candles"></i>
                                                                </div>
                                                                <input type="date" id="birthday" name="birthday" class="form-control col-md-5 col-sm-5" value="<?php echo $user[0]['birth_date'] ?>" required>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        if ($_SESSION['role'] == 'Employee') {
                                                        ?>
                                                            <div class="form-group">
                                                                <label for="address">Address:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-text">
                                                                        <i class="fa-solid fa-house"></i>
                                                                    </div>
                                                                    <input type="text" id="address" name="address" class="form-control" value="<?php echo $user[0]['address'] ?>" required>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="form-group">
                                                            <label for="phone">Phone:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-text">
                                                                    <i class="fa-solid fa-phone"></i>
                                                                </div>
                                                                <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control col-md-5 col-sm-5" value="<?php echo $user[0]['phone'] ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=" modal-footer">
                                                        <button type="button" class="btn btn-secondary text-capitalize" data-dismiss="modal">Cancel</button>
                                                        <input type="submit" name="submitProfile" class="btn btn-primary text-capitalize" value="Update" />
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
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