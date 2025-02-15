<!-- header section -->
		<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Dashboard</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard"><i data-feather="home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid dashboard-default">
            



<!-- row start -->
          <div class="row">
            
          
          <div class="col-md-6">
            <div class="card profile-greeting">               
                  <div class="card-body">
                    <div class="d-sm-flex d-block justify-content-between">
                      <div class="flex-grow-1"> 
                        <div class="weather d-flex">
                          <?php $time=strtotime(date("Y/m/d"));
 $month=date("F",$time);
 $year=date("Y",$time);
 $date=date("d",$time);  ?>
                          <h2 class="f-w-400"> <span><?php echo $month; ?> <?php echo $date; ?> <?php echo $year; ?><sup><i class="fa fa-circle-o f-10"></i></sup></span></h2>
                          <div class="span sun-bg"><i class="icofont icofont-sun font-primary"></i></div>
                        </div><span class="font-primary f-w-700"><?php echo date("l"); ?></span>
                        <!-- <p>Beautiful Sunny Day Walk</p> -->
                      </div>
                      <div class="badge-group">
                        <div class="badge badge-light-primary f-12">                         <i class="fa fa-clock-o"></i><span id="txt"></span></div>
                      </div>
                    </div>
                    <div class="greeting-user"> 
                      <div class="profile-vector1">
                        
                      </div>
                      <?php  $session_data=$this->session->all_userdata(); ?>
                      <h5><a href="<?php echo base_url();?>profile"><span>Welcome</span> <?php echo $this->Rolemodel->getUserName($session_data['loginid']); ?></span> (<span><?php echo $this->Rolemodel->getRoleName($session_data['roleid']); ?></span>)  </a><span class="right-circle"><i class="fa fa-check-circle font-primary f-14 middle"></i></span></h4>
                      <!-- <div><span class="badge badge-primary">Your 5</span><span class="font-primary f-12 middle f-w-500 ms-2"> Task Is Pending</span></div> -->
                    </div>
                  </div>
                </div>
            </div>


            <div class="col-md-3">
              
            <?php if($this->Rolemodel->check_permission(44,$this->session->userdata('roleid'),'can_view') == 1){ ?>  
            <a href="<?php echo base_url();?>staff">
              <div class="card total-revenue overflow-hidden" style="min-height: 200px;">
                  <div class="card-header">
                    <div class="d-flex justify-content-between">
                      <div class="flex-grow-1">
                        <p class="square-after f-w-600 header-text-primary">Total Staff<i class="fa fa-circle"></i></p>
                        <h4><?php if(isset($total_staff)){ echo $total_staff; } ?></h4>
                      </div>
                      
                    </div>
                  </div>
                </div>
                </a>
                <?php } ?>

            </div>
            <div class="col-md-3">

            <?php if($this->Rolemodel->check_permission(37,$this->session->userdata('roleid'),'can_view') == 1){ ?>
            <a href="<?php echo base_url();?>client">
            <div class="card total-revenue overflow-hidden" style="min-height: 200px;">
                  <div class="card-header">
                    <div class="d-flex justify-content-between">
                      <div class="flex-grow-1">
                        <p class="square-after f-w-600 header-text-primary">Total Clients<i class="fa fa-circle"></i></p>
                        <h4><?php if(isset($total_clients)){ echo $total_clients; } ?></h4>
                      </div>
                      
                    </div>
                  </div>
            </div>
            </a>
            <?php } ?>



          </div>
</div>
  <!-- row end -->
    <!-- row start -->
  <div class="row">
    <h6>Tasks</h6>

    <div class="col-md-2 d-none">
    
    <?php if($this->Rolemodel->check_permission(52,$this->session->userdata('roleid'),'can_view') == 1){ ?>
    <a href="<?php echo base_url(); ?>cordinator/tasks">
    <div class="card total-revenue overflow-hidden ">
                  <div class="card-header">
                    <div class="d-flex justify-content-between">
                      <div class="flex-grow-1">
                        <p class="square-after f-w-600 header-text-primary">Today's task<i class="fa fa-circle"></i></p>
                        <h4><?php if(isset($tasks)){ echo count($tasks); } ?></h4>
                      </div>
                      
                    </div>
                  </div>
    </div>
    </a>
    <?php } ?>


</div>
    <div class="col-md-2">
    <?php if($this->Rolemodel->check_permission(52,$this->session->userdata('roleid'),'can_view') == 1){ ?>
      <a href="<?php echo base_url(); ?>cordinator/tasks">
    <div class="card total-revenue overflow-hidden">
                  <div class="card-header">
                    <div class="d-flex justify-content-between">
                      <div class="flex-grow-1">
                        <p class="square-after f-w-600 header-text-primary">TOTAL TASKS<i class="fa fa-circle"></i></p>
                        <h4><?php if(isset($tasks)){ echo count($tasks); } ?></h4>
                      </div>
                      
                    </div>
                  </div>
    </div>
    </a>
    <?php } ?>
</div>


    <div class="col-md-3">
    <?php if($this->Rolemodel->check_permission(52,$this->session->userdata('roleid'),'can_view') == 1){ ?>
      <a href="<?php echo base_url(); ?>cordinator/pending">
    <div class="card total-revenue overflow-hidden">
                  <div class="card-header">
                    <div class="d-flex justify-content-between">
                      <div class="flex-grow-1">
                        <p class="square-after f-w-600 header-text-primary">PENDING(NOT APPROVED)<i class="fa fa-circle"></i></p>
                        <h4><?php if(isset($pending)){ echo count($pending); } ?></h4>
                      </div>
                      
                    </div>
                  </div>
    </div>
    </a>
    <?php } ?>
  </div>


  <div class="col-md-3">
    <?php if($this->Rolemodel->check_permission(52,$this->session->userdata('roleid'),'can_view') == 1){ ?>
      <a href="<?php echo base_url(); ?>cordinator/approved">
    <div class="card total-revenue overflow-hidden">
                  <div class="card-header">
                    <div class="d-flex justify-content-between">
                      <div class="flex-grow-1">
                        <p class="square-after f-w-600 header-text-primary">IN PROGRESS(APPROVED)<i class="fa fa-circle"></i></p>
                        <h4><?php if(isset($in_progress)){ echo count($in_progress); } ?></h4>
                      </div>
                      
                    </div>
                  </div>
    </div>
    </a>
    <?php } ?>
  </div>



</div>
    </div>

  </div>
    <!-- row end -->



  
  
  

                


                
                  
               
  
  
 






         
          </div>
          <!-- Container-fluid Ends-->
        </div>
        
        <!-- footer section -->