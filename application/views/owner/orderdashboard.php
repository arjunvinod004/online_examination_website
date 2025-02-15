<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="container-fluid">
    <audio id="alert-audio" src="<?php echo base_url(); ?>uploads/siren-alert.mp3" preload="auto"></audio>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18 text-uppercase">Order Dashboard</h4>

                <div class="page-title-right">

                    <!-- <button id="reloadButton" class="btn btn-primary">Reload </button><button class="btn btn-primary" style="margin-left: 10px;" id="stopReload">Stop Reload</button> -->
                </div>




            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <!-- row -->
        <div class="d-flex justify-content-left mb-2">
            <span class="bg-success text-white p-2">Available</span>
            <span class="bg-info text-white p-2 ms-2">Booked</span>
            <span class="bg-danger text-white p-2 ms-2">Reserved</span>
        </div>

        <div class="col-md-8 row">
            <!-- col -->
            <?php //print_r($tables); ?>
            <?php foreach ($tables as $table) 
            {
                $orderCount = $this->Ordermodel->getPendingTableOrderCount($table['table_id']);           
                $bgClass = '';
                if ($table['is_reserved'] == 0 && $orderCount == 0) {
                    $bgClass = 'bg-success';
                }
                if ($table['is_reserved'] == 0 && $orderCount > 0) {
                    $bgClass = 'bg-info';
                }
                if ($table['is_reserved'] == 1 && $orderCount == 0) {
                    $bgClass = 'bg-danger';
                }
                if ($table['is_reserved'] == 1 && $orderCount > 0) {
                    $bgClass = 'bg-danger';
                }
                
            ?>

            <div class="col-xl-4 col-md-6 mb-2">
                <!-- card -->
                <div class="card-body <?php echo $bgClass; ?>">
                    <!-- card body -->
                    <div class="row align-items-center">
                        <div class="col-6">
                            <a data-bs-toggle="modal" data-id="<?php echo $table['table_id']; ?>"
                                data-name="<?php echo $table['table_name']; ?>" data-bs-target="#recipe"
                                class="w-100 tableOrderPending" type="button" title="Table Orders">
                                <span
                                    class="text-white mb-3 text-truncate text-uppercase fw-semibold font-size-18"><?php echo $table['table_name']; ?></span>
                                <p class="text-white font-size-18">Unpaid :
                                    <?php echo $orderCount; ?>
                                </p>
                                <p class="text-white font-size-18">Cooking :
                                    <?php echo  $Cooking = $this->Ordermodel->getPendingTableOrderCooking($table['table_id']);   ?>
                                </p>
                            </a>
                        </div>
                        <div class="col-6 icon">
                            <i class="fa fa-table mb-2"></i>
                            <a data-bs-toggle="modal" data-id="<?php echo $table['table_id']; ?>"
                                data-name="<?php echo $table['table_name']; ?>" data-bs-target="#recipe"
                                class="tableOrdercompleted w-100" type="button" title="Table Orders"><button
                                    class="btn btn-lg btn-light">Completed</button></a>
                            <label class="text-white">Is Reserved</label> <input type="checkbox"
                                class="cbIsReserved mt-2" data-id="<?php echo $table['table_id']; ?>"
                                <?php if ($table['is_reserved'] == 1) echo 'checked'; ?>>
                        </div>
                    </div>
                </div><!-- end card body -->

            </div><!-- end col -->
            <?php } ?>
        </div><!-- end col -->

        <div class="col-md-4">
            <!-- col -->
            <div class="row">
                <div class="col-xl-6 col-md-12">
                    <a data-id="PK" data-bs-toggle="modal" data-name="Pickup Orders" data-bs-target="#recipe"
                        class="orders">
                        <div class="card-body bg-b-orange" style="margin-bottom: 10px;">
                            <!-- card body -->
                            <div class="row align-items-center mb-2">
                                <div class="col-8">
                                    <span
                                        class="text-white mb-3 d-block text-uppercase text-truncate fw-semibold font-size-15">Pickup
                                        Orders</span>
                                    <p class="text-white font-size-18">Count :
                                        <?php echo $pending_pickup_count; ?></p>
                                    <p class="text-white font-size-18">Cooking :
                                        <?php echo $pending_pickup_cooking; ?></p>
                                    <p class="text-white font-size-18">Ready :
                                        <?php echo $pending_pickup_ready; ?></p>
                                </div>
                                <div class="col-4 icon">
                                    <i class="fa fa-people-carry"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-6 col-md-12">
                    <a data-id="PK" data-bs-toggle="modal" data-name="Completed Pickups" data-bs-target="#recipe"
                        class="completedOrders">
                        <div class="card-body bg-b-secondary" style="margin-bottom: 10px;">
                            <!-- card body -->
                            <div class="row align-items-center mb-2">
                                <div class="col-8">
                                    <span
                                        class="text-white mb-3 d-block text-uppercase text-truncate fw-semibold font-size-15">Completed
                                        Pickups</span>
                                    <p class="text-white font-size-20">Count : <?php echo $comp_pickup_count; ?>
                                    </p>
                                </div>
                                <div class="col-4 icon">
                                    <i class="fa fa-people-carry"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>


            <div class="row">
                <div class="col-xl-6 col-md-12">
                    <a data-bs-toggle="modal" data-name="Delivery Orders" data-bs-target="#recipe" data-id="DL"
                        class="orders">
                        <div class="card-body bg-b-orange" style="margin-bottom: 10px;">
                            <!-- card body -->
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <span
                                        class="text-white mb-3 d-block text-uppercase text-truncate fw-semibold font-size-15">Delivery
                                        Orders</span>
                                    <p class="text-white font-size-20"> Count :
                                        <?php echo $pending_delivery_count; ?></p>
                                    <p class="text-white font-size-20"> Cooking :
                                        <?php echo $pending_delivery_cooking; ?></p>
                                    <p class="text-white font-size-20"> Ready :
                                        <?php echo $pending_delivery_ready; ?></p>
                                </div>
                                <div class="col-3 icon">
                                    <i class="fa fa-truck"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-6 col-md-12">
                    <a data-bs-toggle="modal" data-name="Completed Deliveries" data-bs-target="#recipe" data-id="DL"
                        class="completedOrders">
                        <div class="card-body bg-b-secondary" style="margin-bottom: 10px;">
                            <!-- card body -->
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <span
                                        class="text-white mb-3 d-block text-uppercase text-truncate fw-semibold font-size-15">completed
                                        Deliveries</span>
                                    <p class="text-white font-size-18">Count :
                                        <?php echo $comp_delivery_count; ?></p>
                                </div>
                                <div class="col-3 icon">
                                    <i class="fa fa-truck"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-12">
                    <a data-bs-toggle="modal" data-name="Completed Deliveries" data-bs-target="#order" data-id="DL"
                        class="new_order">
                        <div class="card-body bg-b-secondary" style="margin-bottom: 10px;">
                            <!-- card body -->
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <span
                                        class="text-white mb-3 d-block text-uppercase text-truncate fw-semibold font-size-15">New
                                        Order</span>
                                </div>
                                <div class="col-3 icon">
                                    <i class="fa fa-truck"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


            </div>













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


    <!-- Modal for detailed view -->
    <div class="modal fade" id="order" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <span id="table_name">NEW ORDER</span></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe id="table_iframe_order" height="750px" width="100%"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->




    <script src="<?php echo base_url();?>assets/admin/js/modules/store.js"></script>
    <script>
    $(document).ready(function() {
        $('.tableOrdercompleted').click(function() {
            $('#table_name').html('Order Details -' + $(this).attr('data-name'));
            document.getElementById('table_iframe_recipe').src =
                '<?php echo base_url('owner/order/tableOrders/'); ?>' + $(this).attr('data-id');
        });

        $('.new_order').click(function() {
            $('#table_name').html('Order Details -' + $(this).attr('data-name'));
            document.getElementById('table_iframe_order').src =
                '<?php echo base_url('owner/order/newOrder/'); ?>' + $(this).attr('data-id');
        });

        $("#reloadButton").click(function() {
            location.reload();
        });

        //reloadInterval = setInterval(function() {
        //   location.reload();
        //}, 50000); // Reload ever

        // Stop auto-reload
        $("#stopReload").click(function() {
            clearInterval(reloadInterval);
            reloadInterval = null; // Reset the interval ID
        });

    });
    </script>

    <script>
    $(document).ready(function() {
        $('.tableOrderTakeaway').click(function() {
            $('#table_name').html('ORDER - ' + $(this).attr('data-name'));
            document.getElementById('table_iframe_recipe').src =
                '<?php echo base_url('owner/order/pickupOrderDetails/'); ?>' + $(this).attr('data-id');
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        $('.completedOrders').click(function() {
            $('#table_name').html($(this).attr('data-name'));
            document.getElementById('table_iframe_recipe').src =
                '<?php echo base_url('owner/order/completedOrdersPKDL/'); ?>' + $(this).attr('data-id');
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        $('.orders').click(function() {
            $('#table_name').html($(this).attr('data-name'));
            document.getElementById('table_iframe_recipe').src =
                '<?php echo base_url('owner/order/OrdersPKDL/'); ?>' + $(this).attr('data-id');
        });

        $('.tableOrderPending').click(function() {
            $('#table_name').html($(this).attr('data-name'));
            document.getElementById('table_iframe_recipe').src =
                '<?php echo base_url('owner/order/OrdersPendingPKDL/'); ?>' + $(this).attr('data-id');
        });

    });
    </script>
    <script>
    var myModal = new bootstrap.Modal(document.getElementById('order'), {
        backdrop: 'static',
        keyboard: false
    });
    </script>

    <script>
    $(document).ready(function() {
        $('.cbIsReserved').on('click', function() {
            const isChecked = $(this).is(':checked') ? 1 : 0; // Get the checked state
            const tableId = $(this).attr('data-id'); // Get the data-id attribute value
            $.ajax({
                url: '<?= base_url("owner/order/setTableReserved") ?>',
                type: 'POST',
                data: {
                    isReserved: isChecked,
                    tableId: tableId
                },
                dataType: 'json',
                success: function(response) {
                    location.reload();
                }
            });

        });
    });
    </script>

    <script>
    $(document).ready(function() {
        var intervalDuration = 5000; // Set interval in milliseconds (5 seconds)
        function playAlertAudio() {
            var audio = $('#alert-audio')[0]; // Get the audio element
            //alert(audio);
            audio.play();
        }
        setInterval(playAlertAudio, intervalDuration);
    });
    </script>