<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
    
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
        if (isset($_POST['date_start'])) {
            $where = array(
                'waktu >'=>$this->input->post('date_start')." 00:00:00",
                'waktu <'=>$this->input->post('date_end')." 23:59:59"
                
            );    
            $data['transaksi'] = $this->Crud->edit_data($where,'transaksi')->result();
        }else{
            $data['transaksi'] = $this->Crud->get_data('transaksi')->result();
        }
       

        $this->load->view('admin/v_header');
        $this->load->view('admin/v_transaksi',$data);
        $this->load->view('admin/v_footer');
    }

    public function detail($id){
        if (isset($_POST['id'])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '1024';
            $config['overwrite'] = true;

            $this->load->library('upload', $config);

            if(!empty($_FILES['foto']['name'])){
                echo "cek1";
                if(!$this->upload->do_upload('foto')){
                   echo $this->upload->display_errors();  
                   echo 'gagal';
                }else{
                    $data_upload =  $this->upload->data();
                    $foto['foto'] = $data_upload['file_name'];            
                    $this->Crud->update_data(['id'=>$this->input->post('id')],['foto'=>$foto['foto']],'transaksi');
                }
            }
        }
        $data['transaksi'] = $this->Crud->edit_data(['id'=>$id],'transaksi')->row_array();
        $data['detail'] = $this->Model_admin->data_transaksi($data['transaksi']['id']);
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_detailTransaksi',$data);
        $this->load->view('admin/v_footer');
    }

    public function verifikasiPerorang(){
        if ($this->session->userdata('login')!=1) {
            $this->session->set_flashdata('message', ' <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i> Anda Belom Login
            </div>');
            redirect('Auth','refresh');
        }
        $data['transaksi'] = $this->Crud->edit_data(['pembayaran'=>'transfer','foto !='=>"",'status'=>0],'transaksi')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_transaksiVerifikasi',$data);
        $this->load->view('admin/v_footer');
    }

    public function verifikasiPerusahaan(){
        if ($this->session->userdata('login')!=1) {
            $this->session->set_flashdata('message', ' <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i> Anda Belom Login
            </div>');
            redirect('Auth','refresh');
        }
        $data['transaksi'] = $this->Crud->edit_data(['pembayaran!='=>'transfer','status'=>0],'transaksi')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_transaksiVerifikasi',$data);
        $this->load->view('admin/v_footer');
    }

    public function aksi_verifikasi($id){
        
        $data = $this->Crud->edit_data(['id'=>$id],'transaksi')->row_array();
        if ($data['pembayaran']=="transfer") {
            $this->Crud->update_data(['id'=>$id],['status'=>2,'status_bayar'=>1,'update'=>date('Y-m-d H:i:s')],'transaksi');
            $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i> Info! Data Berhasil diverifikasi.
            </div>');
            redirect('admin/Transaksi/verifikasiPerorang','refresh');
        }else {
            $this->Crud->update_data(['id'=>$id],['status'=>2,'update'=>date('Y-m-d H:i:s')],'transaksi');
            $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i> Info! Data Berhasil diverifikasi.
            </div>');
            redirect('admin/Transaksi/verifikasiPerusahaan','refresh');
        }
    }

    public function proses(){
        if ($this->session->userdata('login')!=1) {
            $this->session->set_flashdata('message', ' <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i> Anda Belom Login
            </div>');
            redirect('Auth','refresh');
        }
        $data['transaksi'] = $this->Crud->edit_data(['status'=>1],'transaksi')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_transaksiProses',$data);
        $this->load->view('admin/v_footer');
    }

    public function aksi_proses($id){
            $this->Crud->update_data(['id'=>$id],['status'=>2,'update'=>date('Y-m-d H:i:s')],'transaksi');
            $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i> Info! Data Berhasil diproses.
            </div>');
            redirect('admin/Transaksi/proses','refresh');
    }

    public function kirim(){
        if ($this->session->userdata('login')!=1) {
            $this->session->set_flashdata('message', ' <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i> Anda Belom Login
            </div>');
            redirect('Auth','refresh');
        }
        $data['transaksi'] = $this->Crud->edit_data(['status'=>2],'transaksi')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_transaksiKirim',$data);
        $this->load->view('admin/v_footer');
    }

    public function aksi_kirim($id){
        $this->Crud->update_data(['id'=>$id],['status'=>3,'update'=>date('Y-m-d H:i:s')],'transaksi');
        $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-info"></i> Info! Data Berhasil dikirim.
        </div>');
        redirect('admin/Transaksi/kirim','refresh');
    }

    public function dikirim(){
        if ($this->session->userdata('login')!=1) {
            $this->session->set_flashdata('message', ' <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i> Anda Belom Login
            </div>');
            redirect('Auth','refresh');
        }
        $data['transaksi'] = $this->Crud->edit_data(['status'=>3],'transaksi')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_transaksiSelesai',$data);
        $this->load->view('admin/v_footer');
    }

    public function selesai(){
        if ($this->session->userdata('login')!=1) {
            $this->session->set_flashdata('message', ' <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i> Anda Belom Login
            </div>');
            redirect('Auth','refresh');
        }
        $data['transaksi'] = $this->Crud->edit_data(['status'=>4],'transaksi')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_transaksiSelesai',$data);
        $this->load->view('admin/v_footer');
    }


}

/* End of file Transaksi.php */
 ?>