<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    public function index()
    {
        $this->load->model("Database_Model");
        $data["sliders"]=$this->Database_Model->get_show_sliders();
        $query = $this->db->query("SELECT * FROM settings");
        $query2 = $this->db->query("SELECT * FROM products ORDER BY RAND() LIMIT 9 ");
        $query3 = $this->db->query("SELECT * FROM products ORDER BY id DESC LIMIT 6 ");
        $data["cats"] = $this->Database_Model->get_categories();
        $data["urunler"]= $query2->result();
        $data["son"]= $query3->result();
        $data['veri'] = $query->result();
        $data['sayfa'] = "";
        $data['menu']="ana";


        $this->load->view('_header', $data);
        $this->load->view('_slider',$data);
        $this->load->view('_sidebar', $data);
        $this->load->view('_content',$data);
        $this->load->view('_footer');
    }

    public function kategori_liste($id)
    {
        $this->load->model("Database_Model");
        $data["sliders"]=$this->Database_Model->get_show_sliders();
        $query = $this->db->query("SELECT * FROM settings");
        $query3 = $this->db->query("SELECT * FROM products ORDER BY id DESC LIMIT 6 ");
        $data["cats"] = $this->Database_Model->get_categories();
        $data["urunler"]= $this->Database_Model->get_kategori_urunler($id);
        $data["son"]= $query3->result();
        $data['veri'] = $query->result();
        $data['sayfa'] = $data["urunler"][0]->cat_name;
        $data['menu']=$data["urunler"][0]->cat_name;


        $this->load->view('_header', $data);
        $this->load->view('_slider',$data);
        $this->load->view('_sidebar', $data);
        $this->load->view('_content',$data);
        $this->load->view('_footer');
    }

    public function kampanya()
    {
        $this->load->model("Database_Model");
        $data["sliders"]=$this->Database_Model->get_show_sliders();
        $query = $this->db->query("SELECT * FROM settings");
        $query2=$this->db->query("select * from products where campaign like 'kampanya'");
        $query3 = $this->db->query("SELECT * FROM products ORDER BY id DESC LIMIT 6 ");
        $data["cats"] = $this->Database_Model->get_categories();
        $data["urunler"]= $query2->result();
        $data["son"]= $query3->result();
        $data['veri'] = $query->result();
        $data['sayfa'] = "Kampanya";
        $data['menu']="kampanya";


        $this->load->view('_header', $data);
        $this->load->view('_slider',$data);
        $this->load->view('_sidebar', $data);
        $this->load->view('_content',$data);
        $this->load->view('_footer');
    }

    public function urun_ara()
    {
        $name=$this->input->post("ara");
        $this->load->model("Database_Model");
        $data["sliders"]=$this->Database_Model->get_show_sliders();
        $query = $this->db->query("SELECT * FROM settings");
        $query3 = $this->db->query("SELECT * FROM products ORDER BY id DESC LIMIT 6 ");
        $data["cats"] = $this->Database_Model->get_categories();
        $data["urunler"]= $this->Database_Model->urun_ara($name);
        $data["son"]= $query3->result();
        $data['veri'] = $query->result();
        $data['sayfa'] = "";
        $data['menu']= "";


        $this->load->view('_header', $data);
        $this->load->view('_slider',$data);
        $this->load->view('_sidebar', $data);
        $this->load->view('_content',$data);
        $this->load->view('_footer');
    }

    public function hakkimizda()
    {
        $query = $this->db->query("SELECT * FROM settings");
        $data['veri'] = $query->result();
        $data['sayfa'] = "Hakkımızda";
        $data['menu']="hakkımızda";
        $this->load->model("Database_Model");
        $data["cats"] = $this->Database_Model->get_categories();

        $this->load->view('_header', $data);
        $this->load->view('_sidebar');
        $this->load->view('hakkimizda', $data);
        $this->load->view('_footer');
    }

    public function iletisim()
    {
        $this->load->model("Database_Model");
        $query = $this->db->query("SELECT * FROM settings");
        $data['veri'] = $query->result();
        $data['sayfa'] = "İletişim";
        $data['menu']="iletişim";
        $data["cats"] = $this->Database_Model->get_categories();


        $this->load->view('_header', $data);
        $this->load->view('_sidebar');
        $this->load->view('iletisim', $data);
        $this->load->view('_footer');
    }

    public function bize_yazin()
    {
        $this->load->model("Database_Model");
        $query = $this->db->query("SELECT * FROM settings");
        $data['veri'] = $query->result();
        $data['sayfa'] = "İletişim";
        $data['menu']="bizeyazın";
        $data["cats"] = $this->Database_Model->get_categories();


        $this->load->view('_header', $data);
        $this->load->view('_sidebar');
        $this->load->view('bize_yazin', $data);
        $this->load->view('_footer');
    }

    public function send_msg()
    {
        $data = array(
            'username' => $this->input->post("name"),
            'email' => $this->input->post("email"),
            'phone' => $this->input->post("phone"),
            'subject' => $this->input->post("subject"),
            'message' => $this->input->post("message"),
            'status' => "unread",
            'time' => date("Y-m-d h:i:s"),
            'ip' => $_SERVER['REMOTE_ADDR'],
            'user_id'=>$this->session->user_sess["id"]
        );
        if ($this->db->insert('messages', $data)) {
            $this->session->set_flashdata("success", "Mesajınız Gönderildi..");
            redirect(base_url() . "home/bize_yazin");
        }

    }

    public function login()
    {
        $query = $this->db->query("SELECT * FROM settings");
        $data['veri'] = $query->result();
        $data['sayfa'] = "Üye Giriş Sayfası";
        $data['menu']="login";

        $this->load->view('_header', $data);
        $this->load->view('login');
        $this->load->view('_footer');
    }

    public function login_ol()
    {
        $username = $this->input->post("username");
        $pass = $this->input->post("password");

        $this->load->model("Database_Model");
        $db_result = $this->Database_Model->login_control("users", $username, $pass);

        if ($db_result) {
            $res_array = array(
                'id' => $db_result[0]->id,
                'name' => $db_result[0]->name,
                'surname' => $db_result[0]->surname,
                'phone' => $db_result[0]->phone,
                'username' => $db_result[0]->username,
                'password' => $db_result[0]->password,
                'email' => $db_result[0]->email,
                'image' => $db_result[0]->image,
                'address_id' => $db_result[0]->address_id,
                'newsletter' => $db_result[0]->newsletter,
                'authority' => $db_result[0]->authority,
                'status' => $db_result[0]->status,
                'create_time' => $db_result[0]->create_time
            );
            $this->session->set_userdata("user_sess", $res_array);
            redirect(base_url() . "home");

        } else {
            $this->session->set_flashdata("alert", "Hatalı kullanıcı adı veya şifre");
            redirect(base_url() . "home/login");
        }
    }

    public function logout()
    {
        $this->session->unset_userdata("user_sess");
        redirect(base_url() . "home");
    }

    public function kayit_ol()
    {
        $this->load->model("Database_Model");
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'status'    => 1,
            'authority' =>'user',
            'password' => $this->input->post('password'));
        $c = $this->Database_Model->kayit_kontrol($data,$this->input->post("password2"));

        if ($c[0] == 1)
            $this->session->set_flashdata("alert1", "Kullanıcı adı zaten kullanılıyor!");
        if ($c[1] == 1)
            $this->session->set_flashdata("alert2", "Email zaten kullanılıyor!");
        if ($c[2] == 1)
            $this->session->set_flashdata("alert3", "Şifreler uyuşmuyor!");
        if ($c != [0, 0, 0])
            redirect(base_url() . "home/login");
        else {
            $db_result = $this->Database_Model->login_control("users", $data['username'], $data['password']);
            if ($db_result) {
                $res_array = array(
                    'id' => $db_result[0]->id,
                    'name' => $db_result[0]->name,
                    'surname' => $db_result[0]->surname,
                    'phone' => $db_result[0]->phone,
                    'username' => $db_result[0]->username,
                    'password' => $db_result[0]->password,
                    'email' => $db_result[0]->email,
                    'image' => $db_result[0]->image,
                    'address_id' => $db_result[0]->address_id,
                    'newsletter' => $db_result[0]->newsletter,
                    'authority' => $db_result[0]->authority,
                    'status' => $db_result[0]->status,
                    'create_time' => $db_result[0]->create_time
                );
                $this->session->set_userdata("user_sess", $res_array);
                redirect(base_url()."home");
            }
        }

    }

    public function urun_detay($id)
    {
        $this->load->model("Database_Model");
        $query = $this->db->query("SELECT * FROM settings");
        $data["comments"]=$this->Database_Model->get_comments($id);
        $data["cats"] = $this->Database_Model->get_categories();
        $data['urun'] =$this->Database_Model->get_urun($id);
        $data['veri']=$query->result();
        $data["veri"][0]->meta_keywords=$data["urun"][0]->meta_keywords;
        $data["veri"][0]->meta_description=$data["urun"][0]->meta_description;
        $data['resimler']=$this->Database_Model->get_urun_galeri($id);
        $data['sayfa'] = "";
        $data['menu']="";
        $this->load->view('_header', $data);
        $this->load->view('_sidebar', $data);
        $this->load->view('urun_detay',$data);
        $this->load->view('_footer');
    }

    public function test()
    {
        $this->load->model("Database_Model");
        $data = $this->Database_Model->get_categories();

        foreach ($data as $bir)
        {
           echo $bir->name."<br>";
           foreach ($bir->sub as $iki)
           {
               echo "--$iki->name.<br>";
               foreach ($iki->sub as $uc)
               {
                   echo "----$uc->name.<br>";
               }
           }
        }
    }

}
