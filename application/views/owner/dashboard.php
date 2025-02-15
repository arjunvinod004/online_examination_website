<div class="row">


    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card-h-100">
            <!-- card body -->
            <div class="card-body br-50  bg-bg-success button-3d mb-5">
                <a href="<?php echo base_url('owner/product'); ?>">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <span class="text-white d-block text-truncate">DISHES CATALOG</span>
                            <!-- <h4 class="mb-3">
                                <span class="text-white"><?php if(isset($productsCount)) { echo $productsCount; } ?></span>
                            </h4> -->
                        </div>
                        <div class="col-4 icon">
                            <i class="fa fa-hamburger"></i>
                        </div>
                    </div>
                </a>

            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div><!-- end col -->


    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card-h-100">
            <!-- card body -->
            <div class="card-body br-50  bg-bg-info button-3d">
                <a href="<?php echo base_url('owner/order'); ?>">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <span class="text-white d-block text-truncate">Order Monitor</span>
                            <!-- <h4 class="mb-3">
                                <span class="text-white"><?php if(isset($productsCount)) { echo $productsCount; } ?></span>
                            </h4> -->
                        </div>
                        <div class="col-4 icon">
                            <i class="fa fa-computer"></i>
                        </div>
                    </div>
                </a>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div><!-- end col-->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card-h-100">
            <!-- card body -->
            <div class="card-body br-50  bg-bg-primary button-3d">
                <a href="<?php echo base_url('owner/order/reports'); ?>">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <span class="text-white d-block text-truncate">Reports</span>
                            <!-- <h4 class="mb-3">
                                <span class="text-white"><?php if(isset($productsCount)) { echo $productsCount; } ?></span>
                            </h4> -->
                        </div>
                        <div class="col-4 icon">
                            <i class="fa fa-book"></i>
                        </div>
                    </div>
                </a>

            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card-h-100">
            <!-- card body -->
            <div class="card-body br-50  bg-danger button-3d">
                <a href="<?php echo base_url('owner/settings'); ?>">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <span class="text-white d-block text-truncate">Settings</span>
                            <!-- <h4 class="mb-3">
                                <span class="text-white"><?php if(isset($productsCount)) { echo $productsCount; } ?></span>
                            </h4> -->
                        </div>
                        <div class="col-4 icon">
                            <i class="fa fa-gear"></i>
                        </div>
                    </div>
                </a>

            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div><!-- end col -->


</div>

</div><!-- end col-->


</div>


<!-- Modal for detailed view -->
<div class="modal fade" id="recipe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> <span id="table_name"></span></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe id="table_iframe_recipe" height="750px" width="100%"></iframe>
            </div>
        </div>
    </div>
</div>
<!-- end -->




<div class="modal fade" id="holiday" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> <span id="table_name"></span>HOLIDAYS</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row bg-soft-light mb-3 border1 pt-2">
                    <form class="row g-3" id="addholidays" method="post" enctype="multipart/form-data">
                        <div class="col-md-3">
                            <div class="mb-2 ">
                                <label class="form-label mx-2" for="default-input">Date</label>
                                <input type="date" class="form-control" id="holidays_date" name="holiday_date">
                                <span class="error errormsg mt-2 mx-2" id="holiday_date_error"></span>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-2 ">
                                <label class="form-label mx-2" for="default-input">Holiday Name</label>
                                <input type="text" class="form-control" placeholder="Holiday Name" id="holidays_name"
                                    name="holiday_name">
                                <span class="error errormsg mt-2 mx-2" id="holiday_name_error"></span>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-2 focus">
                                <label class="form-label" for="default-input">Description</label>
                                <input class="form-control" value="" placeholder="Description" type="text"
                                    id="holidays_description" name="holiday_description">

                            </div>
                        </div>



                        <div class="col-md-3">
                            <div class="mb-4">
                                <label class="form-label" for="default-input">&nbsp;</label><br>
                                <button class="btn btn-success w-md" type="button" id="add_holiday">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="getholidaysdata"></div>
            </div>
        </div>
    </div>
</div>



</div>


</div>




<script>
$(document).ready(function() {



    $(document).on("click", ".delete-order", function() {
        var rowID1 = $(this).data("id");
        var rowId = "#order-row-" + rowID1;
        if (confirm("Are you sure you want to delete this Holiday?")) {
            $.ajax({
                url: '<?= base_url("owner/Dashboard/DeleteHoliday"); ?>',
                type: "POST",
                data: {
                    rowID: rowID1
                },
                dataType: "html",
                success: function(response) {
                    console.log(response);
                    var result = JSON.parse(response);
                    if (result.success) {
                        $(rowId).remove();
                        location.reload(true);
                    }
                },
            })
        }
    });


    let formData = new FormData($('#addholidays')[0]);
    $.ajax({
        url: '<?= base_url("owner/dashboard/getHolidaysByStoreId") ?>',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'html',
        success: function(response) {
            console.log(response);
            $('#getholidaysdata').html(response);
        }
    })
})
$('#add_holiday').click(function() {
    let formData = new FormData($('#addholidays')[0]);
    $.ajax({
        url: '<?= base_url("owner/dashboard/addHoliday") ?>',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'html',
        success: function(response) {
            console.log(response);

            if (response.success) {
                $('#holiday_date_error').html('');
                $('#holiday_name_error').html('');
                $('#holidays_date').val('');
                $('#holidays_name').val('');
                $('#holidays_description').val('');
                $('#getholidaysdata').html(response);

                location.reload();
            } else if (response.errors.holiday_date) {
                $('#holiday_date_error').html(response.errors.holiday_date);
            }
            if (response.errors.holiday_name) {
                $('#holiday_name_error').html(response.errors.holiday_name);
            }
        }
    })
});
</script>