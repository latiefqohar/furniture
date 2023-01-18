<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    

    public function index()
    {
        $this->load->view('v_header');
        $this->load->view('v_about');
        $this->load->view('v_footer');
    }

}

/* End of file About.php */
 ?>