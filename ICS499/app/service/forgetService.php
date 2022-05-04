<?php 

class ForgetService {

    private $resetPassRepo;
    private $empRepo; 
    private $adminRepo;
    private $mailContr;

    function __construct() {
        $this->resetPassRepo = new ResetPassRepo();
        $this->empRepo = new EmployeeRepo();
        $this->adminRepo = new AdminRepo();
        $this->mailContr = new MailContr();
    }

    public function validEmail($email) {
        $flag = false;
        $empResult = $this->empRepo->getEmployeeByEmail($email);
        $adminResult = $this->adminRepo->getAdminByEmail($email);

        if (!empty($empResult) || !empty($adminResult)) {
           $flag = true;
        } 

        return $flag;
    }

    public function sendPassReset($userEmail) {
        $verification_code = rand(100000, 999999);
        $this->resetPassRepo->deleteExisting($userEmail);
        $this->resetPassRepo->storeToken($userEmail, $verification_code);
        $this->mailContr->createMail($userEmail, $verification_code);
    }

}

?>