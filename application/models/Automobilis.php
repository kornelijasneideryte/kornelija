<?php
class automobilis extends CI_Model {

        public $Valstybinis_registracijos_numeris;
        public $Gamybine_marke;
        public $Modelis;
        public $Spalva;
        public $Tech_apziuros_galiojimo_pabaigos_data;
        public $Auto_busena;
        public $Klientas_ID;
        public $Auto_ID;

        public function iterptiNaujaAutomobili(){
			$this->db->insert('automobilis', $this);
		}

        public function insert_entry()
        {
                $this->title    = $_POST['title']; // please read the below note
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->insert('automobilis', $this);
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('automobilis', $this, array('id' => $_POST['id']));
        }

        public function gautiDuomenis($Klientas_ID)
        {
            $this->db->select('Valstybinis_registracijos_numeris, Gamybine_marke, Modelis, Spalva, Tech_apziuros_galiojimo_pabaigos_data, Auto_ID, marke, id, Auto_busena, Klientas_ID');
                $this->db->from('automobilis');
                $this->db->join('marke', 'marke.id=automobilis.Gamybine_marke');
                $this->db->where('automobilis.Klientas_ID', $Klientas_ID);
                $this->db->where('automobilis.Auto_busena', '0');
                 $query = $this->db->get();
            return $query->result();
        }

        public function gautiDuomenisRedagavimui($Auto_ID){
             $this->db->select('Valstybinis_registracijos_numeris, Gamybine_marke, Modelis, Spalva, Tech_apziuros_galiojimo_pabaigos_data, Auto_ID, marke, id, Auto_busena, Klientas_ID');
                $this->db->from('automobilis');
                $this->db->join('marke', 'marke.id=automobilis.Gamybine_marke');
                $this->db->where('automobilis.Auto_ID', $Auto_ID);
                 $query = $this->db->get();
            return $query->result();

        }

        public function atnaujintiAutomobili($Auto_ID){
                        $this->db->where('Auto_ID', $Auto_ID);
                        $this->db->update('automobilis', $this);
        }

        public function istrintiAuto($Auto_ID){
                        $this->db->set('Auto_busena', '1');
                        $this->db->where('Auto_ID', $Auto_ID);
                        $this->db->update('automobilis');
                }

        public function gautiAuto($Klientas_ID)
        {
        $query = $this->db->query("Select Auto_ID FROM automobilis WHERE Klientas_ID=".$Klientas_ID);
        return $query->result();
        }

        public function gautiKontaktus($Auto_ID){
            $this->db->select('klientas.Vardas, klientas.Pavarde, klientas.Telefono_numeris, klientas.Elektroninis_pastas, automobilis.Valstybinis_registracijos_numeris');
            $this->db->from('automobilis');
            $this->db->where('Auto_ID', $Auto_ID);
            $this->db->join('klientas', 'automobilis.Klientas_ID=klientas.Klientas_ID');


        $query = $this->db->get(); 
        return $query->result();
        }

}

?>