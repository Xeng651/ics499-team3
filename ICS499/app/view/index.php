<?php

include '../config/database.php';
include '../includes/autoLoader.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>
    <?php

    $employee = new Employee();
    $admin = new Admin();
    $attendance = new Attendance();
    $job = new Job();
    $leave = new Leave();
    $profile = new Profile();
    $department = new Department();
    $salary = new Salary();

    $employeeContr = new EmployeeContr();
    $adminyeeContr = new AdminContr();
    $attendanceContr = new AttendanceContr();
    $jobContr = new JobContr();
    $leaveContr = new LeaveContr();
    $departmentContr = new DepartmentContr();
    $salaryContr = new SalaryContr();
    $mailContr = new MailContr();
    $employeeContr = new EmployeeContr();
    $employeeContr = new EmployeeContr();

    $employee->setFirstName("Xeng");
    $employee->setLastName("Xiong");
    $employee->setBirthDate(date("Y-m-d", strtotime("1999-02-02")));
    $employee->setGender("Male");
    $employee->setEmailAddress("xengxiong123@gmail.com");
    $employee->setEmpPassword("Xengxiong123!");
    $employee->setAddress("100 North Street, St Paul, MN 55106");
    $employee->setPhone("6519991234");
    $employee->setRole("Employee");
    $employee->setPhoto("employee1.png");
    $employee->setDeptID(1);
    $employee->setJobID(1);
    $employee->setDateJoined(date("Y-m-d", strtotime("1999-02-02")));

    $employees = $employeeContr->selectAllEmployees();
    foreach ($employees as $employee) {
        echo $employee['employee_id'] . " - " . $employee['first_name'];
        echo "<br>";
    }

    $employeeSelected = $employeeContr->selectEmployee(1);
    echo "Get employee with ID 1: " . $employeeSelected[0]['first_name'];

    /** 
    $admin = new Admin();
    $admin->setFirstName("Admin");
    $admin->setLastName("Admin");
    $admin->setBirthDate(date("Y-m-d", strtotime("1995-01-01")));
    $admin->setGender("Male");
    $admin->setEmailAddress("admin123@gmail.com");
    $admin->setAdminPassword("Admin123!");
    $admin->setPhoto("admin.jpg");
    $admin->setPhone("651-000-0000");
    $admin->setRole("Admin");
    $adminContr = new AdminContr();
    $adminContr->createAdmin($admin);
     */

    echo "<br>";
    date_default_timezone_set("US/Central");
    
    $fulldate = date('Y-m-d' , time()) . " 08:00:00";

    echo $fulldate;

    echo "<br>";
    echo date('Y-m-d h:i:s', time());

    $attendanceContr = new AttendanceContr();
    
    $status = $attendanceContr->checkStatus("08:00 AM");
    echo $status;

    ?>
</body>

</html>