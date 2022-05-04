<?php

session_start();

include '../config/database.php';
include '../includes/autoLoader.php';
include '../includes/manageEmpInc.php';

if (isset($_SESSION['valid_user'])) {
    if ($_SESSION['role'] == 'Admin') {
        $empID = 0;
        if (isset($_GET["empID"])) {
            $empID = $_GET["empID"];
        }

        $employeeContr = new EmployeeContr();
        $employee = $employeeContr->selectEmployee($empID);
        $deptContr = new DepartmentContr();
        $dept = $deptContr->selectDepartment($employee[0]['dept_id']);

        $jobContr = new JobContr();
        $job = $jobContr->selectJob($employee[0]['job_id']);
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>Edit Employee | CSSX</title>

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
                                    <a class="collapse-item active" href="manage-leave.php">Request Leaves</a>
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

                            <div class="row justify-content-center">

                                <div class="col-xs-12 col-md-10 col-lg-5">
                                    <div class="card mb-3">
                                        <div class="card-header text-center">
                                            <h4><strong> Edit Employee </strong></h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="edit-emp.php" method="POST">
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <label for="fname">First Name:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-text">
                                                                    <i class="fa-solid fa-user"></i>
                                                                </div>
                                                                <input type="text" id="fname" name="fname" class="form-control" value="<?php echo $employee[0]['first_name'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <label for="lname">Last Name:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-text">
                                                                    <i class="fa-solid fa-user"></i>
                                                                </div>
                                                                <input type="text" id="lname" name="lname" class="form-control" value="<?php echo $employee[0]['last_name'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <label for="dept">Department:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-text">
                                                                    <i class="fa-solid fa-building"></i>
                                                                </div>
                                                                <select id="dept" name="deptName" class="form-select">
                                                                    <option disabled="disabled"> Select Department </option>
                                                                    <?php
                                                                    $depts = $deptContr->selectAllDepartments();
                                                                    foreach ($depts as $depart) {
                                                                    ?>
                                                                        <option <?php echo $depart['name'] == $dept[0]['name'] ? 'selected="selected"' : ''; ?>> <?php echo $depart['name']; ?> </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <label for="job">Job:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-text">
                                                                    <i class="fa-solid fa-briefcase"></i>
                                                                </div>
                                                                <select id="job" name="jobTitle" class="form-select">
                                                                    <option disabled="disabled"> Select Job Title </option>
                                                                    <?php
                                                                    $jobs = $jobContr->selectAllJobs();
                                                                    foreach ($jobs as $j) {
                                                                    ?>
                                                                        <option <?php echo $j['title'] == $job[0]['title'] ? 'selected="selected"' : ''; ?>> <?php echo $j['title']; ?> </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <label for="email">Email Address:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-text">
                                                            <i class="fa-solid fa-envelope"></i>
                                                        </div>
                                                        <input type="email" id="email" name="email" class="form-control" value="<?php echo $employee[0]['email_address'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <label for="gender">Gender:</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="gender" id="Radios1" value="Male" <?php echo ($employee[0]['gender'] == 'Male' ? ' checked=checked' : ''); ?>>
                                                                <label class="form-check-label" for="Radios1">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="gender" id="Radios2" value="Female" <?php echo ($employee[0]['gender'] == 'Female' ? ' checked=checked' : ''); ?>>
                                                                <label class="form-check-label" for="Radios2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="gender" id="Radios3" value="Others" <?php echo ($employee[0]['gender'] == 'Others' ? ' checked=checked' : ''); ?>>
                                                                <label class="form-check-label" for="Radios3">
                                                                    Others
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <label for="birthday">Birthday:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-text">
                                                                    <i class="fa-solid fa-cake-candles"></i>
                                                                </div>
                                                                <input type="date" id="birthday" name="birthday" class="form-control" value="<?php echo $employee[0]['birth_date'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Address:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-text">
                                                            <i class="fa-solid fa-house"></i>
                                                        </div>
                                                        <input type="text" id="address" name="address" class="form-control" value="<?php echo $employee[0]['address'] ?>">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <label for="phone">Phone:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-text">
                                                            <i class="fa-solid fa-phone"></i>
                                                        </div>
                                                        <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control col-md-5 col-sm-5" value="<?php echo $employee[0]['phone'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="datejoined">Date Joined:</label>
                                                    <input type="date" id="datejoined" name="datejoined" class="form-control col-md-5 col-sm-5" value="<?php echo $employee[0]['date_joined'] ?>">
                                                </div>
                                                <a href="manage-emp.php" class="btn btn-secondary btn-xs text-capitalize">Cancel</a>
                                                <input type="hidden" name="empID" value="<?php echo $empID ?>" />
                                                <input type="submit" name="editEmp" class="btn btn-primary text-capitalize" value="Update" />
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
        header("Location: ../view/dashboard.php");
    }
} else {
    header("Location: ../view/login.php");
}
?>