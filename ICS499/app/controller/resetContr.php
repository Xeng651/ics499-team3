<?php

class ResetContr extends resetService {

    public function resetPass($newpass, $repass, $email, $code) {
        if ($this->isEmpty($newpass, $repass, $code)) {
            header("Location: ../view/reset-password.php?resetpw=empty&email=$email");
        } else {
            if ($this->passIsMatching($newpass, $repass) || $this->isValid($newpass, $email, $code)) {
                if ($this->passIsMatching($newpass, $repass)) {
                    if ($this->isValid($newpass, $email, $code)) {
                        header("Location: ../view/login.php");
                    } else {
                        header("Location: ../view/reset-password.php?resetpw=invalidCode&email=$email");
                    }
                } else {
                    header("Location: ../view/reset-password.php?resetpw=mismatch&email=$email");
                }
            } else {
                header("Location: ../view/reset-password.php?resetpw=invalid&email=$email");
            }
        }
    }

    public function changePass($currentpass, $newpass, $repass, $id) {
        if ($this->isEmpty($currentpass, $newpass, $repass)) {
            header("Location: ../view/change-password.php?changepw=empty");
        } else {
            if ($this->passIsMatching($newpass, $repass) || $this->isValidPassword($currentpass, $id)) {
                if ($this->passIsMatching($newpass, $repass)) {
                    if ($this->isValidPassword($currentpass, $id)) {
                        $this->updatePW($id, $newpass);
                        header("Location: ../view/change-password.php?changepw=success");
                    } else {
                        header("Location: ../view/change-password.php?changepw=invalidCurrentPass");
                    }
                } else {
                    header("Location: ../view/change-password.php?changepw=mismatch");
                }
            } else {
                header("Location: ../view/change-password.php?changepw=invalid");
            }
        }
    }
}

?>
