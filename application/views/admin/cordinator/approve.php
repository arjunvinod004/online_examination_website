<!-- header section -->
<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Approval</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard"><i data-feather="home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Approval</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid project-create">
            <div class="row">
              <div class="col-sm-3">
                <div class="card">
                  <div class="card-body">
                    <div class="form theme-form">
                    <div id="approve_form">
                      <div class="row">
                      
                        <div class="col-sm-12">
                          <div class="mb-3">
                            <label>Client</label>
                            <select class="form-select" id="sel_client_id" name="client_id">
                            <option value="">Select</option>

                                <?php
                                foreach($clients as $client)
                                {
                                ?>
                              <option value="<?=$client['id'];?>" <?php echo set_select('client_id', $client_id)?>><?=$client['name'];?></option>
                              <?php
                                }
                                ?>
                            </select>
                            <?php if(form_error('client_id')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('client_id'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="mb-3">
                            <label>Project</label>
                            <select id="sel_Project" class="form-select" name="project_id">
                              
                            </select>
                            <?php if(form_error('project_id')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('project_id'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="mb-3">
                            <label>Location</label>
                            <select id="sel_Project_loc" class="form-select" name="client_job_location_id">
                              
                            </select>
                            <?php if(form_error('client_job_location_id')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('client_job_location_id'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                     <!-- <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Date</label>
                            <input class="datepicker-here form-control" type="text" data-language="en" name="date_assign" value="<?php echo set_value('date_assign');?>">
                          </div>
                        </div>
                         -->
                        <div class="col-sm-12">
                          <div class="mb-3">
                          <label>Approval</label>
                            <select class="form-select" id="approve_item" name="approve_item">
                            <option value="">Select</option>
                              <option value="pro">projector</option>
                              <option value="veh">Vehicle</option>
                              <option value="tech">Technicians</option>
                            </select>
                          </div>
                          </div>
                        
                        <div class="col-sm-12">
                          <div class="mb-3">
                            <label>Item</label>
                            <select id="selected_items" class="form-select" name="selected_items">
                              
                            </select>
                          </div>
                        </div>
                        <input type="hidden" id="selected_date" value="">
                        <div id="response">
                        
                      



                    </div>
                              </div>
                        


                    
                  
                    <button class="btn btn-primary mt-4 pull-right" id="approve_btn" data-bs-original-title="" >Approve</button>

                      </div>
                      
                    

                        

                      </div>
                            


                    </div>
                    
                  </div>
                              </div>


                <div class="col-sm-9">
                    <div class="card">
                        <div class="card-body">
                        <div class="table-responsive theme-scrollbar">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                        <th>No</th>
                           <th>Client</th>
                            <th>Project</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Item</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          //print_r($approved_items);
                       if(!empty($approved_items)){
                       $count = 1;
                       foreach($approved_items as $val){ 
                        if($val['approve_item'] == 'veh'){
                            $item = "Vehicle";
                        }if($val['approve_item'] == 'pro'){
                            $item = "Projector";
                        }
                        if($val['approve_item'] == 'tech'){
                            $item = "Technician";
                        }
                        ?>
                       
                       <tr>
                           
                           
                            <td><?php echo $count; ?></td>
                            <td><a href=""><?php echo $val['name'];?></a></td>
                            <td><?php echo $val['proj_name'];?></td>
                            <td><?php echo $val['job_location'];?></td>
                            <td><?php echo $item;?></td>
                            <td><?php echo $this->Cordinatormodel->getItemName($val['approve_item'],$val['seected_item_id']);?></td>
                            <td><?php echo "Approved"; ?></td>
                            <td> 
                              <ul class="action pull-right">
                              
                                <li class="delete">
                                       <a id="reject_btn" data-id="<?php echo $val['id'];?>" name="reject" class="btn" type="submit" data-bs-original-title="">Reject</a>
                                   
                                </li>
                              </ul>
                            </td>
                            
                          </tr>
                          
                       <?php $count++; }} ?>
                        </tbody>
                      </table>
                    </div>
                        </div>
                    </div>
                </div>
            </div>


                

              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->

          



                <!-- Container-fluid starts-->
                <div class="container-fluid project-create">
            <div class="row">
              <div class="col-sm-12">
               
                
              
                 
                            
               
                 
            </div>
          </div>
          <!-- Container-fluid Ends-->
                            </div>


                            </div>
<script src="<?php echo base_url();?>assets/js/deem/cordinator/approve.js"></script>
<script>
  $(document).ready(function(){
    $("#approve_btn").on('click', function(e) {
      //alert('click');
        base_url = $('#baseurl').val(); 
        if($('#sel_client_id').val() == ''){
          alert('Please select client');
          return false;
        }
        if($('#sel_Project').val() == ''){
          alert('Please select project');
          return false;
        }
        if($('#sel_Project_loc').val() == ''){
          alert('Please select project location');
          return false;
        }
        if($('#approve_item').val() == ''){
          alert('Please select approve');
          return false;
        }
        if($('#selected_items').val() == ''){
          alert('Please select item');
          return false;
        }else{
                $.ajax({
                    type: "POST",
                    url: base_url + 'cordinator/approve_save',
                        data: { 
                            'client_id' : $('#sel_client_id').val(),
                            'project_id' : $('#sel_Project').val(),
                            'client_job_location_id' : $('#sel_Project_loc').val(),
                            'approve_item' : $('#approve_item').val(),
                            'selected_items' : $('#selected_items').val()
                            
                        },
                        success: function(data){
                          $('#basic-1').html(data);
                          if($('#result').val() == 'exist'){
                              alert('Already approved');
                          }
                        }
                });
        }          
    });


    $(document).on("click", "#reject_btn", function(e) {
      var id = $(this).attr("data-id");
      $.ajax({
                    type: "POST",
                    url: base_url + 'cordinator/change_approve',
                        data: { 
                            'id' : id  
                        },
                        success: function(data){
                          $('#basic-1').html(data);
                          alert('Deleted');
                        }
                });
    });
    




  });
</script>