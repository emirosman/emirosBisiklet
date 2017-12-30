<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }


    public function index()
    {
        $this->load->view('_header');
        $this->load->view('_sidebar');
        $this->load->view('_content');
        $this->load->view('_footer');
    }
    public function test ()
    {

    }
}
