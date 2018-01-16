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
	    $this->load->model("Database_Model");
        $data["urun_list"]= $this->Database_Model->get_urunler();



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
            'cat_id'=>$this->input->post("cat_id"),
            'name'=>$this->input->post("name"),
            's_price'=>$this->input->post("s_price"),
            'b_price'=>$this->input->post("b_price"),
            'preview_img'=>"default_product.png",
            'stock'=>$this->input->post("stock"),
            'meta_description'=>$this->input->post("meta_description"),
            'meta_keywords'=>$this->input->post("meta_keywords"),
            'description'=>$this->input->post("editor1"),
            'create_time'=>date("Y-m-d h:i:s"),
            'update_time'=>date("Y-m-d h:i:s"),
            'campaign'      =>($this->input->post("campaign")!="")?"kampanya":""
        );

        if($this->db->insert('products',$urun_ekle))
        {
            $this->session->set_flashdata("urun_msj","Ürün kaydı Başarılı");
            redirect(base_url()."admin/urunler");
        }/*else{//buraya gelmeden zaten hata veriyo buna gerek kalmıyo!!yinede kontrol et
            $this->session->set_flashdata("uye_ekle","Üye kaydı yapılamadı");
            $this->load->view("admin/uye_ekle");
        }*/

    }
    public function urun_duzenle($id)
    {
        $this->load->model("Database_Model");
        $data['urun']=$this->Database_Model->get_urun($id);
        $query=$this->db->query("SELECT * FROM category ");
        $data['kategoriler']=$query->result();
        $query2=$this->db->query("SELECT * FROM p_gallery WHERE p_id='$id'");
        $data['resim']=$query2->result();
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view("admin/urun_duzenle",$data);
        $this->load->view('admin/_footer');
    }
    public function urun_duzenle_kayit($id)
    {
        $this->load->model("Database_Model");
        $data=array(
            'name'=>$this->input->post("name"),
            'cat_id'=>$this->input->post("category"),
            'b_price'=>$this->input->post("b_price"),
            's_price'=>$this->input->post("s_price"),
            'stock'=>$this->input->post("stock"),
            'meta_description'=>$this->input->post("meta_description"),
            'meta_keywords'=>$this->input->post("meta_keywords"),
            'description'=>$this->input->post("editor1"),
            'campaign'      =>($this->input->post("campaign")!="")?"kampanya":""
        );
        $this->Database_Model->update_data("products",$data,$id);
        $this->session->set_flashdata("success","Bilgiler güncellendi");
        redirect(base_url()."admin/urunler/urun_duzenle/".$id);
    }
    public function urun_sil($id)
    {
        $this->db->query("DELETE FROM products WHERE id='$id'");
        $this->session->set_flashdata("urun_msj","Ürün silindi");
        redirect(base_url()."admin/urunler");
    }
    public function galeri_sil($id,$img_id)
    {
        $this->db->query("DELETE FROM p_gallery WHERE id='$img_id'");
        $this->session->set_flashdata("success","Resim silindi");
        redirect(base_url()."admin/urunler/urun_duzenle/$id");
    }
    public function galeri_sec($p_id,$img_name)
    {
        $this->load->model("Database_Model");
        $data=array(
          'preview_img'=>$img_name
        );
        $this->Database_Model->update_data("products",$data,$p_id);
        $this->session->set_flashdata("success","Kapak resmi seçildi");
        redirect(base_url()."admin/urunler/urun_duzenle/".$p_id);
    }
    public function galeri_ekle($p_id)
    {
        $config['upload_path']  = "uploads/products/";
        $config['allowed_types']= 'gif|jpg|png';
        $config['encrypt_name']=true;
        $config['max_size']     = 1000;
        $config['max_width']    = 3000;
        $config['max_height']   = 3000;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('product_image'))
        {
            $img_data=$this->upload->data();
            $data=array(
                'p_id'=>$p_id,
                'image'=>$img_data['raw_name'].$img_data['file_ext']
            );
            $this->db->insert('p_gallery',$data);
            $this->session->set_flashdata("success","Resim Eklendi");
            redirect(base_url()."admin/urunler/urun_duzenle/".$p_id);
        }
        else
        {
            echo $this->upload->display_errors();

        }
    }
    public function slider()
    {
        $this->load->model("Database_Model");
        $data["sliders"]= $this->Database_Model->get_sliders();

        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/slider_liste',$data);
        $this->load->view('admin/_footer');
    }
    public function slider_sil($id)
    {
        $this->db->query("DELETE FROM sliders WHERE id='$id'");
        $this->session->set_flashdata("success","Slider silindi");
        redirect(base_url()."admin/urunler/slider");
    }
    public function slider_duzenle($id)
    {
        $this->load->model("Database_Model");
        $data['slider']=$this->Database_Model->get_slider($id);
        $query=$this->db->query("SELECT id,name FROM products");
        $data["urunler"]=$query->result();
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view("admin/slider_duzenle",$data);
        $this->load->view('admin/_footer');
    }
    public function slider_duzenle_kayit($id)
    {
        $data=array(
            'product_id'=>$this->input->post('product'),
            'status'=>(int)$this->input->post('status')
        );
        $this->load->model("Database_Model");
        $this->Database_Model->update_data("sliders",$data,$id);
        $this->session->set_flashdata("success","Bilgiler güncellendi");
        redirect(base_url()."admin/urunler/slider_duzenle/".$id);
    }
    public function slider_resim($id)
    {
        $config['upload_path']  = "uploads/sliders/";
        $config['allowed_types']= 'gif|jpg|png';
        $config['max_size']     = 3000;
        $config['max_width']    = 3000;
        $config['max_height']   = 3000;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('slider_image'))
        {
            $img_data=$this->upload->data();
            $this->load->model("Database_Model");
            $data=array(
                'image'=>$img_data['raw_name'].$img_data['file_ext']
            );
            $this->Database_Model->update_data("sliders",$data,$id);
            $this->session->set_flashdata("success","Resim güncellendi");
            redirect(base_url()."admin/urunler/slider_duzenle/".$id);
        }
        else
        {
            echo $this->upload->display_errors();

        }
    }
    public function slider_ekle()
    {
        $query=$this->db->query("SELECT id,name FROM products");
        $data["urunler"]=$query->result();
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view("admin/slider_ekle",$data);
        $this->load->view('admin/_footer');
    }
    public function slider_ekle_kayit()
    {
        $data=array(
            'product_id'=>$this->input->post("product"),
            'status'=>$this->input->post("status"),
            'image'=>"default.png"
        );
        if($this->db->insert("sliders",$data))
        {
            $this->session->set_flashdata("success","Slider eklendi");
            redirect(base_url()."admin/urunler/slider");
        }
    }
    public function kampanya_urunler()
    {
        $query=$this->db->query("SELECT * FROM products WHERE campaign='kampanya'");
        $data["urun_list"]=$query->result();

        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/kampanya_urunler',$data);
        $this->load->view('admin/_footer');

    }
    public function yorumlar()
    {
        $query=$this->db->query("select comments.* ,u.username,p.name from comments
                                 inner join users as u on u.id=comments.user_id
                                 inner join products as p  on p.id=comments.product_id
                                 ORDER BY comments.id DESC");
        $data["yorumlar"]=$query->result();

        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/yorumlar',$data);
        $this->load->view('admin/_footer');
    }
    public function yorum_sil($id)
    {
        $this->db->query("DELETE FROM comments WHERE id=$id");
        $this->session->set_flashdata("success","Yorum silindi");
        redirect(base_url()."admin/urunler/yorumlar");
    }

}
