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
            'description'=>$this->input->post("editor1")
        );
        $this->Database_Model->update_data("products",$data,$id);
        redirect(base_url()."admin/urunler/urun_duzenle/".$id);
    }
    public function urun_sil($id)
    {
        $this->db->query("DELETE FROM products WHERE id='$id'");
        //set flash data
        redirect(base_url()."admin/urunler");
    }
    public function galeri_sil($id,$img_id)
    {
        $this->db->query("DELETE FROM p_gallery WHERE id='$img_id'");
        //set flash data
        redirect(base_url()."admin/urunler/urun_duzenle/$id");
    }
    public function galeri_sec($p_id,$img_name)
    {
        $this->load->model("Database_Model");
        $data=array(
          'preview_img'=>$img_name
        );
        $this->Database_Model->update_data("products",$data,$p_id);
        //set flash data
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
            $this->session->set_flashdata("dzn_msj","Resim Eklendi");
            redirect(base_url()."admin/urunler/urun_duzenle/".$p_id);
        }
        else
        {
            echo $this->upload->display_errors();

        }
    }

}
