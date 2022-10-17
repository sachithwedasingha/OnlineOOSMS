<div class="card border-success">
    <div class="cardbody py-3 px-3">
        <h5>Add New Service</h5>
        <hr>
        <form id="add_new_service" enctype="multipart/form-data">
            <div class="form-group mt-2">
                <input type="text" name="serviceName" id="serviceName" class="form-control" placeholder="Service Name">
            </div>
            <div class="form-group mt-2">
                <textarea class="form-control" name="service_Discription" id="service_Discription" placeholder="Service Details" rows="3"></textarea>
            </div>
            <div class="form-group mt-2">
                <label>Service Image </label>
                <input class="form-control mt2" type="file" id="ServiceImg" name="ServiceImg">
                <img src="" alt="" id="imgPrev" height="200" widh="400">
            </div>
            <div class="form-group mt-2">
                <button id="btnAddService" class="btn btn-success">Add Main Service</button>
            </div>
        </form>
    </div>
</div>
<script>
    $("#ServiceImg").change(function () {
        var fileRead = new FileReader();
        fileRead.onload = function (e) {
            $("#imgPrev").attr('src', e.target.result);
            $("#imgPrev").attr('style', "height:200px;widh:400px");
        }
        fileRead.readAsDataURL(this.files[0]);
    })

    $(document).on('click','#btnAddService',function(e){
        e.preventDefault();
        var form = $("#add_new_service")[0];

        var formData = new FormData(form);

        $.ajax({
            url:"../routes/service/addNewService.php",
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