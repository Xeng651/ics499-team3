<?php 

class Department {

    private $name;

    function __construct() {

    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

}

?>