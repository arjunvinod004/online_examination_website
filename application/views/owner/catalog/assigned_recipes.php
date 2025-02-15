<input type="hidden" id="base_url" value="<?php echo base_url();?>">
<link href="<?php echo base_url();?>assets/admin/css/crm-responsive.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/admin/css/classic.min.css" rel="stylesheet" /> <!-- 'classic' theme -->
<link href="<?php echo base_url();?>assets/admin/fonts/css/all.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
    type="text/css" />
<link href="<?php echo base_url();?>assets/admin/css/icon.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>assets/admin/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/bootstrap.bundle.min.js"></script>












<div class="row">


    <!-- if response within jquery -->
    <div class="message d-none" role="alert"></div>
    <!-- if response within jquery -->


    <?php if($this->session->flashdata('success')){ ?>
    <div class="alert alert-success dark" role="alert">
        <?php echo $this->session->flashdata('success');$this->session->unset_userdata('success'); ?>
    </div><?php } ?>

    <?php if($this->session->flashdata('error')){ ?>
    <div class="alert alert-danger dark" role="alert">
        <?php echo $this->session->flashdata('error');$this->session->unset_userdata('error'); ?>
    </div><?php } ?>



    <div class="">
        <div class="table-responsive-sm">


            <input type="hidden" id="store_product_id" name="store_product_id" value="<?php echo $store_product_id; ?>">


            <div class="container">
                <div class="row align-items-center">
                    <!-- Dropdown column -->



                </div>
            </div>


            <table id="examplee" class="table table-striped mt-3" style="width:100%">
                <thead style="background: #e5e5e5;">
                    <tr>
                        <th>No</th>
                        <th>Select</th>
                        <th>Name</th>
                        <th>Is Active</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                       if(!empty($recipes)){
                       $count = 1;
                       foreach($recipes as $val){
                        $query = $this->db->query("SELECT * FROM store_recipe WHERE recipe_id = ".$val['id']." AND store_id = ".$this->session->userdata('logged_in_store_id')." AND store_product_id = ".$store_product_id."");
                        $recipeDet = $query->result_array();
                        ?>
                    <tr>
                        <td><?php echo $count;?></td>
                        <td>
                            <input type="checkbox" class="check-item" name="recipe_id" value="<?php echo $val['id']; ?>"
                                <?php echo in_array($val['id'], $already_assigned_recipes_ids) ? 'checked' : ''; ?>>
                        </td>
                        <td><?php echo $val['name_en'];?></td>
                        <td>
                            <select name="is_active" class="form-select" id="" style="width: 80%;">
                                <option value="1"
                                    <?php echo (isset($recipeDet[0]['is_active']) && $recipeDet[0]['is_active'] == 1) ? 'selected' : ''; ?>>
                                    Active</option>
                                <option value="0"
                                    <?php echo (isset($recipeDet[0]['is_active']) && $recipeDet[0]['is_active'] == 0) ? 'selected' : ''; ?>>
                                    Inactive</option>
                            </select>
                        </td>

                    </tr>
                    <?php $count++; }} ?>



                </tbody>
                <tfoot>
                    <tr>

                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
            <!-- Button column -->
            <div class="col-auto">
                <a class="btn btn-primary f-right mx-1" data-bs-toggle="modal" data-bs-target="#reciepe">ADD</a>
                <a class="btn btn-primary f-right mt-0" id="update_recipe" disabled>UPDATE</a>
            </div>




            <div class="modal fade " id="reciepe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Recipe</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="message d-none" role="alert"></div>
                            <div class="row">
                                <form id="addreciepe" method="post" enctype="multipart/form-data" style="">
                                    <label class="col-sm-3 col-form-label">Name (Malayalam)</label>
                                    <input type="text" class="form-control" id="reciepe_name_ma" name="reciepe_name_ma"
                                        value="">
                                    <label class="col-sm-3 col-form-label">Name (English)</label>
                                    <input type="text" class="form-control" id="reciepe_name_en" name="reciepe_name_en"
                                        value="">
                                    <label class="col-sm-3 col-form-label">Name (Hindi)</label>
                                    <input type="text" class="form-control" id="reciepe_name_hi" name="reciepe_name_hi"
                                        value="">
                                    <label class="col-sm-3 col-form-label">Name (Arabic)</label>
                                    <input type="text" class="form-control" id="reciepe_name_ar" name="reciepe_name_ar"
                                        value="">
                                </form>

                                <div class="mt-2 text-center m-auto">
                                    <button class="btn btn-primary " type="button" id="saveReciepe">Save</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>









        </div>
    </div>
</div>





<!--modal for delete confirmation-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo confirm; ?></h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="table_id" value="" />
                <input type="hidden" name="id" id="store_id_hidden_popup" value="" />
                <?php echo are_you_sure; ?>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">No</button>
                <button class="btn btn-secondary" id="yes_del_table" type="button" data-bs-dismiss="modal">Yes</button>
            </div>
        </div>
    </div>
</div>
<!--modal for delete confirmation-->





</div>

<script src="<?php echo base_url();?>assets/admin/js/modules/store.js"></script>

<!-- JAVASCRIPT -->
<script src="<?php echo base_url();?>assets/admin/js/metismenu.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/simplebar.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/waves.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/feather.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/app.js"></script>
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
</script>

<script>
$(document).ready(function() {
    new DataTable('#example');
});
</script>
<script>
$('#update_recipe').click(function() {
    const selectedProducts = [];

    $('#examplee tbody tr').each(function() {
        if ($(this).find('input[type="checkbox"]').is(':checked')) {
            const row = $(this);
            const productData = {
                store_product_id: $('#store_product_id').val(),
                recipe_id: row.find('input[type="checkbox"]').val(),
                is_active: parseFloat(row.find('select[name="is_active"]').val()) || 0,
            };
            selectedProducts.push(productData);
            console.log(selectedProducts);
        }
    });

    // Send selectedProducts to CodeIgniter controller via AJAX
    $.ajax({
        url: '<?= base_url("owner/product/update_selected_recipe"); ?>', // Controller method URL
        type: 'POST',
        data: {
            products: selectedProducts
        },
        dataType: 'json',
        success: function(response) {
            console.log(response);

            if (response.status === 'success') {
                $('.message').removeClass('d-none');
                $('.message').removeClass('alert alert-danger');
                $('.message').addClass('alert alert-success');
                $('.message').text('Product recipe updated successfully.');
                setTimeout(function() {
                    location.reload();
                }, 1000); // 3000 ms = 3 seconds
                // Reload the page if necessary
            } else {
                $('.message').removeClass('d-none');
                $('.message').addClass('alert alert-danger');
                $('.message').text('Please select at least one checkbox for update.');
            }
        },
        error: function() {
            $('.message').removeClass('d-none');
            $('.message').addClass('alert alert-danger');
            $('.message').text('Please select at least one checkbox for update.');
        }
    });
});
</script>
<script>
$('#saveReciepe').click(function() {
    let formData = new FormData($('#addreciepe')[
        0]);
    $.ajax({
        url: '<?= base_url("owner/product/saveReciepe") ?>',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'JSON',
        success: function(response) {
            $('#reciepe').modal('hide');
            location.reload();

        }
    })
})
</script>