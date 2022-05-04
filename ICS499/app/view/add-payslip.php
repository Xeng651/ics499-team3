<?php

session_start();

include '../config/database.php';
include '../includes/autoLoader.php';
include '../includes/managePaySlipInc.php';

if (isset($_SESSION['valid_user'])) {
    if ($_SESSION['role'] == 'Admin') {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>Add PaySlip | CSSX</title>

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
                    <li class="nav-item active">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePayroll" aria-expanded="true" aria-controls="collapsePayroll">
                            <i class="fa-solid fa-file-invoice-dollar"></i>
                            <span>Payroll</span>
                        </a>
                        <div id="collapsePayroll" class="collapse show" aria-labelledby="headingPayroll" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <?php
                                if ($_SESSION['role'] == "Admin") {
                                ?>
                                    <a class="collapse-item" href="manage-payslip.php">Manage Payslips</a>
                                    <a class="collapse-item active" href="add-payslip.php">Add Payslip</a>
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

                                <div class="col-xs-10 col-md-8 col-lg-6">
                                    <div class="card mb-3">
                                        <div class="card-header text-center">
                                            <h4><strong> Create Payslip </strong></h4>
                                        </div>
                                        <div class="card-body">

                                            <?php
                                            if (!isset($_POST["submitEmp"]) && !isset($_GET['addPaySlip'])) {
                                            ?>

                                                <form action="add-payslip.php" method="POST">
                                                    <div class="form-group">
                                                        <div class="form-row">
                                                            <div class="col">
                                                                <label for="empID">Employee ID:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-text">
                                                                        <i class="fa-solid fa-user"></i>
                                                                    </div>
                                                                    <select id="empID" name="empID" class="form-select" required>
                                                                        <option disabled="disabled" value="" selected> Select Employee ID </option>
                                                                        <?php
                                                                        $empContr = new EmployeeContr();
                                                                        $emps = $empContr->selectAllEmployees();
                                                                        foreach ($emps as $emp) {
                                                                        ?>
                                                                            <option value="<?php echo $emp['employee_id']; ?>"> <?php echo $emp['employee_id'] . " - " . $emp['first_name'] . " " . $emp['last_name']; ?> </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <label for="date">Payslip Date:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-text">
                                                                        <i class="fa-solid fa-calendar"></i>
                                                                    </div>
                                                                    <input type="date" id="date" name="date" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="submit" name="submitEmp" class="btn btn-primary text-capitalize mt-3" value="Select" />
                                                    </div>
                                                </form>
                                                <hr>
                                                <?php }

                                            if (isset($_POST["submitEmp"]) || isset($_GET['addPaySlip'])) {
                                                $empContr = new EmployeeContr();
                                                $jobContr = new JobContr();
                                                if (isset($_GET['empID'])) {
                                                    $empID = $_GET['empID'];
                                                    $emp = $empContr->selectEmployee($_GET['empID']);
                                                    $job = $jobContr->selectJob($emp[0]['job_id']);
                                                } else {
                                                    $empID = $_POST['empID'];
                                                    $emp = $empContr->selectEmployee($_POST['empID']);
                                                    $job = $jobContr->selectJob($emp[0]['job_id']);
                                                }

                                                $deptID = $emp[0]['dept_id'];
                                                $basicSalary = $job[0]['basic_salary'];

                                                if (isset($_GET['date'])) {
                                                    $date = $_GET['date'];
                                                } else {
                                                    $date = $_POST['date'];
                                                }

                                                if (isset($_GET['addPaySlip'])) {
                                                    $addCheck = $_GET['addPaySlip'];
                                                    if ($addCheck == "empty") {
                                                ?>
                                                        <div class='alert alert-danger alert-dismissible text-center'>
                                                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                                            <strong> All Fields Are Required! </strong>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <form action="add-payslip.php" method="POST">
                                                    <div class="form-group">
                                                        <div class="form-row">
                                                            <div class="col">
                                                                <label for="basicSalary">Basic Salary:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-text">
                                                                        <i class="fa-solid fa-file-invoice-dollar"></i>
                                                                    </div>
                                                                    <input type="text" id="basicSalary" name="basicSalary" class="form-control" value="<?php echo $basicSalary; ?>" placeholder="$<?php echo $basicSalary; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <label for="allowance">Total Allowance:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-text">
                                                                        <i class="fa-solid fa-file-invoice-dollar"></i>
                                                                    </div>
                                                                    <input type="text" id="allowance" name="allowance" class="form-control" placeholder="$0.00">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <label for="deduction">Total Deduction:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-text">
                                                                        <i class="fa-solid fa-file-invoice-dollar"></i>
                                                                    </div>
                                                                    <input type="text" id="deduction" name="deduction" class="form-control" placeholder="$0.00">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="paymentMethod">Payment Method: </label>
                                                        <div class="input-group">
                                                            <div class="input-group-text">
                                                                <i class="fa-solid fa-file-invoice-dollar"></i>
                                                            </div>
                                                            <select id="paymentMethod" name="paymentMethod" class="form-select col-md-5 col-sm-5">
                                                                <option disabled="disabled" value="" selected> Select Payment Method </option>
                                                                <option value="Direct Deposit"> Direct Deposit </option>
                                                                <option value="Check"> Check </option>
                                                                <option value="cash"> Cash </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="empID" value="<?php echo $empID; ?>" />
                                                    <input type="hidden" name="deptID" value="<?php echo $deptID; ?>" />
                                                    <input type="hidden" name="date" value="<?php echo $date; ?>" />

                                                    <a href="manage-payslip.php" class="btn btn-secondary btn-xs text-capitalize">Cancel</a>
                                                    <input type="submit" name="addSalary" class="btn btn-primary text-capitalize" value="Create" />
                                                </form>
                                            <?php } ?>
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