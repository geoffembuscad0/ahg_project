<?php
class Admin extends CI_Controller {
    public function homepage(){
        $data = array();
        $data['head'] = $this->layout->head($this->lang->line('custom_company_name'),css_files(),js_files());
        $data['company_name'] = $this->lang->line('custom_company_name');
        
        $data['account_data'] = $this->account->get_account_data($this->session->userdata('username'));

        $data['footer'] = $this->layout->footer();
        $this->load->view('admin/home', $data);
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('customer/login');
    }
}