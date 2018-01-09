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
        $query = $this->db->query("SELECT * FROM settings");
        $data['veri'] = $query->result();
        $data['sayfa'] = "";


        $this->load->view('_header', $data);
        $this->load->view('_slider');
        $this->load->view('_sidebar', $data);
        $this->load->view('_content');
        $this->load->view('_footer');
    }

    public function hakkimizda()
    {
        $query = $this->db->query("SELECT * FROM settings");
        $data['veri'] = $query->result();
        $data['sayfa'] = "Hakkımızda";

        $this->load->view('_header', $data);
        $this->load->view('_sidebar');
        $this->load->view('hakkimizda', $data);
        $this->load->view('_footer');
    }

    public function iletisim()
    {
        $query = $this->db->query("SELECT * FROM settings");
        $data['veri'] = $query->result();
        $data['sayfa'] = "İletişim";


        $this->load->view('_header', $data);
        $this->load->view('_sidebar');
        $this->load->view('iletisim', $data);
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
            'ip' => $_SERVER['REMOTE_ADDR']
        );
        if ($this->db->insert('messages', $data)) {
            $this->session->set_flashdata("success", "Mesajınız Gönderildi..");
            redirect(base_url() . "home/iletisim");
        }
        echo $data['username'] . "<br>";
        echo $data['email'] . "<br>";
        echo $data['subject'] . "<br>";
        echo $data['message'] . "<br>";
        echo $data['time'] . "<br>";
        echo $data['ip'] . "<br>";

    }

    public function login()
    {
        $query = $this->db->query("SELECT * FROM settings");
        $data['veri'] = $query->result();
        $data['sayfa'] = "Üye Giriş Sayfası";

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
                redirect(base_url() . "home");
            }
        }

    }

}
