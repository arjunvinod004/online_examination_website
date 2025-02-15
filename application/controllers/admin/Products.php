<?php
class Products extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Productmodel');
    }

    public function index()
	{
		$this->load->view('admin/includes/header');
		$this->load->view('admin/product/add');
		$this->load->view('admin/includes/footer');
	}

    // Function to add a product with translations
    public function add() {
        // Get the submitted form data
        $product_data = [
            'sku' => $this->input->post('sku'),
            'price' => $this->input->post('price')
        ];

        // Insert product data into 'products' table
        $product_id = $this->Productmodel->insert_product($product_data);

        // Insert translation data into 'product_translations' table
        $translations = [
            'ma' => [
                'title' => $this->input->post('title_ma'),
                'description' => $this->input->post('description_ma')
            ],
            'en' => [
                'title' => $this->input->post('title_en'),
                'description' => $this->input->post('description_en')
            ],
            'hi' => [
                'title' => $this->input->post('title_hi'),
                'description' => $this->input->post('description_hi')
            ],
            'ar' => [
                'title' => $this->input->post('title_ar'),
                'description' => $this->input->post('description_ar')
            ]
        ];

        foreach ($translations as $language => $translation) {
            $translation_data = [
                'product_id' => $product_id,
                'language' => $language,
                'title' => $translation['title'],
                'description' => $translation['description']
            ];

            $this->Productmodel->insert_translation($translation_data);
        }

        // Redirect or display success message
        redirect('products');
    }
}
?>
