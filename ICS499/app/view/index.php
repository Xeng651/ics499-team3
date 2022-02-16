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

    $employeeContr = new EmployeeContr();
    $employees = $employeeContr->selectAllEmployees();
    foreach ($employees as $employee) {
        echo $employee['employee_id']. " - ". $employee['first_name'];
        echo "<br>";
    }

    /** 
    $employee = new Employee();
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
    $employeeContr->createEmployee($employee);
    **/
    
    $loginContr = new LoginContr();
    echo $loginContr->checkLoginCred("", "");

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