<?php
class Ordermodel extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function getProductName($product_id) {
        $this->db->select('product_id');
	    $this->db->from('store_wise_product_assign');
		$this->db->where('store_product_id ', $product_id);
		$query = $this->db->get();
        $result = $query->result_array();
        $product_id1 = $result[0]['product_id'];
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_id', $product_id1);
        $product_query = $this->db->get();
        $row =  $product_query->result_array();
        return $row[0]['product_name_en'];
    }
    
    public function getPendingTableOrderCount($table_id){
        $this->db->from('order'); // Specify the table
        $this->db->where('is_paid', 0);
        $this->db->where('store_id',$this->session->userdata('logged_in_store_id'));
        $this->db->where('table_id',$table_id);
        return $this->db->count_all_results();
    }

    public function getOrderTableId($order_id){
        $this->db->select('table_id');
	    $this->db->from('order');
		$this->db->where('orderno ', $order_id);
		$query = $this->db->get();
        $row = $query->row();
        return $row->table_id;
    }
    public function getPendingTableOrderCooking($table_id){
        $this->db->from('order'); // Specify the table
        $this->db->where('is_paid', 0);
        $this->db->where('store_id',$this->session->userdata('logged_in_store_id'));
        $this->db->where('table_id',$table_id);
        $this->db->where('order_status',1);
        return $this->db->count_all_results();
    }

    public function getVariantName($variant_id){
        $this->db->select('*');
	    $this->db->from('variants');
		$this->db->where('variant_id ', $variant_id);
		$query = $this->db->get();
        //echo $this->db->last_query();exit;
        $result = $query->result_array();
        if(!empty($result)){
            return $code = $result[0]['code'];
        }else{
            return '';
        }
    }

    public function get_store_wise_product_by_id($product_id) {
        $this->db->where('store_product_id', $product_id);
        $query = $this->db->get('store_wise_product_assign');
        return $query->result_array();
    }

    public function getCurrentStock($product_id,$date,$store_id) {
        $this->db->select('(SUM(pu_qty) - SUM(sl_qty)) as bal_qty');
        $this->db->from('store_stock');
        $this->db->where('product_id', $product_id);
        $this->db->where('tr_date', $date);
        $this->db->where('store_id', $store_id);
        $query = $this->db->get();
        $result = $query->result_array(); 
        return $result[0]['bal_qty'];
    }

    public function getProductCategoryName($product_id) {
        $this->db->select('category_id');
	    $this->db->from('store_wise_product_assign');
		$this->db->where('store_product_id ', $product_id);
		$query = $this->db->get();
        $result = $query->result_array();
        $product_id1 = $result[0]['category_id'];
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('category_id', $product_id1);
        $product_query = $this->db->get();
        $row =  $product_query->result_array();
        return $row[0]['category_name_en'];
    }

    public function getOrdersByType($store_id,$type) {
        $this->db->select('id,store_id,orderno, total_amount ,tax_amount,order_status,delivery_boy,customer_name,contact_number');
        $this->db->from('order'); 
        $this->db->where('store_id', $store_id);
        $this->db->where('order_type', $type); 
        $this->db->where('is_paid', 0);
        $this->db->order_by('id', 'DESC'); 
        $orderQuery = $this->db->get();
        //echo $this->db->last_query();exit;
        $orders = $orderQuery->result_array();
    
        $orderData = [];
    
        foreach ($orders as $order) {
            $this->db->select('id,orderno,rate,tax,tax_amount,is_addon,item_remarks,variant_id,total_amount,product_id,quantity,category_id');
            $this->db->from('order_items');
            $this->db->where('orderno', $order['orderno']);  // Ensure `orderno` exists in both tables and matches datatype
            $itemsQuery = $this->db->get();
            $items = $itemsQuery->result_array();
             $orderData[] = [
                'id' => $order['id'],
                'orderno' => $order['orderno'],
                'total_amount' => $order['total_amount'],
                'tax_amount' => $order['tax_amount'],
                'order_status' => $order['order_status'],
                'delivery_boy' => $order['delivery_boy'],
                'customer_name' => $order['customer_name'],
                'contact_number' => $order['contact_number'],
                'items' => $items
            ];  
        }
        return $orderData;
    }

    public function getOrderItems($orderno){
            $this->db->select('id,orderno,rate,tax,tax_amount,is_addon,item_remarks,variant_id,total_amount,product_id,quantity');
            $this->db->from('order_items');
            $this->db->where('orderno', $orderno);  // Ensure `orderno` exists in both tables and matches datatype
            $itemsQuery1 = $this->db->get();
            return $items = $itemsQuery1->result_array();

    }

    public function getOrderSummary($orderno){
        $this->db->select('id,store_id,tax,orderno, amount ,total_amount,tax_amount');
        $this->db->from('order'); 
        $this->db->where('orderno', $orderno);
        $itemsQuery = $this->db->get();
        return $order = $itemsQuery->row();
    }

    public function getPendingOrdersByTableId($store_id,$table_id) {
        $this->db->select('id,store_id,orderno, total_amount ,tax_amount,order_status');
        $this->db->from('order'); 
        $this->db->where('store_id', $store_id);
        $this->db->where('order_type', 'D'); 
        $this->db->where('table_id', $table_id);
        $this->db->where('is_paid', 0); 
        $this->db->order_by('id', 'DESC'); 
        $orderQuery = $this->db->get();
        //echo $this->db->last_query();exit;
        $orders = $orderQuery->result_array();
    
        $orderData = [];
    
        foreach ($orders as $order) {
            $this->db->select('id,orderno,rate,tax,tax_amount,is_addon,item_remarks,variant_id,total_amount,product_id,quantity,is_reorder');
            $this->db->from('order_items');
            $this->db->where('orderno', $order['orderno']);  // Ensure `orderno` exists in both tables and matches datatype
            $itemsQuery = $this->db->get();
            $items = $itemsQuery->result_array();
             $orderData[] = [
                'id' => $order['id'],
                'orderno' => $order['orderno'],
                'total_amount' => $order['total_amount'],
                'tax_amount' => $order['tax_amount'],
                'order_status' => $order['order_status'],
                'items' => $items
            ];  
        }
        return $orderData;
    }

    public function isOrderExists($order_id)
    {
        $this->db->where('orderno', $order_id); 
        $query = $this->db->get('order'); 
        return $query->num_rows() > 0; 
    }
  

    public function getProductRatesDb($store_id,$product_id,$variant_id){
        $this->db->select('*');
        $this->db->from('store_variants');
        $this->db->where('store_product_id', $product_id);
        $this->db->where('store_id', $store_id);
        $this->db->where('variant_id', $variant_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getProductRatesNotCustomizeDb($store_id,$product_id){
        $this->db->select('*');
        $this->db->from('store_wise_product_assign');
        $this->db->where('store_product_id', $product_id);
        $this->db->where('store_id', $store_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function updateTotalAmount($orderNo){
        $this->db->select('SUM(total_amount) as total_amount, SUM(amount) as total_rate, SUM(tax_amount) as total_tax');
        $this->db->where('orderno', $orderNo);
        $query = $this->db->get('order_items');
        $result = $query->result_array();
        return $result;  // Access the sum of total_amount
    }

    public function updateTotalAmountFromItems($orderNo){
        $this->db->select('SUM(total_amount) as total_amount, SUM(amount) as total_rate, SUM(tax_amount) as total_tax');
        $this->db->where('orderno', $orderNo);
        $query = $this->db->get('order_items');
        $result = $query->result_array();
        return $result;  // Access the sum of total_amount
    }

    public function checkCustomizable($product_id){
        $this->db->select('is_customizable');
        $this->db->from('store_wise_product_assign');
        $this->db->where('store_product_id', $product_id);
        $query = $this->db->get();
        $result = $query->row();
        return $result->is_customizable;
    }
    public function getVariants($product_id,$store_id) {
        $this->db->select('v.*, sv.*');
        $this->db->from('store_variants sv');
        $this->db->join('variants v', 'v.variant_id = sv.variant_id');
        $this->db->where('sv.store_id', $store_id);
        $this->db->where('sv.store_product_id', $product_id);
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result_array();

    }
    
    public function getCompletedOrdersByType($date,$type) {
        $this->db->select('id,store_id,orderno, total_amount ,tax_amount,customer_name,contact_number');
        $this->db->from('order');
        $this->db->where('date', $date); 
        $this->db->where('store_id', $this->session->userdata('logged_in_store_id'));
        $this->db->where('order_type', $type); 
        $this->db->where('is_paid', 1); 
        $this->db->order_by('id', 'DESC'); 
        $orderQuery = $this->db->get();
        //echo $this->db->last_query();exit;
        $orders = $orderQuery->result_array();
    
        $orderData = [];
    
        foreach ($orders as $order) {
            $this->db->select('id,orderno,rate,tax,tax_amount,is_addon,item_remarks,variant_id,total_amount,product_id,quantity');
            $this->db->from('order_items');
            $this->db->where('orderno', $order['orderno']);  // Ensure `orderno` exists in both tables and matches datatype
            $itemsQuery = $this->db->get();
            $items = $itemsQuery->result_array();
             $orderData[] = [
                'id' => $order['id'],
                'orderno' => $order['orderno'],
                'total_amount' => $order['total_amount'],
                'tax_amount' => $order['tax_amount'],
                'customer_name' => $order['customer_name'],
                'contact_number' => $order['contact_number'],
                'items' => $items
            ];  
        }
        return $orderData;
    }

    public function getPaidOrderByDate($date,$tableId) {
        $this->db->select('id,store_id,orderno, total_amount ,tax_amount');
        $this->db->from('order');
        $this->db->where('date', $date); 
        $this->db->where('table_id', $tableId);
        $this->db->where('store_id', $this->session->userdata('logged_in_store_id'));
        $this->db->where('is_paid', 1); 
        $this->db->order_by('id', 'DESC'); 
        $orderQuery = $this->db->get();
        //echo $this->db->last_query();exit;
        $orders = $orderQuery->result_array();
    
        $orderData = [];
    
        foreach ($orders as $order) {
            $this->db->select('id,orderno,rate,tax,tax_amount,is_addon,item_remarks,variant_id,total_amount,product_id,quantity');
            $this->db->from('order_items');
            $this->db->where('orderno', $order['orderno']);  // Ensure `orderno` exists in both tables and matches datatype
            $itemsQuery = $this->db->get();
            $items = $itemsQuery->result_array();
             $orderData[] = [
                'id' => $order['id'],
                'orderno' => $order['orderno'],
                'total_amount' => $order['total_amount'],
                'tax_amount' => $order['tax_amount'],
                'items' => $items
            ];  
        }
        return $orderData;
    }

    public function getUnPaidOrderByDate($date,$tableId) {
        $this->db->select('id,store_id,orderno, total_amount , tax_amount');
        $this->db->from('order');
        $this->db->where('date', $date); 
        $this->db->where('table_id', $tableId);
        $this->db->where('store_id', $this->session->userdata('logged_in_store_id')); 
        $this->db->where('is_paid', 0); 
        $this->db->order_by('id', 'DESC'); 
        $orderQuery = $this->db->get();
        //echo $this->db->last_query();exit;
        $orders = $orderQuery->result_array();
    
        $orderData = [];
    
        foreach ($orders as $order) {
            $this->db->select('id,orderno,rate,tax,tax_amount,item_remarks,variant_id,is_addon,total_amount,product_id,quantity');
            $this->db->from('order_items');
            $this->db->where('orderno', $order['orderno']);  // Ensure `orderno` exists in both tables and matches datatype
            $itemsQuery = $this->db->get();
            $items = $itemsQuery->result_array();
             $orderData[] = [
                'id' => $order['id'],
                'orderno' => $order['orderno'],
                'total_amount' => $order['total_amount'],
                'tax_amount' => $order['tax_amount'],
                'items' => $items
            ];  
        }
        return $orderData;
    }
    public function changeOrderStatus($orderId,$status){
        //echo $orderId;echo $status;exit;
            $this->db->set('order_status', $status);
            $this->db->where('orderno', $orderId);
            $this->db->update('order');
    }
    public function changeDeliveryBoy($orderId,$delivery_boy){
            $this->db->set('delivery_boy', $delivery_boy);
            $this->db->set('out_for_delivery_time', date('H:i:s'));
            $this->db->where('orderno', $orderId);
            $this->db->update('order');
    }

    public function CheckOrderApprove($order_sl, $store_id, $order_id, $product_id, $quantity, $rate, $tax_amount, $total_amount, $category_id)
{
    //echo "here";exit;
    // Update order item details
    $this->db->set('quantity', $quantity);
    $this->db->set('rate', $rate);
    $this->db->set('tax_amount', $tax_amount);
    $this->db->set('total_amount', $total_amount);
    $this->db->where('id', $order_sl);
    $this->db->where('store_id', $store_id);
    $this->db->where('orderno', $order_id);
    $this->db->where('product_id', $product_id);
    $this->db->update('order_items');

    // Recalculate total order amount and tax
    $this->db->select('sum(total_amount) as total_amount, sum(tax_amount) as tax_amount');
    $this->db->from('order_items');
    $this->db->where('store_id', $store_id);
    $this->db->where('orderno', $order_id);
    $query = $this->db->get();
    $result = $query->result_array();

    $total_amount = $result[0]['total_amount'];
    $tax_amount = $result[0]['tax_amount'];
    
    $this->db->set('total_amount', $total_amount);
    $this->db->set('tax_amount', $tax_amount);
    $this->db->set('order_status', 1); // Changed to cooking status
    $this->db->where('store_id', $store_id);
    $this->db->where('orderno', $order_id);
    $this->db->update('order');

    $is_combo = $this->productIsCombo($product_id);
    if ($is_combo) 
    {
            $combo_items = $this->getComboItems($store_id,$product_id);
            foreach ($combo_items as $item) {
                $combo_product_id = $item['item_id'];
                $combo_quantity = $item['quantity'] * $quantity; // Adjust quantity based on the combo quantity

                // Deduct stock for combo items
                $this->db->delete('store_stock', array('ttype' => 'SL', 'store_id' => $store_id, 'order_id' => $order_id, 'product_id' => $combo_product_id, 'tr_date' => date('Y-m-d')));
                $this->db->insert('store_stock', array(
                    'ttype' => 'SL',
                    'store_id' => $store_id,
                    'tr_date' => date('Y-m-d'),
                    'order_id' => $order_id,
                    'product_id' => $combo_product_id,
                    'pu_qty' => 0,
                    'sl_qty' => $combo_quantity,
                    'created_by' => 1,
                    'created_date' => date('Y-m-d H:i:s'),
                    'modified_by' => 1,
                    'modified_date' => date('Y-m-d H:i:s')
                ));
            }
    }
    else
    {
        //echo "delete";exit;
            // Delete previous stock record for the order
            $this->db->delete('store_stock', array('ttype' => 'SL', 'store_id' => $store_id, 'order_id' => $order_id, 'product_id' => $product_id, 'tr_date' => date('Y-m-d')));
            // Insert new stock record for the order
            $this->db->insert('store_stock', array(
                'ttype' => 'SL',
                'store_id' => $store_id,
                'tr_date' => date('Y-m-d'),
                'order_id' => $order_id,
                'product_id' => $product_id,
                'pu_qty' => 0,
                'sl_qty' => $quantity,
                'created_by' => 1,
                'created_date' => date('Y-m-d H:i:s'),
                'modified_by' => 1,
                'modified_date' => date('Y-m-d H:i:s')
            ));
    }

    // // Check if current stock is zero, if so deactivate the product
    // $stock = $this->getCurrentStock($product_id, date('Y-m-d'), $store_id);
    // if ($stock == 0) {
    //     $this->db->set('is_active', 1);
    //     $this->db->where('store_id', $store_id);
    //     $this->db->where('store_product_id', $product_id);
    //     $this->db->update('store_wise_product_assign');
    // }
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


    // public function CheckOrderApprove($order_sl,$store_id,$order_id,$product_id,$quantity,$rate,$tax_amount,$total_amount,$category_id){

    //         $this->db->set('quantity', $quantity);
    //         $this->db->set('rate', $rate);
    //         $this->db->set('tax_amount', $tax_amount);
    //         $this->db->set('total_amount', $total_amount);
    //         $this->db->where('id', $order_sl);
    //         $this->db->where('store_id', $store_id);
    //         $this->db->where('orderno', $order_id);
    //         $this->db->where('product_id', $product_id);
    //         $this->db->update('order_items');

    //         $this->db->select('sum(total_amount) as total_amount, sum(tax_amount) as tax_amount');
    //         $this->db->from('order_items');
    //         $this->db->where('store_id', $store_id);
    //         $this->db->where('orderno', $order_id);
    //         $query = $this->db->get();
    //         $result = $query->result_array();

    //         $total_amount = $result[0]['total_amount'];
    //         $tax_amount = $result[0]['tax_amount'];
    //         $this->db->set('total_amount', $total_amount);
    //         $this->db->set('tax_amount', $tax_amount);
    //         $this->db->set('order_status', 1 ); //Changed to cooking status
    //         $this->db->where('store_id', $store_id);
    //         $this->db->where('orderno', $order_id);
    //         $this->db->update('order');

            

    //         $this->db->delete('store_stock', array('ttype' => 'SL','store_id' => $store_id, 'order_id' => $order_id, 'product_id' => $product_id , 'tr_date' => date('Y-m-d')));
    //         $this->db->insert('store_stock', array( 'ttype' => 'SL','store_id' => $store_id,'tr_date' => date('Y-m-d'), 'order_id' => $order_id, 'product_id' => $product_id, 'pu_qty' => 0 , 'sl_qty' => $quantity , 'created_by' => 1 , 'created_date' => date('Y-m-d H:i:s') , 'modified_by' => 1 , 'modified_date' => date('Y-m-d H:i:s')));
    //         $stock = $this->getCurrentStock($product_id,date('Y-m-d'),$store_id);
    //         if($stock == 0)
    //         {
    //             $this->db->set('is_active', 1);
    //             $this->db->where('store_id', $store_id);
    //             $this->db->where('store_product_id', $product_id);
    //             $this->db->update('store_wise_product_assign');
    //         }
    // }

    public function getDeliveryBoyName($user_id){
        $this->db->select('Name');
        $this->db->from('users');
        $this->db->where('userid', $user_id);
        $query = $this->db->get();
        $result = $query->row();
        return $result->Name ?? '';

    }
    public function getCustomizeProductDefaultPrice($store_product_id,$store_id){
        $this->db->select('rate');
          $this->db->from('store_variants');
          $this->db->where('store_product_id', $store_product_id);
          $this->db->where('store_id', $store_id);
          $this->db->where('is_default', 1);
          $query = $this->db->get();
          $result = $query->row();
          if(empty($result->rate)){
            echo 0;
          }else{
          echo $result->rate;
          }
      }

    public function CheckOrderPaid($store_id,$order_id){
        $this->db->set('is_paid', 1);//changed to paid
        $this->db->set('order_status', 4);//changed to delivered
        $this->db->set('delivered_time',date('H:i:s'));
        $this->db->set('modified_by', 1);
        $this->db->set('modified_date', date('Y-m-d H:i:s'));
        $this->db->where('store_id', $store_id);
        $this->db->where('orderno', $order_id);
        $this->db->update('order');

        $this->db->set('is_paid', 1);
        $this->db->where('store_id', $store_id);
        $this->db->where('orderno', $order_id);
        $this->db->update('order_items');
    }

    public function getPickupOrderDetails($orderId){
        $this->db->select('*');
        $this->db->from('order_items');
        $this->db->where('orderno', $orderId);
        $this->db->where('store_id', $this->session->userdata('logged_in_store_id'));
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        $result = $query->result_array();
        return $result;
    }

    public function updateOrderNo(){
        
        $this->db->select('token_id');
	    $this->db->from('token_generation');
		$this->db->where('id ', 1);
		$query = $this->db->get();
        $result = $query->result_array();
        $token_id = $result[0]['token_id'];
        
        $newOrderNumber = $token_id + 1;
        $this->db->set('token_id', $newOrderNumber);
        $this->db->where('id', 1);
        $this->db->update('token_generation');

        $this->db->select('token_id');
	    $this->db->from('token_generation');
		$this->db->where('id ', 1);
		$query = $this->db->get();
        $result = $query->result_array();
        return $token_id = $result[0]['token_id'];
    }
    public function SaveReciepe($data) {
        $this->db->insert('cookings', $data);
        return $this->db->insert_id();
    }
    public function deleteOrderItem($orderItemId) {
        // Retrieve the order number associated with the item
        $this->db->select('orderno');
        $this->db->from('order_items');
        $this->db->where('id', $orderItemId);
        $query = $this->db->get();
        $result = $query->row();
    
        if ($result) {
            $orderNumber = $result->orderno;
    
            $this->db->where('id', $orderItemId);
            $this->db->delete('order_items');
    
            // Check if there are any remaining items for this order
            $this->db->where('orderno', $orderNumber);
            $remainingItems = $this->db->count_all_results('order_items');
    
            // If no items remain, delete the order
            if ($remainingItems == 0) {
                $this->db->where('orderno', $orderNumber);
                $this->db->delete('order');
            }

            $this->db->select('sum(total_amount) as total_amount, sum(tax_amount) as tax_amount');
            $this->db->from('order_items');
            $this->db->where('store_id', 41);
            $this->db->where('orderno', $orderNumber);
            $query = $this->db->get();
            $result = $query->result_array();
            //print_r($result);exit;

            $total_amount = $result[0]['total_amount'];
            $tax_amount = $result[0]['tax_amount'];
            $this->db->set('total_amount', $total_amount);
            $this->db->set('tax_amount', $tax_amount);
            $this->db->where('store_id', 41);
            $this->db->where('orderno', $orderNumber);
            $this->db->update('order');
        }
        return true;
    }
    

    public function getComboItems($store_id,$productId) {      
        $this->db->select('*'); // Fetch all columns
        $this->db->from('combo_items'); // Specify the table
        $this->db->where('product_id', $productId); // Filter by product_id
        $this->db->where('store_id', $store_id); // Filter by store_id
        $query = $this->db->get(); // Execute the query
       // echo $this->db->last_query();exit;
        return $query->result_array(); // Return the result as an array
        
    }
    

    public function getActiveTablesByStoreId($store_id){
		$this->db->select('*');
		$this->db->from('store_table');
		$this->db->where('store_id',$store_id );
        $this->db->where('is_reserved', 0 );
        $this->db->where('is_active', 1 );
		$this->db->order_by("table_id", "desc");
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}

    public function setTableReserved($tableId,$isReserved){
        $this->db->set('is_reserved', $isReserved);
        $this->db->where('table_id', $tableId);
        $this->db->where('store_id', $this->session->userdata('logged_in_store_id'));
        $this->db->update('store_table');
    }

    public function AddHoliday($data) {
        $this->db->insert('holidays', $data);
        return $this->db->insert_id();
    }
    public function GetHolidaysByStoreId($store_id) {
        $this->db->select('*');
        $this->db->from('holidays');
        $this->db->where('store_id', $store_id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function Delete_Holiday($id) {
        $this->db->where('id', $id);
        return $this->db->delete('holidays');  
    }
    public function getSalesReportByStoreId($store_id, $date) {
        $this->db->select('DATE(date) as sale_date, 
        SUM(CASE WHEN order_type = "D" THEN 1 ELSE 0 END) as dinein_count,
        SUM(CASE WHEN order_type = "DL" THEN 1 ELSE 0 END) as delivery_count,
        SUM(CASE WHEN order_type = "PK" THEN 1 ELSE 0 END) as pickup_count,
        SUM(CASE WHEN order_type = "D" THEN total_amount ELSE 0 END) as dinein_total_amount,
        SUM(CASE WHEN order_type = "DL" THEN total_amount ELSE 0 END) as delivery_total_amount,
        SUM(CASE WHEN order_type = "PK" THEN total_amount ELSE 0 END) as pickup_total_amount,
        COUNT(*) as total_sales,
        SUM(total_amount) as total_amount'); // Total amount for all orders
$this->db->from('order');
$this->db->where('store_id', $store_id); // Filter by store ID
$this->db->where('DATE(date)', $date);  // Filter by specific date
$this->db->where('is_paid', 1);
$this->db->group_by('DATE(date)');
$this->db->order_by('sale_date', 'DESC');

$query = $this->db->get();

        //echo $this->db->last_query();exit;
        return $query->result_array();
    }
    public function getDeliveryReportByStoreId($store_id, $date) {
        $this->db->select("
            orderno,
            customer_name,
            contact_number,
            location,
            payment_mode,
            total_amount,
            CASE
                WHEN order_status = 0 THEN 'Pending'
                WHEN order_status = 1 THEN 'Cooking'
                WHEN order_status = 2 THEN 'Ready'
                WHEN order_status = 3 THEN 'Out for Delivery'
                WHEN order_status = 4 THEN 'Delivered'
                ELSE 'Unknown'
            END AS order_status,
            out_for_delivery_time,
            delivered_time,
            delivery_boy
        ");
        $this->db->from('order');
        $this->db->where('store_id', $store_id);
        $this->db->where('date', $date);
        $this->db->where('order_type', 'DL');
        $query = $this->db->get();
        return $query->result_array();
    }
    
public function getUserReportByStoreId($store_id , $date){
    $this->db->select('uli.*, users.Name'); // Select user login/logout fields and user name
    $this->db->from('user_login_logout as uli'); // Alias for user_login_logout table
    $this->db->join('users', 'users.userid = uli.user_id'); // Use alias 'uli'
    $this->db->where('uli.store_id', $store_id);
    $this->db->where('uli.date', $date); 
    // Execute the query
    $query = $this->db->get();
    return $query->result_array();
}

public function getDeliveryBoysByStoreID($store_id){
    $this->db->select('userid,Name');
    $this->db->from('users');
    $this->db->where('store_id', $store_id);
    $this->db->where('userroleid', 4);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
}

public function getStoreTimings($store_id) {
    $this->db->select('store_id, store_opening_time, store_closing_time,today_opening_time,today_closing_time');
    $this->db->from('store');
    $this->db->where('store_id', $store_id);
    $query = $this->db->get();
    $result = $query->row();
    return $result;
  }
  public function EditStoreTime($data,$store_id) {
    $this->db->where('store_id', $store_id);
    $this->db->update('store', $data);
    return $this->db->affected_rows() > 0;
  }
  public function AddUser($data) {
    $this->db->insert('users', $data);
    return $this->db->insert_id();
  }
  public function EditUserList($data,$user_id) {
    $this->db->where('userid', $user_id);
    $this->db->update('users', $data);
    return $this->db->affected_rows() > 0;
  }
  public function DeleteUser($id){
    $this->db->where('userid ', $id);
    return $this->db->delete('users');
}
public function ChangePassword($data,$user_id) {
    $this->db->where('userid', $user_id);
    $this->db->update('users', $data);
    return $this->db->affected_rows() > 0;
  }
  public function SaveAvialableTime($store_product_id,$store_id,$data) {
    $this->db->where('store_product_id', $store_product_id);
        $this->db->where('store_id', $store_id);
        $this->db->update('store_wise_product_assign', $data);
        return $this->db->affected_rows() > 0;

}
}

?>