<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	
	public function __construct()
	{
		parent::__construct();
		require('Common.php');
		$this->load->model('admin/Productmodel');
		$this->load->model('admin/Storemodel');
		$this->load->model('owner/Ordermodel');
		$this->load->model('owner/Stockmodel');
		$this->load->model('website/Homemodel');
		if (!$this->session->userdata('login_status')) {
			redirect(login);
		}
	}
	public function index()
	{
		$controller = $this->router->fetch_class(); // Gets the current controller name
		$method = $this->router->fetch_method();   // Gets the current method name
		$data['controller'] = $controller;

        $logged_in_store_id = $this->session->userdata('logged_in_store_id');//echo $logged_in_store_id;exit;
        
        $store_details = $this->Homemodel->get_store_details_by_store_id($logged_in_store_id);
        $support_details = $this->Homemodel->get_support_details_by_country_id($store_details->store_country);
        $data['store_disp_name'] = $store_details->store_disp_name;
        $data['store_address'] = $store_details->store_address;
        $data['support_no'] = $support_details->support_no;
        $data['support_email'] = $support_details->support_email;
        
        $this->load->model('admin/Tablemodel');
        $data['tables']=$this->Tablemodel->getTablesByStoreId($logged_in_store_id); 
		$data['pending_delivery_cooking']=$this->Tablemodel->pending_delivery_cooking($logged_in_store_id);
        $data['pending_delivery_ready']=$this->Tablemodel->pending_delivery_ready($logged_in_store_id);
		$data['pending_pickup_cooking']=$this->Tablemodel->pending_pickup_cooking($logged_in_store_id); 
        $data['pending_pickup_ready']=$this->Tablemodel->pending_pickup_ready($logged_in_store_id);
		$data['comp_pickup_count']=$this->Tablemodel->comp_pickup_count($logged_in_store_id); 
		$data['comp_delivery_count']=$this->Tablemodel->comp_delivery_count($logged_in_store_id); 
		$data['pending_pickup_count']=$this->Tablemodel->pending_pickup_count($logged_in_store_id); 
		$data['pending_delivery_count']=$this->Tablemodel->pending_delivery_count($logged_in_store_id);
		$this->load->view('owner/includes/header',$data);
		$this->load->view('owner/orderdashboard',$data);
		$this->load->view('owner/includes/footer');
	}

	public function reports(){
		$controller = $this->router->fetch_class(); // Gets the current controller name
		$method = $this->router->fetch_method();   // Gets the current method name
		$data['controller'] = $controller;
		$data['store_id'] = $this->session->userdata('logged_in_store_id');
		
		$this->load->model('website/Homemodel');
		$store_details = $this->Homemodel->get_store_details_by_store_id($data['store_id']);
        $support_details = $this->Homemodel->get_support_details_by_country_id($store_details->store_country);
        $data['store_disp_name'] = $store_details->store_disp_name;
        $data['store_address'] = $store_details->store_address;
        $data['support_no'] = $support_details->support_no;
        $data['support_email'] = $support_details->support_email;
		
		$this->load->view('owner/includes/header',$data);
		$this->load->view('owner/order/reports');
		$this->load->view('owner/includes/footer');
	}

	public function salesReport($store_id){
		$data['store_id'] = $store_id;  //In this case type return table id
		$this->load->view('owner/order/sales_report',$data);
	}


	public function getSalesReportByStoreId() {
		$store_id = $this->input->post('store_id');	
		$date = $this->input->post('date');	
		$salesReports = $this->Ordermodel->getSalesReportByStoreId($store_id , $date);
		// Initialize the table structure
		$table = '';
		$table .= '<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
		$table .= '<thead>';
		$table .= '<tr>';
		$table .= '<th>Date</th>';
		$table .= '<th>Dine In</th>';
		$table .= '<th>Pickup</th>';
		$table .= '<th>Delivery</th>';
		$table .= '</tr>';
		$table .= '</thead>';	
		$table .= '<tbody>';

		// Assume $salesReports is an array containing multiple rows of sales report data
		if (!empty($salesReports)) {
			foreach ($salesReports as $salesReport) {
				$table .= '<tr>';
				$table .= '<td>' . htmlspecialchars($salesReport['sale_date']) . '</td>';
				$table .= '<td>' . htmlspecialchars($salesReport['dinein_count']) . ' (' . htmlspecialchars($salesReport['dinein_total_amount']) . ')</td>';
				$table .= '<td>' . htmlspecialchars($salesReport['pickup_count']) . ' (' . htmlspecialchars($salesReport['pickup_total_amount']) . ')</td>';
				$table .= '<td>' . htmlspecialchars($salesReport['delivery_count']) . ' (' . htmlspecialchars($salesReport['delivery_total_amount']) . ')</td>';
				$table .= '</tr>';
			}
		} else {
			// Handle the case where there's no data
			$table .= '<tr>';
			$table .= '<td colspan="4" class="text-center">No sales data available.</td>';
			$table .= '</tr>';
		}

		// Close the table structure
		$table .= '</tbody>';
		$table .= '</table>';

		// Echo the table
		echo $table;
	}
	
	public function userReport($store_id){
		$data['store_id'] = $store_id;  //In this case type return table id
		$this->load->view('owner/order/user_report',$data);
	}

	public function getUserReportByStoreId() {
		$store_id = $this->input->post('store_id');	
		$date = $this->input->post('date');	
		$userReports = $this->Ordermodel->getUserReportByStoreId($store_id , $date);
		
		$table = '';
		$table .= '<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
		$table .= '<thead>';
		$table .= '<tr>';
		$table .= '<th>Date</th>';
		$table .= '<th>User</th>';
		$table .= '<th>Login</th>';
		$table .= '<th>Logout</th>';
		$table .= '</tr>';
		$table .= '</thead>';	
		$table .= '<tbody>';

		// Assume $userReports is an array containing multiple rows of user report data
		if (!empty($userReports)) {
			foreach ($userReports as $userReport) {
				$table .= '<tr>';
				$table .= '<td>' . htmlspecialchars($userReport['date']) . '</td>';
				$table .= '<td>' . htmlspecialchars($userReport['Name']) . '</td>';
				$table .= '<td>' . htmlspecialchars($userReport['login_time']) . '</td>';
				$table .= '<td>' . (isset($userReport['logout_time']) && $userReport['logout_time'] ? htmlspecialchars($userReport['logout_time']) : 'Still logged in') . '</td>';

				$table .= '</tr>';
			}
		} else {
			// Handle the case where there's no data
			$table .= '<tr>';
			$table .= '<td colspan="4" class="text-center">No user login data available.</td>';
			$table .= '</tr>';
		}

		// Close the table structure
		$table .= '</tbody>';
		$table .= '</table>';

		// Echo the table
		echo $table;
	}

	public function deliveryReport($store_id){
		$data['store_id'] = $store_id;  //In this case type return table id
		$this->load->view('owner/order/delivery_report',$data);
	}
	public function getDeliveryReportByStoreId() {
		$store_id = $this->input->post('store_id');	
		$date = $this->input->post('date');	
		$deliveryReports = $this->Ordermodel->getDeliveryReportByStoreId($store_id , $date);
		// Initialize the table structure
		$table = '';
		$table .= '<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
		$table .= '<thead>';
		$table .= '<tr>';
		$table .= '<th>ORDER NO.</th>';
		$table .= '<th>Customer Name</th>';
		$table .= '<th>Customer MOB</th>';
		$table .= '<th>Location</th>';
		$table .= '<th>Payment Mode</th>';
		$table .= '<th>Total Amount</th>';
		$table .= '<th>Status</th>';
		$table .= '<th>Out For Delivery Time</th>';
		$table .= '<th>Delivered Time</th>';
		$table .= '<th>Delivery Boy</th>';
		$table .= '</tr>';
		$table .= '</thead>';	
		$table .= '<tbody>';

		// Assume $deliveryReports is an array containing multiple rows of sales report data
		if (!empty($deliveryReports)) {
			foreach ($deliveryReports as $salesReport) {
				$table .= '<tr>';
				$table .= '<td>' .$salesReport['orderno'] . '</td>';
				$table .= '<td>' .$salesReport['customer_name'] . '</td>';
				$table .= '<td>' .$salesReport['contact_number'] . '</td>';
				$table .= '<td>' .$salesReport['location'] . '</td>';
				$table .= '<td>' .$salesReport['payment_mode'] . '</td>';
				$table .= '<td>' .$salesReport['total_amount'] . '</td>';
				$table .= '<td>' .$salesReport['order_status'] . '</td>';
				$table .= '<td>' .$salesReport['out_for_delivery_time'] . '</td>';
				$table .= '<td>' .$salesReport['delivered_time'] . '</td>';
				$table .= '<td>' .$this->Ordermodel->getDeliveryBoyName($salesReport['delivery_boy']) . '</td>';
				$table .= '</tr>';
			}
		} else {
			// Handle the case where there's no data
			$table .= '<tr>';
			$table .= '<td colspan="4" class="text-center">No sales data available.</td>';
			$table .= '</tr>';
		}

		// Close the table structure
		$table .= '</tbody>';
		$table .= '</table>';

		// Echo the table
		echo $table;
	}

/*************  ✨ Codeium Command ⭐  *************/
/**
 * Loads the view for creating a new order with the order number
 * and a list of products assigned to the shop.
 *
 * The order number is generated by appending the current day,
 * month, and year to a base order number fetched from the
 * Productmodel.
 */

/******  1b850f36-69c8-4792-ba6b-1b055e8e8358  *******/
	public function newOrder(){
		$order_no = $this->Productmodel->getOrderNo(); //Generate order number
        $day = date("d");   
        $month = date("m"); 
        $year = date("y"); 
		$data['heading'] = "";  
		$order_no_with_date = $order_no.$day.$month.$year;
		$data['order_number'] = $order_no_with_date;
		$data['products']=$this->Productmodel->shopAssignedProducts();
		$this->load->view('owner/order/newOrder',$data);
	}

	public function newDiningOrder($order_number){  
		$store_id = $this->session->userdata('logged_in_store_id');
		$data['order_number'] = $order_number;
		$data['activeTables']=$this->Ordermodel->getActiveTablesByStoreId($store_id);
		$data['products']=$this->Productmodel->shopAssignedActiveProducts();
		$data['heading'] = "Dining"; 
		$data['orderType'] = "D"; 
		$this->load->view('owner/order/newDiningOrder',$data);
	}

	public function newDeliveryOrder($order_number){
		$data['heading'] = "Delivery"; 
		$data['order_number'] = $order_number;
		$data['orderType'] = "DL"; 
		$data['products']=$this->Productmodel->shopAssignedActiveProducts();
		$this->load->view('owner/order/newDeliveryOrder',$data);
	}

	public function newPickupOrder($order_number){
		$data['heading'] = "Pickup";
		$data['order_number'] = $order_number;
		$data['orderType'] = "PK"; 
		$data['products']=$this->Productmodel->shopAssignedActiveProducts();
		$this->load->view('owner/order/newPickupOrder',$data);
	}

	public function setTableReserved(){
		$isReserved = $this->input->post('isReserved');
		$tableId = $this->input->post('tableId');
		$this->Ordermodel->setTableReserved($tableId,$isReserved);
		echo json_encode(array('status' => 'success'));	
	}

	public function SaveConfirmOrder() {
		$orderno = $this->Ordermodel->updateOrderNo($this->input->post('order_id'));
		echo json_encode(array('status' => 'success','orderno' => $orderno ));	
	}
	public function deleteOrderItem() {
		$orderId = $this->input->post('orderId');
		if ($this->Ordermodel->deleteOrderItem($orderId)) {
			echo json_encode(['success' => true]);
		}
	}

	public function changeOrderStatus(){
		$orderId = $this->input->post('orderId');
		$status = $this->input->post('status');
		$this->Ordermodel->changeOrderStatus($orderId,$status);
		echo json_encode(['status' => $status,'orderId' => $orderId]);
	}

	public function changeDeliveryBoy(){
		$orderId = $this->input->post('orderId');
		$delivery_boy = $this->input->post('delivery_boy');
		$this->Ordermodel->changeDeliveryBoy($orderId,$delivery_boy);
		echo json_encode(['status' => $delivery_boy]);
	}



	// Save new Dining Order
	public function SaveNewDiningOrder() {
		$this->load->model('owner/Ordermodel');
		$order_id = $this->input->post('order_id');
		$store_id = $this->input->post('store_id');
		$product_id = $this->input->post('product_id');
		$tableId = $this->input->post('tableID');
		$qty = $this->input->post('qty');

		$date = date('Y-m-d');
		$productDetails = $this->Ordermodel->get_store_wise_product_by_id($product_id);
		$is_combo = $this->productIsCombo($product_id);
		if($is_combo)
		{
					$combo_items = $this->Ordermodel->getComboItems($store_id,$product_id);
					foreach ($combo_items as $item) 
					{
						$stock = $this->Ordermodel->getCurrentStock($item['item_id'], date('Y-m-d'), $store_id);
						if ($stock < ($qty * $item['quantity'])) {
							// echo json_encode(['status' => 'error', 'message' => 'Not enough stock for product: ' . $item['item_id']]);
							echo "<div class='alert alert-danger' role='alert'>". $qty .' '. $this->Ordermodel->getProductName($item['item_id']) . " Not available</div>";
							return;
						}          
					}
					$orderItems = [
						'orderno' => $order_id,
						'date' => date('Y-m-d'),
						'store_id' => $store_id,
						'product_id' => $product_id,
						'quantity' => $qty,
						'vat_id' => $productDetails[0]['vat_id'],
						'rate' => $this->input->post('rate'),
						'amount' => $qty * $this->input->post('rate'),
						'tax' => $this->input->post('tax'),
						'tax_amount' => $this->input->post('tax_amount'),
						'total_amount' => $this->input->post('total_amount'),
						'item_remarks' => $product['recipe'] ?? null,
						'variant_id' => $this->input->post('variant_id') ?? null,
						'category_id' => $productDetails[0]['category_id'], // optional timestamp
						'is_addon' => $productDetails[0]['is_addon'],
						'is_customisable' => $productDetails[0]['is_customizable'],
						'table_id' => $tableId,
						'order_type' => $this->input->post('orderType'),
						'is_paid' => 0,
						'is_reorder' => 0
					];
					
					$this->db->insert('order_items', $orderItems);

					$orderExists = $this->Ordermodel->isOrderExists($order_id);
					if($orderExists) 
					{
						//echo "here";exit;
						$updatedTotalAmt = $this->Ordermodel->updateTotalAmount($order_id);
								$order_data = [
									'amount' => $updatedTotalAmt[0]['total_rate'],
									'tax_amount' => $updatedTotalAmt[0]['total_tax'],
									'total_amount' => $updatedTotalAmt[0]['total_amount']
								];
									$this->db->where('orderno', $order_id);
									$this->db->update('order', $order_data);
					}
					else
					{
						$updateTotalAmountFromItems = $this->Ordermodel->updateTotalAmountFromItems($order_id);
						$order_data = [
							'orderno' => $order_id,
							'date' => date('Y-m-d'),
							'store_id' => $store_id,
							'amount' => $updateTotalAmountFromItems[0]['total_rate'],
							'tax' => $productDetails[0]['tax'],
							'tax_amount' => $updateTotalAmountFromItems[0]['total_tax'],
							'total_amount' => $updateTotalAmountFromItems[0]['total_amount'],
							'is_paid'   => 0,
							'table_id' => $tableId,
							'order_type' => $this->input->post('orderType'),
							'customer_name	' => '',
							'contact_number' => '',
							'location' => '',
							'modified_by'=>0,
							'modified_date'=> date('Y-m-d H:i:s')
						];
						$this->db->insert('order', $order_data);
					}	

		}
		else
		{
				$availableStock = $this->Ordermodel->getCurrentStock($product_id , $date , $store_id);
				if ($availableStock < $qty) {
					echo "<div class='alert alert-danger' role='alert'>". $qty .' '. $this->Ordermodel->getProductName($product_id) . " Not available</div>";
				}
				
				else
				{

						$orderItems = [
							'orderno' => $order_id,
							'date' => date('Y-m-d'),
							'store_id' => $store_id,
							'product_id' => $product_id,
							'quantity' => $qty,
							'vat_id' => $productDetails[0]['vat_id'],
							'rate' => $this->input->post('rate'),
							'amount' => $qty * $this->input->post('rate'),
							'tax' => $this->input->post('tax'),
							'tax_amount' => $this->input->post('tax_amount'),
							'total_amount' => $this->input->post('total_amount'),
							'item_remarks' => $product['recipe'] ?? null,
							'variant_id' => $this->input->post('variant_id') ?? null,
							'category_id' => $productDetails[0]['category_id'], // optional timestamp
							'is_addon' => $productDetails[0]['is_addon'],
							'is_customisable' => $productDetails[0]['is_customizable'],
							'table_id' => $tableId,
							'order_type' => $this->input->post('orderType'),
							'is_paid' => 0,
							'is_reorder' => 0
						];
						
						$this->db->insert('order_items', $orderItems);

						$orderExists = $this->Ordermodel->isOrderExists($order_id);
						if($orderExists) 
						{
							//echo "here";exit;
							$updatedTotalAmt = $this->Ordermodel->updateTotalAmount($order_id);
									$order_data = [
										'amount' => $updatedTotalAmt[0]['total_rate'],
										'tax_amount' => $updatedTotalAmt[0]['total_tax'],
										'total_amount' => $updatedTotalAmt[0]['total_amount']
									];
										$this->db->where('orderno', $order_id);
										$this->db->update('order', $order_data);
						}
						else
						{
							$updateTotalAmountFromItems = $this->Ordermodel->updateTotalAmountFromItems($order_id);
							$order_data = [
								'orderno' => $order_id,
								'date' => date('Y-m-d'),
								'store_id' => $store_id,
								'amount' => $updateTotalAmountFromItems[0]['total_rate'],
								'tax' => $productDetails[0]['tax'],
								'tax_amount' => $updateTotalAmountFromItems[0]['total_tax'],
								'total_amount' => $updateTotalAmountFromItems[0]['total_amount'],
								'is_paid'   => 0,
								'table_id' => $tableId,
								'order_type' => $this->input->post('orderType'),
								'customer_name	' => '',
								'contact_number' => '',
								'location' => '',
								'modified_by'=>0,
								'modified_date'=> date('Y-m-d H:i:s')
							];
							$this->db->insert('order', $order_data);
						}
			}
	}


		$orders = $this->Ordermodel->getOrderItems($order_id);
if (!empty($orders)) {
		$accordionHtml = '';
		$total_amount = 0;
		$accordionHtml = '<form method="post" action="' . base_url('owner/order/update') . '">
		<input type="hidden" name="store_id" value="' . $this->session->userdata('logged_in_store_id') . '">
		<input type="hidden" name="order_id" value="' . $order_id . '">
		<div class="table-responsive">  
		<table class="table">
            <thead>
                <tr>
                    <th width="5%">Sl</th>
                    <th width="25%">Product</th>
					<th width="10%">Quantity</th>
					<th width="10%">Rate</th>
					<th width="10%">Amount</th>
					<th width="5%">Vat(%)</th>
					<th width="10%">Vat-Amt</th>
					<th width="10%">Total-Amt</th>
					<th width="10%">Is Addon</th>
					<th width="20%">Recipe Details</th>
                </tr>
            </thead>
            <tbody>';
		foreach ($orders as $index => $order) {
			$accordionHtml .= '
                <tr id="order-row-' . $order['id'] . '">
                    <td>' . $index + 1 . '</td>
                    <td>' . $this->Ordermodel->getProductName($order['product_id']) . '</td>
					<td>
					<input type="hidden" readonly class="form-control" style="width: 100%;" name="orders[' . $index . '][tax]" value="' . $order['tax'] . '">
					<input type="hidden" readonly class="form-control" style="width: 100%;" name="orders[' . $index . '][id]" value="' . $order['id'] . '">
	<input type="hidden" readonly class="form-control" style="width: 100%;" name="orders[' . $index . '][product_id]" value="' . $order['product_id'] . '">
					<input type="text" class="quantity form-control" name="orders[' . $index . '][quantity]" style="width: 100%;" value="' . $order['quantity'] . '" />
					</td>
					<td><input type="text" readonly class="form-control" style="width: 100%;" name="orders[' . $index . '][rate]" value="' . $order['rate'] . '"></td>
					<td>' . $order['rate'] * $order['quantity'] . '</td>
					<td>' . $order['tax'] . '</td>
					<td>' . $order['tax_amount'] . '</td>
					<td>' . $order['total_amount'] . '</td>
					<td><input type="checkbox" class="form-check-input" disabled name="orders[' . $index . '][is_addon]" value="1" ' . ($order['is_addon'] == 1 ? 'checked' : '') . '></td>
                    <td>' . $order['item_remarks'] . '</td>
					<td><button type="button" class="btn btn-danger delete-order" data-id="' . $order['id'] . '">Delete</button></td>
                </tr>';
				$item_total = $order['quantity'] * $order['total_amount'];
        		$total_amount += $item_total;
		}
		$accordionHtml .= '</tbody>
		<tfoot class="table-light">
                <tr>
				<td colspan="6">
                        <div class="d-flex justify-content-left">
                            <label class="btn text-black bg-b-cyan" width="100px" style="margin-right: 10px;">Order No : '.$order['orderno'].'</label>
                        </div>
                    </td>
					<td colspan="6">
                        <div class="d-flex justify-content-end">
							<a class="btn btn-danger" id="saveConfirmOrder" style="margin-right: 10px;">SAVE ORDER</a>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table></form>
		</div>';

		
	
		echo $accordionHtml;
	}
	}








	// Save New Pickup Order
		public function SaveNewPickupOrder() {
			$this->load->model('owner/Ordermodel');
			$order_id = $this->input->post('order_id');
			$store_id = $this->input->post('store_id');
			$product_id = $this->input->post('product_id');
			$tableId = $this->input->post('tableID');
			$qty = $this->input->post('qty');

			$date = date('Y-m-d');
			$productDetails = $this->Ordermodel->get_store_wise_product_by_id($product_id);
			$is_combo = $this->productIsCombo($product_id);
			if($is_combo)
			{
						$combo_items = $this->Ordermodel->getComboItems($store_id,$product_id);
						foreach ($combo_items as $item) 
						{
							$stock = $this->Ordermodel->getCurrentStock($item['item_id'], date('Y-m-d'), $store_id);
							if ($stock < ($qty * $item['quantity'])) {
								// echo json_encode(['status' => 'error', 'message' => 'Not enough stock for product: ' . $item['item_id']]);
								echo "<div class='alert alert-danger' role='alert'>". $qty .' '. $this->Ordermodel->getProductName($item['item_id']) . " Not available</div>";
								return;
							}          
						}
						$orderItems = [
							'orderno' => $order_id,
							'date' => date('Y-m-d'),
							'store_id' => $store_id,
							'product_id' => $product_id,
							'quantity' => $qty,
							'vat_id' => $productDetails[0]['vat_id'],
							'rate' => $this->input->post('rate'),
							'amount' => $qty * $this->input->post('rate'),
							'tax' => $this->input->post('tax'),
							'tax_amount' => $this->input->post('tax_amount'),
							'total_amount' => $this->input->post('total_amount'),
							'item_remarks' => $product['recipe'] ?? null,
							'variant_id' => $this->input->post('variant_id') ?? null,
							'category_id' => $productDetails[0]['category_id'], // optional timestamp
							'is_addon' => $productDetails[0]['is_addon'],
							'is_customisable' => $productDetails[0]['is_customizable'],
							'table_id' => $tableId,
							'order_type' => $this->input->post('orderType'),
							'is_paid' => 0,
							'is_reorder' => 0
						];
						
						$this->db->insert('order_items', $orderItems);
				
						$orderExists = $this->Ordermodel->isOrderExists($order_id);
						if($orderExists) 
						{
							//echo "here";exit;
							$updatedTotalAmt = $this->Ordermodel->updateTotalAmount($order_id);
									$order_data = [
										'amount' => $updatedTotalAmt[0]['total_rate'],
										'tax_amount' => $updatedTotalAmt[0]['total_tax'],
										'total_amount' => $updatedTotalAmt[0]['total_amount']
									];
										$this->db->where('orderno', $order_id);
										$this->db->update('order', $order_data);
						}
						else
						{
							$updateTotalAmountFromItems = $this->Ordermodel->updateTotalAmountFromItems($order_id);
							$order_data = [
								'orderno' => $order_id,
								'date' => date('Y-m-d'),
								'store_id' => $store_id,
								'amount' => $updateTotalAmountFromItems[0]['total_rate'],
								'tax' => $productDetails[0]['tax'],
								'tax_amount' => $updateTotalAmountFromItems[0]['total_tax'],
								'total_amount' => $updateTotalAmountFromItems[0]['total_amount'],
								'is_paid'   => 0,
								'table_id' => $tableId,
								'order_type' => $this->input->post('orderType'),
								'customer_name	' => $this->input->post('name'),
								'contact_number' => $this->input->post('number'),
								'time' => $this->input->post('time'),
								'location' => '',
								'modified_by'=>0,
								'modified_date'=> date('Y-m-d H:i:s')
							];
							$this->db->insert('order', $order_data);
						}
			}
			else
			{
						$availableStock = $this->Ordermodel->getCurrentStock($product_id , $date , $store_id);
						if ($availableStock < $qty) {
							echo "<div class='alert alert-danger' role='alert'>". $qty .' '. $this->Ordermodel->getProductName($product_id) . " Not available</div>";
						}
						
						else
						{
						$orderItems = [
							'orderno' => $order_id,
							'date' => date('Y-m-d'),
							'store_id' => $store_id,
							'product_id' => $product_id,
							'quantity' => $qty,
							'vat_id' => $productDetails[0]['vat_id'],
							'rate' => $this->input->post('rate'),
							'amount' => $qty * $this->input->post('rate'),
							'tax' => $this->input->post('tax'),
							'tax_amount' => $this->input->post('tax_amount'),
							'total_amount' => $this->input->post('total_amount'),
							'item_remarks' => $product['recipe'] ?? null,
							'variant_id' => $this->input->post('variant_id') ?? null,
							'category_id' => $productDetails[0]['category_id'], // optional timestamp
							'is_addon' => $productDetails[0]['is_addon'],
							'is_customisable' => $productDetails[0]['is_customizable'],
							'table_id' => $tableId,
							'order_type' => $this->input->post('orderType'),
							'is_paid' => 0,
							'is_reorder' => 0
						];
						
						$this->db->insert('order_items', $orderItems);
				
						$orderExists = $this->Ordermodel->isOrderExists($order_id);
						if($orderExists) 
						{
							//echo "here";exit;
							$updatedTotalAmt = $this->Ordermodel->updateTotalAmount($order_id);
									$order_data = [
										'amount' => $updatedTotalAmt[0]['total_rate'],
										'tax_amount' => $updatedTotalAmt[0]['total_tax'],
										'total_amount' => $updatedTotalAmt[0]['total_amount']
									];
										$this->db->where('orderno', $order_id);
										$this->db->update('order', $order_data);
						}
						else
						{
							$updateTotalAmountFromItems = $this->Ordermodel->updateTotalAmountFromItems($order_id);
							$order_data = [
								'orderno' => $order_id,
								'date' => date('Y-m-d'),
								'store_id' => $store_id,
								'amount' => $updateTotalAmountFromItems[0]['total_rate'],
								'tax' => $productDetails[0]['tax'],
								'tax_amount' => $updateTotalAmountFromItems[0]['total_tax'],
								'total_amount' => $updateTotalAmountFromItems[0]['total_amount'],
								'is_paid'   => 0,
								'table_id' => $tableId,
								'order_type' => $this->input->post('orderType'),
								'customer_name	' => $this->input->post('name'),
								'contact_number' => $this->input->post('number'),
								'time' => $this->input->post('time'),
								'location' => '',
								'modified_by'=>0,
								'modified_date'=> date('Y-m-d H:i:s')
							];
							$this->db->insert('order', $order_data);
						}
					}
			}		
	
	
			$orders = $this->Ordermodel->getOrderItems($order_id);
	if(!empty($orders)) {
		
			$accordionHtml = '';
			$total_amount = 0;
			$accordionHtml = '<form method="post" action="' . base_url('owner/order/update') . '">
			<input type="hidden" name="store_id" value="' . $this->session->userdata('logged_in_store_id') . '">
			<input type="hidden" name="order_id" value="' . $order_id . '">
			<div class="table-responsive">  
			<table class="table">
				<thead>
					<tr>
						<th width="5%">Sl</th>
						<th width="25%">Product</th>
						<th width="10%">Quantity</th>
						<th width="10%">Rate</th>
						<th width="10%">Amount</th>
						<th width="5%">Vat(%)</th>
						<th width="10%">Vat-Amt</th>
						<th width="10%">Total-Amt</th>
						<th width="10%">Is Addon</th>
						<th width="20%">Recipe Details</th>
					</tr>
				</thead>
				<tbody>';
			foreach ($orders as $index => $order) {
				$accordionHtml .= '
					<tr id="order-row-' . $order['id'] . '">
						<td>' . $index + 1 . '</td>
						<td>' . $this->Ordermodel->getProductName($order['product_id']) . '</td>
						<td>
						<input type="hidden" readonly class="form-control" style="width: 100%;" name="orders[' . $index . '][tax]" value="' . $order['tax'] . '">
						<input type="hidden" readonly class="form-control" style="width: 100%;" name="orders[' . $index . '][id]" value="' . $order['id'] . '">
		<input type="hidden" readonly class="form-control" style="width: 100%;" name="orders[' . $index . '][product_id]" value="' . $order['product_id'] . '">
						<input type="text" class="quantity form-control" name="orders[' . $index . '][quantity]" style="width: 100%;" value="' . $order['quantity'] . '" />
						</td>
						<td><input type="text" readonly class="form-control" style="width: 100%;" name="orders[' . $index . '][rate]" value="' . $order['rate'] . '"></td>
						<td>' . $order['rate'] * $order['quantity'] . '</td>
						<td>' . $order['tax'] . '</td>
						<td>' . $order['tax_amount'] . '</td>
						<td>' . $order['total_amount'] . '</td>
						<td><input type="checkbox" class="form-check-input" disabled name="orders[' . $index . '][is_addon]" value="1" ' . ($order['is_addon'] == 1 ? 'checked' : '') . '></td>
						<td>' . $order['item_remarks'] . '</td>
						<td><button type="button" class="btn btn-danger delete-order" data-id="' . $order['id'] . '">Delete</button></td>
					</tr>';
					$item_total = $order['quantity'] * $order['total_amount'];
					$total_amount += $item_total;
			}
			$accordionHtml .= '</tbody>
			<tfoot class="table-light">
					<tr>
					<td colspan="6">
							<div class="d-flex justify-content-left">
								<label class="btn text-black bg-b-cyan" width="100px" style="margin-right: 10px;">Order No : '.$order['orderno'].'</label>
							</div>
						</td>
						<td colspan="6">
							<div class="d-flex justify-content-end">
								<a class="btn btn-danger" id="saveConfirmOrder" style="margin-right: 10px;">SAVE ORDER</a>
							</div>
						</td>
					</tr>
				</tfoot>
			</table></form>
			</div>';
		
			echo $accordionHtml;
		}
		}









		// Save New Delivery Order
	public function SaveNewDeliveryOrder() {
		$this->load->model('owner/Ordermodel');
		$order_id = $this->input->post('order_id');
		$store_id = $this->input->post('store_id');
		$product_id = $this->input->post('product_id');
		$tableId = $this->input->post('tableID');
		$qty = $this->input->post('qty');

		$date = date('Y-m-d');
		$productDetails = $this->Ordermodel->get_store_wise_product_by_id($product_id);
		$is_combo = $this->productIsCombo($product_id);
		if($is_combo)
		{
					$combo_items = $this->Ordermodel->getComboItems($store_id,$product_id);
					foreach ($combo_items as $item) 
					{
						$stock = $this->Ordermodel->getCurrentStock($item['item_id'], date('Y-m-d'), $store_id);
						if ($stock < ($qty * $item['quantity'])) {
							// echo json_encode(['status' => 'error', 'message' => 'Not enough stock for product: ' . $item['item_id']]);
							echo "<div class='alert alert-danger' role='alert'>". $qty .' '. $this->Ordermodel->getProductName($item['item_id']) . " Not available</div>";
							return;
						}          
					}
					$orderItems = [
						'orderno' => $order_id,
						'date' => date('Y-m-d'),
						'store_id' => $store_id,
						'product_id' => $product_id,
						'quantity' => $qty,
						'vat_id' => $productDetails[0]['vat_id'],
						'rate' => $this->input->post('rate'),
						'amount' => $qty * $this->input->post('rate'),
						'tax' => $this->input->post('tax'),
						'tax_amount' => $this->input->post('tax_amount'),
						'total_amount' => $this->input->post('total_amount'),
						'item_remarks' => $product['recipe'] ?? null,
						'variant_id' => $this->input->post('variant_id') ?? null,
						'category_id' => $productDetails[0]['category_id'], // optional timestamp
						'is_addon' => $productDetails[0]['is_addon'],
						'is_customisable' => $productDetails[0]['is_customizable'],
						'table_id' => $tableId,
						'order_type' => $this->input->post('orderType'),
						'is_paid' => 0,
						'is_reorder' => 0
					];
					
					$this->db->insert('order_items', $orderItems);

					$orderExists = $this->Ordermodel->isOrderExists($order_id);
					if($orderExists) 
					{
						//echo "here";exit;
						$updatedTotalAmt = $this->Ordermodel->updateTotalAmount($order_id);
								$order_data = [
									'amount' => $updatedTotalAmt[0]['total_rate'],
									'tax_amount' => $updatedTotalAmt[0]['total_tax'],
									'total_amount' => $updatedTotalAmt[0]['total_amount']
								];
									$this->db->where('orderno', $order_id);
									$this->db->update('order', $order_data);
					}
					else
					{
						$updateTotalAmountFromItems = $this->Ordermodel->updateTotalAmountFromItems($order_id);
						$order_data = [
							'orderno' => $order_id,
							'date' => date('Y-m-d'),
							'store_id' => $store_id,
							'amount' => $updateTotalAmountFromItems[0]['total_rate'],
							'tax' => $productDetails[0]['tax'],
							'tax_amount' => $updateTotalAmountFromItems[0]['total_tax'],
							'total_amount' => $updateTotalAmountFromItems[0]['total_amount'],
							'is_paid'   => 0,
							'table_id' => $tableId,
							'order_type' => $this->input->post('orderType'),
							'customer_name	' => $this->input->post('name'),
							'contact_number' => $this->input->post('number'),
							'location' => $this->input->post('address'),
							'time' => $this->input->post('time'),
							'payment_mode' => $this->input->post('paymentMode'),
							'modified_by'=>0,
							'modified_date'=> date('Y-m-d H:i:s')
						];
						$this->db->insert('order', $order_data);
					}
		}
		else
		{
					$availableStock = $this->Ordermodel->getCurrentStock($product_id , $date , $store_id);
					if ($availableStock < $qty) {
						echo "<div class='alert alert-danger' role='alert'>". $qty .' '. $this->Ordermodel->getProductName($product_id) . " Not available</div>";
					}
					else
					{
					$orderItems = [
						'orderno' => $order_id,
						'date' => date('Y-m-d'),
						'store_id' => $store_id,
						'product_id' => $product_id,
						'quantity' => $qty,
						'vat_id' => $productDetails[0]['vat_id'],
						'rate' => $this->input->post('rate'),
						'amount' => $qty * $this->input->post('rate'),
						'tax' => $this->input->post('tax'),
						'tax_amount' => $this->input->post('tax_amount'),
						'total_amount' => $this->input->post('total_amount'),
						'item_remarks' => $product['recipe'] ?? null,
						'variant_id' => $this->input->post('variant_id') ?? null,
						'category_id' => $productDetails[0]['category_id'], // optional timestamp
						'is_addon' => $productDetails[0]['is_addon'],
						'is_customisable' => $productDetails[0]['is_customizable'],
						'table_id' => $tableId,
						'order_type' => $this->input->post('orderType'),
						'is_paid' => 0,
						'is_reorder' => 0
					];
					
					$this->db->insert('order_items', $orderItems);

					$orderExists = $this->Ordermodel->isOrderExists($order_id);
					if($orderExists) 
					{
						//echo "here";exit;
						$updatedTotalAmt = $this->Ordermodel->updateTotalAmount($order_id);
								$order_data = [
									'amount' => $updatedTotalAmt[0]['total_rate'],
									'tax_amount' => $updatedTotalAmt[0]['total_tax'],
									'total_amount' => $updatedTotalAmt[0]['total_amount']
								];
									$this->db->where('orderno', $order_id);
									$this->db->update('order', $order_data);
					}
					else
					{
						$updateTotalAmountFromItems = $this->Ordermodel->updateTotalAmountFromItems($order_id);
						$order_data = [
							'orderno' => $order_id,
							'date' => date('Y-m-d'),
							'store_id' => $store_id,
							'amount' => $updateTotalAmountFromItems[0]['total_rate'],
							'tax' => $productDetails[0]['tax'],
							'tax_amount' => $updateTotalAmountFromItems[0]['total_tax'],
							'total_amount' => $updateTotalAmountFromItems[0]['total_amount'],
							'is_paid'   => 0,
							'table_id' => $tableId,
							'order_type' => $this->input->post('orderType'),
							'customer_name	' => $this->input->post('name'),
							'contact_number' => $this->input->post('number'),
							'location' => $this->input->post('address'),
							'time' => $this->input->post('time'),
							'payment_mode' => $this->input->post('paymentMode'),
							'modified_by'=>0,
							'modified_date'=> date('Y-m-d H:i:s')
						];
						$this->db->insert('order', $order_data);
					}
				}
			}


		$orders = $this->Ordermodel->getOrderItems($order_id);
if(!empty($orders)) {
		$accordionHtml = '';
		$total_amount = 0;
		$accordionHtml = '<form method="post" action="' . base_url('owner/order/update') . '">
		<input type="hidden" name="store_id" value="' . $this->session->userdata('logged_in_store_id') . '">
		<input type="hidden" name="order_id" value="' . $order_id . '">
		<div class="table-responsive">  
		<table class="table">
            <thead>
                <tr>
                    <th width="5%">Sl</th>
                    <th width="25%">Product</th>
					<th width="10%">Quantity</th>
					<th width="10%">Rate</th>
					<th width="10%">Amount</th>
					<th width="5%">Vat(%)</th>
					<th width="10%">Vat-Amt</th>
					<th width="10%">Total-Amt</th>
					<th width="10%">Is Addon</th>
					<th width="20%">Recipe Details</th>
                </tr>
            </thead>
            <tbody>';
		foreach ($orders as $index => $order) {
			$accordionHtml .= '
                <tr id="order-row-' . $order['id'] . '">
                    <td>' . $index + 1 . '</td>
                    <td>' . $this->Ordermodel->getProductName($order['product_id']) . '</td>
					<td>
					<input type="hidden" readonly class="form-control" style="width: 100%;" name="orders[' . $index . '][tax]" value="' . $order['tax'] . '">
					<input type="hidden" readonly class="form-control" style="width: 100%;" name="orders[' . $index . '][id]" value="' . $order['id'] . '">
	<input type="hidden" readonly class="form-control" style="width: 100%;" name="orders[' . $index . '][product_id]" value="' . $order['product_id'] . '">
					<input type="text" class="quantity form-control" name="orders[' . $index . '][quantity]" style="width: 100%;" value="' . $order['quantity'] . '" />
					</td>
					<td><input type="text" readonly class="form-control" style="width: 100%;" name="orders[' . $index . '][rate]" value="' . $order['rate'] . '"></td>
					<td>' . $order['rate'] * $order['quantity'] . '</td>
					<td>' . $order['tax'] . '</td>
					<td>' . $order['tax_amount'] . '</td>
					<td>' . $order['total_amount'] . '</td>
					<td><input type="checkbox" class="form-check-input" disabled name="orders[' . $index . '][is_addon]" value="1" ' . ($order['is_addon'] == 1 ? 'checked' : '') . '></td>
                    <td>' . $order['item_remarks'] . '</td>
					<td><button type="button" class="btn btn-danger delete-order" data-id="' . $order['id'] . '">Delete</button></td>
                </tr>';
				$item_total = $order['quantity'] * $order['total_amount'];
        		$total_amount += $item_total;
		}
		$accordionHtml .= '</tbody>
		<tfoot class="table-light">
                <tr>
				<td colspan="6">
                        <div class="d-flex justify-content-left">
                            <label class="btn text-black bg-b-cyan" width="100px" style="margin-right: 10px;">Order No : '.$order['orderno'].'</label>
                        </div>
                    </td>
					<td colspan="6">
                        <div class="d-flex justify-content-end">
							<a class="btn btn-danger" id="saveConfirmOrder" style="margin-right: 10px;">SAVE ORDER</a>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table></form>
		</div>';
	
		echo $accordionHtml;
	}
	}





	// end







    public function tableOrders($tableId) {
        $data['tableId'] = $tableId;
        $this->load->view('owner/order/table_orders',$data);
    }
	public function pickupOrderDetails($orderNo) {
		$data['orderNo'] = $orderNo;
		$this->load->view('owner/order/pickup_order_details',$data);
    }
	public function completedOrdersPKDL($type){
		$data['type'] = $type;
		$this->load->view('owner/order/completed_orders',$data);
	}

	public function ordersPKDL($type){
		$data['type'] = $type;
		$this->load->view('owner/order/pending_orders',$data);
	}
	
	public function Stockout($type){
	    if($type == 'upcoming')
	    {
	         $data['products'] = $this->Stockmodel->getUpcomingStockoutProducts();
	    }
	    if($type == 'stockout')
	    {
	        $data['products'] = $this->Stockmodel->getStockoutProducts();
	    }
	    $this->load->view('owner/order/stockout',$data);
	}

	public function OrdersPendingPKDL($table_id){
		$data['table_id'] = $table_id;  //In this case type return table id
		$this->load->view('owner/order/pending_table_orders',$data);
	}

	public function AddOrderItems($orderno){
		$data['type'] = $orderno;
		$data['products']=$this->Productmodel->shopAssignedActiveProducts();
		$this->load->view('owner/order/addOrderItem',$data);
	}


	public function PrintOrderItems($orderno){
		$data['order_no'] = $orderno;
		$data['storeDet']=$this->Storemodel->get($this->session->userdata('logged_in_store_id'));
		$this->Ordermodel->CheckOrderPaid($this->session->userdata('logged_in_store_id'),$orderno);
		$data['order']=$this->Ordermodel->getOrderSummary($orderno);
		$data['order_items']=$this->Ordermodel->getOrderItems($orderno); //print_r($data['order']);print_r($data['order_items']);exit;
		$this->load->view('owner/order/printOrderItem',$data);
	}

	public function getProductRates(){
		$this->load->model('owner/Ordermodel');
		$qty = $this->input->post('qty');
		 $store_id = $this->input->post('store_id');
		 $product_id = $this->input->post('product_id');
		 $variant_id = $this->input->post('variant_id');
		 $rates = $this->Ordermodel->getProductRatesDb($store_id,$product_id,$variant_id);
		 $tax_amount = $qty * $rates->rate * 10 / 100;
		 $total_amount = $qty * $rates->rate + $tax_amount;
		 echo json_encode(['rate' => $rates->rate , 'tax' => 10 , 'tax_amount' => $tax_amount,'total_amount' => $total_amount , 'variant_id' => $variant_id]);
	}

	public function getProductRatesNotCustomize(){
		$this->load->model('owner/Ordermodel');
		$qty = $this->input->post('qty');
		$store_id = $this->input->post('store_id');
		$product_id = $this->input->post('product_id');
		$rates = $this->Ordermodel->getProductRatesNotCustomizeDb($store_id,$product_id);
		$productDetails = $this->Ordermodel->get_store_wise_product_by_id($product_id);
		$tax_amount = $qty * $rates->rate * $productDetails[0]['tax']  / 100;
		$total_amount = $qty * $rates->rate + $tax_amount;
		echo json_encode(['rate' => $rates->rate , 'tax' => $productDetails[0]['tax'] , 'tax_amount' => $tax_amount,'total_amount' => $total_amount]);
	}

	public function update() {
		$this->load->model('owner/Ordermodel');
		$orders = $this->input->post('orders');
		$store_id = $this->input->post('store_id');
		$order_id = $this->input->post('order_id');
		if(isset($_POST['approve'])){
			$tax_amount = 0;
			$total_amount = 0;
			foreach ($orders as $key => $order) {
				$tax_amount = $order['quantity'] * $order['rate'] * $order['tax'] / 100;
				$total_amount = $order['quantity'] * $order['rate'] + $tax_amount;
				$order_sl  = $order['id'];
				$product_id  = $order['product_id'];
				$this->Ordermodel->CheckOrderApprove($order_sl,$store_id,$order_id,$product_id,$order['quantity'],$order['rate'],$tax_amount,$total_amount);	
			}
		}
		else if(isset($_POST['pay'])){
			$this->Ordermodel->CheckOrderPaid($store_id,$order_id);	
		}
		else
		{
			echo "Print";
		}
	}


	public function update_order() {
		$this->load->model('owner/Ordermodel');
		$order_id = $this->input->post('orderId');
		$category_id = $this->input->post('category');
    	$orders = $this->input->post('items');
		$store_id = $this->session->userdata('logged_in_store_id');
			$tax_amount = 0;   
			$total_amount = 0;
			foreach ($orders as $key => $order) {
				$tax_amount = $order['quantity'] * $order['rate'] * $order['tax'] / 100;
				$total_amount = $order['quantity'] * $order['rate'] + $tax_amount;
				$order_sl  = $order['id'];
				$product_id  = $order['store_product_id'];
				$this->Ordermodel->CheckOrderApprove($order_sl,$store_id,$order_id,$product_id,$order['quantity'],$order['rate'],$tax_amount,$total_amount,$category_id);	
			}
			echo json_encode(['status' => 'success']);
	}
	public function pay_order(){
		$this->load->model('owner/Ordermodel');
		$order_id = $this->input->post('orderId');
		$store_id = $this->session->userdata('logged_in_store_id');
		$this->Ordermodel->CheckOrderPaid($store_id,$order_id);	
	}

	public function SaveOrderWIthExisting(){
		$this->load->model('owner/Ordermodel');
		$order_id = $this->input->post('order_id');
		$store_id = $this->input->post('store_id');
		$product_id = $this->input->post('product_id');
		$qty = $this->input->post('qty');
		$date = date('Y-m-d');
		$productDetails = $this->Ordermodel->get_store_wise_product_by_id($product_id);
		$is_combo = $this->productIsCombo($product_id);
		if($is_combo)
		{
			$combo_items = $this->Ordermodel->getComboItems($store_id,$product_id);
			foreach ($combo_items as $item) 
			{
				$stock = $this->Ordermodel->getCurrentStock($item['item_id'], date('Y-m-d'), $store_id);
				if ($stock < ($qty * $item['quantity'])) {
					echo json_encode(['status' => 'error', 'message' => 'Not enough stock for product: ' . $item['item_id']]);
					return;
				}          
			}
					$data = [
						'orderno' => $order_id,
						'date' => date('Y-m-d'),
						'store_id' => $store_id,
						'product_id' => $product_id,
						'quantity' => $qty,
						'vat_id' => $productDetails[0]['vat_id'],
						'rate' => $this->input->post('rate'),
						'tax' => $this->input->post('tax'),
						'tax_amount' => $this->input->post('tax_amount'),
						'total_amount' => $this->input->post('total_amount'),
						'item_remarks' => $product['recipe'] ?? null,
						'variant_id' => $this->input->post('variant_id') ?? null,
						'category_id' => $productDetails[0]['category_id'], // optional timestamp
						'is_addon' => $productDetails[0]['is_addon'],
						'is_customisable' => $productDetails[0]['is_customizable'],
						'table_id' => $this->Ordermodel->getOrderTableId($order_id),
						'order_type' => 'D',
						'is_paid' => 0,
						'is_reorder' => 1
					];
					//print_r($data);exit;
					$this->db->insert('order_items', $data);

					$updatedTotalAmt = $this->Ordermodel->updateTotalAmount($order_id);
						$data = [
							'amount' => $updatedTotalAmt[0]['total_rate'],
							'tax_amount' => $updatedTotalAmt[0]['total_tax'],
							'total_amount' => $updatedTotalAmt[0]['total_amount']
								];
							$this->db->where('orderno', $order_id);
							$this->db->update('order', $data);
							
							echo json_encode(['status' => 'success', 'table_id' => $this->Ordermodel->getOrderTableId($order_id)]);
			
		}
		else
		{
				$availableStock = $this->Ordermodel->getCurrentStock($product_id , $date , $store_id);
				if ($availableStock < $qty) {
					echo json_encode(['status' => 'error', 'message' => 'Not enough stock']);
				}
				else
				{
					$data = [
						'orderno' => $order_id,
						'date' => date('Y-m-d'),
						'store_id' => $store_id,
						'product_id' => $product_id,
						'quantity' => $qty,
						'vat_id' => $productDetails[0]['vat_id'],
						'rate' => $this->input->post('rate'),
						'tax' => $this->input->post('tax'),
						'tax_amount' => $this->input->post('tax_amount'),
						'total_amount' => $this->input->post('total_amount'),
						'item_remarks' => $product['recipe'] ?? null,
						'variant_id' => $this->input->post('variant_id') ?? null,
						'category_id' => $productDetails[0]['category_id'], // optional timestamp
						'is_addon' => $productDetails[0]['is_addon'],
						'is_customisable' => $productDetails[0]['is_customizable'],
						'table_id' => $this->Ordermodel->getOrderTableId($order_id),
						'order_type' => 'D',
						'is_paid' => 0,
						'is_reorder' => 1
					];
					//print_r($data);exit;
					$this->db->insert('order_items', $data);

					$updatedTotalAmt = $this->Ordermodel->updateTotalAmount($order_id);
						$data = [
							'amount' => $updatedTotalAmt[0]['total_rate'],
							'tax_amount' => $updatedTotalAmt[0]['total_tax'],
							'total_amount' => $updatedTotalAmt[0]['total_amount']
								];
							$this->db->where('orderno', $order_id);
							$this->db->update('order', $data);
							
							echo json_encode(['status' => 'success', 'table_id' => $this->Ordermodel->getOrderTableId($order_id)]);
				}
		}


	}

	public function productIsCombo($product_id){
		$this->db->select('category_id');
		$this->db->from('store_wise_product_assign');
		$this->db->where('store_product_id', $product_id);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$result = $query->row();
			return ($result->category_id == 23); // Returns true if category_id is 23, false otherwise
		}
		return false;
	}
/*************  ✨ Codeium Command ⭐  *************/
    /**
     * Save a new order with details provided from the POST request.
     *
     * This function retrieves order details from the POST request, such as order ID, store ID,
     * product ID, and quantity. It then fetches product details and constructs an associative array
     * representing the order item. The order item is inserted into the 'order_items' table.
     *
     * If an order already exists with the given order ID, it updates the total amount, tax amount,
     * and amount fields in the 'order' table. Otherwise, it calculates the total amounts from the
     * order items and inserts a new entry into the 'order' table with additional order information
     * such as customer name, contact number, and location if available.
     */

/******  74550b63-8dfd-48e5-950d-2de3c0a6b647  *******/

	
	

    public function getOrderByDate() {
        $this->load->model('owner/Ordermodel');
		$UnPaidorders = $this->Ordermodel->getUnPaidOrderByDate($this->input->post('date') , $this->input->post('tableId'));
        $orders = $this->Ordermodel->getPaidOrderByDate($this->input->post('date') , $this->input->post('tableId'));
        if (empty($orders) && empty($UnPaidorders)) {
			echo "<p>No orders found for the selected date.</p>";
			return;
		}

		$accordionHtml = '';

	
		
		// Build accordion HTML
		$accordionHtml .= '<div class="accordion"><h5 class="text-center">Completed Orders</h5><hr>';

		foreach ($orders as $index => $order) {
			$isFirst = $index === 0 ? ' ' : ''; // Keep the first accordion open
			$accordionHtml .= '
				<div class="accordion-item">
					<h2 class="accordion-header" id="heading' . $order['id'] . '">
						<button class="accordion-button' . ($index !== 0 ? ' collapsed' : '') . '" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $order['id'] . '" aria-expanded="' . ($index === 0 ? 'true' : 'false') . '" aria-controls="collapse' . $order['id'] . '">
							' . $index + 1 . ' :- Order No: ' . $order['orderno'] . ' - Amount: ' . $order['total_amount'] - $order['tax_amount'] .  ' - Vat: ' . $order['tax_amount'] . ' - Total: ' . $order['total_amount'] . '
						</button>
					</h2>
					<div id="collapse' . $order['id'] . '" class="accordion-collapse collapse' . $isFirst . '" aria-labelledby="heading' . $order['id'] . '" data-bs-parent="#ordersAccordion">
						
					<div class="accordion-body">
        <table class="table">
            <thead>
                <tr>
                    <th width="5%">Sl</th>
                    <th width="25%">Product</th>
					<th width="10%">Quantity</th>
					<th width="10%">Rate</th>
					<th width="10%">Amount</th>
					<th width="5%">Vat(%)</th>
					<th width="10%">Vat-Amt</th>
					<th width="10%">Total-Amt</th>
					<th width="10%">Is Addon</th>
					<th width="20%">Recipe Details</th>
                </tr>
            </thead>
            <tbody>';
foreach ($order['items'] as $key => $item) {
    $accordionHtml .= '
                <tr>
                    <td>' . $key + 1 . '</td>
                    <td>' . $this->Ordermodel->getProductName($item['product_id']) . '</td>
					<td>' . $item['quantity'] . '</td>
					<td>' . $item['rate'] . '</td>
					<td>' . $item['rate'] * $item['quantity'] . '</td>
					<td>' . $item['tax'] . '</td>
					<td>' . $item['tax_amount'] . '</td>
					<td>' . $item['total_amount'] . '</td>
					<td><input type="checkbox" class="form-check-input" disabled name="orders[' . $index . '][is_addon]" value="1" ' . ($item['is_addon'] == 1 ? 'checked' : '') . '></td>
                    <td>' . $item['item_remarks'] . '</td>
                </tr>';
}
$accordionHtml .= '
            </tbody>
        </table>
    </div>
</div>

					</div>
				</div>';
		}
		$accordionHtml .= '</div>';
	
		echo $accordionHtml;
    }






	public function getPickupOrderDetails() {
        $this->load->model('owner/Ordermodel');
        $pickuporder = $this->Ordermodel->getPickupOrderDetails($this->input->post('orderId'));//prinr_r($pickuporder);exit;
        if (empty($pickuporder)) {
			echo "<p>No orders found for the selected dateee.</p>";
			return;
		}

		$accordionHtml = '';

	
		$total_amount = 0;
		
		$accordionHtml = '<form method="post" action="' . base_url('owner/order/update') . '">
		<input type="hidden" name="store_id" value="' . $this->session->userdata('logged_in_store_id') . '">
		<input type="hidden" name="order_id" value="' . $this->input->post('orderId') . '">
		<div class="table-responsive">  
		<table class="table">
            <thead>
                <tr>
                    <th width="5%">Sl</th>
                    <th width="25%">Product</th>
					<th width="10%">Quantity</th>
					<th width="10%">Rate</th>
					<th width="10%">Amount</th>
					<th width="5%">Vat(%)</th>
					<th width="10%">Vat-Amt</th>
					<th width="10%">Total-Amt</th>
					<th width="10%">Is Addon</th>
					<th width="20%">Recipe Details</th>
                </tr>
            </thead>
            <tbody>';
		foreach ($pickuporder as $index => $order) {
			$accordionHtml .= '
                <tr>
                    <td>' . $index + 1 . '</td>
                    <td>' . $this->Ordermodel->getProductName($order['product_id']) . '</td>
					<td>
					<input type="hidden" readonly class="form-control" style="width: 100%;" name="orders[' . $index . '][tax]" value="' . $order['tax'] . '">
					<input type="hidden" readonly class="form-control" style="width: 100%;" name="orders[' . $index . '][id]" value="' . $order['id'] . '">
	<input type="hidden" readonly class="form-control" style="width: 100%;" name="orders[' . $index . '][product_id]" value="' . $order['product_id'] . '">
					<input type="text" class="quantity form-control" name="orders[' . $index . '][quantity]" style="width: 100%;" value="' . $order['quantity'] . '" />
					</td>
					<td><input type="text" readonly class="form-control" style="width: 100%;" name="orders[' . $index . '][rate]" value="' . $order['rate'] . '"></td>
					<td>' . $order['rate'] * $order['quantity'] . '</td>
					<td>' . $order['tax'] . '</td>
					<td>' . $order['tax_amount'] . '</td>
					<td>' . $order['total_amount'] . '</td>
					<td><input type="checkbox" class="form-check-input" disabled name="orders[' . $index . '][is_addon]" value="1" ' . ($order['is_addon'] == 1 ? 'checked' : '') . '></td>
                    <td>' . $order['item_remarks'] . '</td>
                </tr>';
				$item_total = $order['quantity'] * $order['total_amount'];
        		$total_amount += $item_total;
		}
		$accordionHtml .= '</tbody>
		<tfoot class="table-light">
                <tr>
				<td colspan="3">
                        <div class="d-flex justify-content-left">
                            <label class="btn text-black bg-b-cyan" width="100px" style="margin-right: 10px;">Order No : '.$order['orderno'].'</label>
                        </div>
                    </td>
                    <td colspan="3">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-secondary" name="approve" width="100px" style="margin-right: 10px;">Approve</button>
                            <button class="btn btn-info" name="pay" width="100px" style="margin-right: 10px;">Paid</button>
							
                        </div>
                    </td>
					<td colspan="6">
                        <div class="d-flex justify-content-end">
							<button class="btn btn-danger" style="margin-right: 10px;">Total Amount : ' . $total_amount . '</button>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table></form>
		</div>';
	
		echo $accordionHtml;
    }






	public function getOrdersByType() {
		$this->load->model('owner/Ordermodel');
		$orders=$this->Ordermodel->getOrdersByType($this->session->userdata('logged_in_store_id') , $this->input->post('order_type')); //print_r($orders);exit;
		$deliveryBoys=$this->Ordermodel->getDeliveryBoysByStoreID($this->session->userdata('logged_in_store_id')); 
		
		$accordionHtml = '';
			
			// Build accordion HTML
			$accordionHtml .= '';
	
			foreach ($orders as $index => $order) {
				$isFirst = $index === 0 ? ' ' : ''; // Keep the first accordion open
				$selectedDeliveryBoy = $order['delivery_boy'];
				$accordionHtml .= '<form>
				<input type="hidden" name="product_name" value="'.$order['orderno'].'">
				<input type="text" id="order_type" name="order_type" value="'.$this->input->post('order_type').'">
					<div class="accordion-item">
						<h2 class="accordion-header" id="heading' . $order['id'] . '">
							<button style="background:#eeeef9" class="accordion-button' . ($index !== 0 ? ' collapsed' : '') . '" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $order['id'] . '" aria-expanded="' . ($index === 0 ? 'true' : 'false') . '" aria-controls="collapse' . $order['id'] . '">
								' . $index + 1 . ' :- Order No: ' . $order['orderno'] . ' - Amount: ' . $order['total_amount'] - $order['tax_amount'] .  ' - Vat: ' . $order['tax_amount'] . ' - Total: ' . $order['total_amount'] . ' - ' . $order['customer_name'] .'('.$order['contact_number'].')
							</button>
						</h2>
						<div id="collapse' . $order['orderno'] . '" class="accordion-collapse collapse show' . $isFirst . '" aria-labelledby="heading' . $order['id'] . '" data-bs-parent="#ordersAccordion">
							
						<div class="accordion-body product-item">
			<table class="table">
				<thead>
					<tr>
						<th width="5%">Sl</th>
						<th width="25%">Product(type)</th>
						<th width="10%">Quantity</th>
						<th width="10%">Rate</th>
						<th width="10%">Amount</th>
						<th width="5%">Vat(%)</th>
						<th width="10%">Vat-Amt</th>
						<th width="10%">Total-Amt</th>
						<th width="10%">Is Addon</th>
						<th width="20%">Recipe Details</th>
					</tr>
				</thead>
				<tbody>';
	foreach ($order['items'] as $key => $item) {
		$total_amount = 0;
		$accordionHtml .= '
                <tr id="order-row-' . $item['id'] . '">
                    <td>' . $index + 1 . '</td>
                    <td>' . 
					$this->Ordermodel->getProductName($item['product_id']) . 
					$this->Ordermodel->getVariantName($item['variant_id']) . 
					'</td>
					<td>
					<input type="hidden" class="form-control tax" style="width: 100%;" value="' . $item['tax'] . '">
					<input type="hidden" class="form-control id" style="width: 100%;" value="' . $item['id'] . '">
					<input type="hidden" class="form-control category" style="width: 100%;" value="' . $item['category_id'] . '">
					<input type="hidden" class="form-control store_product_id" style="width: 100%;" value="' . $item['product_id'] . '">
					<input type="text" class="quantity form-control" name="quantity" style="width: 100%;" value="' . $item['quantity'] . '" />
					</td>
					<td><input type="text" class="form-control rate" style="width: 100%;" value="' . $item['rate'] . '"></td>
					<td>' . $item['rate'] * $item['quantity'] . '</td>
					<td>' . $item['tax'] . '</td>
					<td>' . $item['tax_amount'] . '</td>
					<td>' . $item['total_amount'] . '</td>
					<td><input type="checkbox" class="form-check-input" disabled name="is_addon" value="1" ' . ($item['is_addon'] == 1 ? 'checked' : '') . '></td>
                    <td>' . $item['item_remarks'] . '</td>
					<td><button type="button" class="btn btn-danger delete-order" data-id="' . $item['id'] . '">Delete</button></td>
                </tr>';
				$item_total = $item['quantity'] * $item['total_amount'];
        		$total_amount += $item_total;
	}
	$accordionHtml .= '</tbody>
		<tfoot class="table-light">
				
                <tr>
					<td colspan="2">
                        <select class="form-select order_status" data-order-id="' . $order['orderno'] . '"  name="order_status">
							<option value="0" ' . ($order['order_status'] == "0" ? "selected" : "") . '>Pending</option>
							<option value="1" ' . ($order['order_status'] == "1" ? "selected" : "") . '>Cooking</option>
							<option value="2" ' . ($order['order_status'] == "2" ? "selected" : "") . '>Ready</option>
						</select>
                     </td>';
					 if($order['order_status'] == 2 && $this->input->post('order_type') == 'DL'){
						$accordionHtml .= '<td colspan="2"><select class="form-select delivery_boy" data-order-id="' . $order['orderno'] . '" id="delivery_boy">';
						$accordionHtml .= '<option value="">Select Delivery Boy</option>';
						foreach($deliveryBoys as $key => $item){
							$selected = ($item['userid'] == $selectedDeliveryBoy) ? 'selected' : '';
							$accordionHtml .= '<option value="' . $item['userid'] . '" ' . $selected . '>' . $item['Name'] . '</option>';
						} 
						$accordionHtml .= '</select></td>';
					 }
					
					$accordionHtml .= '<td colspan="5">
                        <div class="d-flex justify-content-end">
							<!--<button data-bs-toggle="modal" data-id="2" data-name="fgdfg" data-bs-target="#recipe" class="btn btn-secondary add_order_item" name="approve" width="100px" style="margin-right: 10px;">Add Item</button>-->
                            <button type="button" class="btn btn-success approve_order" data-order-id="' . $order['orderno'] . '">Approve Order</button>
                            <button class="btn btn-info pay_order" data-order-id="' . $order['orderno'] . '" width="100px" style="margin-left: 10px;">Paid</button>
							<button class="btn btn-info pay_order_print" data-order-id="' . $order['orderno'] . '" width="100px" style="margin-left: 10px;">Pay & Print</button>
							
                        </div>
                    </td>
					<td colspan="5">
                        <div class="d-flex justify-content-end">
							<button class="btn btn-danger" style="margin-right: 10px;">Total Amount : ' . $order['total_amount'] . '</button>
                        </div>
                    </td>
                </tr>
				<tr class="msgContainer'.$order['orderno'].' d-none"><td colspan="12">
				<div class="alert alert-success dark d-none" role="alert" id="ordermsg'.$order['orderno'].'">Order</div>
				</td></tr>
            </tfoot>
        </table></form>
		</div>';
	$accordionHtml .= '
				</tbody>
			</table>
		</div>
	</div>
	
						</div>

						
                    
                     <div class="modal fade" id="recipe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel"> <span id="table_name"></span></h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <iframe id="table_iframe_recipe1" height="600px" width="100%"></iframe>
                                </div>
                              </div>
                            </div>
                    </div>
                  
						
					</div>';

					$accordionHtml .= '<script>
        $(document).off("click", ".delete-order").on("click", ".delete-order", function () {
                var orderId = $(this).data("id"); 
                var rowId = "#order-row-" + orderId;
                 if (confirm("Are you sure you want to delete this order?")) {
                    $.ajax({
                        url: "' . base_url('owner/order/deleteOrderItem') . '",
                        type: "POST",
                        data: { orderId: orderId },
                        dataType: "html",
                        success: function (response) {
                            var result = JSON.parse(response);
                            if (result.success) {
                                $(rowId).remove(); 
                                alert("Order deleted successfully!");
                            }
                        },
                })
                }
            });
        </script>';
			}
			$accordionHtml .= '</div>';



			// Embed JavaScript directly in the HTML response
			$accordionHtml .= '<script>
			const BASE_URL = "' . base_url() . '";
    $(document).on("click", ".add_order_item", function() {
        var orderId = $(this).data("id"); 
        var url = "' . base_url("owner/order/AddOrderItems/") . '" + orderId;
        $("#table_iframe_recipe1").attr("src", url);
		return false;
    });

	$(document).on("click", ".approve_order", function() {
	var orderId = $(this).data("order-id"); 
	var orderItems = [];

	 	$("#collapse" + orderId + " .product-item table tbody tr").each(function () {
		var id = $(this).find(".id").val();
		var store_product_id = $(this).find(".store_product_id").val();
		var quantity = $(this).find(".quantity").val();
		var rate = $(this).find(".rate").val();
		var tax = $(this).find(".tax").val();
		var category = $(this).find(".category").val();

        orderItems.push({
			id:id,
			store_product_id:store_product_id,
            quantity: quantity,
			rate:rate,
			category:category,
			tax:tax
        });
		
    });

			$.ajax({
					url: "' . base_url('owner/order/update_order') . '",
					type: "POST",
					data: { orderId: orderId, items: orderItems },
					dataType: "json",
					success: function (response) {
						if (response.status === "success") {
							$(".msgContainer" + orderId).removeClass("d-none");
							$("#ordermsg" + orderId).removeClass("d-none");
							$("#ordermsg" + orderId).text("Order updated successfully.");
							setTimeout(function() {
								location.reload();
							}, 2000);
						} else {
							
						}
					},
			});
    });

	$(document).on("click", ".pay_order", function() {
	var orderId = $(this).data("order-id");
			$.ajax({
					url: "' . base_url('owner/order/pay_order') . '",
					type: "POST",
					data: { orderId: orderId },
					dataType: "json",
					success: function (response) {
						if (response.status === "success") {
							$(".msgContainer" + orderId).removeClass("d-none");
							$("#ordermsg" + orderId).removeClass("d-none");
							$("#ordermsg" + orderId).text("Order Paid successfully.");
							setTimeout(function() {
								location.reload();
							}, 2000);
						}
					},
			});
	});

	$(document).on("change", ".order_status", function() {
			var orderId = $(this).data("order-id");
			var selectedStatus = $(this).val();
			$.ajax({
					url: "' . base_url('owner/order/changeOrderStatus') . '",
					type: "POST",
					data: { orderId: orderId,status:selectedStatus },
					dataType: "json",
					success: function (response) {
					if(response.status)
					{
						$.ajax({
								url: "' . base_url('owner/order/getOrdersByType') . '",
								data: { order_type : $("#order_type").val() },	
								type: "POST",
								dataType: "html",
								success: function (data) {
								console.log(data);
									$("#orders-container").html(data);
								}
						});
					}
					},
			});
	});

	$(document).on("change", ".delivery_boy", function() {
			var orderId = $(this).data("order-id");
			var delivery_boy = $(this).val();
			$.ajax({
								url: "' . base_url('owner/order/changeDeliveryBoy') . '",
								type: "POST",
								data: { orderId: orderId,delivery_boy:delivery_boy },
								dataType: "json",
								success: function (response) {
								console.log(response);
									$.ajax({
								url: "' . base_url('owner/order/getOrdersByType') . '",
								data: { order_type : $("#order_type").val() },	
								type: "POST",
								dataType: "html",
								success: function (data) {
								console.log(data);
									$("#orders-container").html(data);
								}
						});
								}
			});
			
	});
							</script>';
		
			echo $accordionHtml;
	}



	public function getPendingOrdersByTableID() {
		$this->load->model('owner/Ordermodel');
		$orders=$this->Ordermodel->getPendingOrdersByTableId($this->session->userdata('logged_in_store_id') , $this->input->post('table_id')); 
		$accordionHtml = '';
			
			// Build accordion HTML
			$accordionHtml .= '';
	
			foreach ($orders as $index => $order) {
				$isFirst = $index === 0 ? ' ' : ''; // Keep the first accordion open
				$accordionHtml .= '<form>
				<input type="hidden" name="product_name" value="'.$order['orderno'].'">
					<div class="accordion-item">
						<h2 class="accordion-header" id="heading' . $order['id'] . '">
							<button style="background:#eeeef9" class="accordion-button' . ($index !== 0 ? ' collapsed' : '') . '" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $order['id'] . '" aria-expanded="' . ($index === 0 ? 'true' : 'false') . '" aria-controls="collapse' . $order['id'] . '">
								' . $index + 1 . ' :- Order No: ' . $order['orderno'] . ' - Amount: ' . $order['total_amount'] - $order['tax_amount'] .  ' - Vat: ' . $order['tax_amount'] . ' - Total: ' . $order['total_amount'] . '
							</button>
						</h2>
						<div id="collapse' . $order['orderno'] . '" class="accordion-collapse collapse show' . $isFirst . '" aria-labelledby="heading' . $order['id'] . '" data-bs-parent="#ordersAccordion">
							
						<div class="accordion-body product-item">
			<table class="table">
				<thead>
					<tr>
						<th width="5%">Sl</th>
						<th width="25%">Product(table)</th>
						<th width="10%">Quantity</th>
						<th width="10%">Rate</th>
						<th width="10%">Amount</th>
						<th width="10%">Total-Amt</th>
						<th width="10%">Is Addon</th>
						<th width="20%">Recipe Details</th>
					</tr>
				</thead>
				<tbody>';
	foreach ($order['items'] as $key => $item) {
		
		
		$total_amount = 0;
		$backgroundColor = $item['is_reorder'] == 1 ? '#f8d7da' : '#ffffff';
		$productName = $this->Ordermodel->getProductName($item['product_id']);
   		$variantName = $this->Ordermodel->getVariantName($item['variant_id']);
		$accordionHtml .= '
				<tr id="order-row-' . $item['id'] . '" style="background-color: ' . $backgroundColor . ';">
                    <td>' . $key + 1 . '</td>
                    <td>' . 
                $productName . 
                ($variantName != null ? ' (' . $variantName . ')' : '') . 
            '</td>
					<td>
					<input type="hidden" class="form-control tax" style="width: 100%;" value="' . $item['tax'] . '">
					<input type="hidden" class="form-control id" style="width: 100%;" value="' . $item['id'] . '">
					<input type="hidden" class="form-control store_product_id" style="width: 100%;" value="' . $item['product_id'] . '">
					<input type="text" class="quantity form-control" name="quantity" style="width: 100%;" value="' . $item['quantity'] . '" />
					</td>
					<td><input type="text" class="form-control rate" style="width: 100%;" value="' . $item['rate'] . '"></td>
					<td>' . $item['rate'] * $item['quantity'] . '</td>
					<td>' . $item['total_amount'] . '</td>
					<td><input type="checkbox" class="form-check-input" disabled name="is_addon" value="1" ' . ($item['is_addon'] == 1 ? 'checked' : '') . '></td>
                    <td>' . $item['item_remarks'] . '</td>
					<td><button type="button" class="btn btn-danger delete-order" data-id="' . $item['id'] . '">Delete</button></td>
                </tr>';
				$item_total = $item['quantity'] * $item['total_amount'];
        		$total_amount += $item_total;
	}
	$accordionHtml .= '</tbody>
		<tfoot class="table-light">
				
                <tr>
					<td colspan="2">
                        <select class="form-select" id="order_status" name="order_status">
							<option value="0" ' . ($order['order_status'] == "0" ? "selected" : "") . '>Pending</option>
							<option value="1" ' . ($order['order_status'] == "1" ? "selected" : "") . '>Cooking</option>
							<!--<option value="2" ' . ($order['order_status'] == "2" ? "selected" : "") . '>Ready</option>-->
							<!--<option value="4" ' . ($order['order_status'] == "4" ? "selected" : "") . '>Delivered</option>-->
						</select>
                    </td>
                    <td colspan="5">
                        <div class="d-flex justify-content-end">
							<button data-bs-toggle="modal" data-id="2" data-name="fgdfg" data-bs-target="#recipe1" data-order-id="' . $order['orderno'] . '" class="btn btn-secondary add_order_item" name="approve" width="100px" style="margin-right: 10px;">Add Itemss</button>
                            <button type="button" class="btn btn-success approve_table_order" data-order-id="' . $order['orderno'] . '">Approve Order tt</button>
                            <button class="btn btn-info pay_table_order" data-order-id="' . $order['orderno'] . '" width="100px" style="margin-left: 10px;">Paid</button>
							<button data-bs-toggle="modal" data-id="2" data-name="fgdfg" data-bs-target="#recipe" data-order-id="' . $order['orderno'] . '" class="btn btn-secondary pay_order_print" width="100px" style="margin-left: 10px;">Pay & Print</button>
							
                        </div>
                    </td>
					<td colspan="5">
                        <div class="d-flex justify-content-end">
							<button class="btn btn-danger" style="margin-right: 10px;">Total Amount : ' . $order['total_amount'] . '</button>
                        </div>
                    </td>
                </tr>
				<tr class="msgContainer'.$order['orderno'].' d-none"><td colspan="12">
				<div class="alert alert-success dark d-none" role="alert" id="ordermsg'.$order['orderno'].'">Order</div>
				</td></tr>
            </tfoot>
        </table></form>
		</div>';

		$accordionHtml .= '<script>
		$(document).off("click", ".delete-order").on("click", ".delete-order", function () {
            	var orderId = $(this).data("id"); 
    			var rowId = "#order-row-" + orderId;
				 if (confirm("Are you sure you want to delete this order?")) {
					$.ajax({
						url: "' . base_url('owner/order/deleteOrderItem') . '",
						type: "POST",
						data: { orderId: orderId },
						dataType: "html",
						success: function (response) {
							var result = JSON.parse(response);
							if (result.success) {
								$(rowId).remove(); 
								alert("Order deleted successfully!");
							}
						},
                })
				}
        	});
		</script>';

	$accordionHtml .= '
				</tbody>
			</table>
		</div>
	</div>
	
						</div>

						
                    
                     <div class="modal fade" id="recipe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel"> <span id="table_name"></span></h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <iframe id="table_iframe_recipe1" height="600px" width="100%"></iframe>
                                </div>
                              </div>
                            </div>
                    </div>
                    
                     <div class="modal fade" id="recipe1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel"> <span id="table_name"></span></h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <iframe id="table_iframe_recipe2" height="600px" width="100%"></iframe>
                                </div>
                              </div>
                            </div>
                    </div>
                  
						
					</div>';
			}
			$accordionHtml .= '</div>';



			// Embed JavaScript directly in the HTML response
			$accordionHtml .= '<script>
			const BASE_URL = "' . base_url() . '";
    $(document).on("click", ".add_order_item", function() {
        var orderId = $(this).data("order-id"); 
        var url = "' . base_url("owner/order/AddOrderItems/") . '" + orderId;
        $("#table_iframe_recipe2").attr("src", url);
		return false;
    });

	$(document).on("click", ".approve_table_order", function() {
	var orderId = $(this).data("order-id"); 
	var orderItems = [];

	 	$("#collapse" + orderId + " .product-item table tbody tr").each(function () {
		var id = $(this).find(".id").val();
		var store_product_id = $(this).find(".store_product_id").val();
		var quantity = $(this).find(".quantity").val();
		var rate = $(this).find(".rate").val();
		var tax = $(this).find(".tax").val();

        orderItems.push({
			id:id,
			store_product_id:store_product_id,
            quantity: quantity,
			rate:rate,
			tax:tax
        });
		
    });

			$.ajax({
					url: "' . base_url('owner/order/update_order') . '",
					type: "POST",
					data: { orderId: orderId, items: orderItems },
					dataType: "json",
					success: function (response) {
						if (response.status === "success") {
							$(".msgContainer" + orderId).removeClass("d-none");
							$("#ordermsg" + orderId).removeClass("d-none");
							$("#ordermsg" + orderId).text("Order updated successfully.");
							setTimeout(function() {
								location.reload();
							}, 2000);
						} else {
							
						}
					},
			});
    });

	$(document).on("click", ".pay_table_order", function() {
	var orderId = $(this).data("order-id");
			$.ajax({
					url: "' . base_url('owner/order/pay_order') . '",
					type: "POST",
					data: { orderId: orderId },
					dataType: "json",
					success: function (response) {
						if (response.status === "success") {
							$(".msgContainer" + orderId).removeClass("d-none");
							$("#ordermsg" + orderId).removeClass("d-none");
							$("#ordermsg" + orderId).text("Order Paid successfully.");
							setTimeout(function() {
								location.reload();
							}, 2000);
						}
					},
			});
	});

	$(document).on("click", ".pay_order_print", function() {
		var orderId = $(this).data("order-id"); 
        var url = "' . base_url("owner/order/PrintOrderItems/") . '" + orderId;
        $("#table_iframe_recipe1").attr("src", url);
		return false;
	});
							</script>';
		
			echo $accordionHtml;
	}


		public function getCompletedOrdersByType() {
			$this->load->model('owner/Ordermodel');
			$orders = $this->Ordermodel->getCompletedOrdersByType($this->input->post('date') , $this->input->post('order_type'));
			//print_r($orders);exit;
			if (empty($orders)) {
				echo "<p>No orders found for the selected date.</p>";
				return;
			}
	
			$accordionHtml = '';
			
			// Build accordion HTML
			$accordionHtml .= '<div class="accordion"><h5 class="text-center">Completed Orders</h5><hr>';
	
			foreach ($orders as $index => $order) {
				$isFirst = $index === 0 ? ' ' : ''; // Keep the first accordion open
				$accordionHtml .= '
					<div class="accordion-item">
						<h2 class="accordion-header" id="heading' . $order['id'] . '">
							<button class="accordion-button' . ($index !== 0 ? ' collapsed' : '') . '" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $order['id'] . '" aria-expanded="' . ($index === 0 ? 'true' : 'false') . '" aria-controls="collapse' . $order['id'] . '">
								' . $index + 1 . ' :- Order No: ' . $order['orderno'] . ' - Amount: ' . $order['total_amount'] - $order['tax_amount'] .  ' - Vat: ' . $order['tax_amount'] . ' - Total: ' . $order['total_amount'] . ' - ' . $order['customer_name'] .'('.$order['contact_number'].')
							</button>
						</h2>
						<div id="collapse' . $order['id'] . '" class="accordion-collapse collapse' . $isFirst . '" aria-labelledby="heading' . $order['id'] . '" data-bs-parent="#ordersAccordion">
							
						<div class="accordion-body">
			<table class="table">
				<thead>
					<tr>
						<th width="5%">Sl</th>
						<th width="25%">Product</th>
						<th width="10%">Quantity</th>
						<th width="10%">Rate</th>
						<th width="10%">Amount</th>
						<th width="5%">Vat(%)</th>
						<th width="10%">Vat-Amt</th>
						<th width="10%">Total-Amt</th>
						<th width="10%">Is Addon</th>
						<th width="20%">Recipe Details</th>
					</tr>
				</thead>
				<tbody>';
	foreach ($order['items'] as $key => $item) {
		$accordionHtml .= '
					<tr>
						<td>' . $key + 1 . '</td>
						<td>' . $this->Ordermodel->getProductName($item['product_id']) . '</td>
						<td>' . $item['quantity'] . '</td>
						<td>' . $item['rate'] . '</td>
						<td>' . $item['rate'] * $item['quantity'] . '</td>
						<td>' . $item['tax'] . '</td>
						<td>' . $item['tax_amount'] . '</td>
						<td>' . $item['total_amount'] . '</td>
						<td><input type="checkbox" class="form-check-input" disabled name="orders[' . $index . '][is_addon]" value="1" ' . ($item['is_addon'] == 1 ? 'checked' : '') . '></td>
						<td>' . $item['item_remarks'] . '</td>
					</tr>';
	}
	$accordionHtml .= '
				</tbody>
			</table>
		</div>
	</div>
	
						</div>
					</div>';
			}
			$accordionHtml .= '</div>';
		
			echo $accordionHtml;
		}






		public function getProductRatesWithIsCustomizeNewDiningOrder(){
			$is_customise = $this->Ordermodel->checkCustomizable($this->input->post('product_id'));
		
			$html = '';
			if($is_customise == 1){
				$variantsList = $this->Ordermodel->getVariants($this->input->post('product_id'),$this->session->userdata('logged_in_store_id'));
				$html .= '
				<div class="col">
				<input type="hidden" id="store_id" value="'.$this->session->userdata('logged_in_store_id').'">
				<input type="hidden" id="tableId" value="'.$this->input->post('table_id').'">
				<input type="hidden" id="orderType" value="'.$this->input->post('orderType').'">
				<input type="hidden" id="product_id" value="'.$this->input->post('product_id').'">
				<input type="hidden" id="ratenew">
				<input type="hidden" id="taxnew">
				<input type="hidden" id="taxamtnew">
				<input type="hidden" id="totalnew">
				<input type="hidden" id="qty">
				<input type="hidden" id="variantnew_id">
				
            <label for="productId" class="form-label">Variant</label>
            <select class="form-select" name="variant_id" id="variant_id">'; // Default placeholder option
				foreach ($variantsList as $variant1) {
    				$html .= '<option value="' . htmlspecialchars($variant1['variant_id']) . '">' . htmlspecialchars($variant1['variant_name']) . '</option>';
				}
				$html .= '</select>
        	</div>
			<div class="row">
			<div class="col-3">
            	<label for="productQuantity" class="form-label">Quantity</label>
            	<input type="text" class="form-control" name="product_quantity" id="productQuantity" placeholder="Enter Quantity" autofocus>
        	</div>
			<div class="col-3">
            	<label for="productQuantity" class="form-label">Rate</label>
            	<input type="text" disabled class="form-control" id="rate">
        	</div>
			<div class="col-3">
            	<label for="productQuantity" class="form-label">Tax Amount</label>
            	<input type="text" disabled class="form-control" id="tax_amount" placeholder="">
        	</div>
			<div class="col-2">
            	<label for="productQuantity" class="form-label">Total Amount</label>
            	<input type="text" disabled class="form-control" id="total_amount" placeholder="Enter Quantity">
        	</div>
			<div class="col-1">
            <button class="btn btn-primary mt-4" type="button" id="saveOrder">ADD</button>
            </div>
			</div>
			<hr></hr>
			';
			}
			if($is_customise == 0){
				$html = ' 
				<input type="hidden" id="store_id" value="'.$this->session->userdata('logged_in_store_id').'">
				<input type="hidden" id="tableId" value="'.$this->input->post('table_id').'">
				<input type="hidden" id="orderType" value="'.$this->input->post('orderType').'">
				<input type="hidden" id="product_id" value="'.$this->input->post('product_id').'">
				<input type="hidden" id="ratenew">
				<input type="hidden" id="taxnew">
				<input type="hidden" id="taxamtnew">
				<input type="hidden" id="totalnew">
				<input type="hidden" id="qty">
			<div class="row">
			<div class="col-3">
            	<label for="productQuantity" class="form-label">Quantity</label>
            	<input type="text" class="form-control" name="product_quantity" id="productQuantityNotCustomize" placeholder="Enter Quantity" autofocus />
        	</div>
			<div class="col-3">
            	<label for="productQuantity" class="form-label">Rate</label>
            	<input type="text" disabled class="form-control" id="rate1">
        	</div>
			<div class="col-3">
            	<label for="productQuantity" class="form-label">Tax Amount</label>
            	<input type="text" disabled class="form-control" id="tax_amount1" placeholder="">
        	</div>
			<div class="col-2">
            	<label for="productQuantity" class="form-label">Amount</label>
            	<input type="text" disabled class="form-control" id="total_amount1" placeholder="Enter Quantity">
        	</div>
			<div class="col-1">
            <button class="btn btn-primary mt-4" type="button" id="saveOrder">ADD</button>
            </div>
			</div>
			<hr></hr>
			';
			}

			

			$html .= '<script>
    		$(document).on("keyup", "#productQuantity", function() {
				$.ajax({
					url: "' . base_url('owner/order/getProductRates') . '",
					type: "POST",
					data: { store_id: $("#store_id").val(),product_id: $("#product_id").val(),variant_id:$("#variant_id").val(),qty:$("#productQuantity").val() },
					dataType: "json",
					success: function (response) {
					console.log(response);
						$("#rate").val(response.rate);
						$("#qty").val($("#productQuantity").val());
						$("#tax_amount").val(response.tax_amount);
						$("#total_amount").val(response.total_amount);
						$("#ratenew").val(response.rate);
						$("#taxnew").val(response.tax);
						$("#taxamtnew").val(response.tax_amount);
						$("#totalnew").val(response.total_amount);
						$("#variantnew_id").val(response.variant_id);
					},
				});
			});

			$(document).on("keyup", "#productQuantityNotCustomize", function() {
				$.ajax({
					url: "' . base_url('owner/order/getProductRatesNotCustomize') . '",
					type: "POST",
					data: { store_id: $("#store_id").val(),product_id: $("#product_id").val(),qty:$("#productQuantityNotCustomize").val() },
					dataType: "json",
					success: function (response) {
						$("#rate1").val(response.rate);
						$("#qty").val($("#productQuantityNotCustomize").val());
						$("#tax_amount1").val(response.tax_amount);
						$("#total_amount1").val(response.total_amount);
						$("#ratenew").val(response.rate);
						$("#taxnew").val(response.tax);
						$("#taxamtnew").val(response.tax_amount);
						$("#totalnew").val(response.total_amount);
					},
				});
			});

			$(document).off("click", "#saveOrder").on("click", "#saveOrder", function () {
				$.ajax({
					url: "' . base_url('owner/order/SaveNewDiningOrder') . '",
					type: "POST",
					data: { 
						order_id: window.parent.$("#order_number").val(),
						tableID: $("#tableId").val(),
						orderType: $("#orderType").val(),
						store_id: $("#store_id").val(),
						product_id: $("#product_id").val(),
						qty:$("#qty").val(),
						rate:$("#ratenew").val(),
						tax:$("#taxnew").val(),
						tax_amount:$("#taxamtnew").val(),
						total_amount:$("#totalnew").val(),
						variant_id : $("#variantnew_id").val()
					},
					dataType: "html",
					success: function (response) {
					      $("#order_display").html(response);  
					},
				});
			});

			$(document).off("click", ".delete-order").on("click", ".delete-order", function () {
            	var orderId = $(this).data("id");
    			var rowId = "#order-row-" + orderId;
				 if (confirm("Are you sure you want to delete this order?")) {
					$.ajax({
						url: "' . base_url('owner/order/deleteOrderItem') . '",
						type: "POST",
						data: { orderId: orderId },
						dataType: "html",
						success: function (response) {
							var result = JSON.parse(response);
							if (result.success) {
								$(rowId).remove(); 
								alert("Order deleted successfully!");
							}
						},
                })
				}
        	});

			$(document).on("click", "#saveConfirmOrder", function() {
        $.ajax({
            url: "' . base_url('owner/order/SaveConfirmOrder') . '",
            type: "POST",
            data: { 
                order_id: $("#order_number").val()
            },
            dataType: "json",
            success: function (response) {
                		if(response.status == "success") {
							const date = new Date();
							const day = String(date.getDate()).padStart(2, "0"); 
							const month = String(date.getMonth() + 1).padStart(2, "0"); 
							const year = String(date.getFullYear()).slice(-2); 
							const fullOrderNumber = response.orderno + day + month + year;
							window.parent.$("#order_number").val(fullOrderNumber);
							location.reload();                 
						}
            }
        });
		});

			</script>';
			
			echo $html;
		}






		// Pickup New Order
		public function getProductRatesWithIsCustomizeNewPickupOrder(){
			$is_customise = $this->Ordermodel->checkCustomizable($this->input->post('product_id'));
		
			$html = '';
			if($is_customise == 1){
				$variantsList = $this->Ordermodel->getVariants($this->input->post('product_id'),$this->session->userdata('logged_in_store_id'));
				$html .= '<div class="col">
				<input type="hidden" id="store_id" value="'.$this->session->userdata('logged_in_store_id').'">
				<input type="hidden" id="name" value="'.$this->input->post('name').'">
				<input type="hidden" id="number" value="'.$this->input->post('number').'">
				<input type="hidden" id="time" value="'.$this->input->post('time').'">
				<input type="hidden" id="tableId" value="'.$this->input->post('table_id').'">
				<input type="hidden" id="orderType" value="'.$this->input->post('orderType').'">
				<input type="hidden" id="product_id" value="'.$this->input->post('product_id').'">
				<input type="hidden" id="ratenew">
				<input type="hidden" id="taxnew">
				<input type="hidden" id="taxamtnew">
				<input type="hidden" id="totalnew">
				<input type="hidden" id="qty">
				<input type="hidden" id="variantnew_id">
				
            <label for="productId" class="form-label">Variant</label>
            <select class="form-select" name="variant_id" id="variant_id">'; // Default placeholder option
				foreach ($variantsList as $variant1) {
    				$html .= '<option value="' . htmlspecialchars($variant1['variant_id']) . '">' . htmlspecialchars($variant1['variant_name']) . '</option>';
				}
				$html .= '</select>
        	</div>
			<div class="row">
			<div class="col-3">
            	<label for="productQuantity" class="form-label">Quantity</label>
            	<input type="text" class="form-control" name="product_quantity" id="productQuantity" placeholder="Enter Quantity">
        	</div>
			<div class="col-3">
            	<label for="productQuantity" class="form-label">Rate</label>
            	<input type="text" disabled class="form-control" id="rate">
        	</div>
			<div class="col-3">
            	<label for="productQuantity" class="form-label">Tax Amount</label>
            	<input type="text" disabled class="form-control" id="tax_amount" placeholder="">
        	</div>
			<div class="col-2">
            	<label for="productQuantity" class="form-label">Total Amount</label>
            	<input type="text" disabled class="form-control" id="total_amount" placeholder="Enter Quantity">
        	</div>
			<div class="col-1">
            <button class="btn btn-primary mt-4" type="button" id="saveOrder">ADD</button>
            </div>
			</div>
			<hr></hr>
			';
			}
			if($is_customise == 0){
				$html = ' 
				<input type="hidden" id="store_id" value="'.$this->session->userdata('logged_in_store_id').'">
				<input type="hidden" id="name" value="'.$this->input->post('name').'">
				<input type="hidden" id="number" value="'.$this->input->post('number').'">
				<input type="hidden" id="time" value="'.$this->input->post('time').'">
				<input type="hidden" id="tableId" value="'.$this->input->post('table_id').'">
				<input type="hidden" id="orderType" value="'.$this->input->post('orderType').'">
				<input type="hidden" id="product_id" value="'.$this->input->post('product_id').'">
				<input type="hidden" id="ratenew">
				<input type="hidden" id="taxnew">
				<input type="hidden" id="taxamtnew">
				<input type="hidden" id="totalnew">
				<input type="hidden" id="qty">
			<div class="row">
			<div class="col-3">
            	<label for="productQuantity" class="form-label">Quantity</label>
            	<input type="text" class="form-control" name="product_quantity" id="productQuantityNotCustomize" placeholder="Enter Quantity">
        	</div>
			<div class="col-3">
            	<label for="productQuantity" class="form-label">Rate</label>
            	<input type="text" disabled class="form-control" id="rate1">
        	</div>
			<div class="col-3">
            	<label for="productQuantity" class="form-label">Tax Amount</label>
            	<input type="text" disabled class="form-control" id="tax_amount1" placeholder="">
        	</div>
			<div class="col-2">
            	<label for="productQuantity" class="form-label">Amount</label>
            	<input type="text" disabled class="form-control" id="total_amount1" placeholder="Enter Quantity">
        	</div>
			<div class="col-1">
            <button class="btn btn-primary mt-4" type="button" id="saveOrder">ADD</button>
            </div>
			</div>
			
			<hr></hr>
			';
			}

			

			$html .= '<script>
    		$(document).on("keyup", "#productQuantity", function() {
				$.ajax({
					url: "' . base_url('owner/order/getProductRates') . '",
					type: "POST",
					data: { store_id: $("#store_id").val(),product_id: $("#product_id").val(),variant_id:$("#variant_id").val(),qty:$("#productQuantity").val() },
					dataType: "json",
					success: function (response) {
					console.log(response);
						$("#rate").val(response.rate);
						$("#qty").val($("#productQuantity").val());
						$("#tax_amount").val(response.tax_amount);
						$("#total_amount").val(response.total_amount);
						$("#ratenew").val(response.rate);
						$("#taxnew").val(response.tax);
						$("#taxamtnew").val(response.tax_amount);
						$("#totalnew").val(response.total_amount);
						$("#variantnew_id").val(response.variant_id);
					},
				});
			});

			$(document).on("keyup", "#productQuantityNotCustomize", function() {
				$.ajax({
					url: "' . base_url('owner/order/getProductRatesNotCustomize') . '",
					type: "POST",
					data: { store_id: $("#store_id").val(),product_id: $("#product_id").val(),qty:$("#productQuantityNotCustomize").val() },
					dataType: "json",
					success: function (response) {
						$("#rate1").val(response.rate);
						$("#qty").val($("#productQuantityNotCustomize").val());
						$("#tax_amount1").val(response.tax_amount);
						$("#total_amount1").val(response.total_amount);
						$("#ratenew").val(response.rate);
						$("#taxnew").val(response.tax);
						$("#taxamtnew").val(response.tax_amount);
						$("#totalnew").val(response.total_amount);
					},
				});
			});

			$(document).off("click", "#saveOrder").on("click", "#saveOrder", function () {
				$.ajax({
					url: "' . base_url('owner/order/SaveNewPickupOrder') . '",
					type: "POST",
					data: { 
						order_id: window.parent.$("#order_number").val(),
						tableID: $("#tableId").val(),
						orderType: $("#orderType").val(),
						store_id: $("#store_id").val(),
						product_id: $("#product_id").val(),
						name: $("#name").val(),
						number: $("#number").val(),
						time: $("#time").val(),
						qty:$("#qty").val(),
						rate:$("#ratenew").val(),
						tax:$("#taxnew").val(),
						tax_amount:$("#taxamtnew").val(),
						total_amount:$("#totalnew").val(),
						variant_id : $("#variantnew_id").val()
					},
					dataType: "html",
					success: function (response) {
					      $("#order_display").html(response);  
					},
				});
			});

			$(document).off("click", ".delete-order").on("click", ".delete-order", function () {
            	var orderId = $(this).data("id");
    			var rowId = "#order-row-" + orderId;
				 if (confirm("Are you sure you want to delete this order?")) {
					$.ajax({
						url: "' . base_url('owner/order/deleteOrderItem') . '",
						type: "POST",
						data: { orderId: orderId },
						dataType: "html",
						success: function (response) {
							var result = JSON.parse(response);
							if (result.success) {
								$(rowId).remove(); 
								alert("Order deleted successfully!");
							}
						},
                })
				}
        	});

			$(document).on("click", "#saveConfirmOrder", function() {
				$.ajax({
					url: "' . base_url('owner/order/SaveConfirmOrder') . '",
					type: "POST",
					data: { 
						order_id: $("#order_number").val()
					},
					dataType: "json",
					success: function (response) {
						if(response.status == "success") {
							const date = new Date();
							const day = String(date.getDate()).padStart(2, "0"); 
							const month = String(date.getMonth() + 1).padStart(2, "0"); 
							const year = String(date.getFullYear()).slice(-2); 
							const fullOrderNumber = response.orderno + day + month + year;
							window.parent.$("#order_number").val(fullOrderNumber);
							location.reload();                 
						}
					},
				})
			});
			</script>';
			
			echo $html;
		}







		// Delivery New Order
		public function getProductRatesWithIsCustomizeNewDeliveryOrder(){
			$is_customise = $this->Ordermodel->checkCustomizable($this->input->post('product_id'));
		
			$html = '';
			if($is_customise == 1){
				$variantsList = $this->Ordermodel->getVariants($this->input->post('product_id'),$this->session->userdata('logged_in_store_id'));
				$html .= '<div class="col">
				<input type="hidden" id="store_id" value="'.$this->session->userdata('logged_in_store_id').'">
				<input type="hidden" id="name" value="'.$this->input->post('name').'">
				<input type="hidden" id="number" value="'.$this->input->post('number').'">
				<input type="hidden" id="time" value="'.$this->input->post('time').'">
				<input type="hidden" id="address" value="'.$this->input->post('address').'">
				<input type="hidden" id="paymentMode" value="'.$this->input->post('paymentMode').'">
				<input type="hidden" id="tableId" value="'.$this->input->post('table_id').'">
				<input type="hidden" id="orderType" value="'.$this->input->post('orderType').'">
				<input type="hidden" id="product_id" value="'.$this->input->post('product_id').'">
				<input type="hidden" id="ratenew">
				<input type="hidden" id="taxnew">
				<input type="hidden" id="taxamtnew">
				<input type="hidden" id="totalnew">
				<input type="hidden" id="qty">
				<input type="hidden" id="variantnew_id">
				
            <label for="productId" class="form-label">Variant</label>
            <select class="form-select" name="variant_id" id="variant_id">'; // Default placeholder option
				foreach ($variantsList as $variant1) {
    				$html .= '<option value="' . htmlspecialchars($variant1['variant_id']) . '">' . htmlspecialchars($variant1['variant_name']) . '</option>';
				}
				$html .= '</select>
        	</div>
			<div class="row">
			<div class="col-3">
            	<label for="productQuantity" class="form-label">Quantity</label>
            	<input type="text" class="form-control" name="product_quantity" id="productQuantity" placeholder="Enter Quantity">
        	</div>
			<div class="col-3">
            	<label for="productQuantity" class="form-label">Rate</label>
            	<input type="text" disabled class="form-control" id="rate">
        	</div>
			<div class="col-3">
            	<label for="productQuantity" class="form-label">Tax Amount</label>
            	<input type="text" disabled class="form-control" id="tax_amount" placeholder="">
        	</div>
			<div class="col-2">
            	<label for="productQuantity" class="form-label">Total Amount</label>
            	<input type="text" disabled class="form-control" id="total_amount" placeholder="Enter Quantity">
        	</div>
			<div class="col-1">
            <button class="btn btn-primary mt-4" type="button" id="saveOrder">ADD</button>
            </div>
			</div>
			<hr></hr>
			';
			}
			if($is_customise == 0){
				$html = ' 
				<input type="hidden" id="store_id" value="'.$this->session->userdata('logged_in_store_id').'">
				<input type="hidden" id="name" value="'.$this->input->post('name').'">
				<input type="hidden" id="number" value="'.$this->input->post('number').'">
				<input type="hidden" id="time" value="'.$this->input->post('time').'">
				<input type="hidden" id="address" value="'.$this->input->post('address').'">
				<input type="hidden" id="paymentMode" value="'.$this->input->post('paymentMode').'">
				<input type="hidden" id="tableId" value="'.$this->input->post('table_id').'">
				<input type="hidden" id="orderType" value="'.$this->input->post('orderType').'">
				<input type="hidden" id="product_id" value="'.$this->input->post('product_id').'">
				<input type="hidden" id="ratenew">
				<input type="hidden" id="taxnew">
				<input type="hidden" id="taxamtnew">
				<input type="hidden" id="totalnew">
				<input type="hidden" id="qty">
			<div class="row">
			<div class="col-3">
            	<label for="productQuantity" class="form-label">Quantity</label>
            	<input type="text" class="form-control" name="product_quantity" id="productQuantityNotCustomize" placeholder="Enter Quantity">
        	</div>
			<div class="col-3">
            	<label for="productQuantity" class="form-label">Rate</label>
            	<input type="text" disabled class="form-control" id="rate1">
        	</div>
			<div class="col-3">
            	<label for="productQuantity" class="form-label">Tax Amount</label>
            	<input type="text" disabled class="form-control" id="tax_amount1" placeholder="">
        	</div>
			<div class="col-2">
            	<label for="productQuantity" class="form-label">Amount</label>
            	<input type="text" disabled class="form-control" id="total_amount1" placeholder="Enter Quantity">
        	</div>
			<div class="col-1">
            <button class="btn btn-primary mt-4" type="button" id="saveOrder">ADD</button>
            </div>
			</div>
			
			<hr></hr>
			';
			}

			

			$html .= '<script>
    		$(document).on("keyup", "#productQuantity", function() {
				$.ajax({
					url: "' . base_url('owner/order/getProductRates') . '",
					type: "POST",
					data: { store_id: $("#store_id").val(),product_id: $("#product_id").val(),variant_id:$("#variant_id").val(),qty:$("#productQuantity").val() },
					dataType: "json",
					success: function (response) {
					console.log(response);
						$("#rate").val(response.rate);
						$("#qty").val($("#productQuantity").val());
						$("#tax_amount").val(response.tax_amount);
						$("#total_amount").val(response.total_amount);
						$("#ratenew").val(response.rate);
						$("#taxnew").val(response.tax);
						$("#taxamtnew").val(response.tax_amount);
						$("#totalnew").val(response.total_amount);
						$("#variantnew_id").val(response.variant_id);
					},
				});
			});

			$(document).on("keyup", "#productQuantityNotCustomize", function() {
				$.ajax({
					url: "' . base_url('owner/order/getProductRatesNotCustomize') . '",
					type: "POST",
					data: { store_id: $("#store_id").val(),product_id: $("#product_id").val(),qty:$("#productQuantityNotCustomize").val() },
					dataType: "json",
					success: function (response) {
						$("#rate1").val(response.rate);
						$("#qty").val($("#productQuantityNotCustomize").val());
						$("#tax_amount1").val(response.tax_amount);
						$("#total_amount1").val(response.total_amount);
						$("#ratenew").val(response.rate);
						$("#taxnew").val(response.tax);
						$("#taxamtnew").val(response.tax_amount);
						$("#totalnew").val(response.total_amount);
					},
				});
			});

			$(document).off("click", "#saveOrder").on("click", "#saveOrder", function () {
				$.ajax({
					url: "' . base_url('owner/order/SaveNewDeliveryOrder') . '",
					type: "POST",
					data: { 
						order_id: window.parent.$("#order_number").val(),
						tableID: $("#tableId").val(),
						orderType: $("#orderType").val(),
						store_id: $("#store_id").val(),
						product_id: $("#product_id").val(),
						name: $("#name").val(),
						number: $("#number").val(),
						time: $("#time").val(),
						address: $("#address").val(),
						paymentMode: $("#paymentMode").val(),
						qty:$("#qty").val(),
						rate:$("#ratenew").val(),
						tax:$("#taxnew").val(),
						tax_amount:$("#taxamtnew").val(),
						total_amount:$("#totalnew").val(),
						variant_id : $("#variantnew_id").val()
					},
					dataType: "html",
					success: function (response) {
					      $("#order_display").html(response);  
					},
				});
			});

			
			$(document).off("click", ".delete-order").on("click", ".delete-order", function () {
            	var orderId = $(this).data("id");
    			var rowId = "#order-row-" + orderId;
				 if (confirm("Are you sure you want to delete this order?")) {
					$.ajax({
						url: "' . base_url('owner/order/deleteOrderItem') . '",
						type: "POST",
						data: { orderId: orderId },
						dataType: "html",
						success: function (response) {
							var result = JSON.parse(response);
							if (result.success) {
								$(rowId).remove(); 
								alert("Order deleted successfully!");
							}
						},
                })
				}
        	});

			$(document).on("click", "#saveConfirmOrder", function() {
				$.ajax({
					url: "' . base_url('owner/order/SaveConfirmOrder') . '",
					type: "POST",
					data: { 
						order_id: $("#order_number").val()
					},
					dataType: "json",
					success: function (response) {
						if(response.status == "success") {
							const date = new Date();
							const day = String(date.getDate()).padStart(2, "0"); 
							const month = String(date.getMonth() + 1).padStart(2, "0"); 
							const year = String(date.getFullYear()).slice(-2); 
							const fullOrderNumber = response.orderno + day + month + year;
							window.parent.$("#order_number").val(fullOrderNumber);
							location.reload();                 
						}
						
					},
				})
			});
			</script>';
			
			echo $html;
		}



		public function getProductRatesWithIsCustomizeExistingOrder(){
			$is_customise = $this->Ordermodel->checkCustomizable($this->input->post('product_id'));
			//echo $this->input->post('product_id');echo $this->session->userdata('logged_in_store_id');exit;
		
			$html = '';
			if($is_customise == 1){
				$variantsList = $this->Ordermodel->getVariants($this->input->post('product_id'),$this->session->userdata('logged_in_store_id'));
				$html .= '<div class="col">
				<input type="hidden" id="store_id" value="'.$this->session->userdata('logged_in_store_id').'">
				<input type="hidden" id="product_id" value="'.$this->input->post('product_id').'">
				<input type="hidden" id="ratenew" value="">
				<input type="hidden" id="taxnew" value="">
				<input type="hidden" id="taxamtnew" value="">
				<input type="hidden" id="totalnew" value="">
				<input type="hidden" id="qty" value="">
				<input type="hidden" id="variantnew_id" value="">
				
            <label for="productId" class="form-label">Variant</label>
            <select class="form-select" name="variant_id" id="variant_id">'; // Default placeholder option
				foreach ($variantsList as $variant1) {
    				$html .= '<option value="' . htmlspecialchars($variant1['variant_id']) . '">' . htmlspecialchars($variant1['variant_name']) . '</option>';
				}

				$html .= '</select>
        	</div>
			<div class="col">
            	<label for="productQuantity" class="form-label">Quantity</label>
            	<input type="text" class="form-control" name="product_quantity" id="productQuantity" placeholder="Enter Quantity">
        	</div>
			<div class="col">
            	<label for="productQuantity" class="form-label">Rate</label>
            	<input type="text" class="form-control" id="rate">
        	</div>
			<div class="col">
            	<label for="productQuantity" class="form-label">Tax Amount</label>
            	<input type="text" class="form-control" id="tax_amount" placeholder="">
        	</div>
			<div class="col">
            	<label for="productQuantity" class="form-label">Total Amount</label>
            	<input type="text" class="form-control" id="total_amount" placeholder="Enter Quantity">
        	</div>
			<div class="row mt-2">
            <button class="btn btn-primary" type="button" id="saveOrder">Save</button>
            </div>';
			}
			if($is_customise == 0){
				$html = ' 
				<input type="hidden" id="store_id" value="'.$this->session->userdata('logged_in_store_id').'">
				<input type="hidden" id="product_id" value="'.$this->input->post('product_id').'">
				<input type="hidden" id="ratenew" value="1">
				<input type="hidden" id="taxnew" value="2">
				<input type="hidden" id="taxamtnew" value="2">
				<input type="hidden" id="totalnew" value="3">
				<input type="hidden" id="qty" value="3">
				<div class="col">
            	<label for="productQuantity" class="form-label">Quantity</label>
            	<input type="text" class="form-control" name="product_quantity" id="productQuantityNotCustomize" placeholder="Enter Quantity">
        	</div>
			<div class="col">
            	<label for="productQuantity" class="form-label">Rate</label>
            	<input type="text" class="form-control" id="rate1">
        	</div>
			<div class="col">
            	<label for="productQuantity" class="form-label">Tax Amount</label>
            	<input type="text" class="form-control" id="tax_amount1" placeholder="">
        	</div>
			<div class="col">
            	<label for="productQuantity" class="form-label">Total Amount</label>
            	<input type="text" class="form-control" id="total_amount1" placeholder="Enter Quantity">
        	</div>
			<div class="row mt-2">
            <button class="btn btn-primary" type="button" id="saveOrder">Save</button>
            </div>';
			}

			

			$html .= '<script>
    		$(document).on("keyup", "#productQuantity", function() {
				$.ajax({
					url: "' . base_url('owner/order/getProductRates') . '",
					type: "POST",
					data: { store_id: $("#store_id").val(),product_id: $("#product_id").val(),variant_id:$("#variant_id").val(),qty:$("#productQuantity").val() },
					dataType: "json",
					success: function (response) {
						$("#rate").val(response.rate);
						$("#qty").val($("#productQuantity").val());
						$("#tax_amount").val(response.tax_amount);
						$("#total_amount").val(response.total_amount);
						$("#ratenew").val(response.rate);
						$("#taxnew").val(response.tax);
						$("#taxamtnew").val(response.tax_amount);
						$("#totalnew").val(response.total_amount);
						$("#variantnew_id").val(response.variant_id);
					},
				});
			});

			$(document).on("keyup", "#productQuantityNotCustomize", function() {
				$.ajax({
					url: "' . base_url('owner/order/getProductRatesNotCustomize') . '",
					type: "POST",
					data: { store_id: $("#store_id").val(),product_id: $("#product_id").val(),qty:$("#productQuantityNotCustomize").val() },
					dataType: "json",
					success: function (response) {
						$("#rate1").val(response.rate);
						$("#qty").val($("#productQuantityNotCustomize").val());
						$("#tax_amount1").val(response.tax_amount);
						$("#total_amount1").val(response.total_amount);
						$("#ratenew").val(response.rate);
						$("#taxnew").val(response.tax);
						$("#taxamtnew").val(response.tax_amount);
						$("#totalnew").val(response.total_amount);
					},
				});
			});

			$(document).on("click", "#saveOrder", function() {
				$.ajax({
					url: "' . base_url('owner/order/SaveOrderWIthExisting') . '",
					type: "POST",
					data: { 
						order_id: $("#order_id").val(),
						store_id: $("#store_id").val(),
						product_id: $("#product_id").val(),
						qty:$("#qty").val(),
						rate:$("#ratenew").val(),
						tax:$("#taxnew").val(),
						tax_amount:$("#taxamtnew").val(),
						total_amount:$("#totalnew").val(),
						variant_id : $("#variantnew_id").val()
					},
					dataType: "json",
					success: function (response) {
						if(response.status == "success") {
							window.parent.$("#recipe1").modal("hide");
							$.ajax({
								url: "' . base_url('owner/order/getPendingOrdersByTableID') . '",
								data: { table_id : response.table_id },	
								type: "POST",
								dataType: "html",
								success: function (data) {
								console.log(data);
									window.parent.$("#orders-container").html(data);
								}
							});
						}
						else
						{
						alert(response.message);
						}
					},
				});
			});
			</script>';
			
			echo $html;
		}







}