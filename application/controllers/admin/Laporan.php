<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    
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
            $start = $this->input->post('date_start')." 00:00:00";
            $end = $this->input->post('date_end')." 23:59:59";
            
            $data['transaksi'] = $this->db->query('select transaksi.waktu,menu.nama,sum(keranjang.jumlah) as jumlah,menu.harga_beli, menu.harga as harga_jual,transaksi.pembayaran, sum(keranjang.jumlah*(menu.harga-menu.harga_beli)) as untung from keranjang join menu on keranjang.id_menu=menu.id join transaksi on keranjang.id_transaksi = transaksi.id where keranjang.status_bayar = 1 and transaksi.waktu > "'.$start.'" and transaksi.waktu < "'.$end.'" group by id_menu')->result();
        }else{
            $data['transaksi'] = $this->db->query('select transaksi.waktu,menu.nama,sum(keranjang.jumlah) as jumlah,menu.harga_beli, menu.harga as harga_jual,transaksi.pembayaran, sum(keranjang.jumlah*(menu.harga-menu.harga_beli)) as untung from keranjang join menu on keranjang.id_menu=menu.id join transaksi on keranjang.id_transaksi = transaksi.id where keranjang.status_bayar = 1 group by id_menu
            ')->result();
        }
       

        $this->load->view('admin/v_header');
        $this->load->view('admin/v_laporan',$data);
        $this->load->view('admin/v_footer');
    }

    
}

/* End of file Transaksi.php */
 ?>