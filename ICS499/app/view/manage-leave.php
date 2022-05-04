<?php

session_start();

include '../config/database.php';
include '../includes/autoLoader.php';

if (isset($_SESSION['valid_user'])) {

    $employeeContr = new EmployeeContr();
    $employee = $employeeContr->selectEmployee($_SESSION['valid_user']);

    $leaveContr = new LeaveContr();
    $leaves = $leaveContr->selectAllLeaves();
    $flag = false;
    $leaveColor = "none";
    foreach ($leaves as $leave) {
        $leave_end = date('Y-m-d', strtotime($leave['leave_end']));
        if ($leave_end < date('Y-m-d')) {
            $leaveContr->updateLeaveState($leave['leave_id'], "Done");
        } else {
            $leaveContr->updateLeaveState($leave['leave_id'], "Not Done");
        }

        if (($_SESSION['valid_user'] == $leave['employee_id']) && ($_SESSION['role'] == 'Employee') && ($leave['state'] == 'Not Done')) {
            $flag = true;
            $leaveColor = $leave['leave_color'];
            $startDate = date('M j, Y', strtotime($leave['leave_start']));
            $endDate = date('M j, Y', strtotime($leave['leave_end']));
        }
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Manage Leave | CSSX</title>

        <link rel="stylesheet" href="../../calendar/calendar.css">
        <script src="../../calendar/calendar.js"></script>

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
                <li class="nav-item active">
                    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseLeave" aria-expanded="true" aria-controls="collapseLeave">
                        <i class="fa-solid fa-bed"></i>
                        <span>Leave</span>
                    </a>
                    <div id="collapseLeave" class="collapse show" aria-labelledby="headingLeave" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <?php
                            if ($_SESSION['role'] == "Admin") {
                            ?>
                                <a class="collapse-item active" href="manage-leave.php">Manage Leaves</a>
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

                        <div class="row justify-content-center mb-5">

                            <div class="row justify-content-center mb-2 h3 text-dark">
                                <?php if ($_SESSION['role'] == "Employee") { ?>
                                    <strong class="text-center"> Request Leave </strong>
                                <?php } else { ?>
                                    <strong class="text-center"> Manage Leave </strong>
                                    <?php }
                                if (($flag == true) && ($_SESSION['role'] == 'Employee')) {
                                    if ($leaveColor == '#90EE90') {
                                    ?>
                                        <div class='alert alert-success alert-dismissible text-center h6 col-lg-5'>
                                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            <strong> Your request was approved! </strong> <br>
                                            You should have recieved an email as well. <br>
                                            On Leave Date: <?php echo $startDate . " - " . $endDate; ?>
                                        </div>
                                    <?php } elseif ($leaveColor == '#e4edff') { ?>
                                        <div class='alert alert-info alert-dismissible text-center h6 col-lg-5'>
                                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            <strong> Your request is currently pending! </strong> <br>
                                            If you made any mistake, please contact this email: <br>
                                            <strong>no.reply.ics449@gmail.com</strong>
                                        </div>
                                    <?php }
                                }
                                if ($employee[0]['num_leave'] == 12 && $_SESSION['role'] == 'Employee') { ?>
                                    <div class='alert alert-info alert-dismissible text-center h6 col-lg-5'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong> You have reached the max leave request (12 requests) ! </strong> <br>
                                        If you need more requests, please contact this email: <br>
                                        <strong>no.reply.ics449@gmail.com</strong>
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="col-lg-11">
                                <!-- (A) PERIOD SELECTOR -->
                                <div id="calPeriod">

                                    <?php
                                    // (A1) MONTH SELECTOR
                                    // NOTE: DEFAULT TO CURRENT SERVER MONTH YEAR
                                    $months = [
                                        1 => "January", 2 => "Febuary", 3 => "March", 4 => "April",
                                        5 => "May", 6 => "June", 7 => "July", 8 => "August",
                                        9 => "September", 10 => "October", 11 => "November", 12 => "December"
                                    ];
                                    $monthNow = date("m");
                                    echo "<select id='calmonth'>";
                                    foreach ($months as $m => $mth) {
                                        printf(
                                            "<option value='%s'%s>%s</option>",
                                            $m,
                                            $m == $monthNow ? " selected" : "",
                                            $mth
                                        );
                                    }
                                    echo "</select>";

                                    // (A2) YEAR SELECTOR
                                    echo "<input type='number' id='calyear' value='" . date("Y") . "'/>";
                                    ?>

                                    <span id="approve"><strong> Approved </strong></span>
                                    <span id="request"><strong> Pending Requests </strong></span>
                                </div>

                                <!-- (B) CALENDAR WRAPPER -->
                                <div id="calwrap"></div>
                            </div>
                            <!-- (C) EVENT FORM -->
                            <div id="calblock">
                                <form id="calform">
                                    <?php
                                    if ($employee[0]['num_leave'] < 12) {
                                        if ($flag == false) {
                                    ?>
                                            <input type="hidden" name="req" value="save" />
                                            <input type="hidden" id="evtid" name="eid" />
                                    <?php }
                                    } ?>
                                    <label for="employeeID">Selected Employee ID: </label>

                                    <input type="text" id="employeeID" name="employeeID" class="form-control" value="<?php echo $_SESSION['valid_user'] ?>" readonly />
                                    <input type="hidden" id="role" name="role" value="<?php echo $_SESSION['role'] ?>" />
                                    <?php if ($_SESSION['role'] == "Employee") { ?>
                                        <label for="start">Date Start: </label>
                                        <input type="date" id="evtstart" name="start" class="form-control" required />
                                        <label for="end">Date End: </label>
                                        <input type="date" id="evtend" name="end" class="form-control" required />
                                        <label for="txt">Reason for requested leave: </label>
                                        <textarea id="evttxt" name="txt" class="form-control" required></textarea>
                                    <?php } else { ?>
                                        <input type="hidden" id="evtstart" name="start" class="form-control" required />
                                        <input type="hidden" id="evtend" name="end" class="form-control" required />
                                        <textarea id="evttxt" name="txt" class="form-control" required hidden></textarea>
                                    <?php }
                                    if ($_SESSION['role'] == "Employee") { ?>
                                        <input type="submit" id="calformsave" class="btn text-capitalize" name="request" value="Request" />
                                    <?php } else { ?>
                                        <input type="submit" id="calformsave" class="btn text-capitalize" name="approve" value="Approve" />
                                    <?php } ?>
                                    <input type="button" id="calformdel" class="btn text-capitalize" name="delete" value="Deny" />
                                    <input type="button" id="calformcx" value="Cancel" class="btn text-capitalize" />
                                </form>
                            </div>

                        </div>
                    </div>

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