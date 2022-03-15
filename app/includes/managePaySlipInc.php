<?php

//controllers
$salary_controller = new SalaryContr();

// check if add button was pressed
if (isset($_POST["addps"])) {
    //create new salaty object and set variables.
    $salary_object = new Salary();
    $salary_object->setEmployeeID($_POST["emp"]);
    $salary_object->setGrossPay($_POST["gp"]);
    $salary_object->setAllowance($_POST["allowance"]);
    $salary_object->setDeptID($_POST["deparment"]);
    $salary_object->setDeduction($_POST["deduction"]);
    $salary_object->setBankName($_POST["bank"]);
    $salary_object->setDate(date('Y-m-d', strtotime($_POST['date'])));

    //check if any of the variables are empty
    if($salary_object->checkEmpty($salary_object->getGrossPay(),$salary_object->getAllowance(),$salary_object->getDeduction(),$salary_object->getEmployeeID(),$salary_object->getBankName(),$salary_object->getdate(),$salary_object->getDeptID())){
        header("Location: ../view/add-payslip.php?error=empty");
    } else{
        $net_pay = $salary_object->calculateNetPay($salary_object->getGrossPay(), $salary_object->getAllowance(), $salary_object->getDeduction());
        $salary_object->setNetPay($net_pay);
        $salary_controller->createSalary($salary_object);
    }
    
} // check if edit button was pressed (have not worked on this yet so it should take user to emp insteads) 
elseif (isset($_POST["editEmp"])) {
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