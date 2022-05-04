<?php

class SearchService {

    private $searchRepo; 

    function __construct() {
        $this->searchRepo = new SearchRepo();
    }

    public function searchForEmployee($search) {
        return $this->searchRepo->searchForEmployee($search);
    }

    public function searchForSalary($search) {
        return $this->searchRepo->searchForSalary($search);
    }
     
}
