<?php

class SearchContr extends SearchService {

    public function searchEmployee($search) {
        return $this->searchForEmployee($search);
    }

    public function searchSalary($search) {
        return $this->searchForSalary($search);
    }

}

?>