<?php

class JobRepo extends Database {

    public function getAllJobs() {
        $query = "SELECT * FROM `job`";
        $result = $this->connect()->query($query);
        return $result;
    }

    public function getJob($jobID) {
        $query = "SELECT * FROM `job` WHERE job_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$jobID]);
        $results = $stmt->fetchAll();
        return $results;
    }

    public function getJobByTitle($title) {
        $query = "SELECT * FROM `job` WHERE title = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$title]);
        $results = $stmt->fetchAll();
        return $results;
    }

    public function getJobByDept($deptID) {
        $query = "SELECT * FROM `job` WHERE dept_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$deptID]);
        $results = $stmt->fetchAll();
        return $results;
    }
    
}
