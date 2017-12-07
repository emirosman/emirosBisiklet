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

}
?>