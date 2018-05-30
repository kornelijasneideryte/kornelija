<?php
class klientas extends CI_Model {

        public $Vardas;
        public $Pavarde;
        public $Telefono_numeris;
        public $Elektroninis_pastas;
        public $Slaptazodis;
        public $Bonus_taskai;
        public $Klientas_ID;



public function iterptiNaujaKlienta(){
			$this->db->insert('klientas', $this);
		}

        public function insert_entry()
        {
                $this->title    = $_POST['title']; // please read the below note
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->insert('klientas', $this);
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('klientas', $this, array('id' => $_POST['id']));
        }


        public function prisijungti()
        {
                $this->db->where('Elektroninis_pastas',$this->Elektroninis_pastas);
                $this->db->where('Slaptazodis',$this->Slaptazodis);
                $query = $this->db->get('klientas'); 
                return $query->result();
        }

public function gautiKontaktus($data)
{

        $this->db->select('Vardas, Pavarde, Telefono_numeris, Elektroninis_pastas, Valstybinis_registracijos_numeris');
        $this->db->from('klientas');
        $this->db->join('kelione', 'klientas.Klientas_ID=kelione.Klientas_ID');
        $this->db->where('kelione.M_ID', $M_ID);
        $this->db->join('automobilis', 'kelione.Auto_ID',$Auto_ID);


        $query = $this->db->get(); 
        return $query->result();
}

public function gautiKontaktusPakeleiviu($M_ID)
{

        $this->db->select('Vardas, Pavarde, Telefono_numeris, Elektroninis_pastas');
        $this->db->from('klientas');
        $this->db->join('kelione', 'klientas.Klientas_ID=kelione.Klientas_ID');
        $this->db->where('kelione.M_ID', $M_ID);
        $query = $this->db->get(); 
        return $query->result();
}

public function gautiKontaktus2($U_ID)
{
        $this->db->select('Vardas, Pavarde, Telefono_numeris, Elektroninis_pastas');
        $this->db->from('klientas');
        $this->db->join('kelione', 'klientas.Klientas_ID=kelione.Klientas_ID');
        $this->db->where('kelione.U_ID', $U_ID);

        $query = $this->db->get(); 
        return $query->result();
}


public function gautiDuomenis($Klientas_ID)
{
        $query = $this->db->query("Select * FROM klientas WHERE Klientas_ID=".$Klientas_ID);
        return $query->result();
}

public function atnaujintiKlienta($Klientas_ID){
                        $this->db->where('Klientas_ID', $Klientas_ID);
                        $this->db->update('klientas', $this);
                }

public function istrintiBonus($Klientas_ID){
        $this->db->set('Bonus_taskai', 'Bonus_taskai-1', FALSE);
        $this->db->where('Klientas_ID', $Klientas_ID);        
        $this->db->update('klientas');}

        public function pridetiBonus($Klientas_ID){
        $this->db->set('Bonus_taskai', 'Bonus_taskai+1', FALSE);
        $this->db->where('Klientas_ID', $Klientas_ID);        
        $this->db->update('klientas');} 

        public function gautiDuomenisPagalPasta($Elektroninis_pastas)
{
        $query = $this->db->query("Select * FROM klientas WHERE Elektroninis_pastas=".$Elektroninis_pastas);
        return $query->result();
}

                


}
?>