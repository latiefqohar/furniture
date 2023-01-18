<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function index()
    {
        if ($this->session->userdata('login')!=1) {
            $this->session->set_flashdata('message', ' <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i> Anda Belom Login
            </div>');
            redirect('Auth','refresh');
        }
        $data['menu'] = $this->Crud->get_data('menu')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_menu',$data);
        $this->load->view('admin/v_footer');
    }

    public function add(){
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_addMenu');
        $this->load->view('admin/v_footer');
    }

    public function actionAdd(){
        $nama = $this->input->post('nama');
        $deskripsi = $this->input->post('deskripsi');
        $harga = $this->input->post('harga');
        $harga_beli = $this->input->post('harga_beli');
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']  = '1024';
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
            if(!empty($_FILES['foto']['name'])){
                if(!$this->upload->do_upload('foto')){
                   echo $this->upload->display_errors();  
                   echo 'gagal';
                }else{
                    $data_upload =  $this->upload->data();
                    $foto['foto'] = $data_upload['file_name'];
                    $insert = array(
                        'nama'=>$nama,
                        'deskripsi'=>$deskripsi,
                        'harga'=>$harga,    
                        'harga_beli'=>$harga_beli,    
                        'foto' => $foto['foto']  
                    );
            
                    $this->Crud->insert_data($insert,'menu');
                    $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-info"></i> Info! Menu Berhasil ditambah.
                    </div>');
                    redirect('admin/Menu','refresh');
                }
            }
    }

    public function edit($id){
        $data['menu'] = $this->Crud->edit_data(['id'=>$id],'menu')->row_array();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_editMenu',$data);
        $this->load->view('admin/v_footer');
    }

    public function actionEdit(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $deskripsi = $this->input->post('deskripsi');
        $harga = $this->input->post('harga');
        $harga_beli = $this->input->post('harga_beli');
    
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '1024';
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
            if(!empty($_FILES['foto']['name'])){
                if(!$this->upload->do_upload('foto')){
                   echo $this->upload->display_errors();  
                   echo 'gagal';
                }else{
                    $data_upload =  $this->upload->data();
                    $foto['foto'] = $data_upload['file_name'];
                   $this->Crud->update_data(['id'=>$this->input->post('id')],['foto'=>$foto['foto']],'menu');        
                }
        }
        $insert = array(
            'nama'=>$nama,
            'deskripsi'=>$deskripsi,
            'harga'=>$harga,
            'harga_beli'=>$harga_beli
        );

        $this->Crud->update_data(['id'=>$id],$insert,'menu');
        $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-info"></i> Info! Data Berhasil diubah.
        </div>');
        redirect('admin/Menu','refresh');
    }

    public function delete($id){
        $this->Crud->delete_data(['id'=>$id],'Menu');
        $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-info"></i> Info! Data Berhasil dihapus.
        </div>');
        redirect('admin/Menu','refresh');
    }
}

/* End of file Menu.php */
 ?>