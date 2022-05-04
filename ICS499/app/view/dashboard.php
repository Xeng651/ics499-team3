<?php

session_start();

include '../config/database.php';
include '../includes/autoLoader.php';
include '../includes/userInfo.php';
include '../includes/attendanceInc.php';

date_default_timezone_set("US/Central");

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

        <title>Dashboard | CSSX</title>

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
                <li class="nav-item active">
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
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Search -->
                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <h1 class="h4 mb-0 text-gray-800">Welcome, <?php echo $user[0]['first_name'] . " " . $user[0]['last_name'] ?></h1>
                        </form>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user[0]['first_name'] . " " . $user[0]['last_name'] ?></span>
                                    <img class="img-profile rounded-circle" src="../img/<?php echo $user[0]['photo'] ?>">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="profile.php">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <?php
                        if (isset($_GET['checkin'])) {
                            $checkin = $_GET['checkin'];

                            if ($checkin == "exist") {
                                echo "<div class='alert alert-danger alert-dismissible text-center'> 
                                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            <strong> You've already checked in for today! </strong>
                                        </div>";
                            } else {
                                echo "<div class='alert alert-success alert-dismissible text-center'> 
                                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            <strong> You have been checked in for today! </strong>
                                        </div>";
                            }
                        }
                        ?>

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-2">
                            <h1 class="h3 text-gray-800">Dashboard</h3>
                                <?php if ($_SESSION['role'] == 'Employee') { ?>
                                    <form action="dashboard.php" method="POST">
                                        <input type="hidden" name="empID" value="<?php echo $_SESSION['valid_user'] ?>" />
                                        <input type="hidden" name="datetime" value="<?php echo time(); ?>" />
                                        <input type="hidden" name="date" value="<?php echo date('Y-m-d', time()); ?>" />
                                        <input type="submit" name="checkin" value="Check In" class="btn btn-primary btn-user btn-block text-capitalize" <?php echo isset($_POST["checkin"]) ? "disabled" : ""; ?>></input>
                                    </form>
                                <?php } ?>
                                <div id="MyClockDisplay" class="clock text-dark h3" onload="showTime()"></div>
                        </div>
                        <?php

                        $employeeContr = new EmployeeContr();
                        $departmentContr = new DepartmentContr();
                        $leaveContr = new LeaveContr();
                        $attendanceContr = new AttendanceContr();

                        $totalEmp = $employeeContr->showTotalEmployeeNum();
                        $totalDept = $departmentContr->showTotalDeptNum();
                        $totalLeave = $leaveContr->showTotalLeaveByColor("#e4edff");
                        $totalLeaveOfEmp = $leaveContr->showTotalLeaveOfEmployee("#90EE90", $_SESSION['valid_user']);
                        
                        $attendances = $attendanceContr->selectAllAttendances();
                        $count = 0;
                        foreach ($attendances as $attendance) {
                            if (date('Y-m-d', strtotime($attendance['date'])) == (date('Y-m-d'))) {
                                $count = $count + 1;
                            }
                        }
                        ?>
                        <!-- Content Row -->
                        <div class="row">

                            <div><a class="weatherwidget-io mb-2 rounded" href="https://forecast7.com/en/44d98n93d27/minneapolis/?unit=us" data-label_1="MINNEAPOLIS" data-label_2="WEATHER" data-font="Roboto" data-theme="original" data-basecolor="#22608b">MINNEAPOLIS WEATHER</a>
                                <script>
                                    ! function(d, s, id) {
                                        var js, fjs = d.getElementsByTagName(s)[0];
                                        if (!d.getElementById(id)) {
                                            js = d.createElement(s);
                                            js.id = id;
                                            js.src = 'https://weatherwidget.io/js/widget.min.js';
                                            fjs.parentNode.insertBefore(js, fjs);
                                        }
                                    }(document, 'script', 'weatherwidget-io-js');
                                </script>

                            </div>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-bottom-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                                    Total Employees </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalEmp ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa-solid fa-users fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Departments Card -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-bottom-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-md font-weight-bold text-danger text-uppercase mb-1">
                                                    Total Departments</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalDept ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa-solid fa-building fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Employee On Time Card -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-bottom-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-md font-weight-bold text-success text-uppercase mb-1">
                                                    Total Employee Checked In Today</div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $count; ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa-solid fa-briefcase fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-bottom-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-md font-weight-bold text-warning text-uppercase mb-1">
                                                    <?php if ($_SESSION['role'] == "Admin") { ?>
                                                        Total Pending Leaves</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalLeave ?></div>
                                            <?php } else { ?>
                                                Your Total Approved Leaves
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalLeaveOfEmp ?></div>
                                        <?php } ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-user-pen fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row justify-content-center">

                        <!-- Employee Leave Requests -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Employees Leave Requests</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th> </th>
                                                    <th>Full Name</th>
                                                    <th>Leave Date</th>
                                                    <th>Leave Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $leaveContr = new LeaveContr();
                                                $employeeContr = new EmployeeContr();
                                                $leaves = $leaveContr->selectAllLeaves();
                                                foreach ($leaves as $leave) {
                                                    $employee = $employeeContr->selectEmployee($leave['employee_id']);
                                                ?>
                                                    <tr>
                                                        <td><img class="img-thumbnail bg-secondary" src="../img/<?php echo $employee[0]['photo']; ?>" style="height: 45px;"></td>
                                                        <td> <?php echo $employee[0]['first_name'] . " " . $employee[0]['last_name']; ?></td>
                                                        <td> <?php echo date('M j, Y', strtotime($leave['leave_start'])) . " - " . date('M j, Y', strtotime($leave['leave_end'])); ?></td>
                                                        <?php if ($leave['leave_color'] == "#e4edff") { ?>
                                                            <td><img class="img-rounded" src="../img/pending.png" style="height: 45px;"></td>
                                                        <?php } else { ?>
                                                            <td><img class="img-rounded" src="../img/approved.png" style="height: 45px;"> </td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Content Row -->
                    <div class="row">

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

        <!-- Page level plugins -->
        <script src="../../vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../../js/demo/chart-area-demo.js"></script>
        <script src="../../js/demo/chart-pie-demo.js"></script>

        <script>
            function showTime() {
                var date = new Date();
                var h = date.getHours(); // 0 - 23
                var m = date.getMinutes(); // 0 - 59
                var s = date.getSeconds(); // 0 - 59
                var session = "AM";

                if (h == 0) {
                    h = 12;
                }

                if (h > 12) {
                    h = h - 12;
                    session = "PM";
                }

                h = (h < 10) ? "0" + h : h;
                m = (m < 10) ? "0" + m : m;
                s = (s < 10) ? "0" + s : s;

                var time = h + ":" + m + ":" + s + " " + session;
                document.getElementById("MyClockDisplay").innerText = time;
                document.getElementById("MyClockDisplay").textContent = time;

                setTimeout(showTime, 1000);

            }

            showTime();
        </script>

    </body>

    </html>

<?php
} else {
    header("Location: ../view/login.php");
}
?>