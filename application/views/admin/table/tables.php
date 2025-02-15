<input type="hidden" id="base_url" value="<?php echo base_url();?>">
<link href="<?php echo base_url();?>assets/admin/css/crm-responsive.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/css/classic.min.css" rel="stylesheet"  /> <!-- 'classic' theme -->
    <link href="<?php echo base_url();?>assets/admin/fonts/css/all.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/css/icon.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url();?>assets/admin/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/bootstrap.bundle.min.js"></script>

       
       
       

                    
                    <?php 
                if(isset($taxDet[0]['table_id'])) {
                    $path=base_url().'admin/tax/edit';
                    $button_text='Update';
                    $button_name='edit';
                }else{
                    $path= base_url().'admin/table/add';
                    $button_text='Change Package';
                    $button_name='add';
                }?>
                
                    <form method="post" action="<?php echo $path; ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php  if(isset($taxDet[0]['table_id'])){echo $taxDet[0]['table_id'];}?>">
                    <input type="hidden" name="current_store_id_hidden" value="<?php echo $store_id; ?>">
                    <div class="row bg-soft-light mb-3 border1 pt-2">

                    <div class="col-md-3">
                           <div class="mb-4">
                           <label class="form-label" for="default-input">Select Package</label>
                           <select class="form-select" name="package_name" id="country_id">
                                <option value="">Select Package</option>
    <?php
                                foreach($packages as $package)
                                {
                                ?>
                              <option value="<?=$package['package_id'];?>" <?php echo set_select('package_name', $package['package_id'])?>><?=$package['name'];?></option>
                              <?php
                                }
                                ?>
    </select>
                           <?php if(form_error('package_name')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('package_name'); ?></div>
      <?php } ?>
                           </div>
                       </div>


                       
                       <div class="col-md-3">
                           <div class="mb-4">
                               <label class="form-label" for="default-input">&nbsp;</label><br>
                               <button class="btn btn-success w-md" type="submit" name="<?php echo $button_name; ?>"><?php echo $button_text; ?></button>
                           </div>
                       </div>
                       
</form>
                   
                   <!-- Section 2 -->
   
               
               
                   
               
               
               </div>

                



                    <div class="row">





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



                            <table id="examplee" class="table table-striped" style="width:100%">
        <thead style="background: #e5e5e5;">
            <tr>
            <th>No</th>
            <th>Name</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody>

        <?php
                       if(!empty($tables)){
                       $count = 1;
                       foreach($tables as $val){ ?>
            <tr>
                <td><?php echo $count;?></td>
                <td><?php echo $val['table_name'];?></td>
                <td class="pb-0 pt-0 d-flex">
                    <!-- <form class="m-0" action="<?php echo base_url();?>admin/table/edit" method="post">
                                      <input type="hidden" name="id" value="<?php echo $val['table_id']; ?>"> 
                                        <button class="btn tblEditBtn pl-0 pr-0" type="submit" data-bs-toggle="tooltip" data-id="<?php echo $val['table_id']; ?>" data-bs-original-title="Edit Table"><i class="fa fa-edit"></i></button>
                    </form> -->
                    
                    <a class="btn tblDelBtn pl-0 pr-0 del_table" type="button" data-bs-toggle="modal" data-storeid="<?php echo $val['store_id']; ?>" data-id="<?php echo $val['table_id']; ?>" data-bs-original-title="Delete Table" data-bs-target="#exampleModal"><i class="fa fa-trash"></i></a>

                    <?php if($val['store_table_token'] == '0'){ ?>
                    <form class="m-0 d-flex" action="<?php echo base_url();?>admin/qrcodes/generateTableQRCode" method="post">
                        <input type="hidden" name="table_id_hidden" value="<?php echo $val['table_id']; ?>">
                        <input type="hidden" name="store_name_hidden" value="<?php echo $store_name; ?>">
                        <input type="hidden" name="store_id_hidden" value="<?php echo $val['store_id']; ?>">
                    <button type="submit" class="btn tblLogBtn pl-0 pr-0" type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Generate <?php echo $val['table_name']; ?> QR Code"><i class="fa-solid fa-upload"></i></button>
                    </form>
                    <?php }
                    else{ ?>
                        <a target="_blank" href="<?php echo $val['qr_code']; ?>" class="btn tblEditBtn pl-0 pr-0" type="button" data-bs-toggle="tooltip" data-id="<?php echo $val['table_id']; ?>" data-bs-original-title="Download <?php echo $val['table_name']; ?> QR Code"><i class="fa fa-download"></i></a>
                    <?php }
                    ?>
                    

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








                               
                               
                                
                            </div>
                        </div>
                    </div>





                           <!--modal for delete confirmation-->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><?php echo confirm; ?></h5>
                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" id="table_id" value=""/>
                                <input type="hidden" name="id" id="store_id_hidden_popup" value=""/>
                                <?php echo are_you_sure; ?></div>
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {   	
new DataTable('#example');
} );
</script>