<?php

//include function page 
include_once('../../function/serviceFunction.php');

//call the class and create an object 
$serObj = new Service();

$result = $serObj -> mainservice();

echo($result);


?>