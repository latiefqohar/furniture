<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

    
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
        $data['invoice'] = $this->Model_admin->invoice();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_invoice', $data);
        $this->load->view('admin/v_footer');
    }

    public function add(){
        $data['perusahaan'] = $this->Crud->get_data('perusahaan')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_invoiceAdd',$data);
        $this->load->view('admin/v_footer');
    }

    public function actionAdd(){
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $periode = $bulan."-".$tahun;
        $perusahaan = $this->input->post('perusahaan');
        $cek=$this->db->query("select *,sum(total) as tagihan from transaksi where  DATE_FORMAT(waktu,'%m-%Y')='".$periode."' and id_invoice is NULL and id_perusahaan='".$perusahaan."'");
        if ($cek->num_rows() < 1) {
            $this->session->set_flashdata('message', ' <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i> GAGAL! Invoice sudah dibuat.
            </div>');
            redirect('admin/Invoice/add','refresh');
        }else{
            $data_tagihan=$cek->row_array();
            $tagihan = $data_tagihan['tagihan'];
            $invoice = "INV/".date('ymdHi')."/".date('Y');
            $dataInv = array(
                'no_invoice' => $invoice,
                'id_perusahaan' => $perusahaan,
                'periode' => $bulan."-".$tahun,
                'tanggal_invoice' => date('Y-m-d H:i:s'),
                'jumlah' => $tagihan
            );
            $this->Crud->insert_data($dataInv,'invoice');
            $invoice_terakhir = $this->Model_admin->invoice_terakhir($perusahaan);
            $id_invoice = $invoice_terakhir['id'];
            // var_dump($id_invoice);die();
            $this->Model_admin->update_invoice($id_invoice,$periode,$perusahaan);
            $datajumlah=$this->Model_admin->jumlah_invoice($id_invoice);
            $total_invoice=$datajumlah['jumlah'];
            $this->send_mail($id_invoice);
            $tes=$this->Crud->update_data(['id'=>$id_invoice],['jumlah'=>$total_invoice],'invoice');
            $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i> Info! Invoice berhasil dibuat.
            </div>');
            redirect('admin/Invoice','refresh');
        }
       
    }

    public function detail($id){
        $data['invoice'] = $this->Model_admin->detail_invoice($id);
        $data['transaksi'] = $this->Crud->edit_data(['id_invoice'=>$id],'transaksi')->result();
        $this->load->view('admin/v_detailInvoice',$data);
    }
    
    public function print($id){
        $data['invoice'] = $this->Model_admin->detail_invoice($id);
        $data['transaksi'] = $this->Crud->edit_data(['id_invoice'=>$id],'transaksi')->result();
        $this->load->view('admin/v_printInvoice',$data);
    }

    public function konfirmasi($id){
        $this->Crud->update_data(['id'=>$id],['status_invoice'=>1,'bayar_invoice'=>date('Y-m-d H:i:s')],'invoice');
        $this->Crud->update_data(['id_invoice'=>$id],['status_bayar'=>1,'update'=>date('Y-m-d H:i:s')],'transaksi');
        $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-info"></i> Info! Invoice berhasil dikonfirmasi.
        </div>');
        redirect('admin/Invoice','refresh');
    }

    public function send_mail($id_invoice) { 
        $query =  $this->db->query('select a.*, b.nama_perusahaan, b.email from invoice a join perusahaan b on a.id_perusahaan=b.id  where a.id="'.$id_invoice.'"')->row_array();
        $from_email = "noreplyakunku@gmail.com"; 
    
        $config = Array(
               'protocol' => 'smtp',
               'smtp_host' => 'ssl://smtp.googlemail.com',
               'smtp_port' => 465,
               'smtp_user' => $from_email,
               'smtp_pass' => 'noreplyakunku12',
               'mailtype'  => 'html', 
               'charset'   => 'iso-8859-1'
       );
    
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");   
        $this->email->from($from_email, 'Invoice Catering'); 
        $this->email->to($query["email"]);
        $this->email->subject('Invoice Periode : '.$query['periode']); 
        $this->email->message('Terimakasih telah memesan catering kami, Tagihan anda pada periode : '.$query["periode"].' sebesar Rp. '.number_format($query["jumlah"],2,",",".").'  dengan nomor invoice '.$query["no_invoice"].', untuk detail silahkan klik <a href="'.base_url().'admin/Invoice/detail/'.$query["id"].'"> disini </a>'); 
    
        //Send mail 
        if($this->email->send()){
              
        }else {
            echo 'gagal';
        } 
     }

}

/* End of file Invoice.php */
 ?>