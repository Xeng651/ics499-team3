<?php 

if ($_SESSION['role'] == "Admin") {
    $adminContr = new AdminContr();
    $_SESSION['user'] = $adminContr->selectAdmin($_SESSION['valid_user']);
} else {
    $employeeContr = new EmployeeContr();
    $_SESSION['user'] = $employeeContr->selectEmployee($_SESSION['valid_user']);
}

?>