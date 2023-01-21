<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_depan');
        
    }
    

    public function index()
    {
        $data['menu']=$this->Crud->get_data('menu')->result();
        $this->load->view('v_header');
        $this->load->view('v_belanja',$data);
        $this->load->view('v_footer');
    }

    public function tambah_keranjang($id){
        $login =  $this->session->userdata("login");
        $user_id =  $this->session->userdata("id");
        if ($login==1) {
            $cek_keranjang = $this->Crud->edit_data(array('id_menu'=>$id, 'status_bayar'=>0,'user_id'=>$user_id),'keranjang')->num_rows();
            if ($cek_keranjang > 0) {
                $this->Model_depan->update_keranjang($id);
            }else{
                $this->Crud->insert_data(array('id_menu'=>$id,'user_id'=>$user_id),'keranjang');
            }
            $this->session->set_flashdata('msg',"Swal.fire('Sukses!','Produk berhasil ditambahkan ke keranjang','success')");
            redirect('Belanja','refresh');
        }else{
            redirect('auth','refresh');
        }
        
    }

    public function bungkus($id){
        $cek_keranjang = $this->Crud->edit_data(array('id_menu'=>$id, 'status_bayar'=>0),'keranjang')->num_rows();
        if ($cek_keranjang > 0) {
            $this->Model_depan->update_keranjang($id);
        }else{
            $this->Crud->insert_data(array('id_menu'=>$id),'keranjang');
        }
        redirect('Keranjang','refresh');
    }

}

/* End of file Belanja.php */
 ?>