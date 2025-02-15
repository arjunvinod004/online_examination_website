
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">

                


                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Order Dashboard</h4>
                
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
                                        <i class="fa-solid fa-chevron-right " style="font-size: 9px;margin: 6px 5px 0px 5px;"></i>
                                        <li class="breadcrumb-item active">Order Dashboard</li>
                                    </ol>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                
                <div class="row"> <!-- row -->
                    
                
                <div class="col-md-8 row"><!-- col -->
                    <h4 class="mb-sm-0 font-size-18 text-center mb-5">Tables</h4>
                    <?php foreach ($tables as $table) { ?>
                        
                        <div class="col-xl-6 col-md-6 mb-2"><!-- card -->
                        <a data-bs-toggle="modal" data-id="<?php echo $table['table_id']; ?>" data-name="<?php echo $table['table_name']; ?>" data-bs-target="#recipe" class="tableOrder w-100" type="button" title="Add Recipe"><div class="card-body bg-b-success"><!-- card body -->
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <span class="text-white mb-3 d-block text-truncate fw-semibold"><?php echo $table['table_name']; ?></span>
                                            <p class="text-white">Approved Order : 0</p> <p class="text-white">Unpaid Order : 0</p>
                                        </div>
                                        <div class="col-4 icon">
                                            <i class="fa fa-table"></i>
                                        </div> 
                                    </div>
                                </div></a><!-- end card body -->
                        </div><!-- end col -->
                        <?php } ?> 
                    </div><!-- end col -->

                    <div class="col-md-4 row"><!-- col -->



                    




                    <div class="d-flex justify-content-between align-items-center mt-3">
        <h4 class="mb-sm-0 font-size-18">Pickup</h4>
        <a data-id="PK" data-bs-toggle="modal" data-bs-target="#recipe" class="btn btn-secondary completedOrders">Completed Pickups</a>
    </div>
                    <table class="table">
    <thead>
        <tr>
            <th>Date</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Bill Amount</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if($pickupOrders){  
            foreach ($pickupOrders as $take) { ?>
        <tr>
        <td><?php echo $take['date']; ?></td>
        <td><?php echo $take['customer_name']; ?></td>
            <td><?php echo $take['contact_number']; ?></td>
            <td><?php echo $take['total_amount']; ?></td>
            <td>
            <a data-bs-toggle="modal" data-id="<?php echo $take['orderno']; ?>" data-name="<?php echo $take['customer_name']; ?>(<?php echo $take['contact_number']; ?>)" data-bs-target="#recipe" class="btn btn-primary w-100 tableOrderTakeaway" type="button" title="View Order Details">View Order</a>
            </td>
            
        </tr>
        <?php }} ?>
    </tbody>
</table>

                    </div><!-- end col -->

                    <div class="col-md-4 row"><!-- col -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
        <h4 class="mb-sm-0 font-size-18">Delivery</h4>
        <a data-bs-toggle="modal" data-bs-target="#recipe" data-id="DL" class="btn btn-secondary completedOrders">Completed Deliveries</a>
    </div>
                        <table class="table">
    <thead>
        <tr>
            <th>Date</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Bill Amount</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if($deliveryOrders){  
        foreach ($deliveryOrders as $take) { ?>
        <tr>
        <td><?php echo $take['date']; ?></td>
            <td><?php echo $take['customer_name']; ?></td>
            <td><?php echo $take['contact_number']; ?></td>
            <td><?php echo $take['total_amount']; ?></td>
            <td>
            <a data-bs-toggle="modal" data-id="<?php echo $take['orderno']; ?>" data-name="<?php echo $take['customer_name']; ?>(<?php echo $take['contact_number']; ?>)" data-bs-target="#recipe" class="btn btn-primary w-100 tableOrderTakeaway" type="button" title="View Order Details">View Order</a>
            </td>
        </tr>
        <?php }
        }
         ?>
    </tbody>
</table>
                    </div><!-- end col -->


                    </div><!-- end row -->




                   
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


                    
                
                </div>


            </div>

            <script src="<?php echo base_url();?>assets/admin/js/modules/store.js"></script>
            <script>
            $(document).ready(function() {
                    $('.tableOrder').click(function() {
                        $('#table_name').html('Order Details -' + $(this).attr('data-name'));
                        document.getElementById('table_iframe_recipe').src = '<?php echo base_url('owner/order/tableOrders/'); ?>' + $(this).attr('data-id');
                    });
                });
            </script>

            <script>
            $(document).ready(function() {
                    $('.tableOrderTakeaway').click(function() {
                        $('#table_name').html('ORDER - ' + $(this).attr('data-name'));
                document.getElementById('table_iframe_recipe').src = '<?php echo base_url('owner/order/pickupOrderDetails/'); ?>' + $(this).attr('data-id');
                    });
                });
            </script>

<script>
            $(document).ready(function() {
                    $('.completedOrders').click(function() {
                        $('#table_name').html($(this).attr('data-name'));
                document.getElementById('table_iframe_recipe').src = '<?php echo base_url('owner/order/completedOrdersPKDL/'); ?>' + $(this).attr('data-id');
                    });
                });
            </script>

