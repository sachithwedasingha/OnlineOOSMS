<?php

//include function page 
include_once('../../function/serviceFunction.php');

//Get product Details 

$serviceImageName = $_FILES['ServiceImg']['name'];
$serviceImageSize = $_FILES['ServiceImg']['size'];
$serviceImageType = $_FILES['ServiceImg']['type'];
$serviceImageLocation = $_FILES['ServiceImg']['tmp_name'];

//call the class and create an object 
$serviceObj = new Service();

$result = $serviceObj -> addService($_POST['serviceName'],$_POST['service_Discription'],$serviceImageName,$serviceImageSize,$serviceImageType,$serviceImageLocation);


echo($result);


?>