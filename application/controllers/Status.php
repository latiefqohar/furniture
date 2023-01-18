<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_depan');
    }
    
    public function index()
    {
        if (isset($_POST['Cari'])) {
            echo "ok";
            $data['pesanan'] = $this->Crud->edit_data(['id'=>$this->input->post('kode')],'transaksi')->row_array();
            if ($data['pesanan']['status']==0) {
                $data['status_pesanan']='<span class="badge badge-warning">Menunggu Pembayaran</span>';
            }elseif($data['pesanan']['status']==1){
                $data['status_pesanan']='<span class="badge badge-info">Terverifikasi</span>';
            }elseif($data['pesanan']['status']==2){
                $data['status_pesanan']='<span class="badge badge-info">Sedang diproses</span>';
            }elseif($data['pesanan']['status']==3){
                $data['status_pesanan']='<span class="badge badge-success">Dikirim</span>';
            }

            if ($data['pesanan']['status_bayar']==0) {
                $data['status_pembayaran']='<span class="badge badge-warning">Belom Lunas</span>';
            }elseif($data['pesanan']['status_bayar']==1){
                $data['status_pembayaran']='<span class="badge badge-success">Lunas</span>';
            }
            $this->load->view('v_header');
            $this->load->view('v_status',$data);
            $this->load->view('v_footer');
        }else{
            $data['pesanan']=NULL ;
            $data['status_pesanan']=null;
            $data['status_pembayaran']=null;
            $this->load->view('v_header');
            $this->load->view('v_status',$data);
            $this->load->view('v_footer');
        }
        
    }

    public function uploadBukti(){

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
                    $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-info"></i> Bukti berhasil di upload
                    </div>');
                    redirect('Checkout/detail/'.$this->input->post('id'),'refresh');
                }
            }
    }
    

}

/* End of file Status.php */
 ?>