<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $data['menu']=$this->db->query('select * from menu limit 5')->result();
        $this->load->view('v_header');
        $this->load->view('v_home',$data);
        $this->load->view('v_footer');  
    }

}

/* End of file Home.php */
 ?>