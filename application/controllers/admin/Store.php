<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once ('application/libraries/dompdf/autoload.inc.php'); 

// excel 
require_once('application/third_party/PHPExcel-1.8/Classes/PHPExcel.php');
// require_once ('application/libraries/phpexcel/autoload.php');
// use PhpOffice\PhpSpreadsheet\IOFactory;
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// use PhpOffice\PhpSpreadsheet\Writer\Xls;
// use PhpOffice\PhpSpreadsheet\Style\Fill;
// use PhpOffice\PhpSpreadsheet\Style\Border;
// use PhpOffice\PhpSpreadsheet\Style\Alignment;

use Dompdf\Dompdf; 
use Dompdf\Options; 
use Dompdf\FontMetrics; 

class Store extends CI_Controller {

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
		$this->load->model('admin/Countrymodel');
		$this->load->model('admin/Packagemodel');
		$this->load->model('admin/Taxmodel');
		$this->load->model('admin/Usermodel');
		$this->load->model('admin/Tablemodel');
		$this->load->model('admin/Packagemodel');
		
		require('Common.php');
		if (!$this->session->userdata('login_status')) {
			redirect(login);
		}
	}

	
	public function index()
	{
	    $data['stores']=$this->Storemodel->liststores();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/store/stores',$data);
		$this->load->view('admin/includes/footer');
	}
	public function view()
	{
		//echo "here";exit;
		$data['projects']=$this->Projectmodel->get_projects_by_clientid($this->input->post('id'));
		$data['job_locations']=$this->Storemodel->get_job_locations($this->input->post('id'));
	    $data['details']=$this->Storemodel->get($this->input->post('id'));
		//print_r($data['details']);exit;
		$this->load->view('admin/includes/header');
		$this->load->view('admin/client/view',$data);
		$this->load->view('admin/includes/footer');
	}
	
	public function delete(){
	    $this->Storemodel->delete($this->input->post('id'));
		$this->session->set_flashdata('error','Store deleted successfully');
	}
	
	public function add(){

		if ($this->session->userdata('last_insert_store_id')) {
			$data['store_details'] = $this->Storemodel->get($this->session->userdata('last_insert_store_id'));
		}


		$data['packages']=$this->Packagemodel->listpackages();
		$data['countries']=$this->Countrymodel->listcountries();
	    if(isset($_POST['add']))
		{
		    
		    $this->form_validation->set_error_delimiters('', ''); 
			$this->form_validation->set_rules('disp_name', 'Display Name', 'required');
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'required|callback_validate_phone');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('store_opening_time', 'Opening Time', 'required');
			$this->form_validation->set_rules('store_closing_time', 'Closing Time', 'required');
			// $this->form_validation->set_rules('followup_remarks', 'Followup Remark', 'required');
			$this->form_validation->set_rules('no_of_tables', 'No of Tables', 'required');
			$this->form_validation->set_rules('trade_license', 'Trade License', 'required');
			$this->form_validation->set_rules('location', 'Location', 'required');
			$this->form_validation->set_rules('gst_or_tax', 'Tax rate', 'required');
			//$this->form_validation->set_rules('bill_no', 'Bill no', 'required');
			$this->form_validation->set_rules('country', 'Country', 'required');
			$this->form_validation->set_rules('language', 'Language', 'required');
            // $this->form_validation->set_rules('currency', 'Currency', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

		
			if($this->form_validation->run() == FALSE) 
			{
				//echo "here";exit;
				$this->load->view('admin/includes/header');
			    $this->load->view('admin/store/add',$data); 
			    $this->load->view('admin/includes/footer');
			}
			else
			{
				//echo "here1";exit;
                if(!empty($_FILES['store_logo_image']['name'])){
					$config['upload_path'] = './uploads/store/';
					$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
					$config['file_name'] = $_FILES['store_logo_image']['name'];
					
					
					$this->load->library('upload',$config);
					$this->upload->initialize($config);
					
					if($this->upload->do_upload('store_logo_image')){
						$uploadData = $this->upload->data();
						$store_logo_image = $uploadData['file_name'];
						//echo "here";exit;
					}else{
					   $uploaderr=$this->upload->display_errors();
                       //echo $uploaderr;exit;
					}
				}else{
					$store_logo_image = '';
				}
				
				if($this->input->post('bill_no') == ''){  //GST Registration number
					$bill_no = 0;	
				}else{
					$bill_no = $this->input->post('bill_no'); //GST Registration number
				}

				$checkbox_values = $this->input->post('checkbox');
        		$checkbox_string = implode(",", $checkbox_values);// Convert array to comma-separated values if needed

				$checkbox_pickup_or_take_away = $this->input->post('checkbox_pickup_or_take_away'); //if checked 1 else 0
				$checkbox_dining = $this->input->post('checkbox_dining');
				$checkbox_delivery = $this->input->post('checkbox_delivery');

				$pickup_country_code = $this->input->post('pickup_country_code');
                $dining_country_code =  $this->input->post('dining_country_code');
                $delivery_country_code =  $this->input->post('delivery_country_code');

				$txt_pickup_or_take_away = $this->input->post('txt_pickup_or_take_away'); //if checked 1 else 0
				$txt_dining = $this->input->post('txt_dining');
				$txt_delivery = $this->input->post('txt_delivery');	

				  // Concatenate the values
				  $combinedPickupNumber = $pickup_country_code . $txt_pickup_or_take_away;
				  $combinedDiningNumber = $dining_country_code . $txt_dining;
				  $combinedDeliveryNumber =  $delivery_country_code . $txt_delivery;

			    $data = array(
					'store_disp_name' => $this->input->post('disp_name'),
			        'store_name' => $this->input->post('name'),
			        'store_desc' => $this->input->post('store_desc'),
			        'store_email' => $this->input->post('email'),
			        'store_phone' => $this->input->post('phone'),
                    'store_address' => $this->input->post('address'),
                    'store_opening_time' => $this->input->post('store_opening_time'),
					'store_closing_time' => $this->input->post('store_closing_time'),
					'contract_start_date' => $this->input->post('contract_start_date'),
					'contract_end_date' => $this->input->post('contract_end_date'),
					'next_followup_date' => $this->input->post('next_followup_date'),
					'followup_remarks' => $this->input->post('followup_remarks'),
					'no_of_tables' => $this->input->post('no_of_tables'),
					'store_trade_license' => $this->input->post('trade_license'),
                    'store_location' => $this->input->post('location'),
                    'store_country' => $this->input->post('country'),
					'gst_or_tax' => $this->input->post('gst_or_tax'),
					'bill_no' => $bill_no,
					'store_language' => $this->input->post('language'),
					'store_selected_languages' => $checkbox_string,
					'is_pickup' => $checkbox_pickup_or_take_away,
					'pickup_number' => $combinedPickupNumber,
					'is_dining' => $checkbox_dining,
					'dining_number' => $combinedDiningNumber,
					'is_delivery' => $checkbox_delivery,
					'delivery_number' => $combinedDeliveryNumber,
					'store_logo_image' => $store_logo_image,
			        'is_active' => 1,
			        );

				//print_r($data);exit;
				
				$package_details = $this->Packagemodel->get($this->input->post('no_of_tables')); //When add store select packege id then find no_of_quantity in the package table
				$last_insert_store_id = $this->Storemodel->insert($data);
				$this->session->set_userdata('last_insert_store_id', $last_insert_store_id);
				$this->session->set_userdata('last_insert_store_name', $this->input->post('name'));
				

				for ($i = 1; $i <= $package_details[0]['no_of_quantity']; $i++) {
					$data = array(
						'store_id' => $last_insert_store_id,
						'table_name' => 'Table '.$i,
						'qr_code' => '',
						'store_table_token' => '',
						'is_active' => 1,
					);
					$this->Storemodel->insert_store_table($data);
				}




				$data = array(
			        'userroleid' => 2,
                    'store_id' => $last_insert_store_id,
					'Name' => $this->input->post('name'),
			        'userEmail' => $this->input->post('email'),
					'userName' => $this->input->post('username'),
					'userPassword' => md5(trim($this->input->post('password'))),
					'userPhoneNumber' => $this->input->post('phone'),
					'userAddress' => $this->input->post('address'),
					'profileimg' => '',
			        'is_active' => 1,
			        );
					$this->Usermodel->insert($data);


				
				$this->session->set_flashdata('success','New record inserted...');
				redirect('admin/store/add');
			}
		}
		else
		{
		    $this->load->view('admin/includes/header');
			$this->load->view('admin/store/add',$data); 
			$this->load->view('admin/includes/footer');
		}
	}
	
	public function edit(){
		//print_r($data['tax_rates']);exit;
		$data['countries']=$this->Countrymodel->listcountries();
	    if(isset($_POST['edit']))
		{
		    $id=$this->input->post('id'); //echo $roleid;die();
			$data['storeDet']=$this->Storemodel->get($id);
			$data['tax_rates']=$this->Taxmodel->getTaxRatesByCountryId($this->input->post('hiddencountry')); //when edit get country tax rates using hidden country 
			$this->form_validation->set_rules('disp_name', 'Display Name', 'required');
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'required|callback_validate_phone');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('store_opening_time', 'Opening Time', 'required');
			$this->form_validation->set_rules('store_closing_time', 'Closing Time', 'required');
			$this->form_validation->set_rules('contract_start_date', 'Contract Start Date', 'required');
			$this->form_validation->set_rules('store_trade_license', 'Trade License', 'required');
			$this->form_validation->set_rules('store_location', 'Location', 'required');
			$this->form_validation->set_rules('gst_or_tax', 'Tax rate', 'required');
			// $this->form_validation->set_rules('bill_no', 'Billno', 'required');
			$this->form_validation->set_rules('country', 'Country', 'required');
			$this->form_validation->set_rules('language', 'Language', 'required');
            // $this->form_validation->set_rules('currency', 'Currency', 'required');
			// $this->form_validation->set_rules('username', 'Username', 'required');
			// $this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == FALSE) 
			{
				//echo "here";exit;
				$this->load->view('admin/includes/header');
			    $this->load->view('admin/store/edit',$data); 
			    $this->load->view('admin/includes/footer');
			}
			else
			{
				//echo "here1";exit;
				if(!empty($_FILES['store_logo_image']['name'])){
					$image_path = './uploads/store/' . $this->input->post('old_image');
					//echo $image_path;exit;
					//unlink($image_path);
					$config['upload_path'] = './uploads/store/';
					$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
					$config['file_name'] = $_FILES['store_logo_image']['name'];
					
					
					$this->load->library('upload',$config);
					$this->upload->initialize($config);
					
					if($this->upload->do_upload('store_logo_image')){
						$uploadData = $this->upload->data();
						$store_logo_image = $uploadData['file_name'];
					}else{
						$upload=0;
					   $uploaderr=$this->upload->display_errors();
	
					}
				}else{
					$store_logo_image = $this->security->xss_clean($this->input->post('old_image'));
				}

				$checkbox_values = $this->input->post('checkbox');
        		$checkbox_string = implode(",", $checkbox_values);// Convert array to comma-separated values if needed

				$checkbox_pickup_or_take_away = $this->input->post('checkbox_pickup_or_take_away'); //if checked 1 else 0
				$checkbox_dining = $this->input->post('checkbox_dining');
				$checkbox_delivery = $this->input->post('checkbox_delivery');

				$txt_pickup_or_take_away = $this->input->post('txt_pickup_or_take_away'); //if checked 1 else 0
				$txt_dining = $this->input->post('txt_dining');
				$txt_delivery = $this->input->post('txt_delivery');	
				
				$taxRate= $this->input->post('gst_or_tax');
				//  print_r($taxRate); exit;

				if($taxRate == 1){
					$bill_no = 0;

				}else{
					$bill_no = $this->input->post('bill_no');
				}

				$data = array(
					'store_disp_name' => $this->input->post('disp_name'),
					'store_name' => $this->input->post('name'),
			        'store_desc' => $this->input->post('store_desc'),
			        'store_email' => $this->input->post('email'),
			        'store_phone' => $this->input->post('phone'),
                    'store_address' => $this->input->post('address'),
                    'store_opening_time' => $this->input->post('store_opening_time'),
					'store_closing_time' => $this->input->post('store_closing_time'),
					'contract_start_date' => $this->input->post('contract_start_date'),
					'contract_end_date' => $this->input->post('contract_end_date'),
					'next_followup_date' => $this->input->post('next_followup_date'),
					'followup_remarks' => $this->input->post('followup_remarks'),
					'no_of_tables' => $this->input->post('no_of_tables'),
					'store_trade_license' => $this->input->post('store_trade_license'),
                    'store_location' => $this->input->post('store_location'),
                    'store_country' => $this->input->post('country'),
				    'gst_or_tax' => $taxRate,
					'bill_no' => $bill_no,
					'store_language' => $this->input->post('language'),
					'store_selected_languages' => $checkbox_string,
					'is_pickup' => $checkbox_pickup_or_take_away,
					'pickup_number' => $txt_pickup_or_take_away,
					'is_dining' => $checkbox_dining,
					'dining_number' => $txt_dining,
					'is_delivery' => $checkbox_delivery,
					'delivery_number' => $txt_delivery,
					'store_logo_image' => $store_logo_image,
			        'is_active' => $this->input->post('is_active'),
			        );
					//print_r($data);exit;
				$this->Storemodel->update($id,$data);
				$this->session->set_flashdata('success','Store details updated...');
				redirect('admin/store');
			}
		}
		else
		{
			//echo "this1=" . $this->input->post('id1');exit;
			$id=$this->input->post('id'); 
			$data['storeDet']=$this->Storemodel->get($id);//print_r($data['storeDet']);exit;
			$data['tax_rates']=$this->Taxmodel->getTaxRatesByCountryId($data['storeDet'][0]['store_country']); //when edit get country tax rates using hidden country id
			$this->load->view('admin/includes/header');
			$this->load->view('admin/store/edit',$data); 
			$this->load->view('admin/includes/footer');
		}
	}

	public function getTaxRates(){
		$data['tax_rates']=$this->Taxmodel->getTaxRatesByCountryId($this->input->post('country_id'));
// 		echo '<option value="">Select</option>';
		echo '<option value="1">Not Applicable</option>';
            foreach($data['tax_rates'] as $rate) { ?>
<option value="<?php echo $rate['tax_id']; ?>"><?php echo $rate['tax_rate']; ?></option>
<?php }
	}






	public function validate_phone($phone)
	{
		if (preg_match('/^\+?[0-9]{10,15}$/', $phone)) {
			return true;
		} else {
			$this->form_validation->set_message('validate_phone', 'The {field} field must be a valid phone number.');
			return false;
		}
	}
}