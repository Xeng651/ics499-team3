<?php

class DepartmentContr extends DepartmentModel {

    public function selectAllDepartments() {
        $departments = $this->getAllDepartments();
        return $departments;
    }

}

?>