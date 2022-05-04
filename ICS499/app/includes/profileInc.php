<?php

$error = "";

if (isset($_POST['submitPhoto'])) {
    $id = $_SESSION['valid_user'];

    $adminContr = new AdminContr();
    $empContr = new EmployeeContr();

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimetype = finfo_file($finfo, $_FILES['file']['tmp_name']);
    if ($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/gif' || $mimetype == 'image/png') {
        $photo = $_FILES['file']['name'];
        if ($_SESSION['role'] == "Admin") {
            $adminContr->updateAdminPhoto($id, $photo);
        } else {
            $empContr->updateEmpPhoto($id, $photo);
        }
        $uploaded_file = '../img/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $uploaded_file);
    } else {
        $error = "Image type must be .JPG or .PNG!";
    }
}

if (isset($_POST['submitProfile'])) {
    $id = $_SESSION['valid_user'];

    $adminContr = new AdminContr();
    $empContr = new EmployeeContr();
    $profile = new Profile();

    $profile->setFirstName($_POST["fname"]);
    $profile->setLastName($_POST["lname"]);
    $profile->setGender($_POST["gender"]);
    $date = date('Y-m-d',strtotime($_POST['birthday']));
    $profile->setbirthDate($date);
    $profile->setPhone($_POST["phone"]);

    if ($_SESSION['role'] == "Admin") {
        $profile->setAddress("none");
        $adminContr->updateAdminProfile($profile, $id);
    } else {
        $profile->setAddress($_POST["address"]);
        $empContr->updateEmpProfile($profile, $id);
    }
}

?>
