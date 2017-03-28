<?php
require ("Custodian.php");
//require ("Employee.php");
//ini_set('display_errors', 'On');


    $cust1 = new Custodian();
    $cust2 = new Custodian();

    $cust1->setFirstName("Herman");
    $cust1->setLastName("Shonne");
    $cust1->setCertificationLevel("High");

    echo $cust1->getFirstName();
    echo $cust1->getLastName();
    echo $cust1->getCertificationLevel();
    echo "<br/>";

    $cust2->setFirstName("Lorens");
    $cust2->setLastName("Hillmore");
    $cust2->setCertificationLevel("Low");

    echo $cust2->getFirstName();
    echo $cust2->getLastName();
    echo $cust2->getCertificationLevel();

?>
