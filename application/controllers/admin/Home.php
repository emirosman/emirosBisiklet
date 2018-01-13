<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        if( !$this->session->userdata("admin_sess"))
        {redirect(base_url()."admin/login");}
    }


	public function index()
	{
		$this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/_content');
        $this->load->view('admin/_footer');
	}

	public function test ($x,$y)
    {
        echo "parametre ".$x. " ". $y;
    }
    public function login()
    {
        $this->load->view('admin/login');
    }
}
