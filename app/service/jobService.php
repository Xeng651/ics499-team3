<?php

class JobService {

    private $jobRepo; 

    function __construct() {
        $this->jobRepo = new JobRepo();
    }

    public function getAllJobs() {
        $jobs = $this->jobRepo->getAllJobs();
        return $jobs;
    }

    public function getJob($jobID) {
        $job = $this->jobRepo->getJob($jobID);
        return $job;
    }

    public function getJobByTitle($title) {
        $job = $this->jobRepo->getJobByTitle($title);
        return $job;
    }


}

?>