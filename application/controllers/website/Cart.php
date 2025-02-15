<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('website/Productmodel');
    }

    // Display products
    public function index() {
        $data['products'] = $this->Productmodel->get_products();
        //print_r($data['products']);exit;
        $this->load->view('website/header');
        $this->load->view('website/cart', $data);  // Load the product listing view
        $this->load->view('website/footer');
    }

    // Add to cart
    public function add() {
        $product_id = $this->input->post('product_id');
        $product = $this->Productmodel->get_product_by_id($product_id);

        $data = array(
            'id'      => $product->product_id,
            'qty'     => 1,
            'price'   => $product->price,
            //'name'    => mb_substr( $product->title , 0, 50, 'UTF-8')
            'name'    => 'name'
        );

        //print_r($data);exit;

        $this->cart->insert($data);  // Add product to cart

        //print_r($this->cart->contents());exit;
        redirect('website/cart');  // Redirect to view cart
    }

    // View cart
    public function view() {
        $this->load->view('website/header');
        $this->load->view('website/cart');  // Load the view to show cart items
        $this->load->view('website/footer');
    }

    // Update cart item quantity
    public function update() {
        $data = array(
            'rowid' => $this->input->post('rowid'),
            'qty'   => $this->input->post('qty')
        );

        $this->cart->update($data);
        redirect('website/cart');
    }

    public function remove($rowid)
    {
        // Update the cart by setting the quantity to 0 for the item you want to remove
        $data = array(
            'rowid' => $rowid,
            'qty'   => 0
        );
        
        // Update the cart
        $this->cart->update($data);

        // Optionally redirect or return a message
        redirect('website/cart');
    }


    // Checkout
    public function checkout() {
        // Here you can handle order placement, save to database, send email, etc.
        $this->cart->destroy();  // Clear the cart after checkout
        $this->load->view('website/header');
        $this->load->view('website/checkout_success');  // Show success page
        $this->load->view('website/footer');
    }
}
?>
