<div class="card border-light">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <h5>View all Order Delivery Info</h5>
            </div>
            <siv class="col-6">
                <input class="form-control mx-1 my-1" type="search" name="searchData" id="search_product" placeholder="Search Order">
            </siv>
        </div>
        <hr>
        <table class="table table-hover">
            <thead>
                <tr class="table-success">
                    <th scope="row">Order Id</th>
                    <td>Payment</td>
                    <td>Conformed</td>
                    <td>proccess</td>
                    <td>Transport</td>
                    <td>Deliverd</td>
                </tr>
            </thead>
            <tbody id="pro_list"  style="border: 1px solid;">
                
            </tbody>
        </table>
        
    </div>
</div>
<script>
    $(document).ready(function(){
        //send an ajax request at loading products
        $.get("../routes/order_service/viewallorders_delivery.php", function (res) {
        //display data 
        $("#pro_list").html(res);
        })

        //search emp 
        $("#search_product").on('input',function(){
            $inputData = $(this).val();

            //send an ajax request 
            $.get("../routes/order_service/viewallserchorders_delivery.php",{searchData:$inputData},function(res){
                $("#pro_list").html(res);
            })
        })

        
    })

    
</script>
