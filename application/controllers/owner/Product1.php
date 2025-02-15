<?php
class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Productmodel');
        $this->load->model('admin/Variantmodel');
        $this->load->model('admin/Storemodel');
        $this->load->model('admin/Cookingmodel');
    }

    public function index()
	{
        $data['default_tax_rate']=$this->Productmodel->default_tax($this->session->userdata('logged_in_store_id')); //Find default tax from store session id
        $data['store_taxes']=$this->Productmodel->store_taxes($this->session->userdata('logged_in_store_id'));//print_r($data['store_taxes']);exit;
        $data['products']=$this->Productmodel->shopAssignedProducts();//print_r($data['products']);exit;
		$this->load->view('owner/includes/header');
		$this->load->view('owner/catalog/products',$data);
		$this->load->view('owner/includes/footer');
	}

    public function delete(){
	    $this->Productmodel->delete_category($this->input->post('id'));
		$this->session->set_flashdata('error','Category deleted successfully');
	}

    // Function to add a product with translations
    public function add() {
        $data['default_tax_rate']=$this->Productmodel->default_tax($this->session->userdata('logged_in_store_id')); //Find default tax from store session id
        $data['store_taxes']=$this->Productmodel->store_taxes($this->session->userdata('logged_in_store_id'));//print_r($data['store_taxes']);exit;
        if(isset($_POST['add']))
		{
            $data['categories']=$this->Productmodel->listcategories();
            $this->form_validation->set_error_delimiters('', ''); 
			$this->form_validation->set_rules('category_id', 'Category', 'required');
            $this->form_validation->set_rules('product_veg_nonveg', 'Veg/Non-Veg', 'required');
             $this->form_validation->set_rules('userfile', 'Image' );
            $this->form_validation->set_rules('image1', 'Image1');
            $this->form_validation->set_rules('image2', 'Image2');
            $this->form_validation->set_rules('image3', 'Image3');
            $this->form_validation->set_rules('image4', 'Image4');
            $this->form_validation->set_rules('product_name_ma', 'Malayalam', 'required');
            $this->form_validation->set_rules('product_name_en', 'English', 'required');
            $this->form_validation->set_rules('product_name_hi', 'Hindi', 'required');
            $this->form_validation->set_rules('product_name_ar', 'Arabic', 'required');
            $this->form_validation->set_rules('product_desc_ma', 'Malayalam', 'required');
            $this->form_validation->set_rules('product_desc_en', 'English', 'required');
            $this->form_validation->set_rules('product_desc_hi', 'Hindi', 'required');
            $this->form_validation->set_rules('product_desc_ar', 'Arabic', 'required');
            //$this->form_validation->set_rules('order', 'Order Index', 'required|callback_productorder_exists');
			
		
			if($this->form_validation->run() == FALSE) 
			{
				//echo "here";exit;
				$this->load->view('owner/includes/header');
			    $this->load->view('owner/catalog/add_product',$data); 
			    $this->load->view('owner/includes/footer');
			}
			else
			{
                if(!empty($_FILES['userfile']['name'])){
                    // $image_path = './uploads/product/' . $this->input->post('old_image');
                    // if(isset($image_path)){
                    //     	unlink($image_path);
                    // }
                    //echo "here";exit;
					$config['upload_path'] = './uploads/product/';
					$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
					$config['file_name'] = $_FILES['userfile']['name'];
					
					
					$this->load->library('upload',$config);
					$this->upload->initialize($config);
					
					if($this->upload->do_upload('userfile')){
                        //echo "uploaded";exit;
						$uploadData = $this->upload->data();
						$userfile = $uploadData['file_name'];
					}else{
                        //echo "here1";exit;
                        $error =  $this->upload->display_errors(); echo $error;
                        $this->load->view('owner/includes/header');
			            $this->load->view('owner/catalog/add_product',$error); 
			            $this->load->view('owner/includes/footer');
					}
				}else{
                    //echo "here2";exit;
					$userfile = '';
				}
				
				
				                if(!empty($_FILES['image1']['name'])){
                    $image_path = './uploads/product/' . $this->input->post('old_image1');
					// unlink($image_path);
                    //echo "here";exit;
					$config['upload_path'] = './uploads/product/';
					$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
					$config['file_name'] = $_FILES['image1']['name'];
                    // $config['file_name1'] = $_FILES['image1']['name'];
                    // $config['file_name2'] = $_FILES['image2']['name'];
                    // $config['file_name3'] = $_FILES['image3']['name'];
                    // $config['file_name4'] = $_FILES['image4']['name'];
					
					
					$this->load->library('upload',$config);
					$this->upload->initialize($config);
					
					if($this->upload->do_upload('image1')){
                        //echo "uploaded";exit;
						$uploadData = $this->upload->data();
						$image1 = $uploadData['file_name'];
					}else{
                        //echo "here1";exit;
                        $error =  $this->upload->display_errors(); echo $error;
                        $this->load->view('admin/includes/header');
			            $this->load->view('admin/catalog/add_product',$error); 
			            $this->load->view('admin/includes/footer');
					}
				}else{
                    //echo "here2";exit;
					$image1 = '';
				}

                      // image2

                      if(!empty($_FILES['image2']['name'])){
                        $image_path = './uploads/product/' . $this->input->post('old_image2');
                        // unlink($image_path);
                        //echo "here";exit;
                        $config['upload_path'] = './uploads/product/';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
                        $config['file_name'] = $_FILES['image2']['name'];
                        // print_r( $config['file_name'] ); exit;
                        // $config['file_name1'] = $_FILES['image1']['name'];
                        // $config['file_name2'] = $_FILES['image2']['name'];
                        // $config['file_name3'] = $_FILES['image3']['name'];
                        // $config['file_name4'] = $_FILES['image4']['name'];
                        
                        
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        
                        if($this->upload->do_upload('image2')){
                            //echo "uploaded";exit;
                            $uploadData = $this->upload->data();
                            $image2 = $uploadData['file_name'];
                        }else{
                            //echo "here1";exit;
                            $error =  $this->upload->display_errors(); echo $error;
                            $this->load->view('admin/includes/header');
                            $this->load->view('admin/catalog/add_product',$error); 
                            $this->load->view('admin/includes/footer');
                        }
                    }else{
                        //echo "here2";exit;
                        $image2 = '';
                    }



                    // image 3

                    if(!empty($_FILES['image3']['name'])){
                        $image_path = './uploads/product/' . $this->input->post('old_image3');
                        // unlink($image_path);
                        //echo "here";exit;
                        $config['upload_path'] = './uploads/product/';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
                        $config['file_name'] = $_FILES['image3']['name'];
                        // $config['file_name1'] = $_FILES['image1']['name'];
                        // $config['file_name2'] = $_FILES['image2']['name'];
                        // $config['file_name3'] = $_FILES['image3']['name'];
                        // $config['file_name4'] = $_FILES['image4']['name'];
                        
                        
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        
                        if($this->upload->do_upload('image3')){
                            //echo "uploaded";exit;
                            $uploadData = $this->upload->data();
                            $image3 = $uploadData['file_name'];
                        }else{
                            //echo "here1";exit;
                            $error =  $this->upload->display_errors(); echo $error;
                            $this->load->view('admin/includes/header');
                            $this->load->view('admin/catalog/add_product',$error); 
                            $this->load->view('admin/includes/footer');
                        }
                    }else{
                        //echo "here2";exit;
                        $image3 = '';
                    }
                     
                    // image 4

                    if(!empty($_FILES['image4']['name'])){
                        $image_path = './uploads/product/' . $this->input->post('old_image4');
                        // unlink($image_path);
                        //echo "here";exit;
                        $config['upload_path'] = './uploads/product/';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
                        $config['file_name'] = $_FILES['image4']['name'];
                        // $config['file_name1'] = $_FILES['image1']['name'];
                        // $config['file_name2'] = $_FILES['image2']['name'];
                        // $config['file_name3'] = $_FILES['image3']['name'];
                        // $config['file_name4'] = $_FILES['image4']['name'];
                        
                        
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        
                        if($this->upload->do_upload('image4')){
                            //echo "uploaded";exit;
                            $uploadData = $this->upload->data();
                            $image4 = $uploadData['file_name'];
                        }else{
                            //echo "here1";exit;
                            $error =  $this->upload->display_errors(); echo $error;
                            $this->load->view('admin/includes/header');
                            $this->load->view('admin/catalog/add_product',$error); 
                            $this->load->view('admin/includes/footer');
                        }
                    }else{
                        //echo "here2";exit;
                        $image4 = '';
                    }

				

                $data = array(
                    'category_id' => $this->input->post('category_id'),
                    'store_id' => $this->session->userdata('logged_in_store_id'), //If admin store id default 0 otherwise store id
                    'price' => $this->input->post('rate'),
                    'image' => $userfile,
                     'image1' => $image1,
                    'image2' => $image2,
                    'image3' => $image3,
                    'image4' => $image4,
                    'is_customizable' => $this->input->post('iscustomizable_hidden'),
                    'is_addon' => $this->input->post('isaddon_hidden'),
                    'product_veg_nonveg' => $this->input->post('product_veg_nonveg'),
                    'product_name_ma' => $this->input->post('product_name_ma'),
                    'product_name_en' => $this->input->post('product_name_en'),
                    'product_name_hi' => $this->input->post('product_name_hi'),
                    'product_name_ar' => $this->input->post('product_name_ar'),
                    'product_desc_ma' => $this->input->post('product_desc_ma'),
                    'product_desc_en' => $this->input->post('product_desc_en'),
                    'product_desc_hi' => $this->input->post('product_desc_hi'),
                    'product_desc_ar' => $this->input->post('product_desc_ar'),
                    'is_active' => 1
                );
            
                //print_r($data);exit;
                $last_insert_product_id = $this->Productmodel->insert_product_translation($data);//Return product id
                $vat_id = $this->Productmodel->get_store_vat_id($this->session->userdata('logged_in_store_id'));//exit;
                $datas = array(
                    'store_id' => $this->session->userdata('logged_in_store_id'),
                    'product_id' => $last_insert_product_id,
                    'vat_id' => $vat_id[0]['gst_or_tax'],
                    'type' => $this->input->post('product_veg_nonveg'),
                    'rate' => $this->input->post('rate'),
                    'tax' => $this->input->post('tax'),
                    'tax_amount' => $this->input->post('tax_amount'),
                    'total_amount' => $this->input->post('total_amount'),
                    'category_id' => $this->input->post('category_id'),
                    'image' => '',
                    'is_admin'	=> 0, //when added by admin thiw will 1
                    'date_created' => date('Y-m-d H:i:s'), // current date and time
                    'created_by' => $this->session->userdata('loginid'),
                    'date_modified' => date('Y-m-d H:i:s'),
                    'modified_by' => $this->session->userdata('loginid'),
                    'is_active' => 1
                );
                $this->Productmodel->insert_product_assign($datas);

            // Redirect or display success message
            redirect('owner/product');
        }
    }
    else
    {
        $data['categories']=$this->Productmodel->listcategories();
        $this->load->view('owner/includes/header');
        $this->load->view('owner/catalog/add_product',$data);
        $this->load->view('owner/includes/footer'); 
    }
}


public function edit(){
    $data['categories']=$this->Productmodel->listcategories();
    if(isset($_POST['edit']))
    {
        $id=$this->input->post('id'); //echo $id;die();
        $data['productDet']=$this->Productmodel->get_product_by_id($id);//print_r($data['categoryDet']);exit;
        $this->form_validation->set_error_delimiters('', ''); 
        $this->form_validation->set_rules('category_id', 'Category', 'required');
        $this->form_validation->set_rules('product_veg_nonveg', 'Veg/Non-Veg', 'required');
        // $this->form_validation->set_rules('userfile', 'Image', 'callback_validate_image_dimensions');
          $this->form_validation->set_rules('userfile', 'Image', );
            $this->form_validation->set_rules('image1', 'Image1');
            $this->form_validation->set_rules('image2', 'Image2');
            $this->form_validation->set_rules('image3', 'Image3');
            $this->form_validation->set_rules('image4', 'Image4');
        $this->form_validation->set_rules('product_name_ma', 'Malayalam', 'required');
            $this->form_validation->set_rules('product_name_en', 'English', 'required');
            $this->form_validation->set_rules('product_name_hi', 'Hindi', 'required');
            $this->form_validation->set_rules('product_name_ar', 'Arabic', 'required');
            $this->form_validation->set_rules('product_desc_ma', 'Malayalam', 'required');
            $this->form_validation->set_rules('product_desc_en', 'English', 'required');
            $this->form_validation->set_rules('product_desc_hi', 'Hindi', 'required');
            $this->form_validation->set_rules('product_desc_ar', 'Arabic', 'required');
        if ($this->form_validation->run() == FALSE) 
        {
            //echo "here";exit;
            $this->load->view('owner/includes/header');
            $this->load->view('owner/catalog/edit_product',$data); 
            $this->load->view('owner/includes/footer');
        }
        else
        {
            //echo "here";exit;
            if(!empty($_FILES['userfile']['name'])){
                $image_path = './uploads/product/' . $this->input->post('old_image');
				unlink($image_path);
                $config['upload_path'] = './uploads/product/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
                $config['file_name'] = $_FILES['userfile']['name'];
                
                
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('userfile')){
                    //echo "uploaded";exit;
                    $uploadData = $this->upload->data();
                    $userfile = $uploadData['file_name'];
                }else{
                    //echo "here1";exit;
                    $error =  $this->upload->display_errors(); echo $error;
                    $this->load->view('owner/includes/header');
                    $this->load->view('owner/catalog/edit_product',$error); 
                    $this->load->view('owner/includes/footer');
                }
            }else{
                $userfile = $this->security->xss_clean($this->input->post('old_image'));
            }

            $data = array(
                'category_id' => $this->input->post('category_id'),
                'store_id' => $this->session->userdata('logged_in_store_id'), //If admin store id default 0 otherwise store id
                    'price' => $this->input->post('price'),
                    'image' => $userfile,
                     'image1' => $image1,
                    'image2' => $image2,
                    'image3' => $image3,
                    'image4' => $image4,
                    'is_customizable' => $this->input->post('iscustomizable_hidden'),
                    'is_addon' => $this->input->post('isaddon_hidden'),
                    'product_veg_nonveg' => $this->input->post('product_veg_nonveg'),
                    'product_name_ma' => $this->input->post('product_name_ma'),
                    'product_name_en' => $this->input->post('product_name_en'),
                    'product_name_hi' => $this->input->post('product_name_hi'),
                    'product_name_ar' => $this->input->post('product_name_ar'),
                    'product_desc_ma' => $this->input->post('product_desc_ma'),
                    'product_desc_en' => $this->input->post('product_desc_en'),
                    'product_desc_hi' => $this->input->post('product_desc_hi'),
                    'product_desc_ar' => $this->input->post('product_desc_ar'),
                'is_active' => 1,
            );
            //print_r($data);exit;
            $this->Productmodel->update_product($id,$data);
            $this->session->set_flashdata('success','Product details updated...');
            redirect('owner/product');
        }
    }
    else
    {
        //echo "this1=" . $this->input->post('id');exit;
        $id=$this->input->post('id'); 
        $data['categories']=$this->Productmodel->listcategories();
        $data['productDet']=$this->Productmodel->get_owner_product_by_id($id);//print_r($data['productDet']);exit;
        $this->load->view('owner/includes/header');
        $this->load->view('owner/catalog/edit_product',$data); 
        $this->load->view('owner/includes/footer');
    }
}



public function validate_image_dimensions($file)
{
    // Get the file from the $_FILES array
    $file = $_FILES['userfile'];

    // Check if a file was uploaded
    if ($file['size'] > 0) {
        // Get image information like width and height
        $image_info = getimagesize($file['tmp_name']);
        //print_r($image_info);exit;
        $width = 786;
        $height = 480;

        // Check if image dimensions meet the criteria
        if (($image_info[0] == 786) && ($image_info[1] == 480)) {
            return TRUE;
        } else {
            // Set a custom error message if validation fails
            $this->form_validation->set_message('validate_image_dimensions', "The image dimensions should be {$width}x{$height} pixels.");
            return FALSE;
        }
    } else {
        // If no file was uploaded, you can choose to return TRUE or handle it differently
        if($this->input->post('old_image') != ''){
            return TRUE;
        }else{
            $this->form_validation->set_message('validate_image_dimensions', 'Please upload an image.');
            return FALSE;
        }
    }
}
public function categoryname_exists($country)
	{
		if ($this->Productmodel->check_categoryname_exists($country)) {
			$this->form_validation->set_message('categoryname_exists', 'The {field} is already taken.');
			return FALSE;
		} else {
			return TRUE;
		}
	}
    public function categorycode_exists($country)
	{
		if ($this->Productmodel->check_categorycode_exists($country)) {
			$this->form_validation->set_message('categorycode_exists', 'The {field} is already taken.');
			return FALSE;
		} else {
			return TRUE;
		}
	}
    public function categoryorder_exists($order)
	{
		if ($this->Productmodel->check_categoryorder_exists($order)) {
			$this->form_validation->set_message('categoryorder_exists', 'The {field} is already taken.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

    public function load_addons($store_product_id) {
        //echo $store_product_id;exit;
        $data['store_product_id'] = $store_product_id; //url il pass cheyyunna id through router
        $data['addons'] = $this->Productmodel->list_all_addons();
       // print_r($data['addons']);exit;
        $data['selected_addons'] = $this->Productmodel->already_assigned_addons($this->session->userdata('logged_in_store_id'),$store_product_id);
        $this->load->view('owner/catalog/assigned_addons',$data);
    }

    public function load_images($store_product_id) {
        $data['store_product_id'] = $store_product_id; 
        $data['images'] = $this->Productmodel->getProductImages($store_product_id);
         $this->load->view('owner/catalog/product_images',$data);
    }
    public function set_default_image(){
        $store_product_id = $this->input->post('store_product_id');
        $image = $this->input->post('image');
        $this->Productmodel->set_default_image($store_product_id , $image);
        echo json_encode(['status' => 'success']);  
    }


    public function load_recipes($store_product_id) {
        $data['store_product_id'] = $store_product_id;
        $data['recipes'] = $this->Cookingmodel->listcookings();
        $data['already_assigned_recipes_ids'] = $this->Productmodel->already_assigned_recipe_ids($this->session->userdata('logged_in_store_id'),$store_product_id); 
        $this->load->view('owner/catalog/assigned_recipes',$data);
    }
    public function update_selected_recipe(){
        $products = $this->input->post('products');
        //print_r($products);exit;
            foreach ($products as $product) {
                // Prepare the data to update
                $updateData = array(
                    'store_id' => $this->session->userdata('logged_in_store_id'),
                    'store_product_id' => $product['store_product_id'],
                    'recipe_id' => $product['recipe_id'],
                    'is_active' => $product['is_active']
                );
               // echo json_encode($updateData);exit;
                
                // Check if the product already exists in the store_variants table
                $existingRecipe = $this->Productmodel->get_recipe_by_product_id($product['recipe_id'], $this->session->userdata('logged_in_store_id'),$product['store_product_id']);
                //echo json_encode(['recipe_id' => $product['recip_id'], 'store_id' => $this->session->userdata('logged_in_store_id') , 'store_product_id' => $product['store_product_id']]);exit;
            
                if ($existingRecipe != 0) {
                    // Update the existing record
                    $this->Productmodel->update_selected_recipe($product['recipe_id'],$this->session->userdata('logged_in_store_id'), $product['store_product_id'], $updateData);
                } else {
                    // Insert a new record if it doesn't exist
                    $this->Productmodel->insert_recipe($updateData);
                }
            }
            // Send success response
            echo json_encode(['status' => 'success']);
    }


    public function load_variants($store_product_id) {
        $data['default_tax_rate']=$this->Productmodel->default_tax($this->session->userdata('logged_in_store_id')); //Find default tax from store session id
        $data['store_taxes']=$this->Productmodel->store_taxes($this->session->userdata('logged_in_store_id'));//print_r($data['store_taxes']);exit;
            $data['store_product_id'] = $store_product_id;
            //$data['store_variants']=$this->Variantmodel->liststore_variants($store_product_id,$this->session->userdata('logged_in_store_id'));//print_r($data['variants']);exit;
            $data['variants'] = $this->Variantmodel->listvariants();
            $data['already_assigned_variants_ids'] = $this->Productmodel->already_assigned_variant_ids($this->session->userdata('logged_in_store_id'),$store_product_id); //print_r($data['already_assigned_variants_ids']);
            $this->load->view('owner/catalog/assigned_variants',$data);
    }
    public function update_selected_variant(){
        $products = $this->input->post('products');
        //print_r($products);exit;
            foreach ($products as $product) {
                // Prepare the data to update
                $updateData = array(
                    'store_product_id' => $product['store_product_id'],
                    'store_id' => $this->session->userdata('logged_in_store_id'),
                    'variant_id' => $product['variant_id'],
                    'rate' => $product['rate'],
                    'tax' => $product['tax'],
                    'tax_amount' => $product['tax_amount'],
                    'total_amount' => $product['total_amount'],
                    'is_default' => $product['is_default'],
                    'is_active' => $product['is_active']
                );
               // echo json_encode($updateData);exit;
                
                // Check if the product already exists in the store_variants table
                $existingVariant = $this->Productmodel->get_variant_by_product_id($product['variant_id'], $this->session->userdata('logged_in_store_id'),$product['store_product_id']);
                //echo json_encode(['variant_id' => $product['variant_id'], 'store_id' => $this->session->userdata('logged_in_store_id') , 'store_product_id' => $product['store_product_id']]);exit;
            
                if ($existingVariant != 0) {
                    // Update the existing record
                    $this->Productmodel->update_selected_variants($product['variant_id'],$this->session->userdata('logged_in_store_id'), $product['store_product_id'], $updateData);
                } else {
                    // Insert a new record if it doesn't exist
                    $this->Productmodel->insert_variant($updateData);
                }
            }
            // Send success response
            echo json_encode(['status' => 'success']);
    }

    public function update_selected_products(){
        // Retrieve JSON data from the AJAX request
        $products = $this->input->post('products');
        if (!empty($products)) {
            foreach ($products as $product) {
                // Prepare the data to update
                $updateData = [
                    'rate' => $product['rate'],
                    'tax' => $product['tax'],
                    'tax_amount' => $product['tax_amount'],
                    'total_amount' => $product['total_amount'],
                    'is_addon' => $product['is_addon'],
                    'is_customizable' => $product['is_customizable'],
                    'remarks' => $product['remarks'],
                    'is_active' => $product['is_active']
                ];
                // Update product in the database by product_id
                $this->Productmodel->update_selected_products($product['product_id'], $updateData);
            }
            // Send success response
            echo json_encode(['status' => 'success']);
        } else {
            // Send failure response
            echo json_encode(['status' => 'failure']);
        }
    }
    public function update_selected_addons()
    {
        // Retrieve data sent via AJAX
        $product_id = $_POST['product_id'];
        $store_product_id = $_POST['store_product_id'];
        $product_details = $this->Productmodel->getStoreWiseProductproductById($product_id);

        $updateData = array(
            'store_id' => $this->session->userdata('logged_in_store_id'),
            'store_product_id' => $store_product_id,
            'addon_item_id' => $product_id, //selected product as addon
            'price' => $product_details[0]['rate'],
            'tax_id' => $product_details[0]['tax'],
            'tax_amount' => $product_details[0]['tax_amount'],
            'total_amount' => $product_details[0]['total_amount'],
            'is_active' => 1,
            'date_created' => date('Y-m-d H:i:s'), // current date and time
			'created_by' => 'admin',
			'date_modified' => date('Y-m-d H:i:s'),
			'modified_by' => 'admin'
    );
        //echo json_encode($updateData);exit;
         // Check if the product already exists in the store_variants table
         $existingAddon = $this->Productmodel->get_addon_by_product_id($product_id, $this->session->userdata('logged_in_store_id'),$store_product_id);
         //echo json_encode(['variant_id' => $product['variant_id'], 'store_id' => $this->session->userdata('logged_in_store_id') , 'store_product_id' => $product['store_product_id']]);exit;
     
         if ($existingAddon != 0) {
            echo json_encode(['status' => 'error', 'message' => 'Addon already exist']);
         } else {
             // Insert a new record if it doesn't exist
             $this->Productmodel->insert_addons($updateData);
             echo json_encode(['status' => 'success', 'message' => 'Addon added successfully']);
         }

        // Return a response
        
    }

    public function upload_new_image(){
        $product_id = $this->input->post('id');
        if(!empty($_FILES['image']['name'])){
            $image_path = './uploads/product/' . $_FILES['image']['name'];
            $config['upload_path'] = './uploads/product/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
            $config['file_name'] = $_FILES['image']['name'];
            
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            
            if($this->upload->do_upload('image')){
                $uploadData = $this->upload->data();
                $image = $uploadData['file_name'];
                $this->Productmodel->set_default_image($product_id,$image);
                echo json_encode(['status' => 'success', 'message' => 'Product default image updated successfully']);
            }else{
                $error =  $this->upload->display_errors(); echo $error;
                $this->load->view('admin/includes/header');
                $this->load->view('admin/catalog/add_product',$error); 
                $this->load->view('admin/includes/footer');
            }
        }
    }

}
?>
