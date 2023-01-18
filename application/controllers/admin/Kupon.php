<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kupon extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_admin');
    }
    
    public function index()
    {
        if ($this->session->userdata('login')!=1) {
            $this->session->set_flashdata('message', ' <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i> Anda Belom Login
            </div>');
            redirect('Auth','refresh');
        }
        $data['kupon'] = $this->Crud->get_data('kupon')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_kupon',$data);
        $this->load->view('admin/v_footer');
    }

    public function add(){
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_addKupon');
        $this->load->view('admin/v_footer');
    }

    public function actionAdd(){
        $kodekupon = $this->input->post('kodekupon');
        $jumlah = $this->input->post('jumlah');
        $insert = array(
            'kode'=>$kodekupon,
            'jumlah'=>$jumlah
        );
        $this->Crud->insert_data($insert,'kupon');
        $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-info"></i> Info! Kupon Berhasil ditambah.
        </div>');
        redirect('admin/Kupon','refresh');
    }

    public function edit($id){
        $data['kupon'] = $this->Crud->edit_data(['id'=>$id],'kupon')->row_array();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_editKupon',$data);
        $this->load->view('admin/v_footer');
    }

    public function actionEdit(){
        $id = $this->input->post('id');
        $kodekupon = $this->input->post('kodekupon');
        $jumlah = $this->input->post('jumlah');
        $update = array(
            'kode'=>$kodekupon,
            'jumlah'=>$jumlah
        );
        $this->Crud->update_data(['id'=>$id],$update,'kupon');
        $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-info"></i> Info! Kupon Berhasil diubah.
        </div>');
        redirect('admin/Kupon','refresh');
    }

    public function delete($id){
        $this->Crud->delete_data(['id'=>$id],'kupon');
        $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-info"></i> Info! Kupon Berhasil dihapus.
        </div>');
        redirect('admin/Kupon','refresh');
    }

}

/* End of file Kupon.php */
 ?>