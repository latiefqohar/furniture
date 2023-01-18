<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
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
        $data['transaksi'] = $this->Crud->edit_data(['status'=>3,'pembayaran!='=>'transfer'],'transaksi')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_tagihan',$data);
        $this->load->view('admin/v_footer');
    }

}

/* End of file Tagihan.php */
 ?>