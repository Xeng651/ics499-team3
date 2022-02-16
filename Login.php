<html>

<?php
session_start();

if(empty($_SESSION['valid_user'])){

    if(isset($_POST['submit'])){
        if ($_POST['email'] != "" && $_POST['login_pass'] != ""){
            include("config/database.php");

            $username = $_POST['user'];
            $password = $_POST['pw'];

            $query = "SELECT email_address, emp_password FROM employee WHERE email_address = ?";
            $stmt = $con->prepare($query);
            $stmt->bind_param('ss', $email_address, $username);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($email_address, $pw);

            if($stmt->num_rows == 1) {
                $stmt->fetch();
                if(password_verify($emp_password, $pw)){
                    $_SESSION["valid_user"] = $email_address;

                    //header("location: profile.php");
                } else {
                    $error= "Username or Password is Invalid!";
                }
            } else {
                $error = "Username or Password is Invalid!";
            }
        } else {
            $error = "Username or Password is Invalid!";
        }

        $con->close();
    } else{
        $error = "Username or Password is Empty!";
    }
}

?>
<style>
    .user_cell{
        position: absolute;
        top: 30%;
        left: 39%;
    }
    .pw_cell{
        position: absolute;
        top: 39%;
        left: 39%;
    }
    .submit_cell{
        position: absolute;
        top: 45%;
        left: 50%;
    }
    .login_attr{
        width: 100%;
        height: 100%;
    }

</style>
<body>
    <div class="login_display">
    <table class="login_table">
        <form action="" method="POST">
            <td class="user_cell">
            <label for="user">User Name:</label>
            <input type="text" name="user">
            </td>
            <td class="pw_cell">
            <label for="pw">Password:</label>
            <input type="password" name="pw">
            </td>
            <td class="submit_cell">
            <input type="submit" class="login_attr" name="Login" value="login">
            </td>
        </form>
    </table>
</div>
</body>
<?php

?>
</html>