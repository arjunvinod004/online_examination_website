<div class="container-fluid mt-4">
    <!-- <input type="text" class="form-control mb-3 mt-2" id="inputtext" placeholder="search your products..."
        name="search"> -->
    <div id="resultContainer">


        <?php

        //print_r($products);
                       if(!empty($products)){
                       $count = 1;
                       foreach($products as $val){ ?>
        <div class="row mb-2 product">
            <div class="col-3">
                <img src="<?php echo base_url(); ?>uploads/product/<?php if(isset($val['image'])) echo $val['image']; ?>"
                    class="responsive-image custom-rounded">
            </div>
            <div class="col-3 ">
                <?php $product_name = ($val['store_product_name_en'] != '') ? $val['store_product_name_en'] : $val['product_name_en']; ?>
                <h4 class="text-uppercase responsive-h4"><?php echo $product_name; ?> 
                </h4>
                <h5><?php echo $val['rate'];?></h5>
                <select name="change_status" id="change_status" class="form-select w-50 mb-2" id=""
                    onchange="changeProductStatus(this.value,<?php echo $val['store_product_id']; ?>)">
                    <option value="0" <?php echo ($val['is_active'] == 0) ? 'selected' : ''; ?>>Available</option>
                    <option value="1" <?php echo ($val['is_active'] == 1) ? 'selected' : ''; ?>>Unavailable</option>
                </select>
                <h5><?php echo ($val['is_customizable'] == 1) ? ' Customizable' : ''; ?></h5>
            </div>
            <div class="col-6">
                <a data-bs-toggle="modal" data-bs-target="#Edit-dish" type="button"><button
                        data-id="<?php echo $val['store_product_id']; ?>"
                        data-isCustomizable="<?php echo $val['is_customizable']; ?>" class="custom-button edit-btn"><i
                            class="fa fa-edit"></i> EDIT COMBO</button></a>
            </div>

        </div>
        <?php $count++; } } ?>
    </div>

</div>








<!-- Change Dish Informations -->

<!-- Change Description -->
<div class="modal fade" id="Edit-dish" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">PRODUCT DETAILS</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- if response within jquery -->
                <div class="message d-none" role="alert"></div>
                <!-- if response within jquery -->

                <input type="hidden" id="hiddenField" name="product_id" value="">
                <input type="hidden" id="isCustomizable" value="">
                <div class="container">
                    <div class="row mb-5 justify-content-center">
                        <div class="col-3">
                            <a class="productDetails btn bg-bg-success text-white w-100">PRODUCT</a>
                        </div>
                        <div class="col-2">
                            <a class="listCombo btn bg-secondary text-white w-100">COMBO ITEMS</a>
                        </div>
                        <div class="col-2">
                            <a class="addPhotos btn bg-danger text-white w-100">PHOTOS</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <iframe id="iframe_body" height="700px" width="100%">rwerwerwer</iframe>
                    <form id="productForm" method="post" enctype="multipart/form-data">

                        <input type="hidden" id="product_id_new" name="product_id">
                        <label class="col-sm-3 col-form-label">Rate</label>
                        <input type="text" class="form-control" id="store_product_rate" name="store_product_rate"
                            value="">
                        <label class="col-sm-3 col-form-label">Name (Malayalam)</label>
                        <input type="text" class="form-control" id="store_product_name_ma" name="store_product_name_ma"
                            value="">
                        <label class="col-sm-3 col-form-label">Name (English)</label>
                        <input type="text" class="form-control" id="store_product_name_en" name="store_product_name_en"
                            value="">
                        <label class="col-sm-3 col-form-label">Name (Hindi)</label>
                        <input type="text" class="form-control" id="store_product_name_hi" name="store_product_name_hi"
                            value="">
                        <label class="col-sm-3 col-form-label">Name (Arabic)</label>
                        <input type="text" class="form-control" id="store_product_name_ar" name="store_product_name_ar"
                            value="">

                        <label class="col-sm-3 col-form-label">Description (Malayalam)</label>
                        <textarea class="form-control" name="description_malayalam" id="description_malayalam"
                            placeholder="Malayalam"></textarea>
                        <span class="error errormsg mt-2" id="description_malayalam_error"></span>

                        <label class="col-sm-3 col-form-label">Description (English)</label>
                        <textarea class="form-control" name="description_english" id="description_english"
                            placeholder="English"></textarea>
                        <span class="error errormsg mt-2" id="description_english_error"></span>

                        <label class="col-sm-3 col-form-label">Description (Hindi)</label>
                        <textarea class="form-control" name="description_hindi" placeholder="hindi"
                            id="description_hindi"></textarea>
                        <span class="error errormsg mt-2" id="description_hindi_error"></span>

                        <label class="col-sm-3 col-form-label">Description (Arabic)</label>
                        <textarea class="form-control" name="description_arabic" id="description_arabic"
                            placeholder="arabic"></textarea>
                        <span class="error errormsg mt-2" id="description_arabic_error"></span>
                        <div class="mt-2 text-center m-auto">
                            <button class="btn btn-primary " type="button" id="saveProduct">UPDATE PRODUCT</button>
                        </div>
                </div>




                </form>

            </div>
        </div>
    </div>
</div>
<!-- end -->






<!-- Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <!-- Success message placeholder -->
                <div id="successMessage" class="alert alert-success" style="display: none;">

                </div>
            </div>
        </div>
    </div>
</div>



<script>
$(document).ready(function() {
    $('.editProduct').click(function() {
        var product_id = $('#hiddenField').val();
        document.getElementById('iframe_body').src =
            '<?php echo base_url('owner/product/load_variants/'); ?>' + product_id;
    });

    $('.listCombo').click(function() {
        $("#iframe_body").show();
        $("#productForm").hide();
        var product_id = $('#hiddenField').val();
        document.getElementById('iframe_body').src =
            '<?php echo base_url('owner/combo/load_combo/'); ?>' + product_id;
    });

    $('.addPhotos').click(function() {
        $("#iframe_body").show();
        $("#productForm").hide();
        var product_id = $('#hiddenField').val();
        document.getElementById('iframe_body').src =
            '<?php echo base_url('owner/product/load_images/'); ?>' + product_id;
    });

    $(document).on('click', '.edit-btn', function() {
        $("#productForm").show();
        $("#iframe_body").hide();
        var id = $(this).attr('data-id');
        var isCustomizable = $(this).attr('data-isCustomizable');
        if (isCustomizable == 0) {
            $(".isCustomize").addClass("d-none");
        } else {
            $(".isCustomize").removeClass("d-none");
        }
        $('#hiddenField').val(id);
        $('#isCustomizable').val(isCustomizable);
        $('#product_id_new').val(id);
        $.ajax({
            url: '<?= base_url("owner/Product/getDescriptions") ?>',
            type: 'POST',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                console.log(response.data);
                $('#store_product_rate').val(response.data
                    .rate);
                $('#store_product_name_ma').val(response.data
                    .store_product_name_ma);
                $('#store_product_name_en').val(response.data
                    .store_product_name_en);
                $('#store_product_name_hi').val(response.data
                    .store_product_name_hi);
                $('#store_product_name_ar').val(response.data
                    .store_product_name_ar);
                $('#description_malayalam').val(response.data
                    .store_product_desc_ma);
                $('#description_english').val(response.data
                    .store_product_desc_en);
                $('#description_hindi').val(response.data.store_product_desc_hi);
                $('#description_arabic').val(response.data.store_product_desc_ar);

            },
            error: function() {
                alert('An error occurred while fetching data.');
            }
        });
    });


    $(document).on('click', '.productDetails', function() {
        $("#productForm").show();
        $("#iframe_body").hide();
        var id = $('#hiddenField').val();
        var isCustomizable = $('#isCustomizable').val();
        if (isCustomizable == 0) {
            $(".isCustomize").addClass("d-none");
        } else {
            $(".isCustomize").removeClass("d-none");
        }
        $('#hiddenField').val(id);
        $('#product_id_new').val(id);
        $.ajax({
            url: '<?= base_url("owner/Product/getDescriptions") ?>',
            type: 'POST',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                console.log(response.data);
                $('#store_product_rate').val(response.data
                    .rate);
                $('#store_product_name_ma').val(response.data
                    .store_product_name_ma);
                $('#store_product_name_en').val(response.data
                    .store_product_name_en);
                $('#store_product_name_hi').val(response.data
                    .store_product_name_hi);
                $('#store_product_name_ar').val(response.data
                    .store_product_name_ar);
                $('#description_malayalam').val(response.data
                    .store_product_desc_ma);
                $('#description_english').val(response.data
                    .store_product_desc_en);
                $('#description_hindi').val(response.data.store_product_desc_hi);
                $('#description_arabic').val(response.data.store_product_desc_ar);

            },
            error: function() {
                alert('An error occurred while fetching data.');
            }
        });
    });


    $('#saveProduct').click(function() {
        let formData = new FormData($('#productForm')[
            0]); // Capture the form data, including files
        //alert(formData);
        $.ajax({
            url: '<?= base_url("owner/Product/changeDescriptions") ?>', // URL to the controller method
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false, // Prevent jQuery from processing the data
            contentType: false, // Prevent jQuery from setting the Content-Type header
            success: function(response) {
                console.log(response);

                if (response.errors) {
                    if (response.errors.description_malayalam) {
                        $('#description_malayalam_error').html(response.errors
                            .description_malayalam);
                    } else if (response.errors.description_english) {
                        $('#description_english_error').html(response.errors
                            .description_english);
                    } else if (response.errors.description_hindi) {
                        $('#description_hindi_error').html(response.errors
                            .description_hindi);
                    } else if (response.errors.description_arabic) {
                        $('#description_arabic_error').html(response.errors
                            .description_arabic);
                    }
                } else {
                    const customMessage = "Your product has been Updated successfully!";
                    $("#successMessage").text(customMessage).show();
                    $("#successModal").modal("show");
                    setTimeout(function() {
                        $("#successModal").modal("hide");
                        $("#Edit-dish").modal("hide");
                        location.reload();
                    }, 3000);

                }
            },
            error: function(xhr) {
                $('#response').html('<p>An error occurred: ' + xhr
                    .responseText +
                    '</p>');
            }
        });
    });
});
</script>
<script>
var myModal = new bootstrap.Modal(document.getElementById('Edit-dish'), {
    backdrop: 'static',
    keyboard: false
});
</script>
<script>
$(document).ready(function() {
    $('#inputtext').on('keyup', function() {
        var inputValue = $(this).val();
        $.ajax({
            url: '<?= base_url("owner/Product/searchProductOnKeyUp") ?>',
            type: 'GET', // HTTP method (can be POST if needed)
            data: {
                search: inputValue
            }, // Data sent to the controller
            success: function(response) {
                console.log(response); // Log the response for debugging
                $('#resultContainer').html(
                    response); // Update the HTML content of a container
            },
            error: function(xhr, status, error) {
                console.error('Error: ' + error);
            }
        })
    })
})
</script>
<script>
function changeProductStatus(is_active, store_product_id) {
    $.ajax({
        url: '<?= base_url("owner/Product/changeProductStatus") ?>', // Correct endpoint
        type: 'POST',
        data: {
            is_active: is_active,
            store_product_id: store_product_id
        },
        success: function(response) {
            console.log('Response:', response);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            alert('An error occurred while updating the status. Please try again.');
        }
    });
}
</script>