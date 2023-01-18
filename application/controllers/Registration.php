<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {


    public function index()
    {
        // if ($this->session->userdata('login')!= 1) {
        //     $this->session->set_flashdata('message', '<div class="alert alert-danger"><strong>Gagal!</strong> Anda Belom Login!</div>');
        //     redirect('Login','refresh');
        // }
        $data['registration']=$this->Crud->get_data('registration')->result();
        $this->load->view('admin/v_header');
        $this->load->view('registration/ViewRegistration', $data);
        $this->load->view('admin/v_footer');
    }

    public function add(){
        // if ($this->session->userdata('login')!= 1) {
        //     $this->session->set_flashdata('message', '<div class="alert alert-danger"><strong>Gagal!</strong> Anda Belom Login!</div>');
        //     redirect('Login','refresh');
        // }
        $this->load->view('admin/v_header');
        $this->load->view('registration/ViewAddRegistration');
        $this->load->view('admin/v_footer');
    }
    
    public function actionadd(){
        $data=array(
            'nama'=>$this->input->post('nama'),
            'username' => $this->input->post('username'),
            'role' => $this->input->post('role'),
            'password' => md5($this->input->post('password'))
        );
        $this->Crud->insert_data($data,'registration');
        $this->session->set_flashdata('message', '<div class="alert alert-success"><strong>Success!</strong> Data User berhasil Ditambah</div>');
        redirect('Registration','refresh');                   
        
    }

    public function detail($id){
        $data['registration']=$this->Crud->edit_data(['id'=>$id],'registration')->row_array();
        $this->load->view('admin/v_header');
        $this->load->view('registration/ViewDetailRegistration', $data);
        $this->load->view('admin/v_footer');
    }

    public function edit($id){
        $data['registration']=$this->Crud->edit_data(['id'=>$id],'registration')->row_array();
        $this->load->view('admin/v_header');
        $this->load->view('registration/ViewEditRegistration', $data);
        $this->load->view('admin/v_footer');
    }

    public function actionedit(){
        $password=$this->input->post('password');
        if ($password=="") {
            $data=array(
                'nama'=>$this->input->post('nama'),
                'username' => $this->input->post('username'),
                'role' => $this->input->post('role')
            );
        }else{
            $data=array(
                'nama'=>$this->input->post('nama'),
                'username' => $this->input->post('username'),
                'role' => $this->input->post('role'),
                'password' => md5($password)
            );
        }
       
        $this->Crud->update_data(['id'=>$this->input->post('id')],$data,'registration');
        $this->session->set_flashdata('message', '<div class="alert alert-success"><strong>Success!</strong> Data Registration berhasil Diubah</div>');
        redirect('Registration','refresh');           
        
    }

    public function delete($id){
        $this->Crud->delete_data(['id'=>$id],'registration');
        $this->session->set_flashdata('message', '<div class="alert alert-success"><strong>Success!</strong> Data Registration berhasil DiHapus</div>');
        redirect('Registration','refresh');           
    }

    public function login(){
        if ($this->session->userdata('login')== 1) {
            redirect('Dashboard','refresh');
        }
        $this->load->view('registration/login');
    }

    public function actionLogin(){
        $username=$this->input->post('username');
        $password=md5($this->input->post('password'));
        $query= $this->Crud->edit_data(['username'=>$username,'password'=>$password],'registration')->num_rows(); 
        $data= $this->Crud->edit_data(['username'=>$username,'password'=>$password],'registration')->row_array();
        if ($query>0) {
            $data_session=array(
                'nama' => $data['nama'],
                'login' => 1
            );
            
            $this->session->set_userdata( $data_session );
            
            redirect('Dashboard','refresh');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger"><strong>Gagal!</strong> Username atau Password Salah!</div>');
            redirect('Login','refresh');    
        }
    }

    public function dashboard(){
        if ($this->session->userdata('login')!= 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger"><strong>Gagal!</strong> Anda Belom Login!</div>');
            redirect('Login','refresh');
        }
        $this->load->view('admin/v_header');
        $this->load->view('registration/Dashboard');
        $this->load->view('admin/v_footer');
    }
    public function logout(){
        unset(
            $_SESSION['nama'],
            $_SESSION['login']
        );
        redirect('Login','refresh');
    }
}
?>