<?php
//start sessions
session_start();

//include main.php
include_once('main.php');

//include auto number module 
include_once('auto_id.php');

//include image upload function
include_once('img_upload.php');

//this function is add new service
class Service extends Main{
    public function addService($serviceName,$serviceDetails,$imageName,$imageSize,$imageType,$imageTemp){

        //generate new id for a product
        $autoNumber = new AutoNumber;
        $serviceId = $autoNumber -> NumberGeneration("service_Id","service_tbl","SER");
     
        //image upload function
       $objImage =new ImageUpload();
       $imageUrl = $objImage ->imgUpload($imageName,$imageType,"service",$imageTemp,$serviceId);
     
        //insert service to databace
       $sqlInsert = "INSERT INTO service_tbl VALUES('$serviceId','$serviceName','$serviceDetails','$imageUrl',0);";
     
       //lets check the errors 
       if($this->dbResult->error){
           echo($this->dbResult->error);
           exit;
       }
     
       //we need to execute our sql by query 
       $sqlResult = $this->dbResult->query($sqlInsert);
     
       //lest check the result is 0 or not 
       if($sqlResult > 0){

                //create databace to aded service
                $sqlcreate = "CREATE TABLE `db_oosms`.`$serviceId` ( `serSubcatId` VARCHAR(10) NOT NULL , `serSubcatName` VARCHAR(50) NOT NULL ,  `serSubcatImage` VARCHAR(150) NOT NULL , `serSubcatUnit` VARCHAR(50) NOT NULL , `serSubcatUnitChrge` INT(6) NOT NULL , `serSubcatUnitChrgewithfix` INT(6) NOT NULL , `serSubcatDayfoUnit` INT(6) NOT NULL , `d_status` INT(1) NOT NULL , PRIMARY KEY (`serSubcatId`));";

                //lets check the errors 
                if($this->dbResult->error){
                echo($this->dbResult->error);
                exit;
                }
                //we need to execute our sql by query 
                $sqlResult1 = $this->dbResult->query($sqlcreate);
                
                //lest check the result is 0 or not 
                if($sqlResult1 > 0){
               return("service Add Success!");
                }
                else{
                    return("Please Try again later! db creation error");
                }
           }
       
       else{
           return("Please Try again later!");
       }
     }//end of add product

      //view all service TO HOME PAGE
      function ViewAllservice(){

        //how many items add to one page
        $results_perPage = 8;

        $sqlSelect = "SELECT * FROM service_tbl WHERE d_status = 0 ORDER BY  service_ID DESC;";
         //lets check the errors 
          if($this->dbResult->error){
          echo($this->dbResult->error);
          exit;
         }
       //sql execute 
       $sqlResult = $this->dbResult->query($sqlSelect);

        //check the number of rows
        $nor = $sqlResult->num_rows;

        //chek paginier pages
        $nop = ceil($nor / $results_perPage);

        if(!isset($_GET['page'])){
          $page=1;
        }
        else{
          $page=$_GET['page'];
        }

        // echo $this_page_first_result=($page - 1) * $results_perPage;
        
        for($page=1;$page<=$nop;$page++)
        {
          // echo('<a href="index.php?page='.$page.'">'.$page.'</a>');
        };
       

        if($nor > 0){
          while($rec = $sqlResult->fetch_assoc()){
              echo('
              <div class="card col-4 mx-5 my-3" id="cardservicepri">
              <img src="lib/'.$rec['service_Image'].'" id="serviceimagepri">
              <div class="info" id="cardinfoservice">
                <h1 id="servicehedding">'.$rec['service_Name'].'</h1>
                <p id="servicepara">'.$rec['service Discription'].'</p>
                <a href="lib/view/service.php?service_id='.$rec['service_ID'].'" class="btn" name="service" id="servicecardbtn">book service</a>
              </div>
            </div>
                   ');
          }
        }
        else {echo('
          <div class="alert alert-danger" role="alert">
          No Servicers Are Found!
        </div>');
        }
    }

    //get service data to service page
    function service_name($sid){

      $sqlSelect = "SELECT * FROM service_tbl WHERE service_ID = '$sid';";
       //lets check the errors 
        if($this->dbResult->error){
        echo($this->dbResult->error);
        exit;
       }
     //sql execute 
     $sqlResult = $this->dbResult->query($sqlSelect);

      //check the number of rows
      $nor = $sqlResult->num_rows;
      if($nor > 0){
      $rec = $sqlResult->fetch_assoc();

      return json_encode($rec);
      }
     
  }

  //view service list to add design form
  function mainservice(){


    $sqlSelect = "SELECT * FROM service_tbl WHERE d_status = 0 ORDER BY  service_ID DESC;";
     //lets check the errors 
      if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;
     }
   //sql execute 
   $sqlResult = $this->dbResult->query($sqlSelect);

    //check the number of rows
    $nor = $sqlResult->num_rows;
   
    if($nor > 0){
      echo('<option value="0">Select service</option>');
      while($rec = $sqlResult->fetch_assoc()){
          echo('<option value="'.$rec['service_ID'].'">'.$rec['service_Name'].'</option>');
      }
    }
    else {echo('
      <div class="alert alert-danger" role="alert">
      No Servicers Are Found!
    </div>');
    }
}

//add new design to design table
public function addServiceDesign($serviceid,$designName,$designUnit,$designUnitPrice,$designUnitPricewithfix,$designdayforunit,$imageName,$imageSize,$imageType,$imageTemp){

  //generate new id for a product
  $autoNumber = new AutoNumber;
  $designId = $autoNumber -> NumberGeneration("serSubcatId","$serviceid","DES");

  //image upload function
 $objImage =new ImageUpload();
 $imageUrl = $objImage ->imgUpload($imageName,$imageType,"designs",$imageTemp,$designId);

  //insert service to databace
 $sqlInsert = "INSERT INTO $serviceid VALUES('$designId','$designName','$imageUrl','$designUnit','$designUnitPrice','$designUnitPricewithfix','$designdayforunit',0);";

 //lets check the errors 
 if($this->dbResult->error){
     echo($this->dbResult->error);
     exit;
 }

 //we need to execute our sql by query 
 $sqlResult = $this->dbResult->query($sqlInsert);

 //lest check the result is 0 or not 
 if($sqlResult > 0){

         return("Item Add Success!");
          }
          else{
              return("Please Try again later!");
          }
     
}//end of add product

function ViewAlldesign($sid){


  $sqlSelect = "SELECT * FROM $sid ORDER BY serSubcatId DESC;";
   //lets check the errors 
    if($this->dbResult->error){
    echo($this->dbResult->error);
    exit;
   }
 //sql execute 
 $sqlResult = $this->dbResult->query($sqlSelect);

  //check the number of rows
  $nor = $sqlResult->num_rows;

  if($nor > 0){
    echo('<option value="0">Select Design</option>');
    while($rec = $sqlResult->fetch_assoc()){
        echo('<option value="'.$rec['serSubcatId'].'">'.$rec['serSubcatName'].'</option>');
    }
  }
  else {echo('
    <div class="alert alert-danger" role="alert">
    No Servicers designs!
  </div>');
  }
}

function get_design($did,$sid){

  $sqlSelect = "SELECT * FROM $sid WHERE serSubcatId = '$did';";
   //lets check the errors 
    if($this->dbResult->error){
    echo($this->dbResult->error);
    exit;
   }
 //sql execute 
 $sqlResult = $this->dbResult->query($sqlSelect);

  //check the number of rows
  $nor = $sqlResult->num_rows;

  if($nor > 0){

  $rec = $sqlResult->fetch_assoc();

  return json_encode($rec);
  }
 
}

}
?>