<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function index()
    {
        $id = $this->session->userdata('id');
        $data['profile'] = $this->Crud->edit_data(['id'=>$id],'registration')->row_array();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_profile',$data);
        $this->load->view('admin/v_footer');
    }

    public function update_data(){

        $password=$this->input->post('password');
        if ($password=="") {
            $data=array(
                'nama'=>$this->input->post('nama'),
                'username' => $this->input->post('username'),
                'no_telepon' => $this->input->post('no_telepon'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'kota' => $this->input->post('kota'),
            );
        }else{
            $data=array(
                'nama'=>$this->input->post('nama'),
                'username' => $this->input->post('username'),
                'no_telepon' => $this->input->post('no_telepon'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'kota' => $this->input->post('kota'),
                'password' => md5($password)
            );
        }
       

        $this->Crud->update_data(['id'=>$this->input->post('id')],$data,'registration');
        $this->session->set_flashdata('message', '<div class="alert alert-success"><strong>Success!</strong> Profil berhasil Diubah</div>');
        redirect('admin/profile','refresh');           
    }

}

/* End of file Controllername.php */


?>