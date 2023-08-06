<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_depan');
        $this->load->model('Crud','crud');
    }
    

    public function index()
    {   
        $data['subtotal'] = $this->Model_depan->subtotal();
        $data['subtotal_beli'] = $this->Model_depan->subtotal_harga_beli();
        $data['keranjang'] = $this->Crud->edit_data(['status_bayar'=>0],'keranjang')->row_array(); 
        if (!isset($data['subtotal']['jumlah'])) {
            $data['subtotal']['jumlah'] =0; 
        }
        if (!isset($data['keranjang']['ongkir'])||!isset($data['keranjang']['diskon'])) {
            $data['keranjang']['ongkir'] =0; 
            $data['keranjang']['diskon'] =0; 
        }
        $data['total'] =  $data['subtotal']['jumlah']+$data['keranjang']['ongkir']-$data['keranjang']['diskon'];
        $user_id = $this->session->userdata("id");
        $data['user'] = $this->crud->edit_data(['id'=>$user_id],'registration')->row_array();
        $this->load->view('v_header');
        $this->load->view('v_checkout',$data);
        $this->load->view('v_footer');
    }

    public function ambil_perusahaan(){
        $id = $this->input->post('id');
        $data = $this->Crud->edit_data(['id'=>$id],'perusahaan')->row_array(); 
        echo json_encode($data);
    }

    public function order(){
        
        $jenis = $this->input->post('jenis');
        $id_perusahaan = $this->input->post('nama_perusahaan');
        $nama = $this->input->post('nama_depan');
        $alamat = $this->input->post('alamat');
        $kota = $this->input->post('kota');
        $kode_pos = $this->input->post('kode_pos');
        $telpon = $this->input->post('telpon');
        $email = $this->input->post('email');
        $subtotal = $this->input->post('subtotal');
        $subtotal_beli = $this->input->post('subtotal_beli');
        $ongkir = $this->input->post('ongkir');
        $diskon = $this->input->post('diskon');
        $total = $this->input->post('total');
        $pembayaran = $this->input->post('pembayaran');
        $data = array(
            'nama'=>$nama,
            'alamat'=>$alamat,
            'kota'=>$kota,
            'kode_pos'=>$kode_pos,
            'telpon'=>$telpon,
            'email'=>$email,
            'subtotal'=>$subtotal,
            'subtotal_beli'=>$subtotal_beli,
            'ongkir'=>$ongkir,
            'diskon'=>$diskon,
            'total'=>$total,
            'pembayaran'=>$pembayaran,
            'waktu'=>date('Y-m-d H:i:s'),
            'user_id'=>$this->session->userdata("id")

        );
        $this->Crud->insert_data($data,'transaksi');
        $cari_data = $this->Model_depan->transaksi_terakhir($telpon);
        $this->Crud->update_data(['status_bayar'=>0],['status_bayar'=>1,'id_transaksi'=>$cari_data['id']],'keranjang');
        $this->session->set_flashdata('msg',"Swal.fire('Sukses!','Order berhasil dibuat','success')");
        redirect('Checkout/detail/'.$cari_data['id'],'refresh');
        
    }

    public function detail($id){
        $data['transaksi'] = $this->Crud->edit_data(['id'=>$id],'transaksi')->row_array();
        $data['detail'] = $this->Model_depan->detail_pesanan($id);
        if ($data['transaksi']['pembayaran']!="transfer") {
            $query = $this->Crud->edit_data(['id'=>$data['transaksi']['id_invoice']],'invoice')->row_array();
            $data['invoice']=$query['no_invoice'];
        }else{
            $data['invoice']=null;
        }
        // var_dump($data['detail']);die();
        $this->load->view('v_header');
        $this->load->view('v_detail', $data);
        $this->load->view('v_footer');
        
        
    }

    public function terima($id){
        $this->crud->update_data(['id'=>$id],['status'=>4, 'waktu'=>date('Y-m-d H:i:s')],'transaksi');
        redirect('Checkout/detail/'.$id,'refresh');
    }

}

/* End of file Checkout.php */
 ?>