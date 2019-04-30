<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_order extends CI_Controller {
   
    public function __construct(){
         parent::__construct();
         $this->load->model('m_crud');
         if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);
        }
         }

	public function index(){
        if($this->session->userdata('akses')=='5'){
                $data['title'] = "Add Data User";
            
                if($this->input->post('simpan')){
                    $data = [
                        "no_meja" => $this->input->post('no_meja', true),
                        "id_user" => $this->session->userdata('ses_user'),
                        "keterangan" => $this->input->post('keterangan', true),
                        "status_order" => "Belum Bayar",
                    ];
                    $update = [
                        "keterangan" => "1",
                    ];
                    $this->m_crud->update('meja', 'no_meja', $this->input->post('no_meja'), $update);
                    $this->m_crud->save('order', $data);
                    $this->session->set_flashdata('flash','data behasil ditambahkan !!');
                    redirect('pelanggan/c_order');
                }
            $data['view1'] = $this->m_crud->Viewwhere('meja','keterangan', '0');
            $data['view'] = $this->m_crud->view('order');
            $this->load->view('Templates/header', $data);
            $this->load->view('Templates/sidebar');
            $this->load->view('pelanggan/tambah_order', $data);
            $this->load->view('Templates/footer');
        }else{
            echo "Anda tidak berhak mengakses halaman ini";
        } 
            }
    public function hapus($id){
            $this->m_crud->delete('order', 'id_order', $id);
            $this->session->set_flashdata('flash', 'data berhasil dihapus !');
            redirect('pelanggan/c_order');
     
    }

    public function view($id){
        if($this->session->userdata('akses')=='5'){
                $data['status'] = 1;
                $data['title'] = 'order';
                if($this->input->post('simpan')){
                $data = [
                    "id_order" => $id,
                    "id_masakan" => $this->input->post('id_masakan', true),
                    "qty" => $this->input->post('qty', true),
                    "keterangan" => $this->input->post('keterangan', true),
                    "status_detail_order" => "Belum Bayar"
                ];
                $menu = $this->m_crud->Viewwhere2('detail_order',['id_order','id_masakan'],[$id,$data['id_masakan']]);
                if(count($menu) > 0){
                    $data = [
                            "qty" => $menu['qty'] + $this->input->post('qty', true),
                            "keterangan" => $this->input->post('keterangan', true),
                    ];
                        $this->m_crud->update('detail_order','id_detail_order',$menu['id_detail_order'],$data);
                }else{
                        $this->m_crud->save('detail_order', $data);
                }

                $this->session->set_flashdata('flash','data order berhasil di simpan !!');
                redirect('pelanggan/c_order/view/'.$id);
            }
            $data['view1'] = $this->m_crud->Viewget('order', 'id_order', $id);
            $data['view'] = $this->m_crud->Viewwhere('masakan','status_masakan', 'Ready');
            $data['view_detail_order'] = $this->m_crud->Viewwhere('query_detail_order', 'id_order', $id);
            $this->load->view('Templates/header', $data);
            $this->load->view('Templates/sidebar', $data);
            $this->load->view('pelanggan/View_order', $data); 
            $this->load->view('Templates/footer');
        }else{
            echo "Anda tidak berhak mengakses halaman ini";
        } 
            }
    public function hapus_order($id){
        if($this->session->userdata('akses')=='5'){
            $this->m_crud->delete('detail_order', 'id_detail_order', $id);
            $this->session->set_flashdata('flash', 'data berhasil dihapus !');
            redirect('pelanggan/c_order/view/'.$this->input->get('id'));
        }else{
            echo "Anda tidak berhak mengakses halaman ini";
        } 
    }
}
