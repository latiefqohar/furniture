<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_depan extends CI_Model {

    public function tampil_keranjang(){
        $user_id = $this->session->userdata("id");
        return $this->db->select('a.*,b.nama,b.deskripsi,b.harga_beli,b.harga,b.foto')->from('keranjang a')->join('menu b','a.id_menu=b.id')->where('status_bayar',0)->where('user_id',$user_id )->get()->result();
    }

    public function update_keranjang($id){
        $this->db->query('update keranjang set jumlah=jumlah+1 where id="'.$id.'"');
    }

    public function subtotal(){
        return $this->db->select("sum(a.harga*b.jumlah) as jumlah")->from('menu a')->join('keranjang b','a.id=b.id_menu')->where('b.status_bayar',0)->get()->row_array();
    }

    public function subtotal_harga_beli(){
        return $this->db->select("sum(a.harga_beli*b.jumlah) as jumlah")->from('menu a')->join('keranjang b','a.id=b.id_menu')->where('b.status_bayar',0)->get()->row_array();
    }

    public function transaksi_terakhir($telpon){
        return $this->db->query('select * from transaksi where telpon="'.$telpon.'" ORDER  BY  id
        DESC  LIMIT  1')->row_array();
    }

    public function detail_pesanan($id){
        return $this->db->select('a.*,b.nama,b.harga')->from('keranjang a')->join('menu b','a.id_menu=b.id')->where('a.id_transaksi',$id)->get()->result();
    }

}

/* End of file Model_depan.php */
 ?>