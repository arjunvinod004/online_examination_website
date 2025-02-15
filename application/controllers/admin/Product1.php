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

    // Function to add a product with translations
    public function add() {
        if(isset($_POST['add']))
		{
            $data['categories']=$this->Productmodel->listcategories();
            $this->form_validation->set_error_delimiters('', ''); 
			$this->form_validation->set_rules('category_id', 'Category', 'required');
            $this->form_validation->set_rules('product_veg_nonveg', 'Veg/Non-Veg', 'required');
              $this->form_validation->set_rules('userfile', 'Image', 'callback_validate_image_dimensions' );
            $this->form_validation->set_rules('image1', 'Image1','callback_validate_image_dimensions1');
            $this->form_validation->set_rules('image2', 'Image2','callback_validate_image_dimensions2');
            $this->form_validation->set_rules('image3', 'Image3','callback_validate_image_dimensions3');
            $this->form_validation->set_rules('image4', 'Image4','callback_validate_image_dimensions4');
            //->form_validation->set_rules('userfile', 'Image', 'callback_validate_image_dimensions');
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
				$this->load->view('admin/includes/header');
			    $this->load->view('admin/catalog/add_product',$data); 
			    $this->load->view('admin/includes/footer');
			}
			else
			{
                if(!empty($_FILES['userfile']['name'])){
    //                 $image_path = './uploads/product/' . $this->input->post('old_image');
				// 	unlink($image_path);
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
                        $this->load->view('admin/includes/header');
			            $this->load->view('admin/catalog/add_product',$error); 
			            $this->load->view('admin/includes/footer');
					}
				}else{
                    //echo "here2";exit;
					$userfile = '';
				}
				
				if(!empty($_FILES['image1']['name'])){
                   
                    //echo "here";exit;
					$config['upload_path'] = './uploads/product/';
					$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
					$config['file_name'] = $_FILES['image1']['name'];
					
					
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

                if(!empty($_FILES['image2']['name'])){
                   
                    //echo "here";exit;
					$config['upload_path'] = './uploads/product/';
					$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
					$config['file_name'] = $_FILES['image2']['name'];
					
					
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

                if(!empty($_FILES['image3']['name'])){
                   
                    //echo "here";exit;
					$config['upload_path'] = './uploads/product/';
					$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
					$config['file_name'] = $_FILES['image3']['name'];
					
					
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

                if(!empty($_FILES['image4']['name'])){
                   
                    //echo "here";exit;
					$config['upload_path'] = './uploads/product/';
					$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
					$config['file_name'] = $_FILES['image4']['name'];
					
					
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
                    'subcategory_id' => $this->input->post('subcategory_id'),
                    'store_id' => 0, //If admin store id default 0 
                    'price' => 0,
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
                    'is_active' => 0
                );
            

                $this->Productmodel->insert_product_translation($data);
            

            // Redirect or display success message
            redirect('admin/product');
        }
    }
    else
    {
      $data['categories']=$this->Productmodel->listcategories();
        $data['subcategories']=$this->Productmodel->sublistcategories();
        $this->load->view('admin/includes/header');
        $this->load->view('admin/catalog/add_product',$data);
        $this->load->view('admin/includes/footer'); 
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
          $this->form_validation->set_rules('userfile', 'Image', 'callback_validate_image_dimensions' );
        $this->form_validation->set_rules('image1', 'Image1','callback_validate_image_dimensions1');
        $this->form_validation->set_rules('image2', 'Image2','callback_validate_image_dimensions2');
        $this->form_validation->set_rules('image3', 'Image3','callback_validate_image_dimensions3');
        $this->form_validation->set_rules('image4', 'Image4','callback_validate_image_dimensions4');
        //$this->form_validation->set_rules('userfile', 'Image', 'callback_validate_image_dimensions');
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
            $this->load->view('admin/catalog/edit_product',$data); 
            $this->load->view('admin/includes/footer');
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
                    $this->load->view('admin/includes/header');
                    $this->load->view('admin/catalog/edit_product',$error); 
                    $this->load->view('admin/includes/footer');
                }
            }else{
                $userfile = $this->security->xss_clean($this->input->post('old_image'));
            }
            
            
            
            
            
                        if(!empty($_FILES['image1']['name'])){
                $image_path = './uploads/product/' . $this->input->post('old_image1');
				// unlink($image_path);
                $config['upload_path'] = './uploads/product/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
                $config['file_name'] = $_FILES['image1']['name'];
                // print_r( $config['file_name']); exit;
                
                
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('image1')){
                    //echo "uploaded";exit;
                    $uploadData = $this->upload->data();
                    // print_r($uploadData);exit;
                    $image1 = $uploadData['file_name'];
                }else{
                    //echo "here1";exit;
                    $error =  $this->upload->display_errors(); echo $error;
                    $this->load->view('admin/includes/header');
                    $this->load->view('admin/catalog/edit_product',$error); 
                    $this->load->view('admin/includes/footer');
                }
            }
            
            
            
            else{
                $image1 = $this->security->xss_clean($this->input->post('old_image1'));
            }

         // image 2
            if(!empty($_FILES['image2']['name'])){
                $image_path = './uploads/product/' . $this->input->post('old_image2');
			//	unlink($image_path);
                $config['upload_path'] = './uploads/product/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
                $config['file_name'] = $_FILES['image2']['name'];
                // print_r( $config['file_name']); exit;
                
                
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('image2')){
                    //echo "uploaded";exit;
                    $uploadData = $this->upload->data();
                    // print_r($uploadData);exit;
                    $image2 = $uploadData['file_name'];
                }else{
                    //echo "here1";exit;
                    $error =  $this->upload->display_errors(); echo $error;
                    $this->load->view('admin/includes/header');
                    $this->load->view('admin/catalog/edit_product',$error); 
                    $this->load->view('admin/includes/footer');
                }
            }
            
            
            
            else{
                $image2 = $this->security->xss_clean($this->input->post('old_image2'));
            }

// image3
            if(!empty($_FILES['image3']['name'])){
                $image_path = './uploads/product/' . $this->input->post('old_image3');
			//	unlink($image_path);
                $config['upload_path'] = './uploads/product/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
                $config['file_name'] = $_FILES['image3']['name'];
                // print_r( $config['file_name']); exit;
                
                
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('image3')){
                    //echo "uploaded";exit;
                    $uploadData = $this->upload->data();
                    // print_r($uploadData);exit;
                    $image3 = $uploadData['file_name'];
                }else{
                    //echo "here1";exit;
                    $error =  $this->upload->display_errors(); echo $error;
                    $this->load->view('admin/includes/header');
                    $this->load->view('admin/catalog/edit_product',$error); 
                    $this->load->view('admin/includes/footer');
                }
            }
            
            
            
            else{
                $image3 = $this->security->xss_clean($this->input->post('old_image3'));
            }


            //image4

            if(!empty($_FILES['image4']['name'])){
                $image_path = './uploads/product/' . $this->input->post('old_image4');
			//	unlink($image_path);
                $config['upload_path'] = './uploads/product/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
                $config['file_name'] = $_FILES['image3']['name'];
            //    print_r( $config['file_name']); exit;
                
                
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('image4')){
                    //echo "uploaded";exit;
                    $uploadData = $this->upload->data();
                    // print_r($uploadData);exit;
                    $image4 = $uploadData['file_name'];
                }else{
                    //echo "here1";exit;
                    $error =  $this->upload->display_errors(); echo $error;
                    $this->load->view('admin/includes/header');
                    $this->load->view('admin/catalog/edit_product',$error); 
                    $this->load->view('admin/includes/footer');
                }
            }
            
            
            
            else{
                $image4 = $this->security->xss_clean($this->input->post('old_image4'));
            }

            
            

            $data = array(
                'category_id' => $this->input->post('category_id'),
                'subcategory_id' => $this->input->post('subcategory_id'),
                'store_id' => 0, //If admin store id default 0 
                    'price' => 0,
                     'image' => $userfile,
                    'image1' => $image1,
                    'image2' => $image2,
                    'image3' => $image3,
                    'image4' => $image4,
                    // 'image' => $userfile,
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
            //print_r($data);exit;
            $this->Productmodel->update_product($id,$data);
            $this->session->set_flashdata('success','Product details updated...');
            redirect('admin/product');
        }
    }
    else
    {
        $id=$this->input->post('id'); 
        $data['subcategories']=$this->Productmodel->sublistcategories();
        $data['categories']=$this->Productmodel->listcategories();
        $data['productDet']=$this->Productmodel->get_product_by_id($id);//print_r($data['categoryDet']);exit;
        $this->load->view('admin/includes/header');
        $this->load->view('admin/catalog/edit_product',$data); 
        $this->load->view('admin/includes/footer');
    }
}




public function validate_image_dimensions($file){
    // Get the file from the $_FILES array
       $file = $_FILES['userfile'];

    if ($file['size'] > 0) {
        // Check if file size is 50 KB or less
        if ($file['size'] <= 50 * 1024) { // 50 KB in bytes
            return TRUE;
        } else {
            // Set a custom error message if size validation fails
            $this->form_validation->set_message('validate_image_dimensions', 'The image size should be 20 KB or less.');
            return FALSE;
        }
    } else {
        // If no file was uploaded, you can choose to return TRUE or handle it differently
        if ($this->input->post('old_image') != '') {
            return TRUE;
        } else {
            $this->form_validation->set_message('validate_image_dimensions', 'Please upload an image.');
            return FALSE;
        }
    }





}

//image 1 validation
// public function validate_image_dimensions1($image1){

//     $image1 = $_FILES['image1'];

//     if ($image1['size'] > 0) {
//         // Get image information like width and height
//         $image_info = getimagesize($image1['tmp_name']);
//         // print_r($image_info);exit;
//         $width = 786;
//         $height = 480;

//         // Check if image dimensions meet the criteria
//         if (($image_info[0] == 786) && ($image_info[1] == 480)) {
//             return TRUE;
//         } else {
//             // Set a custom error message if validation fails
//             $this->form_validation->set_message('validate_image_dimensions1', "The image dimensions should be {$width}x{$height} pixels.");
//             return FALSE;
//         }
//     } else {
//         // If no file was uploaded, you can choose to return TRUE or handle it differently
//         if($this->input->post('old_image1') != ''){
//             return TRUE;
//         }else{
//             $this->form_validation->set_message('validate_image_dimensions1', 'Please upload an image.');
//             return FALSE;
//         }
//     }

// }


public function validate_image_dimensions1($image1){
    $image1 = $_FILES['image1'];

    if ($image1['size'] > 0) {
        // Check if file size is 50 KB or less
        if ($image1['size'] <= 50 * 1024) { // 50 KB in bytes
            return TRUE;
        } else {
            // Set a custom error message if size validation fails
            $this->form_validation->set_message('validate_image_dimensions1', 'The image size should be 50 KB or less.');
            return FALSE;
        }
    } else {
        // If no file was uploaded, you can choose to return TRUE or handle it differently
        if ($this->input->post('old_image1') != '') {
            return TRUE;
        } else {
            $this->form_validation->set_message('validate_image_dimensions1', 'Please upload an image.');
            return FALSE;
        }
    }
}



// image 2 validation
public function validate_image_dimensions2($image2){

    $image2 = $_FILES['image2'];

    if ($image2['size'] > 0) {
        // Check if file size is 50 KB or less
        if ($image2['size'] <= 50 * 1024) { // 50 KB in bytes
            return TRUE;
        } else {
            // Set a custom error message if size validation fails
            $this->form_validation->set_message('validate_image_dimensions2', 'The image size should be 50 KB or less.');
            return FALSE;
        }
    } else {
        // If no file was uploaded, you can choose to return TRUE or handle it differently
        if ($this->input->post('old_image2') != '') {
            return TRUE;
        } else {
            $this->form_validation->set_message('validate_image_dimensions2', 'Please upload an image.');
            return FALSE;
        }
    }

}

// image 3 validation

public function validate_image_dimensions3($image3){

    $image3 = $_FILES['image3'];

    if ($image3['size'] > 0) {
        // Check if file size is 50 KB or less
        if ($image3['size'] <= 50 * 1024) { // 50 KB in bytes
            return TRUE;
        } else {
            // Set a custom error message if size validation fails
            $this->form_validation->set_message('validate_image_dimensions3', 'The image size should be 50 KB or less.');
            return FALSE;
        }
    } else {
        // If no file was uploaded, you can choose to return TRUE or handle it differently
        if ($this->input->post('old_image3') != '') {
            return TRUE;
        } else {
            $this->form_validation->set_message('validate_image_dimensions3', 'Please upload an image.');
            return FALSE;
        }
    }

}

// image 4 dimensions

public function validate_image_dimensions4($image4){

    $image4 = $_FILES['image4'];

    if ($image4['size'] > 0) {
        // Check if file size is 50 KB or less
        if ($image4['size'] <= 50 * 1024) { // 50 KB in bytes
            return TRUE;
        } else {
            // Set a custom error message if size validation fails
            $this->form_validation->set_message('validate_image_dimensions4', 'The image size should be 50 KB or less.');
            return FALSE;
        }
    } else {
        // If no file was uploaded, you can choose to return TRUE or handle it differently
        if ($this->input->post('old_image4') != '') {
            return TRUE;
        } else {
            $this->form_validation->set_message('validate_image_dimensions4', 'Please upload an image.');
            return FALSE;
        }
    }

}





// public function validate_image_dimensions($file)
// {
//     // Get the file from the $_FILES array
//     $file = $_FILES['userfile'];

//     // Check if a file was uploaded
//     if ($file['size'] > 0) {
//         // Get image information like width and height
//         $image_info = getimagesize($file['tmp_name']);
//         //print_r($image_info);exit;
//         $width = 786;
//         $height = 480;

//         // Check if image dimensions meet the criteria
//         if (($image_info[0] == 786) && ($image_info[1] == 480)) {
//             return TRUE;
//         } else {
//             // Set a custom error message if validation fails
//             $this->form_validation->set_message('validate_image_dimensions', "The image dimensions should be {$width}x{$height} pixels.");
//             return FALSE;
//         }
//     } else {
//         // If no file was uploaded, you can choose to return TRUE or handle it differently
//         if($this->input->post('old_image') != ''){
//             return TRUE;
//         }else{
//             $this->form_validation->set_message('validate_image_dimensions', 'Please upload an image.');
//             return FALSE;
//         }
//     }
// }
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
