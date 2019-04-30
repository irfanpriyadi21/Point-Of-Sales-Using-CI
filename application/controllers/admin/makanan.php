<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class makanan extends CI_Controller {
   
    public function __construct(){
         parent::__construct();
         $this->load->model('m_crud');
         if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);
        }
         }

	public function index(){

        $data['title'] = "Makanan";

        if($this->input->post('simpan')){
            $data = [
                "nama_masakan" => $this->input->post('nama_masakan', true),
                "harga" => $this->input->post('harga', true),
                "status_masakan" => $this->input->post('status_masakan', true),
            ];
            $this->m_crud->save('masakan', $data);
            $this->session->set_flashdata('flash','data behasil ditambahkan !!');
            redirect('admin/makanan');
        }
    $data['view'] = $this->m_crud->view('masakan');
    $this->load->view('Templates/header', $data);
    $this->load->view('Templates/sidebar');
    $this->load->view('admin/tambah_masakan', $data);
    $this->load->view('Templates/footer');
    }
    public function hapus($id){
      $this->m_crud->delete('masakan', 'id_masakan', $id);
      $this->session->set_flashdata('flash', 'data makanan berhasil dihapus !');
      redirect('admin/makanan');
       }
    public function edit($id){
     $data['status'] = 1;
     $data['title'] = 'makanan';
    if($this->input->post('update')){
        $data = [
            "nama_masakan" => $this->input->post('nama_masakan', true),
            "harga" => $this->input->post('harga', true),
            "status_masakan" => $this->input->post('status_masakan', true),
        ];
        $this->m_crud->update('masakan', 'id_masakan', $id, $data);
        $this->session->set_flashdata('flash','data makanan berhasil di update !!');
        redirect('admin/makanan');
    }
    $data['view1'] = $this->m_crud->Viewget('masakan', 'id_masakan', $id);
    $data['view'] = $this->m_crud->view('masakan');
    $this->load->view('Templates/header', $data);
    $this->load->view('Templates/sidebar', $data);
    $this->load->view('admin/Edit_masakan', $data);
    $this->load->view('Templates/footer');
    
    }
}
