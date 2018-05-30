<?php
class marsrutas extends CI_Model {

        public $Data;
        public $Laikas_nuo;
        public $Laikas_iki;
        public $Isvykimo_miestas;
        public $Atvykimo_miestas;
        public $Galimi_keleiviai;
        public $Kaina;
        public $Klientas_ID;
        public $Auto_ID;
        public $Marsruto_busena;
        public $M_ID;


        public function gautiVisusMarsrutus()
        {
                $query = $this->db->get('marsrutas'); // iš kurios lentelės pasiima duomenis
                return $query->result();
        }

        public function gautiManoMarsrutus($Klientas_ID)
        {       
                $this->db->select('Data, Laikas_nuo, Laikas_iki, Isvykimo_miestas, Atvykimo_miestas, Galimi_keleiviai, Kaina, Auto_ID, Marsruto_busena, M_ID');
                $this->db->from('marsrutas');
                $this->db->join('klientas', 'marsrutas.Klientas_ID=klientas.Klientas_ID');
                $this->db->where('klientas.Klientas_ID', $Klientas_ID);
                $this->db->where('marsrutas.Marsruto_busena=1');
                $this->db->order_by('Data','desc');
                $this->db->order_by('Laikas_nuo','asc');
                 $query = $this->db->get(); // iš kurios lentelės pasiima duomenis
                return $query->result();
        }

        public function gautiManoUzklausas($Klientas_ID)
        {       
                $this->db->select('Data, Laikas_nuo, Laikas_iki, Isvykimo_miestas, Atvykimo_miestas, Auto_ID, Marsruto_busena, M_ID');
                $this->db->from('marsrutas');
                $this->db->join('klientas', 'marsrutas.Klientas_ID=klientas.Klientas_ID');
                $this->db->where('klientas.Klientas_ID', $Klientas_ID);
                $this->db->where('marsrutas.Marsruto_busena=2');
                $this->db->order_by('Data','desc');
                $this->db->order_by('Laikas_nuo','asc');
                 $query = $this->db->get(); // iš kurios lentelės pasiima duomenis
                return $query->result();
        }

        public function gautiMarsrutus($filtrai, $Laikas_nuo, $Laikas_iki) 
        {       
                $this->db->select('Data, Laikas_nuo, Laikas_iki, Isvykimo_miestas, Atvykimo_miestas, Galimi_keleiviai, Kaina, Vardas, Pavarde, Valstybinis_registracijos_numeris, Modelis, Gamybine_marke, M_ID, marke, Auto_busena');
                $this->db->from('marsrutas');
                $this->db->join('klientas', 'marsrutas.Klientas_ID=klientas.Klientas_ID');
                $this->db->join('automobilis', 'automobilis.Klientas_ID=klientas.Klientas_ID');
                $this->db->where('marsrutas.Auto_ID=automobilis.Auto_ID');
                $this->db->join('marke', 'marke.id=automobilis.Gamybine_marke');
                $this->db->where('Data>=', date('Y-m-d'));
                $this->db->where('automobilis.Auto_busena=0');
                $this->db->where('marsrutas.Marsruto_busena=1');
                $this->db->where('Laikas_nuo>=', $Laikas_nuo);
                $this->db->where('Galimi_keleiviai>', 0);
                $this->db->order_by('Data','asc');
                $this->db->order_by('Laikas_nuo','asc');

                if(is_null($this->Laikas_nuo)){
                    if($Laikas_iki!=='23:59'){
                    $this->db->where('Laikas_nuo<=', $Laikas_iki);}
                    foreach ($filtrai as $raktas=>$reiksme){
                    $this->db->where($raktas, $reiksme);
                    }
                        $query = $this->db->get(); 
                    }
                
            else{
                if($Laikas_iki!=='23:59'){
               $this->db->where('Laikas_iki<=', $Laikas_iki);}
               foreach ($filtrai as $raktas=>$reiksme){
                $this->db->where($raktas, $reiksme);
               }
                $query = $this->db->get(); 
                }
                
                return $query->result();
        }


        public function gautiUzklausas($filtrai, $Laikas_nuo, $Laikas_iki) 
        {       
                $this->db->select('Data, Laikas_nuo, Laikas_iki, Isvykimo_miestas, Atvykimo_miestas, Vardas, Pavarde, M_ID');
                $this->db->from('marsrutas');
                $this->db->join('klientas', 'marsrutas.Klientas_ID=klientas.Klientas_ID');
                $this->db->where('Data>=', date('Y-m-d'));
                $this->db->where('marsrutas.Marsruto_busena=2');
                $this->db->where('Laikas_nuo>=', $Laikas_nuo);
                $this->db->order_by('Data','asc');
                $this->db->order_by('Laikas_nuo','asc');

                if(is_null($this->Laikas_nuo)){
                    if($Laikas_iki!=='23:59'){
                    $this->db->where('Laikas_nuo<=', $Laikas_iki);}
                    foreach ($filtrai as $raktas=>$reiksme){
                    $this->db->where($raktas, $reiksme);
                    }
                        $query = $this->db->get(); 
                    }
                
            else{
                if($Laikas_iki!=='23:59'){
               $this->db->where('Laikas_iki<=', $Laikas_iki);}
               foreach ($filtrai as $raktas=>$reiksme){
                $this->db->where($raktas, $reiksme);
               }
                $query = $this->db->get(); 
                }
                
                return $query->result();
        }

        public function iterptiNaujaMarsruta(){
                        $this->db->insert('marsrutas', $this);
                }

        public function atnaujintiMarsruta($M_ID){
                        $this->db->where('M_ID', $M_ID);
                        $this->db->update('marsrutas', $this);
                }

        public function istrintiMarsruta($M_ID){
                       $this->db->set('Marsruto_busena', '3');
                        $this->db->where('M_ID', $M_ID);
                        $this->db->update('marsrutas');
                }

public function istrintiUzklausa($M_ID){
                       $this->db->set('Marsruto_busena', '4');
                        $this->db->where('M_ID', $M_ID);
                        $this->db->update('marsrutas');
                }

        public function insert_entry()
        {
                $this->title    = $_POST['title']; // please read the below note
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->insert('marsrutas', $this);
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('marsrutas', $this, array('id' => $_POST['id']));
        }


        public function gautiMarsruta($Klientas_ID)
{
        $query = $this->db->query("Select M_ID FROM marsrutas WHERE Klientas_ID=".$Klientas_ID." AND Marsruto_busena=1");
        return $query->result();
}


        public function gautiUzklausa($Klientas_ID)
{
        $query = $this->db->query("Select M_ID FROM marsrutas WHERE Klientas_ID=".$Klientas_ID." AND Marsruto_busena=2");
        return $query->result();
}

        public function gautiDuomenis($M_ID)
        {
            $query = $this->db->query("Select * FROM marsrutas WHERE M_ID=".$M_ID);
            return $query->result();
        }

public function gautiVairuotoja($M_ID)
        {
            $query = $this->db->query("Select Klientas_ID FROM marsrutas WHERE M_ID=".$M_ID);
            return $query->result();
        }

public function nuimtiKeleivi($M_ID)
{
    $this->db->set('Galimi_keleiviai', 'Galimi_keleiviai-1', FALSE);
    $this->db->where('M_ID', $M_ID);        
    $this->db->update('marsrutas');
}

    public function gautiPakeleivi($M_ID){
            $query = $this->db->query("Select Klientas_ID FROM marsrutas WHERE M_ID=".$M_ID);
            return $query->result();
        }

        public function gautiAutoMarsrutus($Auto_ID){
            $query=$this->db->query("Select M_ID FROM marsrutas WHERE Auto_ID=".$Auto_ID);
            return $query->result();
        }

        public function pakeistiBusena($M_ID){            
            $this->db->set('Marsruto_busena', '3');
            $this->db->where('M_ID', $M_ID);        
            $this->db->update('marsrutas');

        }
    
       
}

?>