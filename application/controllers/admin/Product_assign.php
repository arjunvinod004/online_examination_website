<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_assign extends CI_Controller {

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
		$this->load->model('admin/Storemodel');
        $this->load->model('admin/Productmodel');
		require('Common.php');
		if (!$this->session->userdata('login_status')) {
			redirect(login);
		}
	}


	
	public function load_products_for_assign($store_id) {
        $data['store_id'] = $store_id;//exit; // Pass the store_id to the view
        $data['storeDet'] = $this->Storemodel->get($store_id);
        $data['store_name'] = $data['storeDet'][0]['store_name'];
        $data['categories']=$this->Productmodel->listcategories();
        $data['already_assigned_products_ids'] = $this->Productmodel->already_assigned_products_ids($store_id); //print_r($data['already_assigned_products_ids']);
        $data['products'] = $this->Productmodel->listproducts();
        $this->load->view('admin/catalog/store_assigned_products',$data);
    }
	

    public function update(){
        if(isset($_POST['update']))
        {
            $data['store_id']=$this->input->post('store_id_hidden'); //echo $id;die();
            $category_id=$this->input->post('category_id');
            $selected_items = $this->input->post('selected_items');//print_r($selected_items);
            $data['categories']=$this->Productmodel->listcategories();
            $data['already_assigned_products_ids'] = $this->Productmodel->already_assigned_products_ids($data['store_id']);
            $data['products'] = $this->Productmodel->listproducts();
            $this->Productmodel->delete_update_assigned_products($data['store_id'],$category_id,$selected_items);
            //$this->load->view('admin/catalog/store_assigned_products',$data);
            redirect('admin/product_assign/load_products_for_assign/'.$data['store_id']);
        }
        else
        {
            $data['store_id']=$this->input->post('store_id_hidden'); //echo $id;die();
            $category_id=$this->input->post('category_id');
            $data['categories']=$this->Productmodel->listcategories();
            $data['already_assigned_products_ids'] = $this->Productmodel->already_assigned_products_ids($data['store_id']);
            if($category_id != ''){
                $data['products'] = $this->Productmodel->listproducts_category_wise($category_id);
            }else{
                $data['products'] = $this->Productmodel->listproducts();
            }
            //redirect('admin/product_assign/load_products_for_assign/'.$data['store_id']);
            $this->load->view('admin/catalog/store_assigned_products',$data);
        }
    }
	

}
