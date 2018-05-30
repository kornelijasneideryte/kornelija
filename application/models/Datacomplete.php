<?php
class Datacomplete extends CI_Model{
    
    public function GetRow() {        
        $this->db->order_by('id', 'DESC');
        $this->db->like("miestas", $keyword);
        return $this->db->get('miestai')->result_array();
    }
}