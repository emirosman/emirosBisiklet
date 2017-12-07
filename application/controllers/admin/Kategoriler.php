<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategoriler extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        if( !$this->session->userdata("admin_sess"))
        {redirect(base_url()."admin/login");}
    }


	public function index()
	{
	    $query=$this->db->query("SELECT * FROM category");
	    $data["cat_list"]=$query->result();


		$this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/kategoriler_liste',$data);
        $this->load->view('admin/_footer');
	}
	public function  test()
    {
        echo $this->input->post("category");
    }
	public  function kategori_ekle()
    {
        $query=$this->db->query("SELECT * FROM category");
        $data["cats"]=$query->result();
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/kategori_ekle',$data);
        $this->load->view('admin/_footer');
    }
    public function kategori_ekle_kayit()
    {
        $kategori_ekle=array(
            'parent_id'=>$this->input->post("parent_id"),
            'name'=>$this->input->post("name"),
        );

        if($this->db->insert('category',$kategori_ekle))
        {
            $this->session->set_flashdata("cat_ekle","Kategori kaydı Başarılı");
            redirect(base_url()."admin/kategoriler");
        }/*else{//buraya gelmeden zaten hata veriyo buna gerek kalmıyo!!yinede kontrol et
            $this->session->set_flashdata("uye_ekle","Üye kaydı yapılamadı");
            $this->load->view("admin/uye_ekle");
        }*/

    }
    public function kategori_duzenle($id)//id yerine username kullanıldı düzeltilicek
    {
        $query=$this->db->query("SELECT * FROM users where id='$id'");
        $data['veri']=$query->result();
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view("admin/kategori_duzenle",$data);
        $this->load->view('admin/_footer');
    }
    public function kategori_duzenle_kayit($id)//id yerine username kullanıldı düzeltilicek
    {
        $this->load->model("Database_Model");
        $data=array(
            'username'=>$this->input->post("username"),
            'password'=>$this->input->post("password"),
            'password-again'=>$this->input->post("password-again"),
            'name'=>$this->input->post("name"),
            'surname'=>$this->input->post("surname"),
            'email'=>$this->input->post("username"),
            'address'=>$this->input->post("address"),
            'newsletter'=>$this->input->post("newsletter"),
            'authority'=>$this->input->post("authority"),
            'status'=>$this->input->post("status")
        );
        $this->Database_Model->update_data("category",$data,$id);
        redirect(base_url()."admin/kategoriler");


    }
    public function kategori_sil($id)
    {
        $this->db->query("DELETE FROM category WHERE id='$id'");//username id ile değişicek !!!!!!!!!!!!!!!!!!!
        redirect(base_url()."admin/kategoriler");
    }

}
