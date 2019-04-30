<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('m_crud');
        if($this->session->userdata('masuk') != TRUE){
           $url=base_url();
           redirect($url);
       }
        }
	public function index()
	{
    $data['title'] = "Dashboard";

    if($this->session->userdata('akses')=='4'){
    $data['view'] = $this->m_crud->Viewwhere('pengguna', 'id_level', '5');
    $this->load->view('Templates/header',$data);
    $this->load->view('Templates/sidebar');
    $this->load->view('owner/dashboard',$data);
    $this->load->view('Templates/footer');
}else{
    echo "Anda tidak berhak mengakses halaman ini";
  }
	}
}
