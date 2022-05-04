<?php

session_start();

include '../config/database.php';
include '../includes/autoLoader.php';
include '../includes/manageAttendInc.php';

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

        <title>View Attendance | CSSX</title>

        <script src="https://kit.fontawesome.com/e99c038151.js" crossorigin="anonymous"></script>

        <!-- MDB -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

                <!-- Nav Item - attendances Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseEmp" aria-expanded="true" aria-controls="collapseEmp">
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
                                <a class="collapse-item" href="manage-leave.php">Request Leaves</a>
                            <?php } ?>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Attendance -->
                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAttendance" aria-expanded="true" aria-controls="collapseAttendance">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>Attendance</span>
                    </a>
                    <div id="collapseAttendance" class="collapse show" aria-labelledby="headingAttendance" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item active" href="view-attendance.php">View Attendance</a>
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

                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <div class="row justify-content-center">

                                <!-- Page Heading -->
                                <?php if ($_SESSION['role'] == "Admin") { ?>
                                    <h1 class="h3 mb-4 text-gray-800 text-center"><strong> Employee Attendance </strong></h1>
                                <?php } else { ?>
                                    <h1 class="h3 mb-4 text-gray-800 text-center"><strong> Your Attendance </strong></h1>
                                <?php } ?>

                                <div class="row col-md-12 justify-content-center">
                                    <div class="card mb-3 col-lg-10">
                                        <div class="card-body">

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead class="bg-gradient bg-primary text-white">
                                                        <tr>
                                                            <?php if ($_SESSION['role'] == "Admin") { ?>
                                                                <th>Attendance ID</th>
                                                                <th>Employee Full Name</th>
                                                            <?php } else { ?>
                                                                <th>Day</th>
                                                            <?php } ?>
                                                            <th>Date</th>
                                                            <th>Time</th>
                                                            <th>Status</th>
                                                            <th> </th>
                                                            <?php
                                                            if ($_SESSION['role'] == "Admin") {
                                                            ?>
                                                                <th>Action</th>
                                                            <?php } ?>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    $attendanceContr = new AttendanceContr();
                                                    if ($_SESSION['role'] == "Admin") {
                                                        $attendances = $attendanceContr->selectAllAttendances();
                                                    } else {
                                                        $attendances = $attendanceContr->selectEmpAttendance($_SESSION['valid_user']);
                                                    }

                                                    if ($attendances != null) {
                                                        $employeeContr = new EmployeeContr();
                                                        foreach ($attendances as $attendance) {
                                                            $date = date('M j, Y', strtotime($attendance['date']));
                                                            $time = date('g:i A', strtotime($attendance['date']));
                                                            $day = date('l', strtotime($attendance['date']));
                                                            $employee = $employeeContr->selectEmployee($attendance['employee_id']);
                                                    ?>
                                                            <tbody>
                                                                <tr>
                                                                    <?php if ($_SESSION['role'] == "Admin") { ?>
                                                                        <th><?php echo $attendance['attendance_id']; ?></th>
                                                                        <td><?php echo $employee[0]['first_name'] . " " . $employee[0]['last_name']; ?></td>
                                                                    <?php } else { ?>
                                                                        <th><?php echo $day; ?></th>
                                                                    <?php } ?>
                                                                    <td><?php echo $date; ?></td>
                                                                    <td><?php echo $time; ?></td>
                                                                    <td><?php echo $attendance['status']; ?></td>

                                                                    <?php if ($attendance['status'] == "On Time") { ?>
                                                                        <td><img src="../img/ontime.png" class="img-circle" alt="On Time Img" style="height: 50px;"></td>
                                                                    <?php } else { ?>
                                                                        <td><img src="../img/late.png" class="img-circle" alt="Late Img" style="height: 50px;"></td>
                                                                    <?php
                                                                    }
                                                                    if ($_SESSION['role'] == "Admin") {
                                                                    ?>
                                                                        <td>
                                                                            <a class="btn btn-primary btn-xs text-capitalize" data-toggle="modal" data-target="#editAttend<?php echo $attendance['attendance_id']; ?>"><i class="fa-solid fa-pencil"></i></a>
                                                                        </td>
                                                                    <?php } ?>
                                                                </tr>
                                                            </tbody>

                                                            <div class="modal fade" id="editAttend<?php echo $attendance['attendance_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editAttend<?php echo $attendance['attendance_id']; ?>" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="delEmp<?php echo $attendance['attendance_id']; ?>"><strong> Edit Status of Employee Attendance </strong></h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form action="view-attendance.php" method="POST">
                                                                            <div class="modal-body">
                                                                                <div class="text-center">
                                                                                    <?php
                                                                                    $employeeContr = new EmployeeContr();
                                                                                    $employee = $employeeContr->selectEmployee($attendance['employee_id']);
                                                                                    $date = date('M j, Y', strtotime($attendance['date']));
                                                                                    $time = date('G:i A', strtotime($attendance['date']));
                                                                                    ?>
                                                                                    <?php echo "Attendance ID: " . "<strong>" . $attendance['attendance_id'] . "</strong>"; ?> <br>
                                                                                    <?php echo "Employee Full Name: " . "<strong>" . $employee[0]['first_name'] . " " . $employee[0]['last_name'] . "</strong>"; ?> <br>
                                                                                    <?php echo "Date: " . "<strong>" . $date . " | " . $time . "</strong>"; ?>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="status"><strong> Status: </strong></label>
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input" type="radio" name="status" id="Radios1" value="On Time" <?php echo ($attendance['status'] == 'On Time' ? ' checked=checked' : ''); ?>>
                                                                                        <label class="form-check-label" for="Radios1">
                                                                                            On Time
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input" type="radio" name="status" id="Radios2" value="Late" <?php echo ($attendance['status'] == 'Late' ? ' checked=checked' : ''); ?>>
                                                                                        <label class="form-check-label" for="Radios2">
                                                                                            Late
                                                                                        </label>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary text-capitalize" data-dismiss="modal">Cancel</button>
                                                                                <input type="hidden" name="attendanceID" value="<?php echo $attendance['attendance_id'] ?>" />
                                                                                <button onclick="this.form.submit()" name="editAttend" class="btn btn-primary text-capitalize">Update</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="5" class="text-center"><strong>There are no attendances!<strong></td>
                                                            </tr>
                                                        </tbody>
                                                    <?php } ?>
                                                </table>
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

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

    </body>

    </html>

<?php
} else {
    header("Location: ../view/login.php");
}
?>