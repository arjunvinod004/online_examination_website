
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">

                


                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Edit Product</h4>
                
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
                                        <i class="fa-solid fa-chevron-right " style="font-size: 9px;margin: 6px 5px 0px 5px;"></i>
                                        <li class="breadcrumb-item active">Edit Product</li>
                                    </ol>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    
                   

                
                
                  <div class="row">
                        
                    
                  <form method="post" action="<?php echo base_url(); ?>owner/product/edit" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php  if(isset($productDet[0]['product_id'])){echo $productDet[0]['product_id'];}?>">
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <!-- <li class="nav-item" role="presentation">
      <button class="nav-link active" id="store-tab" data-bs-toggle="tab" data-bs-target="#store" type="button" role="tab" aria-controls="store" aria-selected="true">Store</button>
    </li> -->
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="store" role="tabpanel" aria-labelledby="store-tab">
      <div class="row">
        






     
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">






     
  <div class="form-group row mb-2">
    <label class="col-sm-2 col-form-label">Code</label>
    <div class="col-sm-3">
    <select class="form-select" name="category_id">
                                <option value="">Select Category</option>
    <?php
                                foreach($categories as $category)
                                {
                                ?>
                              <option value="<?=$category['category_id'];?>" <?php if(isset($productDet[0]['category_id']) && ($productDet[0]['category_id']==$category['category_id'])) echo 'selected';else echo set_select('category_id', $category['category_id'])?>><?=$category['category_name_en'];?></option>
                              <?php
                                }
                                ?>
    </select>
    <?php if(form_error('category_id')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('category_id'); ?></div>
      <?php } ?>
    </div>

    <label class="col-sm-1 col-form-label">Photo</label>
    <div class="col-sm-2">
    <input type="hidden" name="old_image" value="<?php if(isset($productDet[0]['image'])) echo $productDet[0]['image'];?>">
    <img width="100" height="100" src="<?php echo base_url(); ?>uploads/product/<?php if(isset($productDet[0]['image'])) echo $productDet[0]['image']; ?>" class="img-thumbnail">
    <input type="file" class="form-control-file" name="userfile">
    <?php if(form_error('userfile')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('userfile'); ?></div>
      <?php } ?>
      <?php if (isset($error)): ?>
        <div class="errormsg mt-2" role="alert"><?php echo $error; ?></div>
    <?php endif; ?>
    </div>

    <label class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-2">
    <input type="text" class="form-control" name="price" value="<?php if(set_value('price')){echo set_value('price');}else if(isset($productDet[0]['price'])){echo $productDet[0]['price'];}?>" placeholder="Order">
    <?php if(form_error('price')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('price'); ?></div>
      <?php } ?>
    </div>
    
  </div>




  <div class="form-group row mb-2">

    <label class="col-sm-2 col-form-label">Veg / Non Veg</label>
    <div class="col-sm-3">
    <select class="form-select" name="product_veg_nonveg">
                            <option value="">Select Type</option>
                            <option value="veg" <?php if(isset($productDet[0]['product_veg_nonveg']) && $productDet[0]['product_veg_nonveg']=='veg'){echo 'selected'; }else{ echo set_select('product_veg_nonveg', 'veg'); } ?>>Veg</option>
						<option value="non-veg" <?php if(isset($productDet[0]['product_veg_nonveg']) && $productDet[0]['product_veg_nonveg']=='non-veg'){echo 'selected'; }else{ echo set_select('product_veg_nonveg', 'non-veg'); }?>>Non-veg</option>
                            </select>
    </div>
    <div class="col-sm-2">
    <label class="col-sm-12 col-form-label">Is Customizable</label>
    </div>
    <div class="col-sm-2">
    <label class="col-sm-12 col-form-label">
    <input type="hidden" name="iscustomizable_hidden" value="<?php echo ($productDet[0]['is_customizable'] == 1) ? '1' : '0'; ?>" id="iscustomizable_hidden">
    <input class="form-check-input" type="checkbox" <?php echo ($productDet[0]['is_customizable'] == 1) ? 'checked' : ''; ?> id="checkbox_is_customizable"> 
</label>
    </div>
    <div class="col-sm-1">
    <label class="col-sm-12 col-form-label">Is Addon</label>
    </div>
    <div class="col-sm-2">
    <label class="col-sm-12 col-form-label">
    <input type="hidden" name="isaddon_hidden" value="<?php echo ($productDet[0]['is_addon'] == 1) ? '1' : '0'; ?>" id="isaddon_hidden">
    <input class="form-check-input" type="checkbox" <?php echo ($productDet[0]['is_addon'] == 1) ? 'checked' : ''; ?> id="checkbox_is_addon"> 
</label>
    </div>


  </div>



  <div class="form-group row mb-2">

    <label class="col-sm-2 col-form-label">Category Name</label>
    <div class="col-sm-2">
    <input class="form-control" value="<?php if(set_value('product_name_ma')){echo set_value('product_name_ma');}else if(isset($productDet[0]['product_name_ma'])){echo $productDet[0]['product_name_ma'];}?>" type="text" placeholder="Malayalam" name="product_name_ma">
    <?php if(form_error('product_name_ma')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('product_name_ma'); ?></div>
      <?php } ?>
    </div>
    <div class="col-sm-2">
    <input class="form-control" value="<?php if(set_value('product_name_en')){echo set_value('product_name_en');}else if(isset($productDet[0]['product_name_en'])){echo $productDet[0]['product_name_en'];}?>" type="text" placeholder="English" name="product_name_en">
    <?php if(form_error('product_name_en')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('product_name_en'); ?></div>
      <?php } ?>
    </div>
    <div class="col-sm-3">
    <input class="form-control" value="<?php if(set_value('product_name_hi')){echo set_value('product_name_hi');}else if(isset($productDet[0]['product_name_hi'])){echo $productDet[0]['product_name_hi'];}?>" type="text" placeholder="Hindi" name="product_name_hi">
    <?php if(form_error('product_name_hi')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('product_name_hi'); ?></div>
      <?php } ?>
    </div>
    <div class="col-sm-3">
    <input class="form-control" value="<?php if(set_value('product_name_ar')){echo set_value('product_name_ar');}else if(isset($productDet[0]['product_name_ar'])){echo $productDet[0]['product_name_ar'];}?>" type="text" placeholder="Arabic" name="product_name_ar">
    <?php if(form_error('product_name_ar')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('product_name_ar'); ?></div>
      <?php } ?>
    </div>

  </div>



  <div class="form-group row mb-2">

<label class="col-sm-2 col-form-label">Description</label>
<div class="col-sm-2">
<textarea name="product_desc_ma" class="form-control" id="exampleFormControlTextarea4" placeholder="Malayalam" rows=""><?php if(set_value('product_desc_ma')){echo set_value('product_desc_ma');}else if(isset($productDet[0]['product_desc_ma'])){echo $productDet[0]['product_desc_ma'];}?></textarea>
<?php if(form_error('product_desc_ma')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('product_desc_ma'); ?></div>
  <?php } ?>
</div>
<div class="col-sm-2">
<textarea name="product_desc_en" class="form-control" id="exampleFormControlTextarea4" placeholder="English" rows=""><?php if(set_value('product_desc_en')){echo set_value('product_desc_en');}else if(isset($productDet[0]['product_desc_en'])){echo $productDet[0]['product_desc_en'];}?></textarea>
<?php if(form_error('product_desc_en')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('product_desc_en'); ?></div>
  <?php } ?>
</div>
<div class="col-sm-3">
<textarea name="product_desc_hi" class="form-control" id="exampleFormControlTextarea4" placeholder="Hindi" rows=""><?php if(set_value('product_desc_hi')){echo set_value('product_desc_hi');}else if(isset($productDet[0]['product_desc_hi'])){echo $productDet[0]['product_desc_hi'];}?></textarea>
<?php if(form_error('product_desc_hi')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('product_desc_hi'); ?></div>
  <?php } ?>
</div>
<div class="col-sm-3">
<textarea name="product_desc_ar" class="form-control" id="exampleFormControlTextarea4" placeholder="Arabic" rows=""><?php if(set_value('product_desc_ar')){echo set_value('product_desc_ar');}else if(isset($productDet[0]['product_desc_ar'])){echo $productDet[0]['product_desc_ar'];}?></textarea>
<?php if(form_error('product_desc_ar')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('product_desc_ar'); ?></div>
  <?php } ?>
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
  </div>

  <!-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
fffffffffff
  </div> -->
</div>
<button class="btn btn-primary pull-right mb-4" type="submit" name="edit">Save</button>
</form>
                    


                  </div>

        
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








