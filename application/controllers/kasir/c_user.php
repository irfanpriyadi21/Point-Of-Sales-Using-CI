<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_user extends CI_Controller {
   
    public function __construct(){
         parent::__construct();
         $this->load->model('m_crud');
         if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);
        }
         }

	public function index(){
        if($this->session->userdata('akses')=='3'){
        $data['title'] = "Add Data User";

        if($this->input->post('simpan')){
            $data = [
                "username" => $this->input->post('username', true),
                "password" =>base64_encode($this->input->post('password', true)),
                "email" => $this->input->post('email', true),
                "nama_user" => $this->input->post('nama_user', true),
                "id_level" => $this->input->post('id_level', true),
            ];
            $this->m_crud->save('user', $data);
            $this->session->set_flashdata('flash','data user behasil ditambahkan !!');
            redirect('kasir/c_user');
        }
            $data['view'] = $this->m_crud->Viewwhere('pengguna','nama_level', 'Pelanggan');
            $this->load->view('Templates/header', $data);
            $this->load->view('Templates/sidebar');
            $this->load->view('kasir/tambah_user', $data);
            $this->load->view('Templates/footer');
        }else{
            echo "Anda tidak berhak mengakses halaman ini";
        } 
    }
    public function hapus($id){
      $this->m_crud->delete('user', 'id_user', $id);
      $this->session->set_flashdata('flash', 'data berhasil dihapus !');
      redirect('kasir/c_user');
       }
    public function edit($id){
        if($this->session->userdata('akses')=='3'){
            $data['status'] = 1;
            $data['title'] = 'User';
            if($this->input->post('update')){
                $data = [
                    "username" => $this->input->post('username', true),
                    "password" =>base64_encode($this->input->post('password', true)),
                    "email" => $this->input->post('email', true),
                    "nama_user" => $this->input->post('nama_user', true),
                ];
                $this->m_crud->update('user', 'id_user', $id, $data);
                $this->session->set_flashdata('flash','data user berhasil di update !!');
                redirect('kasir/c_user');
            }
            $data['view1'] = $this->m_crud->Viewget('user', 'id_user', $id);
            $data['view'] = $this->m_crud->view('user');
            $this->load->view('Templates/header', $data);
            $this->load->view('Templates/sidebar', $data);
            $this->load->view('kasir/edit_user', $data);
            $this->load->view('Templates/footer');
        }else{
            echo "Anda tidak berhak mengakses halaman ini";
        } 
    }
}
