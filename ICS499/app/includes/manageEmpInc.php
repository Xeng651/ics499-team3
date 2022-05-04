<?php

$employeeContr = new EmployeeContr();
$jobContr = new JobContr();
$deptContr = new DepartmentContr();

if (isset($_POST["addEmp"])) {
    $employeeAdd = new Employee();
    $employeeAdd->setFirstName($_POST["fname"]);
    $employeeAdd->setLastName($_POST["lname"]);
    $employeeAdd->setBirthDate(date('Y-m-d', strtotime($_POST['birthday'])));
    $employeeAdd->setGender($_POST["gender"]);
    $employeeAdd->setEmailAddress($_POST["email"]);
    $employeeAdd->setEmpPassword($_POST["password"]);

    $address = $_POST['address'] . ", " . $_POST['city'] . ", " . $_POST['state'] . " " . $_POST['zip'];
    $employeeAdd->setAddress($address);

    $employeeAdd->setPhone($_POST["phone"]);
    $employeeAdd->setRole("Employee");
    $employeeAdd->setDateJoined(date('Y-m-d', strtotime($_POST["datejoined"])));
    $employeeAdd->setPhoto("defaultEmpPic.png");

    $dept = $deptContr->selectDepartmentByName($_POST["deptName"]);
    $job = $jobContr->selectJobByTitle($_POST["jobTitle"]);

    $employeeAdd->setDeptID($dept[0]['dept_id']);
    $employeeAdd->setJobID($job[0]['job_id']);

    $employeeContr->createEmployee($employeeAdd);
} elseif (isset($_POST["editEmp"])) {
    $empID = $_POST["empID"];
    $employeeEdit = new Employee();
    $employeeEdit->setFirstName($_POST["fname"]);
    $employeeEdit->setLastName($_POST["lname"]);
    $employeeEdit->setBirthDate(date('Y-m-d', strtotime($_POST['birthday'])));
    $employeeEdit->setGender($_POST["gender"]);
    $employeeEdit->setEmailAddress($_POST["email"]);
    $employeeEdit->setAddress($_POST["address"]);
    $employeeEdit->setPhone($_POST["phone"]);
    $employeeEdit->setDateJoined(date('Y-m-d', strtotime($_POST["datejoined"])));

    $dept = $deptContr->selectDepartmentByName($_POST["deptName"]);
    $job = $jobContr->selectJobByTitle($_POST["jobTitle"]);

    $employeeEdit->setDeptID($dept[0]['dept_id']);
    $employeeEdit->setJobID($job[0]['job_id']);

    $employeeContr->updateEmp($employeeEdit, $empID);
} elseif (isset($_POST["deleteEmp"])) {
    $empID = $_POST["empID"];
    $employeeContr->removeEmployee($empID);
}

?>