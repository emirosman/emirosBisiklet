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
	    /*$query=$this->db->query("SELECT * FROM category");
	    $data["cat_list"]=$query->result();*/
	    $this->load->model("Database_Model");
        $data["cat_list"]=$this->Database_Model->get_kategoriler();



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
            $this->session->set_flashdata("cat_msj","Kategori eklendi");
            redirect(base_url()."admin/kategoriler");
        }/*else{//buraya gelmeden zaten hata veriyo buna gerek kalmıyo!!yinede kontrol et
            $this->session->set_flashdata("uye_ekle","Üye kaydı yapılamadı");
            $this->load->view("admin/uye_ekle");
        }*/

    }
    public function kategori_duzenle($id)//id yerine username kullanıldı düzeltilicek
    {
        $query=$this->db->query("SELECT * FROM category where id='$id'");
        $data['veri']=$query->result();
        $query2=$this->db->query("SELECT * FROM category");
        $data["cats"]=$query2->result();
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view("admin/kategori_duzenle",$data);
        $this->load->view('admin/_footer');
    }
    public function kategori_duzenle_kayit($id)//id yerine username kullanıldı düzeltilicek
    {
        $this->load->model("Database_Model");
        $data=array(
            'parent_id'=>$this->input->post("parent_id"),
            'name'=>$this->input->post("name")
        );
        $this->Database_Model->update_data("category",$data,$id);
        $this->session->set_flashdata("cat_msj","Kategori düzenlendi");
        redirect(base_url()."admin/kategoriler");


    }
    public function kategori_sil($id)
    {
        $this->db->query("DELETE FROM category WHERE id='$id'");//username id ile değişicek !!!!!!!!!!!!!!!!!!!
        $this->session->set_flashdata("cat_msj","Kategori silindi");
        redirect(base_url()."admin/kategoriler");
    }

}
