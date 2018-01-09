<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mesajlar extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        if( !$this->session->userdata("admin_sess"))
        {redirect(base_url()."admin/login");}
    }


	public function index()
	{
	    $query=$this->db->query("SELECT * FROM messages ORDER BY time DESC ");
	    $data["veri"]=$query->result();

		$this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/mesajlar_liste',$data);
        $this->load->view('admin/_footer');
	}
    public function mesaj_oku($id)//id yerine username kullanıldı düzeltilicek
    {
        $this->load->model("Database_Model");
        $data=array(
            'status'=>"read"
        );
        $this->Database_Model->update_data("messages",$data,$id);

        $query=$this->db->query("SELECT * FROM messages where id='$id'");
        $data['veri']=$query->result();
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view("admin/mesaj_oku",$data);
        $this->load->view('admin/_footer');
    }
    public function okundu($id)
    {
        $this->load->model("Database_Model");
        $control=($this->input->post('control')=="on")?"unread":"read";
        $msg=($this->input->post('control')=="on")?"okunmadı":"okundu";
        $data=array(
            'status'=>$control
        );
        $this->Database_Model->update_data("messages",$data,$id);
        $this->session->set_flashdata("success","Mesaj $msg olarak işaretlendi");
        redirect(base_url()."admin/mesajlar");
    }
    public function cevapla($id)
    {
        $this->load->model("Database_Model");
        $cevap=$this->input->post('answer');

        $data=array(
            'answer'=>"answered"
        );
        $this->Database_Model->update_data("messages",$data,$id);
        $this->session->set_flashdata("success","Mesaj cevaplandı");
        redirect(base_url()."admin/mesajlar");
    }
    public function mesaj_sil($id)
    {
        $this->db->query("DELETE FROM messages WHERE id='$id'");//username id ile değişicek !!!!!!!!!!!!!!!!!!!
        $this->session->set_flashdata("success","Mesaj silindi");
        redirect(base_url()."admin/mesajlar");
    }

}
