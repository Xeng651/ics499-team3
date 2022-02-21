<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reset Password</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-secondary">



<?php
/**
 * Check if the selector and token are valid.
 * if the selector and tokens are empty tell them their params are incorrect
 * if they are not empty and are the correct hexa decimals, do nothing.
 */


?>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-lg-block"><img src="../img/pw_lock.jpg" class="img-fluid" style="height: 100%;"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                                    </div>
                                    <form class="user" action="../includes/newPWInc.php" method="POST">
                                        <div class="form-group">
                                            <?php
                                            if (isset($_GET['newpass'])) {
                                                $newPW = $_GET['newpass'];
                                                echo '<input type="password" name="newpass" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter New Password" value="' . $newPW . '">';
                                            } else {
                                                echo ' <input type="password" name="newpass" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter New Password">';
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="repassword" class="form-control form-control-user" id="exampleInputPassword" placeholder="Re:New Password">

                                            <input type="hidden" name="email" class="email-for-reset" id="target-email" value="<?php $email = $_GET["email"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="code" class="form-control form-control-user" max="999999" id="exampleInputPassword" placeholder="Enter Code">

                                        </div>
                                        <input type="submit" name="resetpw" value="Reset" class="btn btn-primary btn-user btn-block"></input>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="login.php">Cancle</a>
                                    </div>
                                    <hr>
                                    <?php
                                    if (!isset($_GET['resetpw'])) {
                                        exit();
                                    } else {
                                        $pwCheck = $_GET['resetpw'];

                                        if ($pwCheck == "empty") {
                                            echo "<div class='alert alert-danger text-center' role='alert'> 
                                            All Fields Are Required! </div>";
                                            exit();
                                        } elseif ($pwCheck == "invalid") {
                                            echo "<div class='alert alert-danger text-center'> 
                                            Your parameters are invalid, please try again or please request for another link! </div>";
                                            exit();
                                        }elseif($pwCheck == "sent"){
                                            echo "<div class='alert alert-success text-center'> 
                                            We have sent a notice to the email address. </div>";
                                            exit();
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>

</html>