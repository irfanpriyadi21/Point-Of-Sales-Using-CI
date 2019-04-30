<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_laporan extends CI_Controller {
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
            if($this->session->userdata('akses')=='4'){
                $data['title'] = "Laporan Transaksi";
                if($this->input->post('cari')){
                    $explode = explode("/", $this->input->post('tgl_mulai'));
                    $mulai = $explode[2]."-".$explode[0]."-".$explode[1];
                    $explode = explode("/", $this->input->post('tgl_selesai'));
                    $selesai = $explode[2]."-".$explode[0]."-".$explode[1];
                    $data['transaksi'] = $this->m_crud->Viewwhere('laporan_transaksi',"tanggal BETWEEN '$mulai 00:00:00' AND '$selesai 23:59:59'", '');
                    $data['mulai'] = $mulai;
                    $data['selesai'] = $selesai;
                }else{
                    $data['transaksi'] = $this->m_crud->view('laporan_transaksi');
                }
                $this->load->view('Templates/header', $data);
                $this->load->view('Templates/sidebar');
                $this->load->view('owner/laporan_transaksi', $data);
                $this->load->view('Templates/footer');
            }else{
                echo "Anda tidak berhak mengakses halaman ini";
            }
            //?mulai=2019-01-01 $this->input->query('mulai')
    }
    public function print_laporan(){ 
        if($this->input->get('mulai')){
            $mulai = $this->input->get('mulai');
            $selesai = $this->input->get('selesai');
            $data['transaksi'] = $this->m_crud->Viewwhere('laporan_transaksi',"tanggal BETWEEN '$mulai 00:00:00' AND '$selesai 23:59:59'", '');
        }else{
            $data['transaksi'] = $this->m_crud->view('laporan_transaksi');
        }
        $this->load->view('owner/lap_transaksi2', $data);
    }

}

/* End of file c_laporan.php */
