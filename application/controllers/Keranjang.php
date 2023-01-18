<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_depan');
    }
    
    public function index()
    {
        $data['keranjang']=$this->Model_depan->tampil_keranjang();
        $data['ongkir']=$this->Crud->edit_data(['status_bayar'=>0],'keranjang')->row_array();
        $this->load->view('v_header');
        $this->load->view('v_keranjang',$data);
        $this->load->view('v_footer');
    }

    public function hapus_isi($id){
        $this->Crud->delete_data(['id'=>$id],'keranjang');
        redirect('Keranjang','refresh');
    }

    public function update_qty(){
        $id = $this->input->post('id_keranjang');
        $qty = $this->input->post('quantity');
        $this->Crud->update_data(['id'=>$id],['jumlah'=>$qty],'keranjang');
        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show" role="alert"><strong>Info!</strong> Data Berhasil Diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Keranjang','refresh');
    }

    public function estimasi_ongkir(){
        $this->Crud->update_data(['status_bayar'=>0],['ongkir'=>14000],'keranjang');
        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show" role="alert"><strong>Info!</strong> Estimasi Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Keranjang','refresh');
    }

    public function pakai_kupon(){
        $kupon=$this->input->post('kupon');
        $data=$this->Crud->edit_data(['kode'=>$kupon],'kupon');
        if ($data->num_rows() > 0) {
            $hasil = $data->row_array();
            $this->Crud->update_data(['status_bayar'=>0],['diskon'=>$hasil['jumlah']],'keranjang');
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show" role="alert"><strong>Info!</strong> Kupon Berhasil dipakai!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Info!</strong> Kupon Tidak Tersedia<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }
        redirect('Keranjang','refresh');
    }
}

/* End of file Keranjang.php */
 ?>