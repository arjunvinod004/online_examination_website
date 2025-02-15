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


    <input type="hidden" id="order_id" value="<?php echo $order_no;?>">

   
       

        <div class="container">
            <div class="row">
               

  <style>
    .invoice-container {
      max-width: 99%;
      background: #fff;
      border-radius: 8px;
      padding: 20px;
    }
    .header {
      text-align: center;
      border-bottom: 2px solid #eee;
      padding-bottom: 10px;
    }
    .header h1 {
      margin: 0;
      color: #333;
    }
    .header p {
      margin: 5px 0;
      color: #666;
    }
    .items {
      width: 100%;
      margin: 20px 0;
      border-collapse: collapse;
    }
    .items th, .items td {
      padding: 10px;
      text-align: left;
      border: 1px solid #ddd;
    }
    .items th {
      background: #f4f4f4;
      font-weight: bold;
    }
    .totals {
      margin-top: 20px;
    }
    .totals div {
      display: flex;
      justify-content: space-between;
      padding: 5px 0;
    }
    .totals div span {
      font-weight: bold;
    }
    @media print {
            button {
                display: none;
            }

            body {
                margin: 0;
                padding: 0;
            }

            table {
                page-break-inside: auto;
            }
        }
  </style>
</head>
<body>
  <div class="invoice-container">
    <div class="header">
        <p><strong>Order #:</strong> <?php echo $order_no;?></p>
        <p><strong>Date:</strong> <?= date('Y-m-d') ?></p>
      <h1><?php echo $storeDet[0]['store_name'] ?></h1>
      <p><?php echo $storeDet[0]['store_address'] ?></p>
      <p>Phone: <?php echo $storeDet[0]['store_phone'] ?> | Email: <?php echo $storeDet[0]['store_email'] ?></p>
    </div>
    <table class="items">
      <thead>
        <tr>
          <th>Sl</th>
          <th>Product</th>
          <th>Quantity</th>
          <th>Rate</th>
          <th>Amount</th>
          <th>Tax Amount</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($order_items as $index => $orders){ ?>
        <tr>
            <td><?php echo $index + 1 ?></td>
            <td><?php echo $this->Ordermodel->getProductName($orders['product_id']); ?></td>
            <td><?php echo $orders['quantity']; ?></td>
            <td><?php echo $orders['rate']; ?></td>
            <td><?php echo $orders['rate'] * $orders['quantity']; ?></td>
            <td><?php echo $orders['tax_amount']; ?></td>
            <td><?php echo $orders['total_amount']; ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <div class="totals">
      <div>
        <span>Subtotal:</span>
        <span><?php echo $order->amount; ?></span>
      </div>
      <div>
        <span>VAT (<?php echo $order->tax; ?>%):</span>
        <span><?php echo $order->tax_amount; ?></span>
      </div>
      <div>
        <span>Total:</span>
        <span><?php echo $order->total_amount; ?></span>
      </div>
    </div>
  </div>
  <div class="text-center">
      <p>Thank you for dining with us ! Visit us again soon!</p>
      <button class="btn btn-primary" onclick="window.print()">Print</button>
    </div>
</body>
</html>


            </div>
        </div>













        </div>
   










</div>

<script src="<?php echo base_url();?>assets/admin/js/modules/store.js"></script>

<!-- JAVASCRIPT -->
<script src="<?php echo base_url();?>assets/admin/js/metismenu.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/simplebar.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/waves.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/feather.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/app.js"></script>

