<?php 

if ($_SESSION['role'] == "Admin") {
    $adminContr = new AdminContr();
    $user = $adminContr->selectAdmin($_SESSION['valid_user']);
} else {
    $employeeContr = new EmployeeContr();
    $user = $employeeContr->selectEmployee($_SESSION['valid_user']);
}

?>