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
		$this->load->view('user/_header');
        $this->load->view('user/_sidebar');
        $this->load->view('user/_content');
        $this->load->view('user/_footer');
	}
    public function login()
    {
        $this->load->view('user/login');
    }
}
