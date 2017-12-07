<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Urunler extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        if( !$this->session->userdata("admin_sess"))
        {redirect(base_url()."admin/login");}
    }


	public function index()
	{
	    $query=$this->db->query("SELECT * FROM products");
	    $data["urun_list"]=$query->result();


		$this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/urunler_liste',$data);
        $this->load->view('admin/_footer');
	}
	public function  test()
    {
        echo $this->input->post("category");
    }
	public  function urun_ekle()
    {
        $query=$this->db->query("SELECT * FROM category");
        $data["cats"]=$query->result();
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/urun_ekle',$data);
        $this->load->view('admin/_footer');
    }
    public function urun_ekle_kayit()
    {
        $urun_ekle=array(
            'parent_id'=>$this->input->post("cat_id"),
            'name'=>$this->input->post("name"),
            's_price'=>$this->input->post("s_price"),
            'b_price'=>$this->input->post("b_price"),
            'preview_img'=>"product_default.png",
            'stock'=>($this->input->post("stock")!="")?1:0,
            'description'=>$this->input->post("description"),
            'create_time'=>date("Y-m-d h:i:s"),
            'update_time'=>date("Y-m-d h:i:s")
        );

        if($this->db->insert('products',$urun_ekle))
        {
            $this->session->set_flashdata("urun_ekle","Ürün kaydı Başarılı");
            redirect(base_url()."admin/urunler");
        }/*else{//buraya gelmeden zaten hata veriyo buna gerek kalmıyo!!yinede kontrol et
            $this->session->set_flashdata("uye_ekle","Üye kaydı yapılamadı");
            $this->load->view("admin/uye_ekle");
        }*/

    }
    public function urun_duzenle($id)//id yerine username kullanıldı düzeltilicek
    {
        $query=$this->db->query("SELECT * FROM users where id='$id'");
        $data['veri']=$query->result();
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view("admin/uye_duzenle",$data);
        $this->load->view('admin/_footer');
    }
    public function urun_duzenle_kayit($id)//id yerine username kullanıldı düzeltilicek
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
        $this->Database_Model->update_data("uyeler",$data,$id);
        redirect(base_url()."admin/uyeler");


    }
    public function urun_sil($id)
    {
        $this->db->query("DELETE FROM products WHERE id='$id'");//username id ile değişicek !!!!!!!!!!!!!!!!!!!
        redirect(base_url()."admin/urunler");
    }

}
