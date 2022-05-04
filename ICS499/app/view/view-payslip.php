<?php

session_start();

include '../config/database.php';
include '../includes/autoLoader.php';

if (isset($_SESSION['valid_user'])) {
    $salaryID = 0;
    if (isset($_GET["salaryID"])) {
        $salaryID = $_GET["salaryID"];
    }

    $salaryContr = new SalaryContr();
    $employeeContr = new EmployeeContr();
    $deptContr = new DepartmentContr();
    $jobContr = new JobContr();

    $salary = $salaryContr->selectSalary($salaryID);
    $numInWords = $salaryContr->convertNumber($salary[0]['net_pay']);
    $employee = $employeeContr->selectEmployee($salary[0]['employee_id']);
    $dept = $deptContr->selectDepartment($salary[0]['dept_id']);
    $job = $jobContr->selectJob($employee[0]['job_id'])
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>View Payslip | CSSX</title>

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

                <!-- Nav Item - PaySlip Collapse Menu -->
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

                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-md-12 col-sm-12 mb-5">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="row mb-3">
                                            <div>
                                                <div class="mb-5">
                                                    <img src="../img/weblogo.png" class="img-responsive position-absolute" style="height: 120px;">
                                                </div>
                                                <div class="text-center lh-1 mb-3">
                                                    <h6 class="fw-bold mb-3">Payslip</h6> <span class="fw-normal">Payment slip for the month of <?php echo date('F, Y', strtotime($salary[0]['date'])) ?></span>
                                                </div>

                                                <div class="d-flex justify-content-end"> <span>Date: <?php echo date('m-d-Y', strtotime($salary[0]['date'])) ?></span> </div>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div> <span class="fw-bolder">Employee ID</span> <small class="ms-3"><?php echo $employee[0]['employee_id']; ?></small> </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div> <span class="fw-bolder">Payment Method</span> <small class="ms-3"><?php echo $salary[0]['payment_method']; ?></small> </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div> <span class="fw-bolder">Employee Full Name</span> <small class="ms-3"><?php echo $employee[0]['first_name'] . " " . $employee[0]['last_name']; ?></small> </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div> <span class="fw-bolder">Department</span> <small class="ms-3"><?php echo $dept[0]['name']; ?></small> </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div> <span class="fw-bolder">Job Title</span> <small class="ms-3"><?php echo $job[0]['title']; ?></small> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <table class="mt-4 table table-bordered">
                                                        <thead class="bg-gradient bg-primary text-white">
                                                            <tr>
                                                                <th>Earnings</th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th>Basic</th>
                                                                <td>$<?php echo $job[0]['basic_salary'] ?>.00</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Allowance</th>
                                                                <td>$<?php echo $salary[0]['allowance'] ?>.00</td>
                                                            </tr>
                                                            <tr>
                                                                <?php $total = $job[0]['basic_salary'] + $salary[0]['allowance']; ?>
                                                                <th>Total Earnings</th>
                                                                <td>$<?php echo $total; ?>.00</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table class="table table-bordered">
                                                        <thead class="bg-gradient bg-primary text-white">
                                                            <tr>
                                                                <th>Deduction</th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th>Total Deduction</th>
                                                                <td>$<?php echo $salary[0]['deduction'] ?>.00</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4"> <br> <span class="fw-bold">Net Pay: $<?php echo $salary[0]['net_pay'] ?>.00</span> </div>
                                                    <div class="border col-md-8">
                                                        <div class="d-flex flex-column"> <span>In Words:</span> <span><?php echo $numInWords; ?></span> </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <div class="d-flex flex-column mt-2"> <span class="fw-bolder">For <?php echo $employee[0]['first_name'] . " " . $employee[0]['last_name']; ?></span> <span class="mt-4">Authorised Signatory</span> </div>
                                                </div>
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