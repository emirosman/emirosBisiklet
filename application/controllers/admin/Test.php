<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->database();
    }


	public function index()
	{
	    $this->load->view('admin/test');
	}
	public function momo()
    {
        $this->load->model('Test_model');
        $at=$this->Test_model->listele();
        foreach ($at as $don)
        {
            echo $don->username."/".$don->password;
            echo "<br>";
        }
    }

}
