<?php

include 'config/database.php';
include 'includes/autoLoader.php';

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
        echo $employee['first_name'];
        echo "<br>";
    }

    $employeeSelected = $employeeContr->selectEmployee(1);
    echo "<br>";
    echo $employeeSelected[0]['first_name'];

    $employee = new Employee();
    
    /** 
    $employee->setFirstName("Will");
    $employee->setLastName("Will");
    $employee->setBirthDate(date("Y-m-d", strtotime("1999-02-02")));
    $employee->setGender("Will");
    $employee->setEmailAddress("Will");
    $employee->setEmpPassword("Will");
    $employee->setAddress("Will");
    $employee->setPhone("Will");
    $employee->setPhoto("Will");
    $employee->setDeptID(1);
    $employee->setJobID(1);
    **/

    //$employeeContr->createEmployee($employee);

    //$employeeContr->removeEmployee(7);
    
    /** 
    $employee->setFirstName("Bob");
    $employee->setLastName("Hanks");
    $employee->setBirthDate(date("Y-m-d", strtotime("1999-02-02")));
    $employee->setGender("None");
    $employee->setEmailAddress("billyhanks@gmail.com");
    $employee->setEmpPassword("billyhanks123");
    $employee->setAddress("testing address");
    $employee->setPhone("6511112222");
    $employee->setPhoto("Billy.png");
    $employee->setDeptID(1);
    $employee->setJobID(1);
    $employeeID = 1;
    **/

    //$employeeContr->updateEmployee($employee, $employeeID);
    
    $salaryContr = new SalaryContr();
    $salary = new Salary();

    /** 
    $salary->setGrossPay(1);
    $salary->setBankName("USA");
    $salary->setNetPay(1);
    $salary->setEmployeeID(1);
    $salary->setDeptID(1);
    **/

    //$salaryContr->createSalary($salary);

    $salaries = $salaryContr->selectAllSalaries();
    foreach ($salaries as $salary) {
        echo "bank name: ". $salary['bank_name'];
        echo "<br>";
    }

    //$salaryContr->removeSalary(1);

    ?>
</body>

</html>