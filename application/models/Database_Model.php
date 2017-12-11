<?php
class Database_Model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }
    public function login_control($table,$user,$pass)
    {

        $query=$this->db->query("SELECT * FROM $table WHERE username='".$user."' AND password='".$pass."' LIMIT 1");
        if($query->num_rows()==1)
        {
            return $query->result();
        }
        else{
            return false;
        }
    }
    public function update_data($tablo,$data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update($tablo,$data);
    }

    public function get_urunler()
    {
        $query=$this->db->query("SELECT products.*, category.name as cat_name 
        FROM products
        INNER JOIN category ON products.cat_id=category.id
        ORDER BY id
        ");

        return $query->result();
    }
    public function get_urun($id)
    {
        $query=$this->db->query("SELECT products.*, category.name as cat_name 
        FROM products 
        INNER JOIN category ON products.cat_id=category.id
        WHERE products.id=$id
        ORDER BY id
        ");

        return $query->result();
    }
    public function get_kategoriler()
    {
        $query=$this->db->query("SELECT A.*,B.name AS p_cat_name FROM category A
        INNER JOIN category B ON A.parent_id=B.id
        ORDER BY id
        ");

        return $query->result();
    }
}
?>