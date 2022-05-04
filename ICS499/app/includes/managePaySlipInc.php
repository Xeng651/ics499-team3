<?php

$salaryContr = new SalaryContr();

if (isset($_POST["addSalary"])) {
    $salaryAdd = new Salary();
    $salaryAdd->setGrossPay($_POST["basicSalary"]);
    $salaryAdd->setAllowance($_POST["allowance"]);
    $salaryAdd->setDeduction($_POST["deduction"]);
    $salaryAdd->setPaymentMethod($_POST["paymentMethod"]);

    $netPay = $salaryContr->calcNetPay($_POST["basicSalary"], $_POST["allowance"], $_POST["deduction"]);
    $salaryAdd->setNetPay($netPay);

    $salaryAdd->setDate(date('Y-m-d', strtotime($_POST['date'])));
    $salaryAdd->setEmployeeID($_POST["empID"]);
    $salaryAdd->setDeptID($_POST["deptID"]);

    $salaryContr->createSalary($salaryAdd);
} elseif (isset($_POST["deleteSalary"])) {
    $salaryID = $_POST["salaryID"];
    $salaryContr->removeSalary($salaryID);
}

?>