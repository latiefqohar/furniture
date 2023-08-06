<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Crud','crud');
        
    }
    

    public function index()
    {
        $this->load->view('v_login');
    }

    public function register()
    {
        $this->load->view('v_register');
    }

    public function register_process(){
        $post = $this->input->post();
        $data_input = array(
            'nama'=>$post['nama'],
            'no_telepon'=>$post['no_telepon'],
            'email'=>$post['email'],
            'alamat'=>$post['alamat'],
            'kota'=>$post['kota'],
            'username'=>$post['username'],
            'password'=>md5($post['password']),
            'role'=>'Customer'
        );
        $cek = $this->crud->edit_data(['username'=>$post['username']],'registration')->num_rows();
        if ($cek > 0) {
            $this->session->set_flashdata('message', ' <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i> Username sudah pernah terdaftar salah
            </div>');
            redirect('auth/register','refresh');
        }else{
            $this->crud->insert_data($data_input,'registration');
            $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i> User berhasil ditambah, silahkan login
            </div>');
            redirect('auth','refresh');
        }
        
    }

    public function prosesLogin(){
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $cek=$this->Crud->edit_data(['username'=>$username,'password'=>$password],'registration');
        if ($cek->num_rows() > 0) {
            $data=$cek->row_array();
            $dataSession = array(
                'login' => 1,
                'id' => $data['id'],
                'user' => $data['nama'],
                'role' => $data['role']
            );
            
            $this->session->set_userdata( $dataSession );

            if ($data['role']=="Customer") {
                redirect('/','refresh');
            }else{
                redirect('admin/Dashboard','refresh');
            }
        }else{
            $this->session->set_flashdata('message', ' <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i> Password atau username salah
            </div>');
            redirect('Auth','refresh');
        }
    }

    public function logout(){
        $array_items = array('login', 'user', 'id');
        $this->session->unset_userdata($array_items);
        $this->session->set_flashdata('message', ' <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-info"></i> Berhasil Logout
        </div>');
        redirect('Auth','refresh');
    }

}

/* End of file Auth.php */
 ?>