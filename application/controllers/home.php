<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
                $data = array();
                $data['head'] = $this->layout->head($this->lang->line('custom_company_name'),css_files(),js_files());
                
                $data['company_name'] = $this->lang->line('custom_company_name');
                $data['cutomize_link'] = site_url('customer/shop');
		$data['footer'] = $this->layout->footer();
                $this->load->view('website', $data);
	}
        public function artisans(){
            $data = array();
                $data['head'] = $this->layout->head($this->lang->line('custom_company_name'),css_files(),js_files());
                
                $data['company_name'] = $this->lang->line('custom_company_name');
                
		$data['footer'] = $this->layout->footer();
                $this->load->view('artisans', $data);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */