<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index()
    {
        $this->load->view('v_login');
    }

    public function prosesLogin(){
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $cek=$this->Crud->edit_data(['username'=>$username,'password'=>$password],'registration');
        if ($cek->num_rows() > 0) {
            $data=$cek->row_array();
            $dataSession = array(
                'login' => 1,
                'user' => $data['nama'],
                'role' => $data['role']
            );
            
            $this->session->set_userdata( $dataSession );
            
            redirect('admin/Dashboard','refresh');
        }else{
            $this->session->set_flashdata('message', ' <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i> Password atau username salah
            </div>');
            redirect('Auth','refresh');
        }
    }

    public function logout(){
        $array_items = array('login', 'user');
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