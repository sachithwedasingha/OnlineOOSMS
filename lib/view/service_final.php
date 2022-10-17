<?php
//star the session
session_start();
//chek its logd in?
if(empty($_SESSION['user_id'])){
  header('location:login.php');
}
include_once('../layout/app.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
<style>
    @media print {
        .no-print,
        .no-print,
        #gradient,
        #steps-uid-0-p-3 * {
            display: none !important;
        }
        #date,
        #date * {
            display: none !important;
        }
        #sidenav,
        #sidenav * {
            display: none !important;
        }
    }
    table, th, td {
  border: 1px solid;
}
</style>

    <title>add Your Adderss and pay</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 pt-5" id="Oder_page_content">

                <!-- load content to this page -->

            </div>
            <div class="no-print">
            <div class="form-group px-5 py-2">
                <button type="" class="btn btn-secondary" style="align:right" onclick="history.back()" id="back1">Back</button>
                <!-- <button type="" class="btn btn-secondary" style="align:right" onclick="history.back()" id="back2">Back</button> -->
                <button type="" class="btn btn-success disabled" style="align:right" id="next1">Confirm Delivey
                    Details</button>
                <button type="" class="btn btn-success disabled" id="next2">chekout</button>
                <button type="" class="btn btn-success" id="next4">chekout</button>
                <button type="" class="btn btn-success" id="next3">back to Shoppimg</button>

            </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
    </div>
</body>
<script>
    //first view address line input
    $(document).ready(function () {
        $('#Oder_page_content').load('order_service/address.php');
        $('#next2').hide();
        $('#next3').hide();
        $('#next4').hide();
        $('#back2').hide();
       
        //back to service--------------------------------------error press back button not loading page with details
        // $('#back1').click(function () {
        //     window.location.href = 'service.php';
        // });
//back to service--------------------------------------error press back button not loading page with details

        //load payment page
        $("#next1").click(function () {
            //address form data send to localstorage

            var item = {
                addname: $("#address_Name").val(),
                addnumber: $("#address_Number").val(),
                addlane: $("#address_Lane").val(),
                addtown: $("#address_Town").val(),
                adddis: $("#address_Dis").val(),
            }

            if (localStorage.getItem('address') === null) {
                //careate java script array
                var address = [];
                //push data to array
                address.push(item);
                //set the locsl storage
                localStorage.setItem('address', JSON.stringify(address));

                sendaddress();

            } else {
                //remover address local storage
                localStorage.removeItem("address");
                //careate java script array
                var address = [];
                //push data to array
                address.push(item);
                //set the locsl storage
                localStorage.setItem('address', JSON.stringify(address));

                sendaddress();
            }

            function sendaddress() {

                var service = JSON.parse(localStorage.getItem('service'));
                var userid = service[0].userid;
                var addname = $("#address_Name").val();
                var addnumber = $("#address_Number").val();
                var addlane = $("#address_Lane").val();
                var addtown = $("#address_Town").val();
                var adddis = $("#address_Dis").val();

                $.post("../routes/address/addnewaddress.php", {
                        userid: userid,
                        name: addname,
                        number: addnumber,
                        lane: addlane,
                        town: addtown,
                        dis: adddis,
                    },
                    function (data) {
                        // alert(data);
                    })
            }

            //popup payment pethord
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-success',
                },
                buttonsStyling: true
            })

            swalWithBootstrapButtons.fire({
                title: 'Select Payment Methord',
                showCancelButton: true,
                confirmButtonText: 'online Payment',
                cancelButtonText: 'Offline Payment',
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#Oder_page_content').load('payment/on_payment.php');
                    $('#back1').hide();
                    $('#back2').show();
                    $('#next1').hide();
                    $('#next2').show();
                    $('#next3').hide();
                    $('#next4').hide();
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {

                    $('#Oder_page_content').load('payment/off_payment.php');
                    $('#back1').hide();
                    $('#back2').show();
                    $('#next1').hide();
                    $('#next2').hide();
                    $('#next3').hide();
                    $('#next4').show();


                }
            })
        });

        //load final page for online payment
        $("#next2").click(function () {

            $('#next1').hide();
            $('#next3').show();
            $('#next2').hide();

            sendOrderData();
            makeorder();

           
            function sendOrderData() {


                var address = JSON.parse(localStorage.getItem('address'));
                var service = JSON.parse(localStorage.getItem('service'));
                var meshs = JSON.parse(localStorage.getItem('meshs'));
                var tempid = Math.floor(Math.random() * (1000 - 1 + 1) + 1);

                for (var i = 0; i < meshs.length; i++) {

                    var item = {
                        tempid: tempid,
                        userid: service[0].userid,
                        total: service[0].total,
                        serviceid: meshs[i].serviceid,
                        designid: meshs[i].designid,
                        unitprice: meshs[i].unitprice,
                        width: meshs[i].width,
                        height: meshs[i].height,
                        address: address[0].addname + ', ' + address[0].addnumber + ', ' + address[
                            0].addlane + ', ' + address[0].addtown + ', ' + address[0].adddis,
                    };

                    if (localStorage.getItem('fservice') === null) {
                        //careate java script array
                        var fservice = [];
                        //push data to array
                        fservice.push(item);
                        //set the locsl storage
                        localStorage.setItem('fservice', JSON.stringify(fservice));
                    } else {
                        var fservice = JSON.parse(localStorage.getItem('fservice'));
                        fservice.push(item);
                        //Re-set localstorage
                        localStorage.setItem('fservice', JSON.stringify(fservice));
                        
                    }
                }
            }

            function makeorder() {

                var today = new Date();
                var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();

                var fservice = JSON.parse(localStorage.getItem('fservice'));
                for (var i = 0; i < fservice.length; i++) {

                    var tempid = fservice[i].tempid;
                    var userid = fservice[i].userid;
                    var date = date;
                    var serviceid = fservice[i].serviceid;
                    var designid = fservice[i].designid;
                    var unitprice = fservice[i].unitprice;
                    var address = fservice[i].address;
                    var width = fservice[i].width;
                    var height = fservice[i].height;
                    var total = fservice[i].total

                    //send ajax request
                    $.post("../routes/order/makeservice.php", {
                           tempid:tempid,
                           userid: userid,
                           date: date,
                           address: address,
                           serviceid: serviceid,
                           designid: designid,
                           unitprice: unitprice,
                           width: width,
                           height: height,
                           total: total,

                        },
                        function (data) {
                            localStorage.setItem('orderid', data);
                            invoiceon();
                            // alert(data);
                        })

                }
               

                
                    Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Your Order has been Placed',
                    showConfirmButton: false,
                    timer: 1500
                    })
            }

        });

        

        //load final page for offline payment
        $("#next4").click(function () {

$('#next1').hide();
$('#next3').show();
$('#next2').hide();
$('#next4').hide();

sendOrderData();
makeorderoff();

function sendOrderData() {


    var address = JSON.parse(localStorage.getItem('address'));
    var service = JSON.parse(localStorage.getItem('service'));
    var meshs = JSON.parse(localStorage.getItem('meshs'));
    var tempid = Math.floor(Math.random() * (1000 - 1 + 1) + 1);

    for (var i = 0; i < meshs.length; i++) {

        var item = {
            tempid: tempid,
            userid: service[0].userid,
            total: service[0].total,
            serviceid: meshs[i].serviceid,
            designid: meshs[i].designid,
            unitprice: meshs[i].unitprice,
            width: meshs[i].width,
            height: meshs[i].height,
            address: address[0].addname + ', ' + address[0].addnumber + ', ' + address[
                0].addlane + ', ' + address[0].addtown + ', ' + address[0].adddis,
        };

        if (localStorage.getItem('fservice') === null) {
            //careate java script array
            var fservice = [];
            //push data to array
            fservice.push(item);
            //set the locsl storage
            localStorage.setItem('fservice', JSON.stringify(fservice));
        } else {
            var fservice = JSON.parse(localStorage.getItem('fservice'));
            fservice.push(item);
            //Re-set localstorage
            localStorage.setItem('fservice', JSON.stringify(fservice));
            
        }
    }
}

function makeorderoff() {

    var today = new Date();
    var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();

    var fservice = JSON.parse(localStorage.getItem('fservice'));
    for (var i = 0; i < fservice.length; i++) {

        var tempid = fservice[i].tempid;
        var userid = fservice[i].userid;
        var date = date;
        var serviceid = fservice[i].serviceid;
        var designid = fservice[i].designid;
        var unitprice = fservice[i].unitprice;
        var address = fservice[i].address;
        var width = fservice[i].width;
        var height = fservice[i].height;
        var total = fservice[i].total

        //send ajax request
        $.post("../routes/order/makeserviceoff.php", {
               tempid:tempid,
               userid: userid,
               date: date,
               address: address,
               serviceid: serviceid,
               designid: designid,
               unitprice: unitprice,
               width: width,
               height: height,
               total: total,

            },
            function (data) {
                localStorage.setItem('orderid', data);
                // alert(data);
                invoiceoff();
            })

    }
   
   
    
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Your Order has been Placed',
        showConfirmButton: false,
        timer: 1500
        })
}

});
        // $("#back2").click(function () {
        //     location.reload();

        // });

        //place order and reload to home
        $("#next3").click(function () {
            localStorage.removeItem('forder');
                            localStorage.removeItem('meshs');
                            localStorage.removeItem('address');
                            localStorage.removeItem('fservice');
                            localStorage.removeItem('service');
                            localStorage.removeItem('orderid');

            window.location.href = '../../index.php';
        });

        function invoiceon(){
            $('#Oder_page_content').load('invoice/Sinvoive_bill_online.php');
        }

        function invoiceoff(){
            $('#Oder_page_content').load('invoice/Sinvoive_bill_offline.php');
        }

    });

    function myFunction() {
  var checkBox = document.getElementById("flexCheckDefault");
  $("#next1").attr('class', "btn btn-success disabled");
  if (checkBox.checked == true){
    $("#next1").attr('class', "btn btn-success");
    
  } else {
     
  }
}
</script>

</html>