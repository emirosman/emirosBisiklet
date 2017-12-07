<?php
class Test_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    public function listele()
    {
        $query=$this->db->query('SELECT * FROM uyeler WHERE username="atmin"');
        return $query->result();
    }

}