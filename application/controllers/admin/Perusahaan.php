<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller {

    public function index()
    {
        if ($this->session->userdata('login')!=1) {
            $this->session->set_flashdata('message', ' <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i> Anda Belom Login
            </div>');
            redirect('Auth','refresh');
        }
        $data['perusahaan'] = $this->Crud->get_data('perusahaan')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_perusahaan',$data);
        $this->load->view('admin/v_footer');
    }

    public function add(){
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_addPerusahaan');
        $this->load->view('admin/v_footer');
    }

    public function actionAdd(){
        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $alamat = $this->input->post('alamat');
        $kota = $this->input->post('kota');
        $kode_pos = $this->input->post('kode_pos');
        $telpon = $this->input->post('telpon');
        $email = $this->input->post('email');
      
        $insert = array(
            'nama_perusahaan'=>$nama_perusahaan,
            'alamat'=>$alamat,
            'kota'=>$kota,
            'kode_pos'=>$kode_pos,
            'telpon'=>$telpon,
            'email'=>$email
        );

        $this->Crud->insert_data($insert,'perusahaan');
        $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-info"></i> Info! Kupon Berhasil ditambah.
        </div>');
        redirect('admin/Perusahaan','refresh');
    }

    public function edit($id){
        $data['perusahaan'] = $this->Crud->edit_data(['id'=>$id],'perusahaan')->row_array();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_editPerusahaan',$data);
        $this->load->view('admin/v_footer');
    }

    public function actionEdit(){
        $id = $this->input->post('id');
        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $alamat = $this->input->post('alamat');
        $kota = $this->input->post('kota');
        $kode_pos = $this->input->post('kode_pos');
        $telpon = $this->input->post('telpon');
        $email = $this->input->post('email');
        $update = array(
            'nama_perusahaan'=>$nama_perusahaan,
            'alamat'=>$alamat,
            'kota'=>$kota,
            'kode_pos'=>$kode_pos,
            'telpon'=>$telpon,
            'email'=>$email
        );
        $this->Crud->update_data(['id'=>$id],$update,'perusahaan');
        $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-info"></i> Info! Kupon Berhasil diubah.
        </div>');
        redirect('admin/Perusahaan','refresh');
    }

    public function delete($id){
        $this->Crud->delete_data(['id'=>$id],'Perusahaan');
        $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-info"></i> Info! Data Berhasil dihapus.
        </div>');
        redirect('admin/Perusahaan','refresh');
    }

}

/* End of file Perusahaan.php */
 ?>