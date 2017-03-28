<?php
    class Employee{
        private $firstName;
        private $lastName;
        private $employeeNumber;

        public function setFirstName($firstName){
            $this->firstName = $firstName;
        }

        public function getFirstName(){
            return $this->firstName;
        }

        public function setLastName($lastName){
            $this->lastName = $lastName;
        }

        public function getLastName(){
            return $this->lastName;
        }

        public function setEmployeeNumber($employeeNumber){
            $this->employeeNumber = $employeeNumber;
        }

        public function getEmployeeNumber(){
            return $this->employeeNumber;
        }
    }