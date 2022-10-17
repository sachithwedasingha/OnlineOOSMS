<?php

//include function page 
include_once('../../function/serviceFunction.php');

//Get product Details 

$serviceImageName = $_FILES['designImage']['name'];
$serviceImageSize = $_FILES['designImage']['size'];
$serviceImageType = $_FILES['designImage']['type'];
$serviceImageLocation = $_FILES['designImage']['tmp_name'];

//call the class and create an object 
$serviceObj = new Service();

$result = $serviceObj -> addServiceDesign($_POST['allservice'],$_POST['designName'],$_POST['designUnit'],$_POST['designunitprice'],$_POST['designunitpricewithfix'],$_POST['designdayforunit'],$serviceImageName,$serviceImageSize,$serviceImageType,$serviceImageLocation);


echo($result);


?>