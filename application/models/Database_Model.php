<?php
class Database_Model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }
    public function login_admin_control($table,$user,$pass)
    {

        $query=$this->db->query("SELECT * FROM $table WHERE username='".$user."'AND authority='admin' AND status=1 AND password='".$pass."' LIMIT 1");
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

        $query=$this->db->query("SELECT * FROM $table WHERE username='".$user."' AND password='".$pass."'  AND status=1 LIMIT 1");
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
        $query=$this->db->query("SELECT products.*, category.name as cat_name , category.id as cat_id
        FROM products
        INNER JOIN category ON products.cat_id=category.id
        ORDER BY id
        ");

        return $query->result();
    }
    public function urun_ara($name)
    {
        $query=$this->db->query("select * from products
        where name LIKE '%$name%'
        ");

        return $query->result();
    }

    public function get_kategori_urunler($id)
    {
        $query=$this->db->query("SELECT products.*, category.name as cat_name , category.id as cat_id
        FROM products
        INNER JOIN category ON products.cat_id=category.id
        WHERE category.id=$id
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
    public function get_sepet_urunler($user_id)
    {
        $query=$this->db->query("SELECT basket.id as sepet_id, basket.piece,p.stock,p.id,p.name,p.preview_img,p.s_price from basket
                                 inner join products as p on p.id=basket.product_id
                                 where basket.user_id=$user_id
                                 ");
        return $query->result();
    }
    public function get_favori_urunler($id)
    {
        $query=$this->db->query("SELECT fav.id as fav_id , p.id, p.name, p.preview_img, p.s_price from fav
                                 inner join products as p on p.id=fav.product_id
                                 where fav.user_id=$id");
        return $query->result();
    }
    public function get_urun_galeri($id)
    {
        $query=$this->db->query("SELECT * FROM p_gallery WHERE p_id=$id");
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
    public function get_sliders()
    {
        $query=$this->db->query("SELECT sliders.*,products.name
        FROM sliders
        INNER JOIN products ON sliders.product_id=products.id
        ");

        return $query->result();
    }
    public function get_show_sliders()
    {
        $query=$this->db->query("SELECT sliders.*,products.name
        FROM sliders
        INNER JOIN products ON sliders.product_id=products.id WHERE status=1
        ");

        return $query->result();
    }
    public function get_slider($id)
    {
        $query=$this->db->query("SELECT sliders.*,products.name
        FROM sliders 
        INNER JOIN products ON sliders.product_id=products.id
        WHERE sliders.id=$id
        ");

        return $query->result();
    }
    public function get_sepet_total($id)
    {
        $query=$this->db->query("select sum( p.s_price*basket.piece) as total  from basket 
        inner join products as p on p.id=basket.product_id
        where basket.user_id=$id
        ");

        return $query->result();
    }
    public function get_categories()
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('parent_id', 0);

        $parent = $this->db->get();

        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){

            $categories[$i]->sub = $this->sub_categories($p_cat->id);
            $i++;
        }
        return $categories;
    }
    public function sub_categories($id)
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('parent_id', $id);

        $child = $this->db->get();
        $categories = $child->result();
        $i=0;
        foreach($categories as $p_cat){

            $categories[$i]->sub = $this->sub_categories($p_cat->id);
            $i++;
        }
        return $categories;
    }
    public function get_comments($id)//ürüne ait yorumlar
    {
        $query=$this->db->query("select u.username,comments.comment,comments.date from  comments
        inner join users as u on u.id=comments.user_id
        WHERE comments.product_id=$id ORDER BY comments.date DESC 
        ");

        return $query->result();
    }
    public function get_yorumlarim($id)//profil>yorumlarım sayfası
    {
        $query=$this->db->query("select p.name as p_name,comments.product_id, comments.id,comments.comment,comments.date from  comments
        inner join products as p on p.id=comments.product_id
        WHERE comments.user_id=$id
        ");

        return $query->result();
    }
    public function get_mesajlarim($id)//profil>yorumlarım sayfası
    {
        $query=$this->db->query("SELECT messages.* FROM  messages
inner join users on users.username=messages.username
WHERE users.id=$id
        ");

        return $query->result();
    }
    public function get_mesaj($id)//profil>yorum_detay sayfası
    {
        $query=$this->db->query("SELECT messages.*,answers.answer as cevap, answers.date as cevap_tarih FROM  messages
left join answers on answers.message_id=messages.id
WHERE messages.id=$id
        ");

        return $query->result();
    }
    public function get_yorum($id)//profil>yorum_detay sayfası
    {
        $query=$this->db->query("select p.name as p_name,comments.id,comments.comment,comments.date from  comments
        inner join products as p on p.id=comments.product_id
        WHERE comments.id=$id
        ");

        return $query->result();
    }
    public function get_siparis_urunler($id)
    {
        $query=$this->db->query("select p.*,op.piece from orderr
inner join order_product as op on op.order_id=orderr.id
inner join products as p on p.id=op.product_id
WHERE orderr.id=$id
        ");

        return $query->result();
    }
    public function siparis_iptal_urun_ekle($id)
    {
        $query=$this->db->query("select order_product.id,order_product.product_id,order_product.piece FROM order_product
        inner join orderr on orderr.id=order_product.order_id WHERE orderr.id=$id");//order_product ta siparişe ait ürünleri getirdi
        $op = $query->result();
        foreach ($op as $rs)
        {
            $query2=$this->db->query("SELECT stock FROM products WHERE id=$rs->product_id");
            $p=$query2->result();
            $update=array(
                'stock'=> ($rs->piece + $p[0]->stock)
            );
            $this->update_data("products",$update,$rs->product_id);
        }
    }

}
?>