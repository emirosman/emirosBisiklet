<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ayarlar extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        if( !$this->session->userdata("admin_sess"))
        {redirect(base_url()."admin/login");}
    }


	public function index()
	{
        $query=$this->db->query("SELECT * FROM settings");
        $data['veri']=$query->result();

		$this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/ayarlar',$data);
        $this->load->view('admin/_footer');
	}
    public function guncelle($id)
    {
        $this->load->model("Database_Model");
        $data=array(
            'adi'=>$this->input->post("adi"),
            'keywords'=>$this->input->post("keywords"),
            'description'=>$this->input->post("description"),
            'smtp_server'=>$this->input->post("smtpserver"),
            'smtp_port'=>$this->input->post("smtpport"),
            'smtp_email'=>$this->input->post("smtpemail"),
            'password'=>$this->input->post("password"),
            'address'=>$this->input->post("address"),
            'phone'=>$this->input->post("phone"),
            'fax'=>$this->input->post("fax"),
            'email'=>$this->input->post("email"),
            'about'=>$this->input->post("about"),
            'contact'=>$this->input->post("contact"),
            'facebook'=>$this->input->post("facebook"),
            'twitter'=>$this->input->post("twitter"),
            'instagram'=>$this->input->post("instagram"),
            'pinterest'=>$this->input->post("pinterest")
        );
        $this->Database_Model->update_data("settings",$data,$id);
        $this->session->set_flashdata("ayar_msj","Bilgiler güncellendi");
        redirect(base_url()."admin/ayarlar");
    }
}
