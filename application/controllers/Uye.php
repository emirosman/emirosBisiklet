<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uye extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        if( !$this->session->userdata("user_sess"))
        {redirect(base_url()."home/login");}
    }


	public function index()
	{
	}
    public function profil()
    {
        $id=$this->session->user_sess["id"];
        $query = $this->db->query("SELECT * FROM settings");
        $query2 = $this->db->query("SELECT * FROM users WHERE id=$id");
        $query3 = $this->db->query("SELECT * FROM address WHERE user_id='$id'");
        $data["adres"] = $query3->result();
        $data["uye"] = $query2->result();
        $data['veri'] = $query->result();
        $data['sayfa'] = "Profil";
        $data['menu']="profil";


        $this->load->view('_header', $data);
        $this->load->view('uye_sidebar', $data);
        $this->load->view('profil',$data);
        $this->load->view('_footer');
    }
    public function bilgi_guncelle()
    {
        $id=$this->session->user_sess["id"];
        $this->load->model("Database_Model");
        $data=array(
            'username'=>$this->input->post("username"),
            'password'=>$this->input->post("password"),
            'name'=>$this->input->post("name"),
            'surname'=>$this->input->post("surname"),
            'email'=>$this->input->post("email"),
            'phone'=>$this->input->post("phone"),
            'newsletter'=>($this->input->post("newsletter")!="")?1:0,
            'authority'=>$this->input->post("authority"),
            'status'=>$this->input->post("status")
        );
        $ctrl_usrname=$this->db->query( "SELECT * FROM users WHERE username='".$data['username']."' AND id<>'".$id."'");
        $ctrl_email=$this->db->query( "SELECT * FROM users WHERE email='".$data['email']."' AND id<>'".$id."'");
        if($ctrl_usrname->result()!=null OR $ctrl_email->result()!=null)
        {
            if($ctrl_email->result()!=null)
            {
                $this->session->set_flashdata("alert2","Bu mail zaten kullanılıyor!");
            }
            if($ctrl_usrname->result()!=null)
            {
                $this->session->set_flashdata("alert1","Kullanıcı adı zaten kullanılıyor!");
            }
            redirect(base_url()."uye/profil/".$id);
        }
        else{
            $this->Database_Model->update_data("users",$data,$id);
            $this->session->set_flashdata("success","Bilgiler güncellendi");
            redirect(base_url()."uye/profil/".$id);

        }
    }
    public function resim_guncelle()
    {
        $user_id=$this->session->user_sess["id"];
        $config['upload_path']  = "uploads/users/";
        $config['allowed_types']= 'gif|jpg|png';
        $config['encrypt_name']=true;
        $config['max_size']     = 1000;
        $config['max_width']    = 3000;
        $config['max_height']   = 3000;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('user_image'))
        {
            $img_data=$this->upload->data();
            $this->load->model("Database_Model");
            $data=array(
                'image'=>$img_data['raw_name'].$img_data['file_ext']
            );
            $this->Database_Model->update_data("users",$data,$user_id);
            $this->session->set_flashdata("success","Resim güncellendi");
            redirect(base_url()."uye/profil/".$user_id);
        }
        else
        {
            echo $this->upload->display_errors();

        }
    }
    public function adres_guncelle($id)
    {
        $user_id=$this->session->user_sess["id"];
        $this->load->model("Database_Model");
        $update_address=array(
            'name'=>$this->input->post("name"),
            'address'=>$this->input->post("address")
        );
        $this->Database_Model->update_data("address",$update_address,$id);
        $this->session->set_flashdata("success","Adres güncellendi");
        redirect(base_url()."uye/profil/".$user_id);

    }
    public function adres_ekle()
    {
        $user_id=$this->session->user_sess["id"];
        $new_address=array(
            'user_id'=>$user_id,
            'name'=>$this->input->post("name"),
            'address'=>$this->input->post("address")
        );
        if($this->db->insert('address',$new_address))
        {
            $this->session->set_flashdata("success","Yeni adres başarıyla eklendi");
            redirect(base_url()."uye/profil/".$user_id);
        }
    }
    public function adres_sil($id)
    {
        $user_id=$this->session->user_sess["id"];
        if($this->db->query("DELETE FROM address WHERE id='$id'"))
        {
            $this->session->set_flashdata("success","Adres Silindi!");
            redirect(base_url()."uye/profil/".$user_id);
        }
    }

    public function sepet_ekle($id)
    {
        $this->load->model("Database_Model");
        $data=array(
            'user_id'=>$this->session->user_sess["id"],
            'product_id'=>$id,
            'piece'=> ($this->input->post("piece")==Null)?1:$this->input->post("piece"),
            'date'=>date("Y-m-d h:i:s")
        );
        $query=$this->db->query("SELECT id, piece FROM basket WHERE product_id=$id AND user_id=".$this->session->user_sess['id']);
        $sepet=$query->result();

        if( count($sepet) > 0)
        {
            $sepet_id=(int)$sepet[0]->id;
            $data['piece']+=$sepet[0]->piece;
            $this->Database_Model->update_data("basket",$data,$sepet_id);

        }else {
            $this->db->insert("basket",$data);
        }
        $this->session->set_flashdata("success","Ürün sepete eklendi");
        redirect(base_url()."home/urun_detay/".$id);
    }
    public function sepetim()
    {
        $id=$this->session->user_sess["id"];
        $this->load->model("Database_Model");
        $query = $this->db->query("SELECT * FROM settings");
        $data['veri'] = $query->result();
        $data['menu']="sepet";
        $data['sayfa'] = "Sepetim";
        $data['sepet'] = $this->Database_Model->get_sepet_urunler($id);


        $this->load->view('_header', $data);
        $this->load->view('uye_sidebar', $data);
        $this->load->view('sepetim',$data);
        $this->load->view('_footer');
    }
    public function siparis_tamamla()
    {
        $id=$this->session->user_sess["id"];
        $this->load->model("Database_Model");
        $query = $this->db->query("SELECT * FROM settings");
        $query2 = $this->db->query("SELECT * FROM address WHERE user_id=$id");
        $data['veri'] = $query->result();
        $data['sayfa'] = "Sipariş";
        $data['menu']="profil";
        $data['address'] =$query2->result();
        $data['total']=$this->Database_Model->get_sepet_total($id);

        $this->load->view('_header', $data);
        $this->load->view('uye_sidebar', $data);
        $this->load->view('siparis_tamamla',$data);
        $this->load->view('_footer');
    }
    public function siparis_kayit()
    {
        $this->load->model("Database_Model");
        $user_id=$this->session->user_sess["id"];
        $data=array(                                //orderr tablosu doldur
            'user_id'=>$user_id,
            'date'=> date("Y-m-d h:i:s"),
            'ip'=>$_SERVER['REMOTE_ADDR'],
            'total'=>(double)$this->input->post('total'),
            'pay_type'=>$this->input->post('pay_type'),
            'order_status'=>"Yeni",
            'address'=>$this->input->post('address'),
            'phone'=>$this->input->post('phone'),
            'name_surname'=>$this->input->post('name_surname')
        );
        $this->db->insert("orderr",$data);          //orderr
        $order_id=$this->db->insert_id();
        $sepet=$this->Database_Model->get_sepet_urunler($user_id);      //order_product için ürünleri çek insertle
        foreach ($sepet as $urun)
        {
            $data2=array(
                'user_id'=>$user_id,
                'product_id'=>$urun->id,
                'order_id'=>$order_id,
                'piece'=>$urun->piece,
                'price'=>$urun->s_price,
                'date'=>date("Y-m-d h:i:s"),
                'name'=>$urun->name,
                'total'=>(double)$this->input->post('total')
            );
            $this->db->insert("order_product",$data2);
            $stock['stock']=$urun->stock-$urun->piece;      //satın alınan ürünleri stoktan düş
            $this->Database_Model->update_data("products",$stock,$urun->id);
        }
        $this->db->query("DELETE FROM basket WHERE user_id=$user_id");      //üyenin sepetini boşalt
        //sipariş alındı maili gönder
        $this->session->set_flashdata("success","Siparişiniz işleme alındı");
        redirect(base_url()."uye/siparislerim");
    }

    public function siparislerim()
    {
        $id=$this->session->user_sess["id"];
        $query = $this->db->query("SELECT * FROM settings");
        $query2=$this->db->query("select * from orderr where user_id=$id");
        $data["siparisler"]=$query2->result();
        $data['veri'] = $query->result();
        $data['menu']="profil";
        $data['sayfa'] = "Siparişlerim";


        $this->load->view('_header', $data);
        $this->load->view('uye_sidebar', $data);
        $this->load->view('siparislerim',$data);
        $this->load->view('_footer');
    }
    public function yorum_yap($id)
    {
        $data=array(
            'user_id'=>$this->session->user_sess["id"],
            'product_id'=>$id,
            'comment'=>$this->input->post("comment"),
            'date'=>date("Y-m-d h:i:s")
        );
        $this->db->insert("comments",$data);
        $this->session->set_flashdata("success","Yorumunuz eklendi");
        redirect(base_url()."home/urun_detay/".$id);
    }
    public function yorumlarim()
    {
        $id=$this->session->user_sess["id"];
        $query = $this->db->query("SELECT * FROM settings");
        $this->load->model("Database_Model");
        $data["yorumlar"]=$this->Database_Model->get_yorumlarim($id);
        $data['veri'] = $query->result();
        $data['sayfa'] = "Yorumlarım";
        $data['menu']="profil";


        $this->load->view('_header', $data);
        $this->load->view('uye_sidebar', $data);
        $this->load->view('yorumlarim',$data);
        $this->load->view('_footer');
    }
    public function yorum_sil($id)
    {
        $this->db->query("Delete from comments where id=$id");
        $this->session->set_flashdata("success","Yorumunuz silindi");
        redirect(base_url()."uye/yorumlarim");
    }
    public function sepet_urun_sil($id)
    {
        $this->db->query("DELETE FROM basket WHERE product_id=$id");
        $this->session->set_flashdata("success","Ürün sepetinizden silindi");
        redirect(base_url()."uye/sepetim");
    }
    public function fav_ekle($p_id)
    {
        $user_id=$this->session->user_sess["id"];
        $data=array(
            'user_id'      =>$user_id,
            'product_id'   =>$p_id
        );
        $query=$this->db->query("SELECT * FROM fav WHERE product_id=$p_id AND user_id=$user_id");
        $control=$query->result();
        if($control==null)
        {
            $this->db->insert("fav",$data);
            $this->session->set_flashdata("success","Ürün favorilere eklendi");
        }
        else{
            $this->session->set_flashdata("success","Ürün zaten favorilerinizde");
        }
        redirect(base_url()."home/urun_detay/".$p_id);
    }
    public function fav_sil($p_id)
    {
        $user_id=$this->session->user_sess["id"];

        $this->db->query("DELETE FROM fav WHERE user_id=$user_id AND product_id=$p_id");
        $this->session->set_flashdata("success","Ürün favorilerden silindi");
        redirect(base_url()."uye/favorilerim");
    }
    public function favorilerim()
    {
        $user_id=$this->session->user_sess["id"];
        $this->load->model("Database_Model");
        $data['favoriler']=$this->Database_Model->get_favori_urunler($user_id);

        $query= $this->db->query("SELECT * FROM settings");
        $data['veri']       = $query->result();
        $data['menu']       = "profil";
        $data['sayfa']      = "Favorilerim";


        $this->load->view('_header', $data);
        $this->load->view('uye_sidebar', $data);
        $this->load->view('favorilerim',$data);
        $this->load->view('_footer');

    }

}
