<?php
class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Productmodel');
    }

    public function index()
	{
        $data['products']=$this->Productmodel->listproducts();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/catalog/products',$data);
		$this->load->view('admin/includes/footer');
	}

    public function delete(){
	    $this->Productmodel->delete_category($this->input->post('id'));
		$this->session->set_flashdata('error','Category deleted successfully');
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
                ]
            ];
            echo json_encode($response);
        } else {
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
                'store_id' => 0, //If admin store id default 0 
                'price' => 0,
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
                'is_active' => 0
            );
            $this->Productmodel->insert_product_translation($data);
            $response1 = (['success' => 'success']);
            echo json_encode($response1);
        }
    }

    public function add() {  
            $data['categories']=$this->Productmodel->listcategories();
            $data['subcategories']=$this->Productmodel->sublistcategories();
            $this->load->view('admin/includes/header');
            $this->load->view('admin/catalog/add-product-copy',$data);
            $this->load->view('admin/includes/footer');
    }

    // Function to add a product with translations
    
public function edit()
{
        $id=$this->input->post('id'); 
        $data['subcategories']=$this->Productmodel->sublistcategories();
        $data['categories']=$this->Productmodel->listcategories();
        $data['productDet']=$this->Productmodel->get_product_by_id($id);//print_r($data['categoryDet']);exit;
        $this->load->view('admin/includes/header');
        $this->load->view('admin/catalog/edit-product-copy',$data); 
        $this->load->view('admin/includes/footer');
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
    
       // Example of file upload handler in CodeIgniter
$config['upload_path'] = './uploads/product/';
$config['allowed_types'] = 'jpg|png|jpeg';
$this->load->library('upload', $config);

if ($this->upload->do_upload('file')) {
    $data = $this->upload->data();
    echo 'File uploaded successfully!';
} else {
    echo 'File upload failed!';
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
                'store_id' => 0, //If admin store id default 0 
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
            $this->session->set_flashdata('success','Product details updated...');
            redirect('admin/product');
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

}
?>