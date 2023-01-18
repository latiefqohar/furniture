<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_admin extends CI_Model {

    public function data_transaksi($id){
        return $this->db->select('a.*,b.*')->from('keranjang a')->join('menu b','a.id_menu=b.id')->where('a.id_transaksi',$id)->get()->result();
    }

    public function invoice(){
        return $this->db->select('a.*,b.nama_perusahaan')->from('invoice a')->join('perusahaan b','a.id_perusahaan=b.id')->get()->result();
    }

    public function invoice_terakhir($id){
        return $this->db->query('select * from invoice where id_perusahaan="'.$id.'" order by id DESC limit 1')->row_array();
    }

    public function update_invoice($id,$periode,$perusahaan){
        return $this->db->query("update transaksi set id_invoice='".$id."' where  DATE_FORMAT(waktu,'%m-%Y')='".$periode."' and id_invoice is NULL and id_perusahaan='".$perusahaan."'");
    }

    public function jumlah_invoice($id){
        return $this->db->query("select sum(total) as jumlah from transaksi where id_invoice ='".$id."'")->row_array();
    }
    public function detail_invoice($id){
        return $this->db->select("a.*,b.*")->from('invoice a')->join('perusahaan b','a.id_perusahaan=b.id')->where('a.id',$id)->get()->row_array();
    }

}

/* End of file Model_admin.php */
 ?>