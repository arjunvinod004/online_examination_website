<div class="container-fluid">

    <div class="d-flex justify-content-center mb-3">
        <div class="input-group w-50">
            <input type="text" class="form-control" id="inputtext" placeholder="Search your products..." name="search">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                <i class="fa fa-search"></i> <!-- Bootstrap Icons for the search icon -->
            </button>
        </div>
    </div>


    <div id="resultContainer">

        <div class="d-flex justify-content-center mb-3">
            <div class="me-2">
                <a href="<?php echo base_url('owner/product/add'); ?>">
                    <button class="btn btn-primary text-uppercase w-100">Add New Dish</button>
                </a>
            </div>
            <div>
                <a href="<?php echo base_url('owner/combo'); ?>">
                    <button class="btn btn-secondary text-uppercase w-100">List Combo</button>
                </a>
            </div>
        </div>


        <?php
                       if(!empty($products)){
                       $count = 1;
                       foreach($products as $val){
                        if($val['category_id'] != 23 ){ ?>
        <div class="row mb-2 product">
            <div class="col-3">
                <img src="<?php echo base_url(); ?>uploads/product/<?php if(isset($val['image'])) echo $val['image']; ?>"
                    class="responsive-image custom-rounded">
            </div>
            <div class="col-3 ">
                <?php $product_name = ($val['store_product_name_en'] != '') ? $val['store_product_name_en'] : $val['product_name_en']; ?>
                <h4 class="text-uppercase responsive-h4"><?php echo $product_name; ?></h4>
                <h5><?php 
    if ($val['is_customizable'] == 0) {
        echo $val['rate'];
    } else {
        $this->Ordermodel->getCustomizeProductDefaultPrice($val['store_product_id'], $this->session->userdata('logged_in_store_id'));
    }
    ?></h5>
                <?php echo $val['store_product_id']; ?>
                <?php 
                    $stock = $this->Ordermodel->getCurrentStock($val['store_product_id'], $date, $this->session->userdata('logged_in_store_id'));
                if ($stock > 0) { ?>
                <select width="50%" name="change_status" id="change_status" class="form-select mb-2" id=""
                    onchange="changeProductStatus(this.value,<?php echo $val['store_product_id']; ?>)">
                    <option value="0" <?php echo ($val['is_active'] == 0) ? 'selected' : ''; ?>>Available</option>
                    <option value="1" <?php echo ($val['is_active'] == 1) ? 'selected' : ''; ?>>Unavailable</option>
                </select>
                <?php }else{
                    echo '<h5 class="text-danger">Unavailable</h5>';
                } ?>
                <h5><?php echo ($val['is_customizable'] == 1) ? ' Customizable' : ''; ?></h5>
            </div>
            <div class="col-3">
                <div class="button-container">
                    <button class="custom-button disabled">
                        STOCK: <?php 
        $stock = $this->Ordermodel->getCurrentStock($val['store_product_id'], $date, $this->session->userdata('logged_in_store_id'));
        echo ($stock !== null && $stock !== false) ? $stock : 0;
    ?>
                    </button>
                    <button class="custom-button open-modal" data-bs-toggle="modal"
                        data-id="<?php echo $val['store_product_id']; ?>" data-bs-target="#addstock">ADD STOCK</button>
                    <button class="custom-button remove-modal" data-bs-toggle="modal"
                        data-id="<?php echo $val['store_product_id']; ?>" data-bs-target="#removestock">REMOVE
                        STOCK</button>
                    <button class="btn btn-dark nextavialable-modal ml-2" data-bs-toggle="modal"
                        data-id="<?php echo $val['store_product_id']; ?>" data-bs-target="#nextavailabletime"> NEXT
                        AVIALABLE TIME </button>
                </div>
            </div>
            <div class="col-3">
                <?php if ($this->session->userdata('roleid') == 2){ ?>
                <a data-bs-toggle="modal" data-bs-target="#Edit-dish" type="button"><button
                        data-id="<?php echo $val['store_product_id']; ?>"
                        data-isCustomizable="<?php echo $val['is_customizable']; ?>" class="restbtn edit-btn"><span><i
                                class="fa fa-edit"></i> EDIT DISH</span></button></a>
                <?php } ?>
            </div>

        </div>
        <?php $count++; }} } ?>
    </div>

</div>







<div class="container-fluid mt-4">
    <div class="row">
        <?php
            if(!empty($products)){
                $count = 1;
                foreach($products as $val){
                    if($val['category_id'] != 23 ){ ?>
        <!-- Product 1 -->
        <div class="col-12 col-md-6 mb-4">
            <!-- Added col-12 for full width on smaller screens -->
            <div class="card br-20 mb-0">
                <div class="row p-3">
                    <!-- Left Section: Image, Name, and Rate -->
                    <div class="col-md-5">
                        <img src="<?php echo base_url(); ?>uploads/product/<?php if(isset($val['image'])) echo $val['image']; ?>"
                            class="responsive-image custom-rounded">
                        <p class="mb-2 mt-2 rate">Rate: <?php 
                                            if ($val['is_customizable'] == 0) {
                                                echo $val['rate'];
                                            } else {
                                                $this->Ordermodel->getCustomizeProductDefaultPrice($val['store_product_id'], $this->session->userdata('logged_in_store_id'));
                                            }
                                        ?></p>



                        <h5><?php echo ($val['is_customizable'] == 1) ? ' Customizable' : ''; ?></h5>
                    </div>
                    <!-- Right Section: Buttons -->
                    <div class="col-md-7">
                        <h5 class="text-uppercase responsive-h4 text-center mb-2">
                            <?php echo ($val['store_product_name_en'] != '') ? $val['store_product_name_en'] : $val['product_name_en']; ?>
                        </h5>
                        <hr>
                        <div class="w-100 mb-2">
                            <button class="btn btn-dark mb-1">STOCK : <?php 
                                            $stock = $this->Ordermodel->getCurrentStock($val['store_product_id'], $date, $this->session->userdata('logged_in_store_id'));
                                            echo ($stock !== null && $stock !== false) ? $stock : 0;
                                        ?></button>
                            <button class="btn btn-primary mb-1 open-modal" data-bs-toggle="modal"
                                data-id="<?php echo $val['store_product_id']; ?>" data-bs-target="#addstock"><i
                                    class="fa fa-plus"></i> ADD STOCK</button>
                            <button class="btn btn-primary mb-1 remove-modal" data-bs-toggle="modal"
                                data-id="<?php echo $val['store_product_id']; ?>" data-bs-target="#removestock"><i
                                    class="fa fa-remove"></i> REMOVE STOCK</button>
                        </div>
                        <div class="w-100 mb-2">
                            <button class="btn btn-primary mb-1 nextavialable-modal ml-2" data-bs-toggle="modal"
                                data-id="<?php echo $val['store_product_id']; ?>" data-bs-target="#nextavailabletime"><i
                                    class="fa fa-clock"></i> NEXT AVAILABLE
                                TIME</button>
                            <?php if ($this->session->userdata('roleid') == 2){ ?>
                            <a data-bs-toggle="modal" data-bs-target="#Edit-dish" type="button"><button
                                    data-id="<?php echo $val['store_product_id']; ?>"
                                    data-isCustomizable="<?php echo $val['is_customizable']; ?>"
                                    class="btn btn-danger edit-btn mb-1"><span><i class="fa fa-edit"></i> EDIT
                                        DISH</span></button></a>
                            <?php } ?>

                            <?php 
                                            $stock = $this->Ordermodel->getCurrentStock($val['store_product_id'], $date, $this->session->userdata('logged_in_store_id'));
                                            if ($stock > 0) { ?>
                            <select width="50%" name="change_status" id="change_status" class="form-select mt-2"
                                onchange="changeProductStatus(this.value,<?php echo $val['store_product_id']; ?>)">
                                <option value="0" <?php echo ($val['is_active'] == 0) ? 'selected' : ''; ?>>Available
                                </option>
                                <option value="1" <?php echo ($val['is_active'] == 1) ? 'selected' : ''; ?>>Unavailable
                                </option>
                            </select>
                            <?php } else {
                                            echo '<h5 class="text-danger mt-2">Unavailable</h5>';
                                        } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $count++; }} } ?>
    </div>
</div>




<!-- modal for Add Stock -->
<div class="modal fade" id="addstock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ADD STOCK</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- if response within jquery -->
                <div class="message d-none" role="alert"></div>
                <form action="" id="productstock" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="product_id" name="product_id" value="">
                    <input type="text" class="form-control mt-2" placeholder="Enter your Quanity" name="pu_qty"
                        id="stocks" value="">
                    <span class="error errormsg mt-2" id="addstocks_error"></span>
                </form>
                <div class="mt-2 text-center m-auto">
                    <button class="btn btn-primary " type="button" id="addstock">ADD</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal for Add Stock -->

<!-- Modal for remove stock -->
<div class="modal fade" id="removestock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">REMOVE STOCK</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- if response within jquery -->
                <div class="message d-none" role="alert"></div>
                <!-- if response within jquery -->
                <form action="" id="removesstock" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="product_id_remove" name="product_id_remove" value="">
                    <input type="text" class="form-control mt-2" placeholder="Enter your Quanity" name="sl_qty"
                        id="remove_stocks" value="">
                    <span class="error errormsg mt-2" id="removestocks_error"></span>
                </form>
                <!-- <h1>addons</h1> -->
                <div class="mt-2 text-center m-auto">
                    <button class="btn btn-primary " type="button" id="removestock">REMOVE</button>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- Modal for remove stock -->




<!-- Change Dish Informations -->

<!-- Change Description -->
<div class="modal fade" id="Edit-dish" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">PRODUCT DETAILS</h1>
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
                        <div class="col-2">
                            <a class="productDetails btn bg-bg-success text-white w-100">PRODUCT</a>
                        </div>
                        <div class="col-2 isCustomize">
                            <a class="addVariant btn bg-bg-success text-white w-100">VARIANTS</a>
                        </div>
                        <div class="col-2 isCustomize">
                            <a class="addAddons btn bg-bg-info text-white w-100">ADDONS</a>
                        </div>
                        <div class="col-2 isCustomize">
                            <a class="addRecipe btn bg-bg-primary text-white w-100">RECIPE</a>
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

                        <label class="col-sm-3 col-form-label product_rate_label">Rate</label>
                        <input type="text" class="form-control product_rate" id="store_product_rate"
                            name="store_product_rate" value="">


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
                </div>
                <div class="mt-2 text-center m-auto">
                    <button class="btn btn-primary " type="button" id="saveProduct">Save</button>
                </div>



                </form>

            </div>
        </div>
    </div>
</div>
<!-- end -->



<div class="modal fade" id="nextavailabletime" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">NEXT AVAILABLE TIME</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- if response within jquery -->
                <div class="message d-none" role="alert"></div>
                <!-- if response within jquery -->
                <form id="avialablestimes" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="product_id_time" value="">
                    <div class="col-12">
                        <label class="form-label" for="default-input">Available Time</label>
                        <!-- <input type="text" class="form-control" name="name" id="time" value=""> -->
                        <div class="time-container d-flex ">
                            <!-- Hour Input -->
                            <input type="number" class="form-control mx-1" id="hours" min="1" max="12" value="12">
                            <input type="number" class="form-control mx-1" id="minutes" min="0" max="59" value="00">
                            <!-- AM/PM Dropdown -->
                            <select class="form-select" id="ampm">
                                <option value="AM">AM</option>
                                <option value="PM">PM</option>
                            </select>
                        </div>
                    </div>
                    <!-- <input type="text" class="form-control mt-2" placeholder="Enter your Quanity" name="sl_qty"
                        id="remove_stocks" value=""> -->
                    <span class="error errormsg mt-2" id="removestocks_error"></span>
                </form>
                <!-- <h1>addons</h1> -->
                <div class="mt-2 text-center m-auto">
                    <button class="btn btn-primary " type="button" id="nextavaialabletimes">UPDATE</button>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>





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

    $(document).on('click', '.open-modal', function() {
        var id = $(this).attr('data-id');
        $('#product_id').val(id);
        $('#addstock').click(function() {
            var id = $(this).attr('data-id');
            $('#addstocks').val(id);
            let formData = new FormData($('#productstock')[
                0]);
            $.ajax({
                url: '<?= base_url("owner/Product/addstocks") ?>',
                type: 'POST',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        $('#stocks').val('');
                        $('#addstock').modal('hide');
                        $('#addstocks_error').html('');
                        location.reload();
                    } else if (response.errors.pu_qty) {
                        $('#addstocks_error').html(response.errors.pu_qty);
                    }
                },

            });
        })
    })

    $(document).on('click', '.remove-modal', function() {
        var id = $(this).attr('data-id');
        $('#product_id_remove').val(id);
        $('#removestock').click(function() {
            let formData = new FormData($('#removesstock')[
                0]);
            $.ajax({
                url: '<?= base_url("owner/Product/removestocks") ?>',
                type: 'POST',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response); // Log response for debugging
                    if (response.success) {
                        $('#remove_stocks').val('');
                        $('#removestock').modal('hide');
                        $('#removestocks_error').html('');
                        location.reload();
                    } else if (response.errors.sl_qty) {
                        $('#removestocks_error').html(response.errors
                            .sl_qty);
                    } else {
                        $('#remove_stocks').val('');
                        $('#removestock').modal('hide');
                        $('#removestocks_error').html('');
                    }
                },
            })
        })
    })


    $('.editProduct').click(function() {
        var product_id = $('#hiddenField').val();
        document.getElementById('iframe_body').src =
            '<?php echo base_url('owner/product/load_variants/'); ?>' + product_id;
    });

    $('.addVariant').click(function() {
        $("#iframe_body").show();
        $("#productForm").hide();
        var product_id = $('#hiddenField').val();
        document.getElementById('iframe_body').src =
            '<?php echo base_url('owner/product/load_variants/'); ?>' + product_id;
    });

    $('.addAddons').click(function() {
        $("#iframe_body").show();
        $("#productForm").hide();
        var product_id = $('#hiddenField').val();
        document.getElementById('iframe_body').src =
            '<?php echo base_url('owner/product/load_addons/'); ?>' + product_id;
    });

    $('.addRecipe').click(function() {
        $("#iframe_body").show();
        $("#productForm").hide();
        var product_id = $('#hiddenField').val();
        document.getElementById('iframe_body').src =
            '<?php echo base_url('owner/product/load_recipes/'); ?>' + product_id;
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
        if (isCustomizable == 1) {
            $(".product_rate").addClass("d-none");
            $(".product_rate_label").addClass("d-none");
        } else {
            $(".product_rate").removeClass("d-none");
            $(".product_rate_label").removeClass("d-none");
            $(".isCustomize").addClass("d-none");

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
                    const customMessage =
                        "Your product has been Updated successfully!";
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

    $(document).on('click', '.nextavialable-modal', function() {
        var id = $(this).attr('data-id');
        $('#product_id_time').val(id)
    })
    $('#nextavaialabletimes').click(function() {
        var hours = $('#hours').val();
        var minutes = $('#minutes').val();
        var ampm = $('#ampm').val();
        var time = hours + ":" + minutes + " " + ampm;
        alert(time);
        let formData = new FormData($('#avialablestimes')[
            0]);
        formData.append('product_id', $('#product_id_time').val());
        formData.append('time', time);
        $.ajax({
            url: '<?= base_url("owner/Product/avialabletime") ?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response); // Log response for debugging
                if (response.success) {
                    location.reload();
                }
            },
        })
    });



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