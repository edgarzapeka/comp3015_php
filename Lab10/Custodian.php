<?php

require ("Employee.php");

    Class Custodian extends Employee{
        private $certificationLevel;

        public function setCertificationLevel($certificationLevel){
            $this->certificationLevel = $certificationLevel;
        }

        public function getCertificationLevel(){
            return $this->certificationLevel;
        }
    }