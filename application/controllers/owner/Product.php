<?php
class Product extends CI_Controller {

    public function __construct() {
        
        parent::__construct();

        
        
        $this->load->model('admin/Productmodel');
        $this->load->model('admin/Variantmodel');
        $this->load->model('admin/Storemodel');
        $this->load->model('owner/Stockmodel');
        $this->load->model('admin/Cookingmodel');
        $this->load->model('owner/Ordermodel');
        $this->load->model('website/Homemodel');
    }

    public function index()
	{
        $controller = $this->router->fetch_class(); // Gets the current controller name
		$method = $this->router->fetch_method();   // Gets the current method name
		$data['controller'] = $controller;
        $data['products']=$this->Productmodel->shopAssignedProducts();//print_r($data['products']);exit;
        $product_ids = array_column($data['products'], 'store_product_id');
        $product_ids_string = implode(',', $product_ids);
        $date =date('Y-m-d');
        $logged_store_id=$this->session->userdata('logged_in_store_id');
        $data['date'] =$date;
        
        $store_details = $this->Homemodel->get_store_details_by_store_id($logged_store_id);
        $support_details = $this->Homemodel->get_support_details_by_country_id($store_details->store_country);
        $data['store_disp_name'] = $store_details->store_disp_name;
        $data['store_address'] = $store_details->store_address;
        $data['support_no'] = $support_details->support_no;
        $data['support_email'] = $support_details->support_email;
        
        
       // $data['currentStock'] =$this->Ordermodel->getCurrentStock( $product_ids_string,$date,$logged_store_id);
		$this->load->view('owner/includes/header',$data);
		$this->load->view('owner/catalog/products',$data);
		$this->load->view('owner/includes/footer');
	}

    public function delete(){
	    $this->Productmodel->delete_category($this->input->post('id'));
		$this->session->set_flashdata('error','Category deleted successfully');
	}

    public function searchProductOnKeyUp(){
        $search = $this->input->get('search');
        $searchproducts=$this->Productmodel->shopAssignedProductsByKeyUpSearch($search);
        $html = '';
        if (!empty($searchproducts)) {
            $store_id = $this->session->userdata('logged_in_store_id');
            $date = date('Y-m-d');
            foreach ($searchproducts as $product) {
                $stock = $this->Ordermodel->getCurrentStock($product->store_product_id, $date, $this->session->userdata('logged_in_store_id'));
                $html .= '<div class="row mb-2 product">';
                $html .= '<div class="col-3">';
                $html .= '<img src="' . base_url() . 'uploads/product/' . (isset($product->image) ? $product->image : '') . '" class="responsive-image custom-rounded">';
                $html .= '</div>';
                $html .= '<div class="col-3">';
                $html .= '<h4 class="text-uppercase responsive-h4">' . $product_name = ($product->store_product_name_en != '') ? $product->store_product_name_en : $product->product_name_en . '</h4>';
                $html .= '<h5>Rate: ' . $product->rate . '</h5>';
                if ($stock > 0) {
                $html .= ' <select name="change_status" id="change_status" class="form-select w-50" 
                onchange="changeProductStatus(this.value, ' . $product->store_product_id . ')">
                <option value="0" ' . ($product->is_active == 0 ? 'selected' : '') . '>Available</option>
                <option value="1" ' . ($product->is_active == 1 ? 'selected' : '') . '>Unavailable</option>
                    </select>';
                } else {
                    $html .= '<h5 class="text-danger">Unavailable</h5>';
                }
                $html .= '</div>';
                $html .= '<div class="col-3">';
                $html .= '<div class="button-container">';
                $html .= '<button class="custom-button disabled">STOCK: ' . ($stock !== null && $stock !== false ? $stock : 0) . '</button>';
                  $html .= '<button class="custom-button open-modal" data-bs-toggle="modal" data-id="' . $product->store_product_id . '" data-bs-target="#addstock">ADD STOCK</button>';
                $html .= '<button class="custom-button remove-modal" data-bs-toggle="modal" data-id="' . $product->store_product_id . '" data-bs-target="#removestock">REMOVE STOCK</button>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '<div class="col-3">';
                $html .= '<a data-bs-toggle="modal" data-bs-target="#Edit-dish" type="button">';
                 $html .= '<button data-id="' . $product->store_product_id . '" data-isCustomizable="' . $product->is_customizable . '" class="custom-button edit-btn" > <i
                                class="fa fa-edit"></i> Edit Dish</button>';
                $html .= '</a>';
                $html .= '</div>';
                $html .= '</div>';
            }
        } else {
            $html .= '<p>No products found.</p>';
        }
        echo $html; 
        }


    public function save() {
        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('category_id', 'Category', 'required');
        $this->form_validation->set_rules('subcategory_id', 'Subcategory', 'required');
        $this->form_validation->set_rules('product_veg_nonveg', 'Select Veg or Nonveg', 'required');   
        $this->form_validation->set_rules('product_name_ma', 'Malayalam', 'required');   
        $this->form_validation->set_rules('product_name_en', 'English', 'required');   
        $this->form_validation->set_rules('product_name_hi', 'Hindi', 'required');   
        $this->form_validation->set_rules('product_name_ar', 'Arabic', 'required');
        $this->form_validation->set_rules('images[]', 'Images', 'callback_check_images');
                       
        if ($this->form_validation->run() == FALSE) {
            // If validation fails, send errors back to the view
            $response = [
                'success' => false,
                'errors' => [
                    'category_id' => form_error('category_id'),
                    'subcategory_id' => form_error('subcategory_id'),
                    'product_veg_nonveg' => form_error('product_veg_nonveg'),
                    'product_name_ma' => form_error('product_name_ma'),
                    'product_name_en' => form_error('product_name_en'),
                    'product_name_hi' => form_error('product_name_hi'),
                    'product_name_ar' => form_error('product_name_ar'),
                    'images' => form_error('images[]')
                ]
            ];
            echo json_encode($response);
        } 
        else 
        {
            $uploadedImages = [];
            $uploadPath = './uploads/product/';
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $files = $_FILES['images'];
            $fileCount = count($files['name']);

            //echo json_encode($files); 
            $category_id = $this->input->post('category_id');


            foreach ($_FILES['images']['name'] as $key => $name) 
            {
                if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) 
                {
                    move_uploaded_file($_FILES['images']['tmp_name'][$key], "./uploads/product/$name");
                }
            }

            $data = array(
                'category_id' => $this->input->post('category_id'),
                'subcategory_id' => $this->input->post('subcategory_id'),
                'store_id' => $this->session->userdata('logged_in_store_id'), //If admin store id default 0 otherwise store id
                'price' => $this->input->post('rate') ?? 0,
                'image' => isset($files['name'][0]) && !empty($files['name'][0])? $files['name'][0] : null, 
                'image1' => isset($files['name'][1]) && !empty($files['name'][1])? $files['name'][1] : null, 
                'image2' => isset($files['name'][2]) && !empty($files['name'][2])? $files['name'][2] : null, 
                'image3' => isset($files['name'][3]) && !empty($files['name'][3])? $files['name'][3] : null, 
                'image4' => isset($files['name'][4]) && !empty($files['name'][4])? $files['name'][4] : null, 
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

            // print_r($data);exit;
            $last_insert_product_id = $this->Productmodel->insert_product_translation($data);//Return product id
                $vat_id = $this->Productmodel->get_store_vat_id($this->session->userdata('logged_in_store_id'));//exit;
                $datas = array(
                    'store_id' => $this->session->userdata('logged_in_store_id'),
                    'product_id' => $last_insert_product_id,
                    'subcategory_id' => $this->input->post('subcategory_id'),
                    'vat_id' => $vat_id[0]['gst_or_tax'],
                    'type' => $this->input->post('product_veg_nonveg'),
                    'rate' => $this->input->post('rate') ?? 0,
                    'tax' => $this->input->post('tax') ?? 0,
                    'tax_amount' => $this->input->post('tax_amount'),
                    'total_amount' => $this->input->post('total_amount'),
                    'category_id' => $this->input->post('category_id'),
                    'is_addon' => $this->input->post('isaddon_hidden'),
                    'is_customizable' => $this->input->post('iscustomizable_hidden'),
                    'image' => '',
                    'is_admin'	=> 0, //when added by admin thiw will 1
                    'date_created' => date('Y-m-d H:i:s'), // current date and time
                    'created_by' => $this->session->userdata('loginid'),
                    'date_modified' => date('Y-m-d H:i:s'),
                    'modified_by' => $this->session->userdata('loginid'),
                    'is_active' => 1
                );
                $this->Productmodel->insert_product_assign($datas);
            $response1 = (['success' => 'success']);
            echo json_encode($response1);
        }
    }

    public function check_images($str)
    {
        if (empty($_FILES['images']['name'][0])) {
            $this->form_validation->set_message('check_images', 'At least one image must be selected.');
            return FALSE;
        }
    
    // Check if there are exactly 4 images
        if (count($_FILES['images']['name']) != 5) {
            $this->form_validation->set_message('check_images', 'Exactly 4 images must be selected.');
            return FALSE;
        }

        return TRUE;
    }

    public function add() {  
            $controller = $this->router->fetch_class(); // Gets the current controller name
            $method = $this->router->fetch_method();   // Gets the current method name
            $data['controller'] = $controller;
            $data['categories']=$this->Productmodel->listcategories();
            $data['subcategories']=$this->Productmodel->sublistcategories();
            $data['default_tax_rate']=$this->Productmodel->default_tax($this->session->userdata('logged_in_store_id')); //Find default tax from store session id
            $data['store_taxes']=$this->Productmodel->store_taxes($this->session->userdata('logged_in_store_id'));//print_r($data['store_taxes']);exit;
            
            $store_details = $this->Homemodel->get_store_details_by_store_id($this->session->userdata('logged_in_store_id'));
        $support_details = $this->Homemodel->get_support_details_by_country_id($store_details->store_country);
        $data['store_disp_name'] = $store_details->store_disp_name;
        $data['store_address'] = $store_details->store_address;
        $data['support_no'] = $support_details->support_no;
        $data['support_email'] = $support_details->support_email;
        
            $this->load->view('owner/includes/header',$data);
            $this->load->view('owner/catalog/add-product-copy',$data);
            $this->load->view('owner/includes/footer');
    }

    // Function to add a product with translations
    
public function edit()
{
    $id=$this->input->post('id'); 
    $data['default_tax_rate']=$this->Productmodel->default_tax($this->session->userdata('logged_in_store_id')); //Find default tax from store session id
            $data['store_taxes']=$this->Productmodel->store_taxes($this->session->userdata('logged_in_store_id'));//print_r($data['store_taxes']);exit;
    $data['categories']=$this->Productmodel->listcategories();
    $data['subcategories']=$this->Productmodel->sublistcategories();// print_r($data['subcategories']);exit;
    $data['productDet']=$this->Productmodel->get_owner_product_by_id($id);//echo $id;print_r($data['productDet']);exit;
    $this->load->view('owner/includes/header');
    $this->load->view('owner/catalog/edit-product-copy',$data); 
    $this->load->view('owner/includes/footer');
}
public function update_image() {
    $this->load->helper('string');
    $imageData = $this->input->post('image');
    $imageId = $this->input->post('imageId');
    $fileName = random_string('alnum', 16).'cropped-image.jpg';  // Or dynamically generate this based on your logic
    
    // Ensure correct MIME type (if you are working with PNG or JPEG)
    $mimeType = 'image/jpeg';  // Set based on your choice of format (image/png, image/jpeg)
    
    // Remove the base64 part and get the image data
    list($type, $data) = explode(';', $imageData);
    list(, $data) = explode(',', $data);
    $data = base64_decode($data);

    // Define the path to save the image
    $filePath = FCPATH . './uploads/product/' . $fileName;

    // Save the image to a file
    if (file_put_contents($filePath, $data)) {
        echo json_encode(['filename'=>$fileName,'imageId'=> $imageId]);  

    } else {
        echo 'Failed to save the image';
    }
}

public function update_image1() {
    // Configure upload settings
    $config['upload_path'] = './uploads/product/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size'] = 2048; // Limit size to 2MB
    $config['encrypt_name'] = TRUE; // To avoid overwriting files with the same name

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('file')) {
        // File uploaded successfully
        $upload_data = $this->upload->data(); // Get upload data
        $source_image = $upload_data['full_path']; // Path to the uploaded image

        // Load image library to resize the image
        $resize_config['image_library'] = 'gd2';
        $resize_config['source_image'] = $source_image;
        $resize_config['maintain_ratio'] = TRUE; // Disable aspect ratio to force dimensions
        $resize_config['width'] = 300; // Desired width
        $resize_config['height'] = 300; // Desired height
        $resize_config['new_image'] = './uploads/product/resized/'; // Save resized image to a new directory

        // Ensure the resized folder exists
        if (!is_dir('./uploads/product/resized/')) {
            mkdir('./uploads/product/resized/', 0777, TRUE);
        }

        $this->load->library('image_lib', $resize_config);

        if ($this->image_lib->resize()) {
            echo 'File uploaded and resized successfully!';
        } else {
            echo 'File uploaded but resizing failed: ' . $this->image_lib->display_errors();
        }
    } else {
        // File upload failed
        echo 'File upload failed: ' . $this->upload->display_errors();
    }
}

    



public function update(){
   
        $id=$this->input->post('id'); //echo $id;die();
        $data['productDet']=$this->Productmodel->get_product_by_id($id);//print_r($data['categoryDet']);exit;
        $this->form_validation->set_error_delimiters('', ''); 
        $this->form_validation->set_rules('category_id', 'Category', 'required');
        $this->form_validation->set_rules('product_veg_nonveg', 'Veg/Non-Veg', 'required');
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
            $this->load->view('admin/includes/header');
            $this->load->view('admin/catalog/edit-product-copy',$data); 
            $this->load->view('admin/includes/footer');
        }
        else
        {
            

            $data = array(
                'category_id' => $this->input->post('category_id'),
                'subcategory_id' => $this->input->post('subcategory_id'),
                'store_id' => $this->session->userdata('logged_in_store_id'), //If admin store id default 0 otherwise store id
                    'price' => 0,
                    'image' => isset($_POST['image']) && !empty($_POST['image'])? $_POST['image'] : null, 
                    'image1' => isset($_POST['image1']) && !empty($_POST['image1'])? $_POST['image1'] : null,  
                    'image2' => isset($_POST['image2']) && !empty($_POST['image2'])? $_POST['image2'] : null, 
                    'image3' => isset($_POST['image3']) && !empty($_POST['image3'])? $_POST['image3'] : null, 
                    'image4' => isset($_POST['image4']) && !empty($_POST['image4'])? $_POST['image4'] : null, 
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
                    'is_active' => 0,
            );
            // echo json_encode($data);exit;
            // print_r($data);exit;
            $this->Productmodel->update_product($id,$data);
            $dataUpdate = array(
                'category_id' => $this->input->post('category_id'),
                'subcategory_id' => $this->input->post('subcategory_id'),
                'rate' => $this->input->post('rate'),
                'tax' => $this->input->post('rate'),
                'tax_amount' => $this->input->post('tax_amount'),
                'total_amount' => $this->input->post('total_amount'),
            );
            $this->Productmodel->updateStoreProductPrice($id,$dataUpdate,$this->session->userdata('logged_in_store_id'));
            $this->session->set_flashdata('success','Product details updated...');
            redirect('owner/product');
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
        //echo $store_product_id;exit;
        $data['default_tax_rate']=$this->Productmodel->default_tax($this->session->userdata('logged_in_store_id')); //Find default tax from store session id
        $data['store_taxes']=$this->Productmodel->store_taxes($this->session->userdata('logged_in_store_id'));//print_r($data['store_taxes']);exit;
            $data['store_product_id'] = $store_product_id;
            //$data['store_variants']=$this->Variantmodel->liststore_variants($store_product_id,$this->session->userdata('logged_in_store_id'));//print_r($data['variants']);exit;
            $data['variants'] = $this->Variantmodel->ownerVariants($this->session->userdata('logged_in_store_id'),$store_product_id);
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
               //echo json_encode($updateData);exit;
                
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

    public function update_selected_products()
    {
        // Retrieve JSON data from the AJAX request
        $products = $this->input->post('products');
        if (!empty($products)) {
            foreach ($products as $product) 
            {
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

                if($product['stock_quantity'] > 0)
                {
                        $this->db->select('*');
                        $this->db->from('store_stock');
                        $this->db->where('store_id', $this->session->userdata('logged_in_store_id'));
                        $this->db->where('product_id', $product['product_id']);
                        $this->db->where('tr_date', date("Y-m-d"));
                        $this->db->where('ttype', 'SK');
                        $this->db->where('order_id', 0);
                        $query = $this->db->get();
                        $result = $query->row();

                        if(empty($result))
                        {
                            $this->db->set('store_id', $this->session->userdata('logged_in_store_id'));
                            $this->db->set('product_id', $product['product_id']);
                            $this->db->set('ttype', 'SK');
                            $this->db->set('order_id', 0);
                            $this->db->set('pu_qty', $product['stock_quantity']);
                            $this->db->set('minqty', $product['minimum_quantity']);
                            $this->db->set('tr_date', date("Y-m-d"));
                            $this->db->set('created_by', $this->session->userdata('loginid'));
                            $this->db->set('created_date', date('Y-m-d H:i:s'));
                            $this->db->set('modified_by', $this->session->userdata('loginid'));
                            $this->db->set('modified_date', date('Y-m-d H:i:s'));
                            $this->db->insert('store_stock');
                        }
                        else
                        {

                                $quantity = (int)$product['stock_quantity'];
                                

                                $this->db->set('pu_qty', $quantity);
                                $this->db->set('minqty', $product['minimum_quantity']);
                                $this->db->set('created_by', $this->session->userdata('loginid'));
                                $this->db->set('created_date', date('Y-m-d H:i:s'));
                                $this->db->set('modified_by', $this->session->userdata('loginid'));
                                $this->db->set('modified_date', date('Y-m-d H:i:s'));
                                $this->db->where('store_id', $this->session->userdata('logged_in_store_id'));
                                $this->db->where('product_id', $product['product_id']);
                                $this->db->where('tr_date', date("Y-m-d"));
                                $this->db->where('ttype', 'SK');
                                $this->db->where('order_id', 0);
                                $this->db->where('id', $result->id);
                                $this->db->update('store_stock');    

                        } 
                        $this->db->set('is_active', 0);
                        $this->db->where('store_id', $this->session->userdata('logged_in_store_id'));
                        $this->db->where('store_product_id', $product['product_id']);
                        $this->db->update('store_wise_product_assign');
                }

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
    
    public function getDescriptions() 
    {
        $id = $this->input->post('id');
        $descriptions = $this->Productmodel->getDescriptionsById($id , $this->session->userdata('logged_in_store_id')); 
        echo json_encode([
            'success' => true,
            'data' => $descriptions
        ]);
    }

    public function changeDescriptions()
    {
            $productId = $this->input->post('product_id');
            $data = array(
                'store_product_name_ma' => $this->input->post('store_product_name_ma'),
                'store_product_name_en' => $this->input->post('store_product_name_en'),
                'store_product_name_hi' => $this->input->post('store_product_name_hi'),
                'store_product_name_ar' => $this->input->post('store_product_name_ar'),
                'store_product_desc_ma' => $this->input->post('description_malayalam'),
                'store_product_desc_en' => $this->input->post('description_english'),
                'store_product_desc_hi' => $this->input->post('description_hindi'),
                'store_product_desc_ar' => $this->input->post('description_arabic'),
                'rate' => $this->input->post('store_product_rate'),
            );
            $this->Productmodel->update_product_description($data , $this->session->userdata('logged_in_store_id'), $productId);
            $response = (['success' => 'success']);
            echo json_encode($response);
    }

    // add stocks
public function addstocks(){
    $this->load->library('form_validation');
    $this->form_validation->set_rules('pu_qty', 'Purchase quanity', 'required');
    if ($this->form_validation->run() == FALSE) {
        $response = [
            'success' => false,
            'errors' => [
                'pu_qty' => form_error('pu_qty')
            ]
        ];
        echo json_encode($response);
        
    }
    else{
        $response = [
            'success' => true,
            'message' => 'Form validated successfully!'
        ];
        echo json_encode($response);
    }
        $productId = $this->input->post('product_id');
        $date = date('Y-m-d');
        $store_id=$this->session->userdata('logged_in_store_id');
        $pu_qty = $this->input->post('pu_qty');
        $result = $this->Productmodel->addStock($pu_qty, $store_id, $productId, $date);
    
}

public function changeProductStatus(){
    $store_id=$this->session->userdata('logged_in_store_id');
    $store_product_id = $this->input->post('store_product_id');
    $is_active = $this->input->post('is_active');
    $result = $this->Productmodel->changeProductStatus($store_product_id,$store_id,$is_active);
}
//remove stocks
public function removestocks(){
    $this->load->library('form_validation');
    $this->form_validation->set_rules('sl_qty', 'Purchase quanity', 'required');
    if ($this->form_validation->run() == FALSE) {
        $response = [
            'success' => false,
            'errors' => [
                'sl_qty' => form_error('sl_qty')
            ]
        ];
        echo json_encode($response);  
    }
    else{
        $response = [
            'success' => true,
            'message' => 'Form validated successfully!'
        ];
        echo json_encode($response);
    }

    $productId = $this->input->post('product_id_remove');
    $date = date('Y-m-d');
    $store_id=$this->session->userdata('logged_in_store_id');
    $sl_qty = $this->input->post('sl_qty');
    $result = $this->Productmodel->removeStock($sl_qty, $store_id, $productId, $date);

}
public function saveReciepe(){
    $store_id=$this->session->userdata('logged_in_store_id');
    $data=array(
        'store_id' => $store_id,
        'name_ma' => $this->input->post('reciepe_name_ma'),
        'name_en' => $this->input->post('reciepe_name_en'),
        'name_hi' => $this->input->post('reciepe_name_hi'),
        'name_ar'  => $this->input->post('reciepe_name_ar'),
        'is_active'  => 1,
    );
     $this->Ordermodel->SaveReciepe($data);
    echo json_encode(array('success' => true));
}
public function avialabletime(){
    $store_product_id= $this->input->post('product_id');
    $store_id=$this->session->userdata('logged_in_store_id');
    $time =  $this->input->post('time');
    $data=array(
        'store_product_id'=>$store_product_id,
        'store_id'=>$store_id,
        'remarks'=>'Available At '.$this->input->post('time'),
    );
    $this->Ordermodel->SaveAvialableTime($store_product_id,$store_id,$data);
    echo json_encode(['success' => 'success', 'message' => 'time added successfully']);
}

}