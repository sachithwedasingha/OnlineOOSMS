<?php
//star the session
session_start();
//chek its logd in?
if(empty($_SESSION['user_id'])){
  header('location:login.php');
}
// else{print_r($_SESSION['user_id']);}
//include all pagers
include_once('../layout/app.php');
?>


<!DOCTYPE html>
<html lang="en" id="A">

<head>
  <title>Select your choice</title>

</head>

<body onload="myFunction()">
  <div>
    <div class="row">
      <div class="col-4">
        <h1>Progress Your Service</h1>
        <hr>
        <input class="form-control mx-1 my-1" type="hidden" value="<?php echo($_GET['service_id']);?>"
          id="input_service_id">
          <input class="form-control mx-1 my-1" type="hidden" value="<?php
                                    //chek the user session
                                  if(empty($_SESSION['user_id'])){}

                                  else{print_r($_SESSION['user_id']);}?>" id="input_user_id">
        <h2 id="service_name"></h2>
      </div>
      <div class="col-7 py-1">
        <img src="" id="service_main_image"
          style="max-height:140px; width:100%; object-fit:cover; object-position:top left" alt="">
      </div>
      <div class="col-1 py-2 px-1">
        <a href="../../index.php">
          <button type="submit" name="add" class="btn btn-secondary ">
            <i class="fas fa-home"></i>Home</button>
        </a>
      </div>
    </div>
    <hr class="my-1 mb-3">

    <form action=" ">
      <div class="row">
        <div class="col-3 px-4">
          <p>1. select the design </p>
          <div class="form-group my-2">
            <select class="form-select" name="alldesign" id="viewdesign">

            </select>
          </div>
          <img src="../../../system_2/upload/UI/wait.jpg" id="designview" style="width:100%; height:auto; "
            class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
        </div>
        <div class="col-3">
          <p>2. Add Your Measherments </p>
          <label>
            <h4>Fixting Option</h4>
          </label>
          <fieldset class="form-group">
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="withfix" id="withfix" value="" checked="">
              With Fixing
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="withfix" id="withoutfix" value="" checked="">
              Without Fixing
            </label>
          </div>
          </fieldset>
          <hr>
          <h4  style="display:inline;">Unit Price =</h4> <h3 id="final_unit" style="display:inline;" id="unitprice">0</h3> <h3 style="display:inline;" id="unitprice">LKR</h3>
          <hr>
          <div class="row">
            <div class="col-5">
              <lable>Width</lable>
              <input type="text" name="width" id="width" class="form-control" placeholder="inchers">
            </div>
            <div class="col-2">
              <h4>X</h4>
            </div>
            <div class="col-5">
              <lable>Height</lable>
              <input type="text" name="height" id="height" class="form-control" placeholder="inchers">
            </div>
          </div>
          <div class="py-4 px-5">
            <button id="btnAdd" onclick="return false" class="btn btn-success mx-5 px-5 py-2">Add</button>
          </div>
          <P style="color:red;">* Insert all measurements into squares of any shape.</P>
        </div>
        <div class="col-3">
          <p>3. All Measherments </p>
          <table class="table table-hover">
            <thead>
                <tr class="table-success">
                    <th scope="row">Width</th>
                    <td>Height</td>
                    <td>Uni Price</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody id="mesh_list">
                
            </tbody>
        </table>
        </div>
        <div class="col-3">
          <p>4. Total Cost </p>
          <div class="px-4 pt-5" style="margin-top:20px;border-radius:10px">
            <div class="card border-success mb-3" style="max-width: 20rem;">
              <div class="card-body">
                <h4 class="card-title px-2">Cost Summary</h4>
                <div class="row">
                  <div class="col-6">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Subtotal</li>
                      
                  </div>
                  <div class="col-6">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item" id="destotel">0</li>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="row py-3 px-3">
                  <button type="button" class="btn btn-warning" id="next_step">Next Step</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</body>
<script>

  //clear localstorage when refresh
    function myFunction() {
    localStorage.clear();
    buy_button();
    setdata();
}

//get data from input link
$inputData = $("#input_service_id").val(); // service id
$userid = $("#input_user_id").val(); //user id

//add data to local storage
function setdata(){
            var item = {
                userid: $userid,
                serviceid: $inputData,
            }
            if (localStorage.getItem('service') === null) {
                //careate java script array
                var service = [];
                //push data to array
                service.push(item);
                //set the locsl storage
                localStorage.setItem('service', JSON.stringify(service));
            } else {
                var service = JSON.parse(localStorage.getItem('service'));
                for (var i = 0; i < service.length; i++) {
                    var userid = service[i].userid;

                    if (userid === item.userid) {
                        order.splice(i, 1);
                    }
                }
                service.push(item);
                //Re-set localstorage
                localStorage.setItem('service', JSON.stringify(service));
            }
}
//send an ajax request to get servicr data to page after load
$.get("../routes/service/getservice_data.php", {
sid: $inputData
}, function (res) {
var jdata = jQuery.parseJSON(res);

$("#service_name").text(jdata.service_Name);
$("#service_main_image").attr('src', '../' + jdata.service_Image);

})

//send ajax request to load design list to page
$.get("../routes/service/getdesignlist.php", {
sid: $inputData
}, function (res1) {
$("#viewdesign").html(res1);

})

//send ajax reqwest to get desaign data to page
$number = 0;
$("#viewdesign").on('change', function () {


//check design is chainged?
if ($number > 1) {

  //then send alert ane reload data
  Swal.fire({
    icon: 'info',
    text: 'Design chainged, please celect option again!',
  });

  $value = $(this).val(); //disign id

  //reload data
  $.get("../routes/service/getdesigndata.php", {
    did: $value,
    sid: $inputData
  }, function (res2) {
    var jdata = jQuery.parseJSON(res2);

    $("#designview").attr('src', '../' + jdata.serSubcatImage);
    $("#withfix").attr('value', jdata.serSubcatUnitChrge);
    $("#withoutfix").attr('value', jdata.serSubcatUnitChrgewithfix);
  })

  //clear the unit price
  $("#final_unit").text(0);
  $number = 0;
} 
//if design not change load design data to page
else {
  $value = $(this).val();

  $.get("../routes/service/getdesigndata.php", {
    did: $value,
    sid: $inputData
  }, function (res2) {
    var jdata = jQuery.parseJSON(res2);

    $("#designview").attr('src', '../' + jdata.serSubcatImage);
    $("#withoutfix").attr('value', jdata.serSubcatUnitChrge);
    $("#withfix").attr('value', jdata.serSubcatUnitChrgewithfix);
  })
}

})

//get unit value form form radio button
$('input[type="radio"]').click(function () {
$fixing = $(this).val();
$("#final_unit").text($fixing);

//if selrct fixing then redu to notification
++$number;
})


$id=0;
//  //add data to local storage
$("#btnAdd").click(function () {

$width = $("#width").val();
$height = $("#height").val();
$unitpricefinal = $("#final_unit").text();

//data validation part for input data
if ($height.length == "" || $width.length == "") {
  Swal.fire({
    icon: 'info',
    text: 'Enter Width and Height',
  });
} else if (!$.isNumeric($width) || !$.isNumeric($height)) {
  Swal.fire({
    icon: 'info',
    text: 'Please Enter Numeric Value',
  });
} else if ($unitpricefinal == 0) {
  Swal.fire({
    icon: 'info',
    text: 'Select Previous Options',
  });
} else {


  $did=$('#viewdesign').val();

  //create object
  var mesh = {
    userid: $userid,
    width: $width,
    height: $height,
    unitprice: $unitpricefinal,
    serviceid: $inputData,
    designid: $did,
    id: $id,
  }
  //check is locak storage is empty
  if (localStorage.getItem('meshs') === null) {
    //careate java script array
    var meshs = [];
    //push data to array
    meshs.push(mesh);
    //set the locsl storage
    localStorage.setItem('meshs', JSON.stringify(meshs));
  } else {
    //get data fro local storage
    var meshs = JSON.parse(localStorage.getItem('meshs'));
    //add new data to array
    meshs.push(mesh);
    //reset local storage
    localStorage.setItem('meshs', JSON.stringify(meshs));
  }

}
//clear the input feelds
$("#width").val('');
$("#height").val('');

++$id;

//call the fetch function to show aded items
FetchAll();
buy_button();

})


function FetchAll() {
var meshResult = document.getElementById('mesh_list');
var total = document.getElementById('destotel');
var meshs = JSON.parse(localStorage.getItem('meshs'));
meshResult.innerHTML = "";
total.innerHTML = "0.00";

for (var i = 0; i < meshs.length; i++) {
  var width = meshs[i].width;
  var height = meshs[i].height;
  var unitprice = meshs[i].unitprice;
  var id = meshs[i].id;

  var stl = [parseInt(width)/12]*[parseInt(height)/12]*parseInt(unitprice);

  
  meshResult.innerHTML += '<tr class="table-secondary">' +
    '<th scope="row">' + width + '</th>' +
    '<td>' + height + '</td>' +
    '<td>' + unitprice + '</td>' +
    '<td><a href=# class="btn btn-danger py-1 my-1" onclick="deletemeshs(\'' + id + '\')">Remove</a></td>' +
    '</tr>';
  // total.innerHTML = parseInt(total.innerHTML)+stl;
  total.innerHTML = (parseInt(total.innerHTML)+stl).toFixed(2);

}
}



function deletemeshs(id) {
var meshs = JSON.parse(localStorage.getItem('meshs'));
for (let i = 0; i < meshs.length; i++) {
    if (meshs[i].id == id) {
        meshs.splice(i, 1);
    }

}
localStorage.setItem('meshs', JSON.stringify(meshs));
FetchAll();
buy_button();
}

//press next step button
function buy_button() {
        //if cart items are empty desable the buy button
        var tempmeshs = JSON.parse(localStorage.getItem('meshs'));

        if (localStorage.getItem('meshs') === null) {
            $("#next_step").attr('class', "btn btn-warning disabled");
        } else if (tempmeshs.length == 0) {
            $("#next_step").attr('class', "btn btn-warning disabled");
        } else {
            $("#next_step").attr('class', "btn btn-warning");
        }
    }
//check local storage is empty or not??
$("#next_step").click(function () {
      //add total cost to service localstorage
      var service = JSON.parse(localStorage.getItem('service'));
        $total= $('#destotel').text();
                //create object
                var item = {
                    userid: service[0].userid,
                    serviceid: service[0].serviceid,
                    total: $total,

                }
                service.splice(0, 1);
      
        localStorage.setItem('service', JSON.stringify(service));

        service.push(item);
        //Re-set localstorage
        localStorage.setItem('service', JSON.stringify(service));
      //rederect the nect page
      window.location.href = 'service_final.php';
})


</script> 