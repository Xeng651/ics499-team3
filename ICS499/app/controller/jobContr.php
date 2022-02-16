<?php

class JobContr extends JobModel {

    public function selectAllJobs() {
        $jobs = $this->getAllJobs();
        return $jobs;
    }

}

?>