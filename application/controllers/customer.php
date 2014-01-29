<?php
class Customer extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('catalog');
    }
    public function index(){
        redirect('customer/shop');
    }
//    public function homepage(){
//        $data = array();
//        $data['head'] = $this->layout->head($this->lang->line('custom_company_name'),css_files(),js_files());
//        $data['company_name'] = $this->lang->line('custom_company_name');        
//        $data['customer_data'] = $this->account->get_account_data($this->session->userdata('username'));
//        $data['footer'] = $this->layout->footer();
//        $this->load->view('catalog/home', $data);
//    }
//    public function login(){
//        $data = array();
//        $data['head'] = $this->layout->head($this->lang->line('custom_company_name'),css_files(),js_files());
//        $data['company_name'] = $this->lang->line('custom_company_name');        
//        $data['footer'] = $this->layout->footer();
//        $this->load->view('login', $data);
//    }
//    public function validate_login(){
//        $inputs = array();
//        $inputs['username'] = $this->input->post('username');
//        $inputs['password'] = $this->input->post('password');
//        if($this->account->validate($inputs) == 1){
//            // Admin side login success
//            $this->session->set_userdata('username', $inputs['username']);
//            $this->session->set_userdata('module', 1);
//            echo $this->lang->line('custom_login_admin_success');
//        } else if($this->account->validate($inputs) == 2){
//            // Catalog side login success
//            $this->session->set_userdata('username', $inputs['username']);
//            $this->session->set_userdata('module', 2);
//            echo $this->lang->line('custom_login_customer_success');
//        } else if($this->account->validate($inputs) == 3){
//            // password incorrect
//            echo $this->lang->line('custom_incorrect_password');
//        }else if($this->account->validate($inputs) == 4){
//            // User does not exists
//            echo $this->lang->line('custom_account_not_exist');
//        }
//    }
//    public function register(){
//        $data = array();
//        $data['head'] = $this->layout->head($this->lang->line('custom_company_name'),css_files(),js_files());
//        $data['company_name'] = $this->lang->line('custom_company_name');
//        $data['success_validation'] = null;
//        $data['footer'] = $this->layout->footer();
//        $this->load->view('register', $data);
//    }
//    public function validate_registration(){
//        $this->form_validation->set_rules('student_id', 'Username', 'required');
//        $this->form_validation->set_rules('password','Password','alpha_numeric|trim|required|matches[conf_password]');
//        $this->form_validation->set_rules('conf_password','Retyped Password','alpha_numeric|trim|required');
//        $this->form_validation->set_rules('firstname', 'Firstname', 'required|alpha');
//        $this->form_validation->set_rules('lastname', 'Lastname', 'required|alpha');
//        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
//        
//        $data = array();
//        $data['head'] = $this->layout->head($this->lang->line('custom_company_name'),css_files(),js_files());
//        $data['company_name'] = $this->lang->line('custom_company_name');
//        $data['success_validation'] = null;
//        $data['footer'] = $this->layout->footer();
//        if ($this->form_validation->run() == FALSE)
//        {
//            $this->load->view('register', $data);
//        }
//        else
//        {
//            // When validation of formats are done
//            // Dito na makikita kung may isa pa siyang account
//            if($this->account->check_existing_account($this->input->post('student_id')) > 0){
//                $data['success_validation'] = $this->lang->line('custom_account_existing');
//                $this->load->view('register', $data);
//            } else {
//                // Successfully Registered
//                $inputs                 = array();
//                $inputs['username']     = $this->input->post('student_id');
//                $inputs['firstname']    = $this->input->post('firstname');
//                $inputs['lastname']     = $this->input->post('lastname');
//                $inputs['password']     = $this->input->post('password');
//                $inputs['email']        = $this->input->post('email');
//                
//                $this->account->register_customer($inputs);
//                
//                $data['success_validation'] = $this->lang->line('custom_success_registration');
//                $this->load->view('register', $data);
//            }
//	}
//    }
    public function bought(){
        $datas = array(
            'size'=>$this->request->post('product_size'),
            'color'=>$this->request->post('product_size'),
            'ears'=>$this->request->post('ears'),
            'accs'=>$this->request->post('accessories')
        );
    }
    public function shop(){
        $uri_segments = array();
        if($this->input->get('category')){
            $uri_segments['category'] = $this->input->get('category');
        }else{
            $uri_segments['category'] = null;
        }
        
        $data = array();
        $data['head'] = $this->layout->head($this->lang->line('custom_shop_text'),css_files(),js_files());
        $data['company_name'] = $this->lang->line('custom_company_name');
        $data['header_text'] = $this->lang->line('custom_shop_text');
        $data['cutomize_link'] = site_url('customer/customize');
        $data['products'] = $this->catalog->getProducts($uri_segments);
        $data['product_categories'] = $this->catalog->getProductCategories();
//        debug_result($this->catalog->getProducts($uri_segments));
	$data['footer'] = $this->layout->footer();
        $this->load->view('catalog/shop', $data);
    }
    
    public function submit_drawing(){
        $data = array();
        $data['head'] = $this->layout->head($this->lang->line('custom_submit_drawing'),  css_files(),  js_files());
        $data['company_name'] = $this->lang->line('custom_company_name');
        $data['product_categories'] = $this->catalog->getProductCategories();
        $data['header_link'] = $this->lang->line('custom_submit_drawing');
        
        $this->load->view('catalog/submit_drawing', $data);//''
    }
    public function print_customer_drawing(){
        $this->upload->data();

        $data = array();
        $data['head'] = $this->layout->head("Customers Drawing",  css_files());
        $data['customer_name'] = $this->input->post('firstname') . " " . $this->input->post('lastname');
        $html = $this->load->view('catalog/print_customer_drawing', $data, true);
        pdf_create($html, "cart_invoice");
    }
    public function browse_designs(){
        $product_no = null;
        if($this->input->get('product_no')){
            $product_no = $this->input->get('product_no');
        }
        $data = array();
        $data['head'] = $this->layout->head($this->lang->line('custom_shop_text'),css_files(),js_files());
        $data['company_name'] = $this->lang->line('custom_company_name');
        $data['header_text'] = $this->lang->line('custom_shop_text');
        
        $data['products'] = $this->catalog->getProductDesign($product_no);
        $data['product_categories'] = $this->catalog->getProductCategories();

	$data['footer'] = $this->layout->footer();
        $this->load->view('catalog/browse_designs', $data);
    }
    public function draw_product(){
        $product_no = null;
        if($this->input->get('product')){
            $product_no = $this->input->get('product');
        } else {
            $product_no = null;
        }
        $data = array();
        $data['head'] = $this->layout->head($this->lang->line('custom_drawing_text'),css_files(),js_files(), 1);
        $data['company_name'] = $this->lang->line('custom_company_name');
        $data['header_text'] = $this->lang->line('custom_drawing_text');
        $data['product_categories'] = $this->catalog->getProductCategories();
        
        $data['product_info'] = $this->catalog->getProduct($product_no);
        $data['product_available_colors'] = $this->catalog->getAvailableProductColors($product_no);
        $data['product_custom_features'] = $this->catalog->getProductCustomFeatures($product_no);
        $data['sizes'] = array(array("size"=>"Small","value"=>"s"),array("size"=>"Medium","value"=>"m"),array("size"=>"Large","value"=>"l"));
        $data['footer'] = $this->layout->footer();

        $this->load->view('catalog/draw_product', $data);
    }
    public function customize_product(){
        $uri_segments = array();
        if($this->input->get('product')){
            $uri_segments['product_no'] = $this->input->get('product');
        }else{
            $uri_segments['product_no'] = null;
        }
        $data = array();
        $data['head'] = $this->layout->head($this->lang->line('custom_customize_text'),css_files(),js_files());
        $data['company_name'] = $this->lang->line('custom_company_name');
        $data['header_text'] = $this->lang->line('custom_customize_text');
        $data['product_categories'] = $this->catalog->getProductCategories();
        
        $data['product_info'] = $this->catalog->getProduct($uri_segments['product_no']);
        $data['product_available_sizes'] = array(array("size"=>"s","name"=>"Small"),array("size"=>"m","name"=>"Medium"),array("size"=>"l","name"=>"Large"));
        $data['product_available_colors'] = $this->catalog->getAvailableProductColors($uri_segments['product_no']);
        $data['product_custom_features'] = $this->catalog->getProductCustomFeatures($uri_segments['product_no']);
        $data['footer'] = $this->layout->footer();
//        echo "<pre>";print_r($data['product_info']);die();
        $this->load->view('catalog/customization', $data);
    }
    public function submitCustomOrder(){
        $curr_customer = array();
        $curr_customer['product_no'] = $this->input->post('product_no');
        $curr_customer['customer_ip'] = $this->input->ip_address();
        $curr_customer['animal_ear'] = $this->input->post('ears');
        $curr_customer['sp_features'] = $this->input->post('accessories');
        $curr_customer['sp_features'][] = $this->input->post('ears');
        
//        debug_result($curr_customer);
        
        $this->session->set_userdata(array('customer_curr'=>$curr_customer));
        $current_customer = $this->session->userdata('customer_curr');

        $data = array();
        $data['head'] = $this->layout->head($this->lang->line('custom_customize_text'),css_files(),js_files());
        $data['company_name'] = $this->lang->line('custom_company_name');
        $data['header_text'] = $this->lang->line('custom_submit_text');
        $data['product_categories'] = $this->catalog->getProductCategories();

        // model products interaction
        $data['product_info'] = $this->catalog->getProduct($current_customer['product_no']);

        $data['product_features'] = $this->catalog->getFeatures($current_customer['sp_features']);
        $data['total_price'] = $this->catalog->getTotalPrice(
                $this->catalog->getProduct($current_customer['product_no']),
                $this->catalog->getFeatures($current_customer['sp_features'])
                );
        
        $data['footer'] = $this->layout->footer();
        $this->load->view('catalog/submit_customization', $data);
    }
    public function validateBuyConfirmation(){
        $errorMsg = null;
        $fetch_inputs = array();
        
        if($this->input->post('idNo') != null){
            if(validate_id($this->input->post('idNo')) != null){
                $fetch_inputs['id'] = $this->input->post('idNo');
            } else {
                $errorMsg .= "Your <b>ID</b> is not valid. ";
            }
        } else {
            $errorMsg .= "<b>ID</b> should not be empty. ";
        }
        
        if($this->input->post('firstname')!=null){
            if(ctype_alpha(str_replace(' ', '', $this->input->post('firstname')))){
                $fetch_inputs['firstname'] = $this->input->post('firstname');
            } else {
                $errorMsg .= "<b>Firstname</b> should all be alphabetical letters (or with spaces). ";
            }
        } else {
            $errorMsg .= "<b>Firstname</b> should not be empty. ";
        }
        
        if($this->input->post('lastname')!=null){
            if(ctype_alpha(str_replace(' ', '', $this->input->post('lastname')))){
                $fetch_inputs['lastname'] = $this->input->post('lastname');
            } else {
                $errorMsg .= "<b>Lastname</b> should all be alphabetical letters (or with spaces). ";
            }
        } else {
            $errorMsg .= "<b>Lastname</b> should not be empty. ";
        }
        
        if($this->input->post('phone')!=null){
            if(ctype_digit($this->input->post('phone'))){
                $fetch_inputs['phone'] = $this->input->post('phone');
            } else {
                $errorMsg .= "<b>Contact Number</b> should only consist of numbers. ";
            }
        } else {
            $errorMsg .= "<b>Contact Number</b> should not be empty. ";
        }
        
        if($this->input->post('email')!=null){
            if(filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)){
                $fetch_inputs['email'] = $this->input->post('email');
            } else {
                $errorMsg .= "Your <b>Contact Email</b> input is not a valid email. ";
            }
        } else {
            $errorMsg .= "<b>Contact Email</b> should not be empty. ";
        }
        
        $fetch_inputs['total_price'] = $this->input->post('totalPrice');
        
        if($errorMsg){
            error_message($errorMsg);
        } else {
            success_message("Nice! Your order is now processing.");
            $this->catalog->saveOrder($fetch_inputs,$this->session->userdata('customer_curr'));
        }
    }
    public function getProductPreview(){
        echo $this->input->post('selectedSize') . "\n";
        echo $this->input->post('selectedColor') . "\n";
        echo $this->input->post('selectedEar') . "\n";
        echo $this->input->post('selectedAccs') . "\n";
    }

//    public function logout(){
//        $this->session->sess_destroy();
//        redirect('customer/login');
//    }
}
