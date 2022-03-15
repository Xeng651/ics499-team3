

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reset Password</title>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-secondary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                                <?php
                                if (isset($_GET['resetpw'])) {
                                    $pwCheck = $_GET['resetpw'];

                                    if ($pwCheck == "empty") {
                                        echo "<div class='alert alert-danger alert-dismissible text-center'> 
                                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            <strong> All Fields Are Required! </strong>
                                            </div>";
                                    } elseif ($pwCheck == "invalidCode") {
                                        echo "<div class='alert alert-danger alert-dismissible text-center'> 
                                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            <strong> Invalid code!</strong> <br> Please try again or request a new code!
                                            </div>";
                                    } elseif ($pwCheck == "mismatch") {
                                        echo "<div class='alert alert-danger alert-dismissible text-center'> 
                                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            <strong> Password does not match! </strong>
                                            </div>";
                                    } elseif ($pwCheck == "invalid") {
                                        echo "<div class='alert alert-danger alert-dismissible text-center'> 
                                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            <strong> Invalid code and pasword does not match! </strong>
                                            </div>";
                                    } else {
                                        echo "<div class='alert alert-success alert-dismissible text-center'> 
                                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            <strong> Check your email for a code! </strong>
                                            <br>If you haven't recieved a code, check your spam folder!
                                            </div>";
                                    }
                                }
                                ?>
                            </div>
                            <form class="user" action="../includes/resetInc.php" method="POST">
                                <div class="form-group">
                                    <label for="code" class="pl-sm-3">Validation Code:</label>
                                    <input type="text" name="code" class="form-control form-control-user" id="code" max="999999" placeholder="Enter Code...">
                                </div>
                                <div class="form-group">
                                    <label for="newpass" class="pl-sm-3">New Password:</label>
                                    <?php
                                    if (isset($_GET['newpass'])) {
                                        $newPW = $_GET['newpass'];
                                        echo '<input type="password" name="newpass" class="form-control form-control-user" id="newpass" aria-describedby="emailHelp" placeholder="Enter New Password..." value="' . $newPW . '">';
                                    } else {
                                        echo ' <input type="password" name="newpass" class="form-control form-control-user" id="newpass" aria-describedby="emailHelp" placeholder="Enter New Password...">';
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="repassword" class="pl-sm-3">Confirm New Password:</label>
                                    <input type="password" name="repassword" class="form-control form-control-user" id="repassword" placeholder="Re-enter New Password...">

                                    <input type="hidden" name="email" class="email-for-reset" id="target-email" value="<?php echo $_GET["email"]; ?>">
                                </div>
                                <input type="submit" name="resetpw" value="Reset" class="btn btn-primary btn-user btn-block"></input>
                                <hr>
                            </form>
                            <div class="text-center">
                                <a class="small" href="login.php">Back to Login | </a>
                                <a class="small" href="forgot-password.php">Re-Send Code</a>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>