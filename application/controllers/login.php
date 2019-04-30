<?php
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('login_model');
    }
    function index(){
        if($this->session->userdata('ses_user')){
            return redirect('page');
        }
        $this->load->view('sign_in');
    }
 
    function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=base64_encode($this->input->post('password',TRUE));
 
        $cek_user=$this->login_model->auth_user($username,$password);
 
        if($cek_user->num_rows() > 0){ 
                        $data=$cek_user->row_array();
                $this->session->set_userdata('masuk',TRUE);
                 if($data['id_level']=='1'){ //Akses admin
                    $this->session->set_userdata('akses','1');
                    $this->session->set_userdata('ses_nama',$data['nama_user']);
                    $this->session->set_userdata('ses_email',$data['email']);
                    $this->session->set_userdata('ses_user',$data['id_user']);
                    redirect('page');
 
                 }else if($data['id_level']=='2'){ //akses waiter
                    $this->session->set_userdata('akses','2');
                    $this->session->set_userdata('ses_nama',$data['nama_user']);
                    $this->session->set_userdata('ses_email',$data['email']);
                    $this->session->set_userdata('ses_user',$data['id_user']);
                    redirect('page/waiter');
                 }else if($data['id_level']=='3'){ //akses Kasir
                    $this->session->set_userdata('akses','3');
                    $this->session->set_userdata('ses_nama',$data['nama_user']);
                    $this->session->set_userdata('ses_email',$data['email']);
                    $this->session->set_userdata('ses_user',$data['id_user']);
                    redirect('page/kasir');
                }else if($data['id_level']=='4'){ //akses Owner
                    $this->session->set_userdata('akses','4');
                    $this->session->set_userdata('ses_nama',$data['nama_user']);
                    $this->session->set_userdata('ses_email',$data['email']);
                    redirect('page/owner');
                }else{  //akses Pelanggan
                    $this->session->set_userdata('akses','5');
                    $this->session->set_userdata('ses_nama',$data['nama_user']);
                    $this->session->set_userdata('ses_email',$data['email']);
                    redirect('page/pelanggan');
                }
 
        }else{     
                            $url=base_url();
                            echo $this->session->set_flashdata('msg','Username Atau Password Salah');
                            redirect($url);
                    }
    }
 
    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }
}