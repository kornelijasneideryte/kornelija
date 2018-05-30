<?php
class modelis extends CI_Model {

        public $modelio_id;
        public $modelis;
        public $id;
       
        public function gautiInfo($marke)
        {
            $query = $this->db->query("Select * FROM modelis WHERE id=$marke");
            return $query->result();
        }


}

		
?>