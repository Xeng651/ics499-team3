<<!DOCTYPE html>
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
<body>
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
                                <h1 class="h4 text-gray-900 mb-4">Forgot Password</h1>
                            </div>
                            <form class="user" action="../includes/resetInc.php" method="POST">
                                <div class="form-group">
                                    <?php
                                    if (isset($_GET['email'])) {
                                        $email = $_GET['email'];
                                        echo '<input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." value="' . $email . '">';
                                    } else {
                                        echo ' <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">';
                                    }
                                    ?>
                                </div>
                                <input type="submit" name="reset" value="Reset" class="btn btn-primary btn-user btn-block"></input>
                                <hr>
                            </form>
                            <div class="text-center">
                                <a class="small" href="login.php">Go Back</a>
                            </div>
                            <hr>
                            <?php
                            if (!isset($_GET['reset'])) {
                                exit();
                            } else {
                                $resetCheck = $_GET['reset'];

                                if ($resetCheck == "empty") {
                                    echo "<div class='alert alert-danger text-center' role='alert'> 
                                    All Fields Are Required! </div>";
                                    exit();
                                } elseif ($resetCheck == "invalid") {
                                    echo "<div class='alert alert-danger text-center'> 
                                    Invalid Email Address! </div>";
                                    exit();
                                } elseif($resetCheck =="sent"){
                                    echo "<div class='alert alert-success text-center'> 
                                    We have sent a notice to the email address. </div>";
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