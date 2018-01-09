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
}
