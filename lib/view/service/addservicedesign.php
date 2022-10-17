<div class="card border-success">
    <div class="cardbody py-3 px-3">
        <h5>Add Service Design</h5>
        <hr>
        <form id="add_new_design" enctype="multipart/form-data">
            <div class="form-group mt-2">
            <select class="form-select" name="allservice" id="allservice">
              <option value="0">Select Service</option>
            </select>
            </div>
            <hr>
            <div class="form-group mt-2">
            <input type="text" name="designName" id="designName" class="form-control"
                            placeholder="Design Name">
            </div>
            <div class="form-group mt-2">
                <label>Design Image </label>
                <input class="form-control mt2" type="file" id="designImage" name="designImage">
                <img src="" alt="" id="imgPrev" height="200" widh="400">
            </div>
            <div class="form-group mt-2">
            <select class="form-select" name="designUnit" id="designUnit">
              <option value="square inch">square inch</option>
              <option value="inch">inch</option>
            </select>
            </div>
            <div class="form-group mt-2">
            <input type="text" name="designunitprice" id="designunitprice" class="form-control"
                            placeholder="Design Unit Price Without Fixing">
            </div>
            <div class="form-group mt-2">
            <input type="text" name="designunitpricewithfix" id="designunitpricewithfix" class="form-control"
                            placeholder="Design Unit Price With Fixing">
            </div>
            <div class="form-group mt-2">
            <input type="text" name="designdayforunit" id="designdayforunit" class="form-control"
                            placeholder="day for unit">
            </div>
            <div class="form-group mt-2">
                <button id="btnAdddesign" class="btn btn-success">Add Design</button>
            </div>
        </form>
    </div>
</div>
<script>
    //load service list to selection option
    $.get("../routes/service/allservicelist.php", function (res) {
          //display data 
          $("#allservice").html(res);
        })

    $("#designImage").change(function () {
        var fileRead = new FileReader();
        fileRead.onload = function (e) {
            $("#imgPrev").attr('src', e.target.result);
            $("#imgPrev").attr('style', "height:200px;widh:400px");
        }
        fileRead.readAsDataURL(this.files[0]);
    })

    $(document).on('click','#btnAdddesign',function(e){
        e.preventDefault();
        var form = $("#add_new_design")[0];

        var formData = new FormData(form);

        $.ajax({
            url:"../routes/service/addservicedesign.php",
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {
                alert(data);
            },
            error: function (data) {
                alert(data);
            }
            
        });
    });

   
</script>