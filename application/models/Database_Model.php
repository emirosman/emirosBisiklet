<?php
class Database_Model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }
    public function login_admin_control($table,$user,$pass)
    {

        $query=$this->db->query("SELECT * FROM $table WHERE username='".$user."'AND authority='admin' AND password='".$pass."' LIMIT 1");
        if($query->num_rows()==1)
        {
            return $query->result();
        }
        else{
            return false;
        }
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

    public function kayit_kontrol($data,$pass2)
    {
        $c=array(0,0,0);
        $ctrl_usrname=$this->db->query( "SELECT * FROM users WHERE username='".$data['username']."'");
        $ctrl_email=$this->db->query( "SELECT * FROM users WHERE email='".$data['email']."'");
            if($ctrl_usrname->result()!=null)
            {
                $c[0]=1;
            }
            if($ctrl_email->result()!=null)
            {
                $c[1]=1;
            }
            if($data["password"]!=$pass2)
            {
                $c[2]=1;
            }
            if($c!=[0,0,0])
                return $c;
            else{
                if($this->db->insert("users",$data))
                    return $c;
            }


    }

//    public function kategori_liste()
//    {
//        $this->db->select('*');
//        $this->db->from('category');
//        $this->db->where('parent_id', 0);
//
//        $parent = $this->db->get();
//
//        $categories = $parent->result();
//        $i=0;
//        foreach($categories as $p_cat){
//
//            $categories[$i]->sub = $this->sub_categories($p_cat->id);
//            $i++;
//        }
//        return $categories;
//    }
//    public function sub_categories($id){
//
//        $this->db->select('*');
//        $this->db->from('category');
//        $this->db->where('parent_id', $id);
//
//        $child = $this->db->get();
//        $categories = $child->result();
//        $i=0;
//        foreach($categories as $p_cat){
//
//            $categories[$i]->sub = $this->sub_categories($p_cat->id);
//            $i++;
//        }
//        return $categories;
//    }
}
?>