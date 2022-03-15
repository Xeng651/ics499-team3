<?php



if (isset($_POST["submit-add"])) {
    $salary_object = new Salary();
    $salary_object->setEmployeeID($_POST["emp"]);
    $salary_object->setGrossPay($_POST["GrossPay"]);
    $salary_object->setAllowance($_POST["Allowance"]);
    $salary_object->setBankName($_POST["Bankname"]);
    $salary_object->setDate($_POST["pay_date"]);
    $salary_object->setDeptID($_POST["Depart-Id"]);
    $salary_object->setDeduction($_POST["deduct"]);
    $gp = $_POST["GrossPay"];
    $allowance = $_POST["Allowance"];
    $deduction = $_POST["deduct"];


    
    $net_pay = $salary_object($salary_object->getGrossPay(), $salary_object->getAllowance(), $salary_object->getDeduction());
    $salary_object->setNetPay($net_pay);
    $salary_controller->createSalary($salary_object);


    //create controller
    //controller will check if params are empty
    //controller wil update to db
    //this page will just call the controller.
 
 // update the db with the information.
 // return to add-ps page.


 


}elseif (isset($_POST["submit-edit"])) {
    echo "this is a WIP";
}elseif (isset($_POST["submit-delete"])) {
    echo "this is a WIP";
}
?>