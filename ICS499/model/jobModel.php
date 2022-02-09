<?php

class JobModel extends Database {

    protected function getAllJobs() {
        $query = "SELECT * FROM `job`";
        $result = $this->connect()->query($query);
        return $result;
    }
    
}
