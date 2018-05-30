<?php
class miestai extends CI_Model {

        public $id;
        public $miestas;

        public function GetRow($keyword) {        
            $this->db->order_by('miestas', 'ASC');
            $this->db->like("miestas", $keyword);
            return $this->db->get('miestai')->result_array();
        }

        public function GetRow2($keyword2) {        
            $this->db->order_by('miestas', 'ASC');
            $this->db->like("miestas", $keyword2);
            return $this->db->get('miestai')->result_array();
        }

         public function gautiMiesta()
        {
            $query = $this->db->query("Select * FROM miestai");
            return $query->result();
        }

        
}

?>