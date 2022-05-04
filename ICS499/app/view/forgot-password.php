
<!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Forgot Password | CSSX</title>

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!-- Custom fonts for this template-->
        <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
                                    <h1 class="h4 text-gray-900 mb-4">Forgot Your Password?</h1>
                                    <h1 class="h6 text-gray-900 mb-4">Enter your email and you will recieve a code shortly.</h6>
                                </div>
                                <?php
                                if (isset($_GET['reset'])) {
                                    $resetCheck = $_GET['reset'];

                                    if ($resetCheck == "empty") {
                                        echo "<div class='alert alert-danger alert-dismissible text-center'> 
                                                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                                <strong> Email Address is Empty! </strong>
                                                </div>";
                                    } elseif ($resetCheck == "invalid") {
                                        echo "<div class='alert alert-danger alert-dismissible text-center'> 
                                                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                                <strong> Email Address doesn't exist! </strong> 
                                                </div>";
                                    }
                                }
                                ?>
                                <form class="user" action="../includes/forgetInc.php" method="POST">
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
                                    <input type="submit" name="reset" value="Send" class="btn btn-primary btn-user btn-block"></input>
                                    <hr>
                                </form>
                                <div class="text-center">
                                    <a class="small" href="login.php">Back to Login</a>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>