<?php
//start sessions
session_start();

//include main.php
include_once('main.php');

//include auto number module 
include_once('auto_id.php');

//include image upload function
include_once('img_upload.php');


//this function is add new addres in order proccess
class SOrder extends Main{

 

  //this funtion to delete order details
  //ok
  function deleteorder($oid){

    $sqlSelect = "SELECT * FROM order_service_tbl WHERE d_status = 0 AND os_Id ='$oid';";
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
     while($rec = $sqlResult->fetch_assoc()){
       $delid=$rec['status_Id'];
  
    $update1 = "UPDATE service_status_tbl SET d_status = 1 WHERE  status_Id = '$delid' AND d_status = 0;";
     //lets check the errors 
      if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;
     }
   //sql execute 
   $sqlResult = $this->dbResult->query($update1);
  
   $update1 = "UPDATE order_service_tbl SET d_status = 1 WHERE  os_Id = '$oid' AND d_status = 0;";
     //lets check the errors 
      if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;
     }
   //sql execute 
   $sqlResult = $this->dbResult->query($update1);
       return("ok"); 
    
    }
  }
    
  }


   //this funtion to pay offline
   //ok
   function payoffline($oid){

    $sqlSelect = "SELECT * FROM order_service_tbl WHERE d_status = 0 AND os_Id ='$oid';";
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
     while($rec = $sqlResult->fetch_assoc()){
       $delid=$rec['status_Id'];

    $update1 = "UPDATE service_status_tbl SET payment=1 WHERE  status_Id = '$delid' AND d_status = 0;";
     //lets check the errors 
      if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;
     }
   //sql execute 
   $sqlResult = $this->dbResult->query($update1);
       return("ok"); 
    
    }
  }
}

//this function use to conform service order
//ok
function conformorder($oid){

  $sqlSelect = "SELECT * FROM order_service_tbl WHERE d_status = 0 AND os_Id ='$oid';";
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
   while($rec = $sqlResult->fetch_assoc()){
     $delid=$rec['status_Id'];

  $update1 = "UPDATE service_status_tbl SET appruwed = 1 WHERE  status_Id = '$delid' AND d_status = 0;";
   //lets check the errors 
    if($this->dbResult->error){
    echo($this->dbResult->error);
    exit;
   }
 //sql execute 
 $sqlResult = $this->dbResult->query($update1);
     return("ok"); 
  
  }
}
}



// this function use to inform complete the store proccess
//ok
function ready($oid){

  $sqlSelect = "SELECT * FROM order_service_tbl WHERE d_status = 0 AND os_Id ='$oid';";
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
   while($rec = $sqlResult->fetch_assoc()){
     $delid=$rec['status_Id'];

  $update1 = "UPDATE service_status_tbl SET stoers = 1 WHERE  status_Id = '$delid' AND d_status = 0;";
   //lets check the errors 
    if($this->dbResult->error){
    echo($this->dbResult->error);
    exit;
   }
 //sql execute 
 $sqlResult = $this->dbResult->query($update1);
     return("ok"); 
  
  }
}
}

//thsis function use to update deliverd status
function deliverd($oid){

  $sqlSelect = "SELECT * FROM order_service_tbl WHERE d_status = 0 AND os_Id ='$oid';";
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
   while($rec = $sqlResult->fetch_assoc()){
     $delid=$rec['status_Id'];

  $update1 = "UPDATE service_status_tbl SET deliverd = 1, proccess =1 WHERE  status_Id = '$delid' AND d_status = 0;";
   //lets check the errors 
    if($this->dbResult->error){
    echo($this->dbResult->error);
    exit;
   }
 //sql execute 
 $sqlResult = $this->dbResult->query($update1);
     return("ok"); 
  
  }
}
}

//this function use to declear the order
//ok
function declareorder($oid){

  $sqlSelect = "SELECT * FROM order_service_tbl WHERE d_status = 0 AND os_Id ='$oid';";
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
   while($rec = $sqlResult->fetch_assoc()){
     $delid=$rec['status_Id'];

  $update1 = "UPDATE service_status_tbl SET d_status = 1 WHERE  status_Id = '$delid' AND d_status = 0;";
   //lets check the errors 
    if($this->dbResult->error){
    echo($this->dbResult->error);
    exit;
   }
 //sql execute 
 $sqlResult = $this->dbResult->query($update1);

 $update1 = "UPDATE order_service_tbl SET d_status = 1 WHERE  os_Id = '$oid' AND d_status = 0;";
   //lets check the errors 
    if($this->dbResult->error){
    echo($this->dbResult->error);
    exit;
   }
 //sql execute 
 $sqlResult = $this->dbResult->query($update1);
     return("ok"); 
  
  }
}
}

  //this function use to get order list to admin panel or employees
  //ok
public function showorderlist(){

  $sqlSelect = "SELECT * FROM order_service_tbl WHERE d_status = 0 ORDER BY os_Id ASC;";
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
    while($rec = $sqlResult->fetch_assoc()){
      $delid=$rec['status_Id'];

            
            $sqlSelect1 = "SELECT * FROM service_status_tbl WHERE status_Id ='$delid' AND d_status = 0;";
            //lets check the errors 
            if($this->dbResult->error){
            echo($this->dbResult->error);
            exit;
            }
          //sql execute 
          $sqlResult1 = $this->dbResult->query($sqlSelect1);
        
          //check the number of rows
          $nor1 = $sqlResult1->num_rows;
        
          if($nor1 > 0){
            while($rec1 = $sqlResult1->fetch_assoc()){
              $os=$rec1['appruwed'];
              if($os==0){
        echo('
        <tr>
            <th>'.$rec['os_Id'].'</th>
            <th>'.$rec['user_Id'].'</th>
            <td>'.$rec['date'].'</td>
            <td>'.$rec['price'].'</td>
            <td>'.$rec['status_Id'].'</td>
          <td><button type="button" class="btn btn-danger" onclick="deleteorder(\''.$rec['os_Id'].'\')">Delete</button></td>
       </tr>
              ');
              }
              else{
                echo('
                <tr>
                  <th>'.$rec['os_Id'].'</th>
                  <th>'.$rec['user_Id'].'</th>
                  <td>'.$rec['date'].'</td>
                  <td>'.$rec['price'].'</td>
                  <td>'.$rec['status_Id'].'</td>
                  <td><button type="button" class="btn btn-secondary disabled" >Delete</button></td>
               </tr>
                      ');
              }
       }}
       else
       {echo('
        <div class="alert alert-danger" role="alert">
        No Service Orders Are Found!
      </div>');
      }
    }
  }
  else {echo('
    <div class="alert alert-danger" role="alert">
    No Service Orders Are Found!
  </div>');
  }
}


//lets create search employer methord for previous function
//ok
public function Searchorderlist($searchData){

//sqlSearchData
$sqlSelect = "SELECT * FROM order_service_tbl WHERE (os_Id LIKE '$searchData%' OR user_Id  LIKE '$searchData%') AND d_status = 0";
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
  while($rec = $sqlResult->fetch_assoc()){
    $delid=$rec['status_Id'];

          
          $sqlSelect1 = "SELECT * FROM service_status_tbl WHERE status_Id ='$delid' AND d_status = 0;";
          //lets check the errors 
          if($this->dbResult->error){
          echo($this->dbResult->error);
          exit;
          }
        //sql execute 
        $sqlResult1 = $this->dbResult->query($sqlSelect1);
      
        //check the number of rows
        $nor1 = $sqlResult1->num_rows;
      
        if($nor1 > 0){
          while($rec1 = $sqlResult1->fetch_assoc()){
            $os=$rec1['appruwed'];
            if($os==0){
      echo('
      <tr>
          <th>'.$rec['os_Id'].'</th>
          <th>'.$rec['user_Id'].'</th>
          <td>'.$rec['date'].'</td>
          <td>'.$rec['price'].'</td>
          <td>'.$rec['status_Id'].'</td>
        <td><button type="button" class="btn btn-danger" onclick="deleteorder(\''.$rec['os_Id'].'\')">Delete</button></td>
     </tr>
            ');
            }
            else{
              echo('
              <tr>
                <th>'.$rec['os_Id'].'</th>
                <th>'.$rec['user_Id'].'</th>
                <td>'.$rec['date'].'</td>
                <td>'.$rec['price'].'</td>
                <td>'.$rec['status_Id'].'</td>
                <td><button type="button" class="btn btn-secondary disabled" >Delete</button></td>
             </tr>
                    ');
            }
     }}
     else
     {echo('
      <div class="alert alert-danger" role="alert">
      No Service Orders Are Found!
    </div>');
    }
  }
}
else {echo('
  <div class="alert alert-danger" role="alert">
  No Service Orders Are Found!
</div>');
}
}


//this function use to get detail to employers about delivery information
//ok
public function showorderlistdelivery(){

  $sqlSelect = "SELECT * FROM order_service_tbl WHERE d_status = 0 ORDER BY os_Id ASC;";
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
    while($rec = $sqlResult->fetch_assoc()){
      $delid=$rec['status_Id'];

            
            $sqlSelect1 = "SELECT * FROM service_status_tbl WHERE status_Id ='$delid' AND d_status = 0;";
            //lets check the errors 
            if($this->dbResult->error){
            echo($this->dbResult->error);
            exit;
            }
          //sql execute 
          $sqlResult1 = $this->dbResult->query($sqlSelect1);
        
          //check the number of rows
          $nor1 = $sqlResult1->num_rows;
        
          if($nor1 > 0){
            while($rec1 = $sqlResult1->fetch_assoc()){
              if($rec1['payment']==1)
                  { $s1=('<span class="badge bg-success">Success</span>');}
                    else
                    {$s1=('<span class="badge bg-warning">Warning</span>');}

              if($rec1['appruwed']==1)
                    { $s2=('<span class="badge bg-success">Success</span>');}
                      else
                      {$s2=('<span class="badge bg-warning">Warning</span>');}

              if($rec1['stoers']==1)
                      { $s3=('<span class="badge bg-success">Success</span>');}
                        else
                        {$s3=('<span class="badge bg-warning">Warning</span>');}

              if($rec1['proccess']==1)
                      { $s4=('<span class="badge bg-success">Success</span>');}
                        else
                        {$s4=('<span class="badge bg-warning">Warning</span>');}

              if($rec1['deliverd']==1)
                        { $s5=('<span class="badge bg-success">Success</span>');}
                          else
                          {$s5=('<span class="badge bg-warning">Warning</span>');}
        echo('
        <tr>
          <th>'.$rec['os_Id'].'</th>
          <th>'.$s1.'</th>
          <td>'.$s2.'</td>
          <td>'.$s3.'</td>
          <td>'.$s4.'</td>
          <td>'.$s5.'</td>
       </tr>
              ');
              
              
       }}
       else
       {echo('
        <div class="alert alert-danger" role="alert">
        No Orders Are Found!
      </div>');
      }
    }
  }
  else {echo('
    <div class="alert alert-danger" role="alert">
    No Orders Are Found!
  </div>');
  }
}


//lets create search delivery details for privous function
//ok
public function Searchorderlistdelivery($searchData){

//sqlSearchData
$sqlSelect = "SELECT * FROM order_service_tbl WHERE (os_Id LIKE '$searchData%' OR user_Id  LIKE '$searchData%') AND d_status = 0";
///lets check the errors 
if($this->dbResult->error){
  echo($this->dbResult->error);
  exit;
 }
//sql execute 
$sqlResult = $this->dbResult->query($sqlSelect);

//check the number of rows
$nor = $sqlResult->num_rows;

if($nor > 0){
  while($rec = $sqlResult->fetch_assoc()){
    $delid=$rec['status_Id'];

          
          $sqlSelect1 = "SELECT * FROM service_status_tbl WHERE status_Id ='$delid' AND d_status = 0;";
          //lets check the errors 
          if($this->dbResult->error){
          echo($this->dbResult->error);
          exit;
          }
        //sql execute 
        $sqlResult1 = $this->dbResult->query($sqlSelect1);
      
        //check the number of rows
        $nor1 = $sqlResult1->num_rows;
      
        if($nor1 > 0){
          while($rec1 = $sqlResult1->fetch_assoc()){
            if($rec1['payment']==1)
                { $s1=('<span class="badge bg-success">Success</span>');}
                  else
                  {$s1=('<span class="badge bg-warning">Warning</span>');}

            if($rec1['appruwed']==1)
                  { $s2=('<span class="badge bg-success">Success</span>');}
                    else
                    {$s2=('<span class="badge bg-warning">Warning</span>');}

            if($rec1['stoers']==1)
                    { $s3=('<span class="badge bg-success">Success</span>');}
                      else
                      {$s3=('<span class="badge bg-warning">Warning</span>');}

            if($rec1['proccess']==1)
                    { $s4=('<span class="badge bg-success">Success</span>');}
                      else
                      {$s4=('<span class="badge bg-warning">Warning</span>');}

            if($rec1['deliverd']==1)
                      { $s5=('<span class="badge bg-success">Success</span>');}
                        else
                        {$s5=('<span class="badge bg-warning">Warning</span>');}
      echo('
      <tr>
        <th>'.$rec['os_Id'].'</th>
        <th>'.$s1.'</th>
        <td>'.$s2.'</td>
        <td>'.$s3.'</td>
        <td>'.$s4.'</td>
        <td>'.$s5.'</td>
     </tr>
            ');
            
            
     }}
     else
     {echo('
      <div class="alert alert-danger" role="alert">
      No Orders Are Found!
    </div>');
    }
  }
}
else {echo('
  <div class="alert alert-danger" role="alert">
  No Orders Are Found!
</div>');
}
}



//this function use to  update offline payment form
//ok
public function offlinepayment(){

  $sqlSelect = "SELECT * FROM order_service_tbl WHERE d_status = 0 ORDER BY os_Id ASC;";
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
    while($rec = $sqlResult->fetch_assoc()){
      $delid=$rec['status_Id'];

            
            $sqlSelect1 = "SELECT * FROM service_status_tbl WHERE status_Id ='$delid' AND d_status = 0 AND payment = 0;";
            //lets check the errors 
            if($this->dbResult->error){
            echo($this->dbResult->error);
            exit;
            }
          //sql execute 
          $sqlResult1 = $this->dbResult->query($sqlSelect1);
        
          //check the number of rows
          $nor1 = $sqlResult1->num_rows;
        
          if($nor1 > 0){
            while($rec1 = $sqlResult1->fetch_assoc()){
              
              
        echo('
        <tr>
          <th>'.$rec['os_Id'].'</th>
          <th>'.$rec['user_Id'].'</th>
          <td>'.$rec['date'].'</td>
          <td>'.$rec['price'].'</td>
          <td><button type="button" class="btn btn-success" onclick="offlinepay(\''.$rec['os_Id'].'\')">Payed Now</button></td>
          <td><button type="button" class="btn btn-warning" onclick="deleteorder(\''.$rec['os_Id'].'\')">Delete</button></td>
       </tr>
              ');
              
       }}
       else
       {}
    }
  }
  else {echo('
    <div class="alert alert-danger" role="alert">
    No Service Orders Are Found!
  </div>');
  }
}


//lets create search employer methord
//ok
public function offlinepaymentserch($searchData){

//sqlSearchData
$sqlSelect = "SELECT * FROM order_service_tbl WHERE (os_Id LIKE '$searchData%' OR user_Id  LIKE '$searchData%') AND d_status = 0";
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
  while($rec = $sqlResult->fetch_assoc()){
    $delid=$rec['status_Id'];

          
          $sqlSelect1 = "SELECT * FROM service_status_tbl WHERE status_Id ='$delid' AND d_status = 0 AND payment = 0;";
          //lets check the errors 
          if($this->dbResult->error){
          echo($this->dbResult->error);
          exit;
          }
        //sql execute 
        $sqlResult1 = $this->dbResult->query($sqlSelect1);
      
        //check the number of rows
        $nor1 = $sqlResult1->num_rows;
      
        if($nor1 > 0){
          while($rec1 = $sqlResult1->fetch_assoc()){
            
            
      echo('
      <tr>
        <th>'.$rec['os_Id'].'</th>
        <th>'.$rec['user_Id'].'</th>
        <td>'.$rec['date'].'</td>
        <td>'.$rec['price'].'</td>
        <td><button type="button" class="btn btn-success" onclick="offlinepay(\''.$rec['os_Id'].'\')">Payed Now</button></td>
        <td><button type="button" class="btn btn-warning" onclick="deleteorder(\''.$rec['os_Id'].'\')">Delete</button></td>
     </tr>
            ');
            
     }}
     else
     {}
  }
}
else {echo('
  <div class="alert alert-danger" role="alert">
  No Service Orders Are Found!
</div>');
}
}



//this function use to  update offline payment form
//ok
public function conformorderlist(){

  $sqlSelect = "SELECT * FROM order_service_tbl WHERE d_status = 0 ORDER BY os_Id ASC;";
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
    while($rec = $sqlResult->fetch_assoc()){
      $delid=$rec['status_Id'];

            
            $sqlSelect1 = "SELECT * FROM service_status_tbl WHERE status_Id ='$delid' AND d_status = 0 AND appruwed = 0;";
            //lets check the errors 
            if($this->dbResult->error){
            echo($this->dbResult->error);
            exit;
            }
          //sql execute 
          $sqlResult1 = $this->dbResult->query($sqlSelect1);
        
          //check the number of rows
          $nor1 = $sqlResult1->num_rows;
        
          if($nor1 > 0){
            while($rec1 = $sqlResult1->fetch_assoc()){
              
              
        echo('
        <tr>
          <th>'.$rec['os_Id'].'</th>
          <th>'.$rec['user_Id'].'</th>
          <td>'.$rec['date'].'</td>
          <td>'.$rec['price'].'</td>
          <td><button type="button" class="btn btn-success" onclick="conferm(\''.$rec['os_Id'].'\')">Confirm Order</button></td>
          <td><button type="button" class="btn btn-warning" onclick="declare(\''.$rec['os_Id'].'\')">Declare</button></td>
       </tr>
              ');
              
       }}
       else
       {}
    }
  }
  else {echo('
    <div class="alert alert-danger" role="alert">
    No Orders Are Found!
  </div>');
  }
}


//lets create search employer methord
//ok
public function conformorderlist_serch($searchData){

//sqlSearchData
$sqlSelect = "SELECT * FROM order_service_tbl WHERE (os_Id LIKE '$searchData%' OR user_Id  LIKE '$searchData%') AND d_status = 0";
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
  while($rec = $sqlResult->fetch_assoc()){
    $delid=$rec['status_Id'];

          
          $sqlSelect1 = "SELECT * FROM service_status_tbl WHERE status_Id ='$delid' AND d_status = 0 AND appruwed = 0;";
          //lets check the errors 
          if($this->dbResult->error){
          echo($this->dbResult->error);
          exit;
          }
        //sql execute 
        $sqlResult1 = $this->dbResult->query($sqlSelect1);
      
        //check the number of rows
        $nor1 = $sqlResult1->num_rows;
      
        if($nor1 > 0){
          while($rec1 = $sqlResult1->fetch_assoc()){
            
            
      echo('
      <tr>
        <th>'.$rec['os_Id'].'</th>
        <th>'.$rec['user_Id'].'</th>
        <td>'.$rec['date'].'</td>
        <td>'.$rec['price'].'</td>
        <td><button type="button" class="btn btn-success" onclick="conferm(\''.$rec['os_Id'].'\')">Confirm Order</button></td>
        <td><button type="button" class="btn btn-warning" onclick="declare(\''.$rec['os_Id'].'\')">Declare</button></td>
     </tr>
            ');
            
     }}
     else
     {}
  }
}
else {echo('
  <div class="alert alert-danger" role="alert">
  No Orders Are Found!
</div>');
}
}



//this function use to  update offline payment form
//ok
public function  tostore(){

  $sqlSelect = "SELECT * FROM order_service_tbl WHERE d_status = 0 ORDER BY os_Id ASC;";
  
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
    while($rec = $sqlResult->fetch_assoc()){
      $delid=$rec['status_Id'];
      $oid=$rec['os_Id'];
      $serviceid=$rec['service_Id'];
            
            $sqlSelect1 = "SELECT * FROM service_status_tbl WHERE status_Id ='$delid' AND d_status = 0 AND stoers = 0 AND appruwed = 1 AND payment = 1;";
            //lets check the errors 
            if($this->dbResult->error){
            echo($this->dbResult->error);
            exit;
            }
          //sql execute 
          $sqlResult1 = $this->dbResult->query($sqlSelect1);
        
          //check the number of rows
          $nor1 = $sqlResult1->num_rows;
        
          if($nor1 > 0){
            while($rec1 = $sqlResult1->fetch_assoc()){
              
              $sqlSelect2 = "SELECT * FROM service_mesh_tbl WHERE d_status = 0 AND os_Id = '$oid' ORDER BY mesh_Id ASC;";
              //lets check the errors 
               if($this->dbResult->error){
               echo($this->dbResult->error);
               exit;
              }
            //sql execute 
            $sqlResult2 = $this->dbResult->query($sqlSelect2);
           
             //check the number of rows
             $nor2 = $sqlResult2->num_rows;
  
             $item="";
             if($nor2 > 0){
               while($rec2 = $sqlResult2->fetch_assoc()){
                $proid=$rec2['design_Id'];
                $up=$rec2['unit_Price'];

                $sqlSelect3 = "SELECT * FROM $serviceid WHERE d_status = 0 AND serSubcatId = '$proid';";
                //lets check the errors 
                 if($this->dbResult->error){
                 echo($this->dbResult->error);
                 exit;
                }
              //sql execute 
              $sqlResult3 = $this->dbResult->query($sqlSelect3);
             
               //check the number of rows
               $nor3 = $sqlResult3->num_rows;
            
              $rec3 = $sqlResult3->fetch_assoc();
                $upwf=$rec3['serSubcatUnitChrge'];

                if($up==$upwf)
                {$logo='<span class="badge bg-danger">No</span>';}
                else
                {$logo='<span class="badge bg-success">yes</span>';}

               $item =$item.'<tr><th>'.$rec2['design_Id'].'</th><th>'.$rec2['width'].'</th><td>'.$rec2['height'].'</td><td>'.$logo.'</td></tr>';
              }

        echo('
        <tr>
          <th>'.$rec['os_Id'].'</th>
          <th>'.$rec['service_Id'].'</th>
          <th>
          <table class="table table-hover">
            <thead>
                <tr class="table-secondary">
                    <th scope="row">Design Id</th>
                    <td>Width</td>
                    <td>Height</td>
                    <td>fix</td>
                </tr>
            </thead>
            <tbody">
                '.$item.'
            </tbody>
        </table>
          </th>
          <td><button type="button" class="btn btn-success" onclick="rady(\''.$rec['os_Id'].'\')">Order Rady</button></td>
       </tr>
              ');
              
       }
      else{}
    }}
       else{}
    }
  }
  else {echo('
    <div class="alert alert-danger" role="alert">
    No Orders Are Found!
  </div>');
  }
}


//this function to get data for stors and admin about orders
//ok
public function tostoreserch($searchData){

//sqlSearchData
$sqlSelect = "SELECT * FROM order_service_tbl WHERE (os_Id LIKE '$searchData%' OR user_Id LIKE '$searchData%' ) AND d_status = 0";

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
    while($rec = $sqlResult->fetch_assoc()){
      $delid=$rec['status_Id'];
      $oid=$rec['os_Id'];
      $serviceid=$rec['service_Id'];
            
            $sqlSelect1 = "SELECT * FROM service_status_tbl WHERE status_Id ='$delid' AND d_status = 0 AND stoers = 0 AND appruwed = 1 AND payment = 1;";
            //lets check the errors 
            if($this->dbResult->error){
            echo($this->dbResult->error);
            exit;
            }
          //sql execute 
          $sqlResult1 = $this->dbResult->query($sqlSelect1);
        
          //check the number of rows
          $nor1 = $sqlResult1->num_rows;
        
          if($nor1 > 0){
            while($rec1 = $sqlResult1->fetch_assoc()){
              
              $sqlSelect2 = "SELECT * FROM service_mesh_tbl WHERE d_status = 0 AND os_Id = '$oid' ORDER BY mesh_Id ASC;";
              //lets check the errors 
               if($this->dbResult->error){
               echo($this->dbResult->error);
               exit;
              }
            //sql execute 
            $sqlResult2 = $this->dbResult->query($sqlSelect2);
           
             //check the number of rows
             $nor2 = $sqlResult2->num_rows;
  
             $item="";
             if($nor2 > 0){
               while($rec2 = $sqlResult2->fetch_assoc()){
                $proid=$rec2['design_Id'];
                $up=$rec2['unit_Price'];

                $sqlSelect3 = "SELECT * FROM $serviceid WHERE d_status = 0 AND serSubcatId = '$proid';";
                //lets check the errors 
                 if($this->dbResult->error){
                 echo($this->dbResult->error);
                 exit;
                }
              //sql execute 
              $sqlResult3 = $this->dbResult->query($sqlSelect3);
             
               //check the number of rows
               $nor3 = $sqlResult3->num_rows;
            
              $rec3 = $sqlResult3->fetch_assoc();
                $upwf=$rec3['serSubcatUnitChrge'];

                if($up==$upwf)
                {$logo='<span class="badge bg-danger">No</span>';}
                else
                {$logo='<span class="badge bg-success">yes</span>';}

               $item =$item.'<tr><th>'.$rec2['design_Id'].'</th><th>'.$rec2['width'].'</th><td>'.$rec2['height'].'</td><td>'.$logo.'</td></tr>';
              }

        echo('
        <tr>
          <th>'.$rec['os_Id'].'</th>
          <th>'.$rec['service_Id'].'</th>
          <th>
          <table class="table table-hover">
            <thead>
                <tr class="table-secondary">
                    <th scope="row">Design Id</th>
                    <td>Width</td>
                    <td>Height</td>
                    <td>fix</td>
                </tr>
            </thead>
            <tbody">
                '.$item.'
            </tbody>
        </table>
          </th>
          <td><button type="button" class="btn btn-success" onclick="rady(\''.$rec['os_Id'].'\')">Order Rady</button></td>
       </tr>
              ');
              
       }
      else{}
    }}
       else{}
    }
  }
  else {echo('
    <div class="alert alert-danger" role="alert">
    No Orders Are Found!
  </div>');
  }
}



//this function use to  update offline payment form
//ok
public function deliverlist(){

  $sqlSelect = "SELECT * FROM order_service_tbl WHERE d_status = 0 ORDER BY os_Id ASC;";
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
    while($rec = $sqlResult->fetch_assoc()){
      $delid=$rec['status_Id'];
      $userid=$rec['user_Id'];

            
            $sqlSelect1 = "SELECT * FROM service_status_tbl WHERE status_Id ='$delid' AND d_status = 0 AND deliverd = 0 AND stoers = 1;";
            //lets check the errors 
            if($this->dbResult->error){
            echo($this->dbResult->error);
            exit;
            }
          //sql execute 
          $sqlResult1 = $this->dbResult->query($sqlSelect1);
        
          //check the number of rows
          $nor1 = $sqlResult1->num_rows;
        
          if($nor1 > 0){
            while($rec1 = $sqlResult1->fetch_assoc()){
              
              $sqlSelect2 = "SELECT * FROM user_tbl WHERE user_id ='$userid' AND d_status = 0";
            //lets check the errors 
            if($this->dbResult->error){
            echo($this->dbResult->error);
            exit;
            }
          //sql execute 
          $sqlResult2 = $this->dbResult->query($sqlSelect2);
        
          //check the number of rows
          $nor2 = $sqlResult2->num_rows;
          $rec2 = $sqlResult2->fetch_assoc();
        echo('
        <tr>
          <th>'.$rec['os_Id'].'</th>
          <th>'.$rec['user_Id'].'</th>
          <td>'.$rec['date'].'</td>
          <td>'.$rec2['user_phone'].'</td>
          <td>'.$rec['address'].'</td>
          <td><button type="button" class="btn btn-warning" onclick="deliverd(\''.$rec['os_Id'].'\')">Deliverd</button></td>
       </tr>
              ');
              
       }}
       else
       {}
    }
  }
  else {echo('
    <div class="alert alert-danger" role="alert">
    No Orders Are Found!
  </div>');
  }
}


//lets create search employer methord
//ok
public function deliverlist_serch($searchData){

//sqlSearchData
$sqlSelect = "SELECT * FROM order_service_tbl WHERE (os_Id LIKE '$searchData%' OR user_Id  LIKE '$searchData%') AND d_status = 0";

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
  while($rec = $sqlResult->fetch_assoc()){
    $delid=$rec['status_Id'];
    $userid=$rec['user_Id'];

          
          $sqlSelect1 = "SELECT * FROM service_status_tbl WHERE status_Id ='$delid' AND d_status = 0 AND deliverd = 0 AND stoers = 1;";
          //lets check the errors 
          if($this->dbResult->error){
          echo($this->dbResult->error);
          exit;
          }
        //sql execute 
        $sqlResult1 = $this->dbResult->query($sqlSelect1);
      
        //check the number of rows
        $nor1 = $sqlResult1->num_rows;
      
        if($nor1 > 0){
          while($rec1 = $sqlResult1->fetch_assoc()){
            
            $sqlSelect2 = "SELECT * FROM user_tbl WHERE user_id ='$userid' AND d_status = 0";
          //lets check the errors 
          if($this->dbResult->error){
          echo($this->dbResult->error);
          exit;
          }
        //sql execute 
        $sqlResult2 = $this->dbResult->query($sqlSelect2);
      
        //check the number of rows
        $nor2 = $sqlResult2->num_rows;
        $rec2 = $sqlResult2->fetch_assoc();
      echo('
      <tr>
        <th>'.$rec['os_Id'].'</th>
        <th>'.$rec['user_Id'].'</th>
        <td>'.$rec['date'].'</td>
        <td>'.$rec2['user_phone'].'</td>
        <td>'.$rec['address'].'</td>
        <td><button type="button" class="btn btn-warning" onclick="deliverd(\''.$rec['os_Id'].'\')">Deliverd</button></td>
     </tr>
            ');
            
     }}
     else
     {}
  }
}
else {echo('
  <div class="alert alert-danger" role="alert">
  No Orders Are Found!
</div>');
}
}





}
?>