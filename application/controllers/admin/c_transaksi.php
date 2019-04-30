<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_transaksi extends CI_Controller {
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
        if($this->session->userdata('akses')=='1'){
            $data['title'] = "Transaksi";
            $data['view'] = $this->m_crud->view('order');
            $this->load->view('Templates/header', $data);
            $this->load->view('Templates/sidebar');
            $this->load->view('admin/View_transaksi', $data);
            $this->load->view('Templates/footer');
        }else{
            echo "Anda tidak berhak mengakses halaman ini";
        } 
    }
    public function view($id)
    {
        if($this->session->userdata('akses')=='1'){
            if($this->input->post('simpan')){
                $data =[
                    "id_user" => $this->session->userdata('ses_user'),
                    "id_order" => $id,  
                    "total_bayar" => $this->input->post('bayar'),
                    "jumlah" => $this->input->post('jumlah'),
                    "kembalian" => $this->input->post('kembalian'),
                ];
                $update = [
                    "status_order" => "Lunas",
                ];
                $update2 = [
                    "keterangan" => "0",
                ];
                $update3 = [
                    "status_detail_order" => "Sudah Bayar",
                ];
                $meja = $this->m_crud->Viewget('order', 'id_order', $id);
                $this->m_crud->update('meja', 'no_meja', $meja['no_meja'], $update2);
                $this->m_crud->update('order', 'id_order', $id, $update);
                $this->m_crud->update('detail_order', 'id_order', $id, $update3);
                $this->m_crud->save('transaksi', $data);
                $this->session->set_flashdata('flash','data Pembayaran berhasil di simpan !!');
                redirect('admin/c_transaksi');
                }
                $data['title'] = "Pembayaran";
                $data['view'] = $this->m_crud->Viewwhere('query_detail_order','id_order', $id);
                $this->load->view('Templates/header', $data);
                $this->load->view('Templates/sidebar');
                $this->load->view('admin/View_pembayaran', $data);
                $this->load->view('Templates/footer');
        }else{
                echo "Anda tidak berhak mengakses halaman ini";
        } 
    }
    public function faktur($id)
    {
        if($this->session->userdata('akses')=='1'){
            $data['title'] = "Transaksi";
            $data['view'] = $this->m_crud->Viewwhere('transaksi','id_order', $id);
            $data['view_detail_order'] = $this->m_crud->Viewwhere('query_detail_order', 'id_order', $id);
            $this->load->view('admin/cetak_faktur', $data);
        }else{
            echo "Anda tidak berhak mengakses halaman ini";
        } 
    }
    public function hapus_order($id)
    {
        if($this->session->userdata('akses')=='1'){
            $this->m_crud->delete('order', 'id_order', $id);
            $this->session->set_flashdata('flash', 'data berhasil dihapus !');
            redirect('admin/c_transaksi');
        }else{
            echo "Anda tidak berhak mengakses halaman ini";
        } 
    }
    public function laporan_transaksi()
    {
        if($this->session->userdata('akses')=='1'){
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
            $this->load->view('admin/laporan_transaksi', $data);
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
        $this->load->view('admin/lap_transaksi2', $data);
    }
}

/* End of file Controllername.php */
