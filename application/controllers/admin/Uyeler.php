<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uyeler extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        if( !$this->session->userdata("admin_sess"))
        {redirect(base_url()."admin/login");}
    }


	public function index()
	{
	    $query=$this->db->query("SELECT * FROM users");
	    $data["uye_list"]=$query->result();


		$this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/uyeler_liste',$data);
        $this->load->view('admin/_footer');
	}
	public function test()
    {
        $query=$this->db->query("SELECT * FROM users where id='7'");
        $data['uye']=$query->result();
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view("admin/test",$data);
        $this->load->view('admin/_footer');
    }
	public  function uye_ekle()
    {
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/uye_ekle');
        $this->load->view('admin/_footer');
    }
    public function uye_ekle_kayit()
    {
        $uye_ekle=array(
            'username'=>$this->input->post("username"),
            'password'=>$this->input->post("password"),
            'name'=>$this->input->post("name"),
            'surname'=>$this->input->post("surname"),
            'email'=>$this->input->post("email"),
            'phone'=>$this->input->post("phone"),
            'image'=>"user_default.png",
            'newsletter'=>($this->input->post("newsletter")!="")?1:0,
            'authority'=>$this->input->post("authority"),
            'status'=>$this->input->post("status"),
            'create_time'=>date("Y-m-d h:i:s")
        );
        $data['uye']=$uye_ekle;
        $ctrl_usrname=$this->db->query( "SELECT * FROM users WHERE username='".$uye_ekle['username']."'");
        $ctrl_email=$this->db->query( "SELECT * FROM users WHERE email='".$uye_ekle['email']."'");
        if($ctrl_usrname->result()!=null OR $uye_ekle['password']!=$this->input->post("password-again") OR $ctrl_email->result()!=null )
        {
            if($uye_ekle['password']!=$uye_ekle['password-again'])
            {
                $this->session->set_flashdata("msg-password","Şifreler uyuşmuyor");
            }
            if($ctrl_usrname->result()!=null)
            {
                $this->session->set_flashdata("msg-username",$uye_ekle['username']." zaten kullanılıyor!");
            }
            if($ctrl_email->result()!=null)
            {
                $this->session->set_flashdata("msg-email","Bu mail zaten kullanılıyor.<a href='şifremi_unuttum'>Şifremi Unuttum</a>");
            }

            redirect(base_url()."admin/uyeler/uye_ekle");
        }
        else{
        if($this->db->insert('users',$uye_ekle))
        {
            $this->session->set_flashdata("list_msj","Üye kaydı Başarılı");
            redirect(base_url()."admin/uyeler");
        }/*else{//buraya gelmeden zaten hata veriyo buna gerek kalmıyo!!yinede kontrol et
            $this->session->set_flashdata("uye_ekle","Üye kaydı yapılamadı");
            $this->load->view("admin/uye_ekle");
        }*/
        }
    }
    public function uye_duzenle($id)//id yerine username kullanıldı düzeltilicek
    {
        $query=$this->db->query("SELECT * FROM users WHERE id='$id'");
        $q_adres=$this->db->query("SELECT * FROM address WHERE user_id='$id'");
        $data['uye']=$query->result();
        $data['adres']=$q_adres->result();
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view("admin/uye_duzenle",$data);
        $this->load->view('admin/_footer');
    }
    public function uye_duzenle_kayit($id)
    {
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
                $this->session->set_flashdata("err_mail","Bu mail zaten kullanılıyor!");
            }
            if($ctrl_usrname->result()!=null)
            {
                $this->session->set_flashdata("err_username","Kullanıcı adı alınmış!");
            }
                redirect(base_url()."admin/uyeler/uye_duzenle/".$id);
        }
        else{
        $this->Database_Model->update_data("users",$data,$id);
        $this->session->set_flashdata("dzn_msj","Bilgiler güncellendi");
        redirect(base_url()."admin/uyeler/uye_duzenle/".$id);

        }




    }
    public function uye_sil($id)
    {
        $this->db->query("DELETE FROM users WHERE id='$id'");
        $this->session->set_flashdata("list_msj","Üye silindi");
        redirect(base_url()."admin/uyeler");
    }

    public function adres_duzenle_kayit($id,$user_id)
    {
        $this->load->model("Database_Model");
        $update_address=array(
          'name'=>$this->input->post("name"),
          'address'=>$this->input->post("address")
        );
        $this->Database_Model->update_data("address",$update_address,$id);
        $this->session->set_flashdata("dzn_msj","Adres güncellendi");
        redirect(base_url()."admin/uyeler/uye_duzenle/".$user_id);
    }
    public function adres_ekle($user_id)
    {
        $new_address=array(
        'user_id'=>$user_id,
        'name'=>$this->input->post("name"),
        'address'=>$this->input->post("address")
        );
        if($this->db->insert('address',$new_address))
        {
            $this->session->set_flashdata("dzn_msj","Yeni adres başarıyla eklendi");
            redirect(base_url()."admin/uyeler/uye_duzenle/".$user_id);
        }

    }
    public function adres_sil($id,$user_id)
    {
        if($this->db->query("DELETE FROM address WHERE id='$id'"))
        {
            $this->session->set_flashdata("dzn_msj","Adres Silindi!");
            redirect(base_url()."admin/uyeler/uye_duzenle/".$user_id);
        }
    }
    public function resim_guncelle($user_id)
    {
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
            $this->session->set_flashdata("dzn_msj","Resim güncellendi");
            redirect(base_url()."admin/uyeler/uye_duzenle/".$user_id);
        }
        else
        {
            echo $this->upload->display_errors();

        }

    }
    public function uye_detay($id)
    {
        $query=$this->db->query("SELECT * FROM users WHERE id='$id'");
        $q_adres=$this->db->query("SELECT * FROM address WHERE user_id='$id'");
        $data['uye']=$query->result();
        $data['adres']=$q_adres->result();
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view("admin/uye_detay",$data);
        $this->load->view('admin/_footer');
    }


}
