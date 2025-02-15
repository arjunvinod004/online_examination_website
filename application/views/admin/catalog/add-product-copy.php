<style>
.image-preview {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.image-container {
    position: relative;
}

.image-container img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border: 1px solid #ccc;
}

.edit-btn {
    position: absolute;
    top: 5px;
    right: 5px;
    background: #000;
    color: #fff;
    border: none;
    padding: 5px;
    cursor: pointer;
}

#imageEditor {
    display: none;
    /* position: fixed; */
    top: 50%;
    left: 30%;
    transform: translate(-50%, -50%);
    background: #fff;
    padding: 20px;
    border: 1px solid #ccc;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    z-index: 1111;
    width: 50%;
    margin: 0 auto;
}
</style>




<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">




        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Product</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dashboard">Home</a>
                                </li>
                                <i class="fa-solid fa-chevron-right "
                                    style="font-size: 9px;margin: 6px 5px 0px 5px;"></i>
                                <li class="breadcrumb-item active">Product</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->






            <div class="row">







                <form id="productForm" method="post" enctype="multipart/form-data">




                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">







                                <div class="form-group row mb-2">
                                    <label class="col-sm-2 col-form-label">Category </label>
                                    <div class="col-sm-3">
                                        <select class="form-select" name="category_id">
                                            <option value="">Select Category</option>
                                            <?php
                                foreach($categories as $category)
                                {
                                ?>
                                            <option value="<?=$category['category_id'];?>"
                                                <?php echo set_select('category_id', $category['category_id'])?>>
                                                <?=$category['category_name_en'];?></option>
                                            <?php
                                }
                                ?>
                                        </select>
                                        <span id="category_id_error"
                                            class="error errormsg mt-2"><?= form_error('category_id'); ?></span>

                                    </div>


                                    <!-- sub category -->

                                    <label class="col-sm-2 col-form-label">SubCategory </label>
                                    <div class="col-sm-3">
                                        <select class="form-select" name="subcategory_id">
                                            <option value="">Select Sub Category</option>


                                            <?php
                            foreach($subcategories as $category)
                            {
                            ?>
                                            <option value="<?=$category['subcategory_id'];?>"
                                                <?php echo set_select('subcategory_id', $category['subcategory_id'])?>>
                                                <?=$category['subcategory_name_en'];?></option>
                                            <?php
                            }
                            ?>
                                        </select>
                                        <span id="subcategory_id_error"
                                            class="error errormsg mt-2"><?= form_error('subcategory_id'); ?></span>
                                    </div>





                                    <!-- <label class="col-sm-1 col-form-label">Photo</label>
    <div class="col-sm-2">
    <input type="file" class="form-control-file" name="userfile">
              </div>

    
    
  </div> -->



                                    <div class="form-group row mt-2">

                                        <label class="col-sm-2 col-form-label">Veg/Non Veg</label>
                                        <div class="col-sm-3">
                                            <select class="form-select" name="product_veg_nonveg">
                                                <option value="">Select any</option>
                                                <option value="veg">Veg</option>
                                                <option value="non-veg">Non-Veg</option>
                                            </select>
                                            <span id="product_veg_nonveg_error"
                                                class="error errormsg mt-2"><?= form_error('product_veg_nonveg'); ?></span>
                                        </div>
                                        <div class="col-sm-2">
                                            <label class="col-sm-12 col-form-label">Is Customizable</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="hidden" name="iscustomizable_hidden" value="0"
                                                id="iscustomizable_hidden">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="checkbox_is_customizable">
                                        </div>
                                        <div class="col-sm-2">
                                            <label class="col-sm-12 col-form-label">Is Addon</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="hidden" name="isaddon_hidden" value="0" id="isaddon_hidden">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="checkbox_is_addon">
                                        </div>


                                    </div>



                                    <div class="form-group row mb-2">

                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-2">
                                            <label class="col-sm-12 col-form-label">Malayalam</label>
                                        </div>
                                        <div class="col-sm-2">
                                            <label class="col-sm-12 col-form-label">English</label>
                                        </div>
                                        <div class="col-sm-2">
                                            <label class="col-sm-12 col-form-label">Hindi</label>
                                        </div>
                                        <div class="col-sm-2">
                                            <label class="col-sm-12 col-form-label">Arabic</label>
                                        </div>


                                    </div>



                                    <div class="form-group row mb-2">

                                        <label class="col-sm-2 col-form-label">Product Name</label>
                                        <div class="col-sm-2">
                                            <input class="form-control" value="" type="text" placeholder="Malayalam"
                                                name="product_name_ma">
                                            <span id="product_name_ma_error"
                                                class="error errormsg mt-2"><?= form_error('product_name_ma'); ?></span>
                                        </div>
                                        <div class="col-sm-2">
                                            <input class="form-control" value="" type="text" placeholder="English"
                                                name="product_name_en">
                                            <span id="product_name_en_error"
                                                class="error errormsg mt-2"><?= form_error('product_name_en'); ?></span>
                                        </div>
                                        <div class="col-sm-3">
                                            <input class="form-control" value="" type="text" placeholder="Hindi"
                                                name="product_name_hi">
                                            <span id="product_name_hi_error"
                                                class="error errormsg mt-2"><?= form_error('product_name_hi'); ?></span>
                                        </div>
                                        <div class="col-sm-3">
                                            <input class="form-control" value="" type="text" placeholder="Arabic"
                                                name="product_name_ar">
                                            <span id="product_name_ar_error"
                                                class="error errormsg mt-2"><?= form_error('product_name_ar'); ?></span>
                                        </div>

                                    </div>



                                    <div class="form-group row mb-2">

                                        <label class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-2">
                                            <textarea name="product_desc_ma" class="form-control"
                                                id="exampleFormControlTextarea4" placeholder="Malayalam"
                                                rows=""></textarea>
                                        </div>
                                        <div class="col-sm-2">
                                            <textarea name="product_desc_en" class="form-control"
                                                id="exampleFormControlTextarea4" placeholder="English"
                                                rows=""></textarea>
                                        </div>
                                        <div class="col-sm-3">
                                            <textarea name="product_desc_hi" class="form-control"
                                                id="exampleFormControlTextarea4" placeholder="Hindi" rows=""></textarea>
                                        </div>
                                        <div class="col-sm-3">
                                            <textarea name="product_desc_ar" class="form-control"
                                                id="exampleFormControlTextarea4" placeholder="Arabic"
                                                rows=""></textarea>
                                        </div>



                                    </div>
















                                    <div class="form theme-form">




                                        <!-- row start -->
                                        <div class="row">






                                        </div>
                                        <!-- row end -->


                                    </div>




                                </div>
                            </div>
                        </div>











                    </div>
                    <div class="col-md-3">

                        <input type="file" class="form-control" name="images[]" id="imageInput" multiple
                            accept="image/*">
                        <button class="btn btn-primary mt-2" type="button" id="saveProduct">Save Product</button>
                    </div>
                </form>

                <div class="image-preview" id="imagePreview"></div>

                <div id="imageEditor">
                    <h2>Edit Image</h2>
                    <canvas id="editorCanvas"></canvas>
                    <button class="btn btn-primary" id="saveEdit">Save</button>
                    <button class="btn btn-danger" id="closeEditor">Cancel</button>
                </div>


            </div>
        </div>
    </div>











</div>
</div>

<!-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
fffffffffff
  </div> -->
</div>
<button class="btn btn-primary pull-right mb-4" type="submit" name="add">Save</button>

<p class="text-danger fw-bold">image size should be 20 kb</p>
</form>



</div>
<script src="https://qr-experts.com/assets/admin/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
<script>
document.addEventListener("DOMContentLoaded", () => {
    const imageInput = document.getElementById("imageInput");
    const imagePreview = document.getElementById("imagePreview");
    const imageEditor = document.getElementById("imageEditor");
    const editorCanvas = document.getElementById("editorCanvas");
    const saveEdit = document.getElementById("saveEdit");
    const closeEditor = document.getElementById("closeEditor");
    let cropper = null;
    let currentImage = null;

    // Handle image input
    imageInput.addEventListener("change", (e) => {
        const files = e.target.files;

        const currentImages = imagePreview.querySelectorAll(".image-container").length;

        // If the total exceeds 5, prevent further action
        if (currentImages + files.length > 5) {
            alert("You can only upload a maximum of 5 images.");
            return;
        }

        Array.from(files).forEach((file) => {
            const reader = new FileReader();
            reader.onload = (event) => {
                const container = document.createElement("div");
                container.classList.add("image-container");

                const img = document.createElement("img");
                img.src = event.target.result;

                const editBtn = document.createElement("button");
                editBtn.textContent = "Edit";
                editBtn.classList.add("edit-btn");
                editBtn.addEventListener("click", () => openEditor(img));

                container.appendChild(img);
                container.appendChild(editBtn);
                imagePreview.appendChild(container);
            };
            reader.readAsDataURL(file);
        });
    });

    // Open image editor
    function openEditor(img) {
        currentImage = img;
        const ctx = editorCanvas.getContext("2d");
        const image = new Image();
        image.src = img.src;
        image.onload = () => {
            editorCanvas.width = image.width / 2;
            editorCanvas.height = image.height / 2;
            ctx.drawImage(image, 0, 0, editorCanvas.width, editorCanvas.height);

            // Initialize Cropper.js
            cropper = new Cropper(editorCanvas, {
                aspectRatio: 1,
                viewMode: 1,
            });
        };

        imageEditor.style.display = "block";
        overlay.style.display = "block";
    }

    // Save edited image
    saveEdit.addEventListener("click", () => {
        if (cropper) {
            const canvas = cropper.getCroppedCanvas();
            currentImage.src = canvas.toDataURL();
            cropper.destroy();
            cropper = null;
            imageEditor.style.display = "none";
        }
    });

    // Close editor
    closeEditor.addEventListener("click", () => {
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
        imageEditor.style.display = "none";
    });
});
</script>
<script>
$(document).ready(function() {
    $('#saveProduct').click(function() {

        let formData = new FormData($('#productForm')[0]); // Capture the form data, including files

        $.ajax({
            url: '<?= base_url("admin/Product/save") ?>', // URL to the controller method
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false, // Prevent jQuery from processing the data
            contentType: false, // Prevent jQuery from setting the Content-Type header
            success: function(response) {
                console.log(response.success);

                if (response.errors) {
                    if (response.errors.category_id) {
                        $('#category_id_error').html(response.errors.category_id);
                    } else if (response.errors.subcategory_id) {
                        $('#subcategory_id_error').html(response.errors.subcategory_id);
                    } else if (response.errors.product_veg_nonveg) {
                        $('#product_veg_nonveg_error').html(response.errors
                            .product_veg_nonveg);
                    } else if (response.errors.product_name_ma) {
                        $('#product_name_ma_error').html(response.errors.product_name_ma);
                    } else if (response.errors.product_name_en) {
                        $('#product_name_en_error').html(response.errors.product_name_en);
                    } else if (response.errors.product_name_hi) {
                        $('#product_name_hi_error').html(response.errors.product_name_hi);
                    } else if (response.errors.product_name_ar) {
                        $('#product_name_ar_error').html(response.errors.product_name_ar);
                    }
                } else {
                    // alert('success');
                    window.location.href = '<?= base_url("admin/Product") ?>';
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
$(document).ready(function() {
    $('#checkbox_is_customizable').on('click', function() {
        if ($(this).is(':checked')) {
            $('#iscustomizable_hidden').val(1);
        } else {
            $('#iscustomizable_hidden').val(0);
        }
    });

    $('#checkbox_is_addon').on('click', function() {
        if ($(this).is(':checked')) {
            $('#isaddon_hidden').val(1);
        } else {
            $('#isaddon_hidden').val(0);
        }
    });
})
</script>
</body>

</html>