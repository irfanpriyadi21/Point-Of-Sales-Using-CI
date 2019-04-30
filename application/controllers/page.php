<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    //validasi jika user belum login
    // if($this->session->userdata('masuk') != TRUE){
    //         $url=base_url();
    //         redirect($url);
    //     }
  }
  function index(){
    redirect('admin/home');
  }
  function waiter(){
    redirect('waiter/home');
  }
  function kasir(){
    redirect('kasir/home');
  }
  function owner(){
    redirect('owner/home');
  }
  function pelanggan(){
    redirect('pelanggan/home');
  }
}