<?php
class kelione extends CI_Model {

        public $M_ID;
        public $Klientas_ID;
        public $Kel_ID;

        public function sukurtiNauja(){

        	$this->db->insert('kelione', $this);
        }

        public function gautiKlienta($M_ID){
        $query = $this->db->query("Select Klientas_ID FROM kelione WHERE M_ID=".$M_ID);
        return $query->result();
        }

        public function gautiAutomobili($M_ID){
        $query = $this->db->query("Select Auto_ID FROM kelione WHERE M_ID=".$M_ID);
        return $query->row()->Auto_ID;
        }

        public function gautiKelioneMaktyvi($Klientas_ID){
        $this->db->select('*');
        $this->db->from('kelione');
        $this->db->where('kelione.Klientas_ID', $Klientas_ID);
        $this->db->join('marsrutas', 'kelione.M_ID=marsrutas.M_ID');
        $this->db->join('klientas', 'marsrutas.Klientas_ID=klientas.Klientas_ID');
        $this->db->join('automobilis', 'marsrutas.Auto_ID=automobilis.Auto_ID');
        $this->db->where('marsrutas.marsruto_busena=1');
        $query = $this->db->get();
        return $query->result();
        }

        public function gautiKelioneMistrinta($Klientas_ID){
        $this->db->select('*');
        $this->db->from('kelione');
        $this->db->where('kelione.Klientas_ID', $Klientas_ID);
        $this->db->join('marsrutas', 'kelione.M_ID=marsrutas.M_ID');
        $this->db->join('klientas', 'marsrutas.Klientas_ID=klientas.Klientas_ID');
        $this->db->join('automobilis', 'marsrutas.Auto_ID=automobilis.Auto_ID');
        $this->db->where('marsrutas.marsruto_busena=3');
        $query = $this->db->get();
        return $query->result();
        }

        public function gautiKelioneUaktyvi($Klientas_ID){
        $this->db->select('*');
        $this->db->from('kelione');
        $this->db->where('kelione.Klientas_ID', $Klientas_ID);
        $this->db->join('marsrutas', 'kelione.M_ID=marsrutas.M_ID');
        $this->db->join('klientas', 'marsrutas.Klientas_ID=klientas.Klientas_ID');
        $this->db->where('marsrutas.marsruto_busena=2');
        $query = $this->db->get();
        return $query->result();
        }

        public function gautiKelioneUistrinta($Klientas_ID){
        $this->db->select('*');
        $this->db->from('kelione');
        $this->db->where('kelione.Klientas_ID', $Klientas_ID);
        $this->db->join('marsrutas', 'kelione.M_ID=marsrutas.M_ID');
        $this->db->join('klientas', 'marsrutas.Klientas_ID=klientas.Klientas_ID');
        $this->db->where('marsrutas.marsruto_busena=4');
        $query = $this->db->get();
        return $query->result();
        }

}

?>