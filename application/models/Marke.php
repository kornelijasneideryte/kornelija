<?php
class marke extends CI_Model {

        public $id;
        public $marke;
       


 public function gautiInfo()
        {
            $query = $this->db->query("Select * FROM marke");
            return $query->result();
        }


}
?>