<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siparisler extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        if( !$this->session->userdata("admin_sess"))
        {redirect(base_url()."admin/login");}
    }


	public function index()
	{
        $query=$this->db->query("SELECT * FROM orderr ORDER BY date DESC ");
        $data['veri']=$query->result();

		$this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/siparisler_liste',$data);
        $this->load->view('admin/_footer');
	}
	public function durum($durum)
    {
        $query=$this->db->query("SELECT * FROM orderr WHERE order_status LIKE '$durum' ORDER BY date DESC ");
        $data['veri']=$query->result();

        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/siparisler_liste',$data);
        $this->load->view('admin/_footer');
    }


	public function siparis_iptal($id)
    {
        $this->load->model("Database_Model");
        $query=$this->db->query("SELECT * FROM order_product WHERE order_id=$id");
        $urunler=$query->result();
        foreach ($urunler as $urun)
        {
            $query2=$this->db->query("select stock from products where id=$urun->product_id");
            $data_p=$query2->result();
            $p['stock']=$data_p[0]->stock+$urun->piece;
            $this->Database_Model->update_data("products",$p,$urun->product_id);
        }
        $data['order_status']="iptal";
        $this->Database_Model->update_data("orderr",$data,$id);

        $this->session->set_flashdata("success","Sipariş iptal edildi");
        redirect(base_url()."admin/siparisler");
    }
    public function siparis_detay($id)
    {
        $query=$this->db->query("SELECT * FROM order_product WHERE order_id=$id");
        $data["urunler"]=$query->result();
        $query2=$this->db->query("SELECT * FROM orderr WHERE id=$id");
        $data["siparis"]=$query2->result();

        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/siparisler_detay',$data);
        $this->load->view('admin/_footer');
    }
    public function siparis_guncelle($id)
    {
        $this->load->model("Database_Model");
        $data=array(
            'shipment'  =>$this->input->post("kargo"),
            'description'=>$this->input->post("açıklama"),
            'order_status'=>$this->input->post("order_status")
        );
        $this->Database_Model->update_data("orderr",$data,$id);
        $this->session->set_flashdata("success","Sipariş güncellendi");
        redirect(base_url()."admin/siparisler");
    }

	public function test ()
    {

    }

}
