<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
       //!! session ve database işlemleri yapabilmek için kütüphaneler eklendi
        $this->load->database();
    }
	public function index()
	{
        $this->load->view('admin/login');
	}
	public function be_login()
    {
        $user=$this->input->post("loginUsername");
        $pass=$this->input->post("loginPassword");

        $user=$this->security->xss_clean($user);
        $pass=$this->security->xss_clean($pass);

        $this->load->model("Database_Model");
        $db_result=$this->Database_Model->login_control("users",$user,$pass);
        if ($db_result)
        {
            $res_array=array(
                'id'=>$db_result[0]->id,
                'name'=>$db_result[0]->name,
                'surname'=>$db_result[0]->surname,
                'username'=>$db_result[0]->username,
                'password'=>$db_result[0]->password,
                'email'=>$db_result[0]->email,
                'image'=>$db_result[0]->image,
                'address_id'=>$db_result[0]->address_id,
                'newsletter'=>$db_result[0]->newsletter,
                'authority'=>$db_result[0]->authority,
                'status'=>$db_result[0]->status,
                'create_time'=>$db_result[0]->create_time
            );
            $this->session->set_userdata("admin_sess",$res_array);
            if($this->session->admin_sess['authority']=="admin")
            {
                redirect(base_url()."admin/home");
            }else{
                redirect(base_url()."user/home");
            }
        }else{
            $this->session->set_flashdata("msj","Hatalı kullanıcı adı veya şifre");
            redirect(base_url()."admin/login");
        }
        //foreach ($db_result as $don)
        //{echo $don->username;}


/*
        $this->load->view("admin/test");
*/    }
    public function be_logout()
    {
        $this->session->unset_userdata("admin_sess");
        $this->load->view("admin/login");
    }
}
