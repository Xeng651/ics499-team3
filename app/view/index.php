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
    <title>Document</title>
</head>

<body>
    <?php
    
    // $employee = new Employee();
    // $employee->setFirstName("Xeng");
    // $employee->setLastName("Xiong");
    // $employee->setBirthDate(date("Y-m-d", strtotime("1999-02-02")));
    // $employee->setGender("Male");
    // $employee->setEmailAddress("xengxiong123@gmail.com");
    // $employee->setEmpPassword("Xengxiong123!");
    // $employee->setAddress("100 North Street, St Paul, MN 55106");
    // $employee->setPhone("6519991234");
    // $employee->setRole("Employee");
    // $employee->setPhoto("employee1.png");
    // $employee->setDeptID(1);
    // $employee->setJobID(1);
    // $employee->setDateJoined(date("Y-m-d", strtotime("1999-02-02")));

    // $employeeContr = new EmployeeContr();
    // $employees = $employeeContr->selectAllEmployees();
    // foreach ($employees as $employee) {
    //     echo $employee['employee_id']. " - ". $employee['birth_date'];
    //     echo "<br>";
    // }

    // $employeeSelected = $employeeContr->selectEmployee(1);
    // echo $employeeSelected[0]['first_name'];
    // echo "<br>";
    
    $salary_object = new Salary();
    $salary_object->setEmployeeID(1);
    $salary_object->setGrossPay(1000);
    $salary_object->setAllowance(1);
    $salary_object->setDeduction(1);
    $salary_object->setBankName("gtr");
    $salary_object->setDeptID(1);
    $salary_object->setDate(date('Y-m-d', strtotime('2022-03-11')));
    echo $salary_object->getDate();

    /** 
    $leave = new Leave();
    $leave->setReason("Sick Leave");
    $leave->setStartDate(date("Y-m-d", strtotime("1995-01-01")));
    $leave->setEndDate(date("Y-m-d", strtotime("1995-01-01")));
    $leave->setStatus("Pending");
    $leave->setEmployeeID(1);
    $leaveContr = new leaveContr();
    $leaveContr->createLeave($leave);
    */

    /** 
    $admin = new Admin();
    $admin->setFirstName("Admin");
    $admin->setLastName("CSSX");
    $admin->setBirthDate(date("Y-m-d", strtotime("1995-01-01")));
    $admin->setGender("Male");
    $admin->setEmailAddress("admin123@gmail.com");
    $admin->setAdminPassword("Admin123!");
    $admin->setPhoto("admin.png");
    $admin->setRole("Admin");
    $adminContr = new AdminContr();
    $adminContr->createAdmin($admin);
    **/

    ?>
</body>

</html>