
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">

                


                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Tax</h4>
                
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
                                        <i class="fa-solid fa-chevron-right " style="font-size: 9px;margin: 6px 5px 0px 5px;"></i>
                                        <li class="breadcrumb-item active">Tax</li>
                                    </ol>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    
                    
                    <?php 
                if(isset($taxDet[0]['tax_id'])) {
                    $path=base_url().'admin/tax/edit';
                    $button_text='Update';
                    $button_name='edit';
                }else{
                    $path= base_url().'admin/tax/add';
                    $button_text='Save';
                    $button_name='add';
                }?>
                
                    <form method="post" action="<?php echo $path; ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php  if(isset($taxDet[0]['tax_id'])){echo $taxDet[0]['tax_id'];}?>">
                    <div class="row bg-soft-light mb-3 border1 pt-2">

                       <div class="col-md-3">
                           <div class="mb-2 focus">
                               <label class="form-label" for="default-input">Country Name</label>
                               <select class="form-select" name="country_id">
                                <option value="">Select Country</option>
    <?php
                                foreach($countries as $country)
                                {
                                ?>
                              <option value="<?=$country['country_id'];?>" <?php if(isset($taxDet[0]['country_id']) && ($taxDet[0]['country_id']==$country['country_id'])) echo 'selected';else echo set_select('country_id', $country['country_id'])?>><?=$country['name'];?></option>
                              <?php
                                }
                                ?>
    </select>
                               <?php if(form_error('country_id')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('country_id'); ?></div>
      <?php } ?>
                           </div>
                       </div>

                       <div class="col-md-3">
                           <div class="mb-4">
                           <label class="form-label" for="default-input">Tax type</label>
                           <select class="form-select" name="tax_type">
                            <option value="">Select Type</option>
                            <option value="gst" <?php if(isset($taxDet[0]['tax_type']) && $taxDet[0]['tax_type']=='gst'){echo 'selected'; }else{ echo set_select('tax_type', 'gst'); } ?>>GST</option>
						<option value="vat" <?php if(isset($taxDet[0]['tax_type']) && $taxDet[0]['tax_type']=='vat'){echo 'selected'; }else{ echo set_select('tax_type', 'vat'); }?>>VAT</option>
                            </select>
                            <?php if(form_error('tax_type')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('tax_type'); ?></div>
      <?php } ?>
                           </div>
                       </div>

                       <div class="col-md-3">
                           <div class="mb-4">
                           <label class="form-label" for="default-input">Amount(%)</label>
                           <input class="form-control" value="<?php if(set_value('tax_rate')){echo set_value('tax_rate');}else if(isset($taxDet[0]['tax_rate'])){echo $taxDet[0]['tax_rate'];}?>" type="text" name="tax_rate">
                           <?php if(form_error('tax_rate')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('tax_rate'); ?></div>
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



                            <table id="example" class="table table-striped" style="width:100%">
        <thead style="background: #e5e5e5;">
            <tr>
            <th>No</th>
            <th>Name</th>
            <th>Type</th>
            <th>Rate</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody>

        <?php
                       if(!empty($taxes)){
                       $count = 1;
                       foreach($taxes as $val){ ?>
            <tr>
                <td><?php echo $count;?></td>
                <td><?php echo $val['name'];?></td>
                <td><?php if($val['tax_type'] == 'gst'){ ?> <span class="badge-success">GST</span> <?php } else { ?> <span class="badge-danger">VAT</span> <?php }?></td>
                <td><?php echo $val['tax_rate'];?></td>
                <td class="pb-0 pt-0 d-flex">
                    <form class="m-0" action="<?php echo base_url();?>admin/tax/edit" method="post">
                                      <input type="hidden" name="id" value="<?php echo $val['tax_id']; ?>"> 
                                        <button class="btn tblEditBtn pl-0 pr-0" type="submit" data-bs-toggle="tooltip" data-id="<?php echo $val['tax_id']; ?>" data-bs-original-title="Edit Tax"><i class="fa fa-edit"></i></button>
                    </form>
                    
                    <a class="btn tblDelBtn pl-0 pr-0 del_tax" type="button" data-bs-toggle="modal" data-id="<?php echo $val['tax_id']; ?>" data-bs-original-title="Delete Tax" data-bs-target="#exampleModal"><i class="fa fa-trash"></i></a>
                    

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



<!-- Modal for detailed view -->
                    <div class="modal fade" id="emp_informations" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Employee Details</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <iframe src="emp-informations.html" style="width: 100%; height: 500px;"></iframe>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- end -->



                           <!--modal for delete confirmation-->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><?php echo confirm; ?></h5>
                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" id="tax_id" value=""/>
                                <?php echo are_you_sure; ?></div>
                            <div class="modal-footer">
                              <button class="btn btn-primary" type="button" data-bs-dismiss="modal">No</button>
                              <button class="btn btn-secondary" id="yes_del_tax" type="button" data-bs-dismiss="modal">Yes</button>
                            </div>
                          </div>
                        </div>
                      </div>
        <!--modal for delete confirmation-->





            </div>

            <script src="<?php echo base_url();?>assets/admin/js/modules/store.js"></script>