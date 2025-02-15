<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18 text-uppercase">REPORTS</h4>

                <div class="page-title-right">

                    <!-- <button id="reloadButton" class="btn btn-primary">Reload </button><button class="btn btn-primary" style="margin-left: 10px;" id="stopReload">Stop Reload</button> -->
                </div>




            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <!-- row -->

        <div class="col-md-4 mb-3">
            <a data-bs-toggle="modal" data-bs-target="#report" data-store-id="<?php echo $store_id; ?>"
                data-name="SALES" class="sales">
                <div class="card-body bg-b-orange" style="margin-bottom: 10px;">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <span
                                class="text-white mb-3 d-block text-uppercase text-truncate fw-semibold font-size-15">SALES</span>
                        </div>
                        <div class="col-3 icon">
                            <i class="fa fa-truck"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a data-bs-toggle="modal" data-bs-target="#report" data-store-id="<?php echo $store_id; ?>" data-name="USER"
                class="user">
                <div class="card-body bg-b-secondary" style="margin-bottom: 10px;">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <span
                                class="text-white mb-3 d-block text-uppercase text-truncate fw-semibold font-size-15">USER</span>
                        </div>
                        <div class="col-3 icon">
                            <i class="fa fa-user"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a data-bs-toggle="modal" data-bs-target="#report" data-store-id="<?php echo $store_id; ?>"
                data-name="DELIVERY" class="delivery">
                <div class="card-body bg-b-success" style="margin-bottom: 10px;">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <span
                                class="text-white mb-3 d-block text-uppercase text-truncate fw-semibold font-size-15">DELIVERY</span>
                        </div>
                        <div class="col-3 icon">
                            <i class="fa fa-truck"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>

    <!-- Modal for detailed view -->
    <div class="modal fade" id="report" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <span id="table_name"></span></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe id="table_iframe_report" height="750px" width="100%"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->

    <script>
    $(document).ready(function() {
        $('.sales').click(function() {
            $('#table_name').html('REPORT -' + $(this).attr('data-name'));
            document.getElementById('table_iframe_report').src =
                '<?php echo base_url('owner/order/salesReport/'); ?>' + $(this).attr('data-store-id');
        });

        $('.user').click(function() {
            $('#table_name').html('REPORT -' + $(this).attr('data-name'));
            document.getElementById('table_iframe_report').src =
                '<?php echo base_url('owner/order/userReport/'); ?>' + $(this).attr('data-store-id');
        });

        $('.delivery').click(function() {
            $('#table_name').html('REPORT -' + $(this).attr('data-name'));
            document.getElementById('table_iframe_report').src =
                '<?php echo base_url('owner/order/deliveryReport/'); ?>' + $(this).attr(
                'data-store-id');
        });
    });
    </script>