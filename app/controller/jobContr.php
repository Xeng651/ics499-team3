<?php

class JobContr extends JobService {

    public function selectAllJobs() {
        $jobs = $this->getAllJobs();
        return $jobs;
    }

    public function selectJob($jobID) {
        $job = $this->getJob($jobID);
        return $job;
    }

    public function selectJobByTitle($title) {
        $job = $this->getJobByTitle($title);
        return $job;
    }

}

?>