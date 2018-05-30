<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class carshare extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('klientas');
		$this->load->model('marsrutas');
		$this->load->model('automobilis');
		$this->load->model('marke');
		$this->load->model('modelis');
		$this->load->model('kelione');
		$this->load->model('miestai');
	}

	public function index(){

		$filtrai=array();
		$Isvykimo_miestas=$this->input->post('Isvykimo_miestas');
		if(strlen(trim($Isvykimo_miestas))>0){$filtrai['Isvykimo_miestas']=$Isvykimo_miestas;}
		$Atvykimo_miestas=$this->input->post('Atvykimo_miestas');
		if(strlen(trim($Atvykimo_miestas))>0){$filtrai['Atvykimo_miestas']=$Atvykimo_miestas;}
		$Data=$this->input->post('Data');
		if(strlen(trim($Data))>0){$filtrai['Data']=$Data;}
		$Laikas_nuo=$this->input->post('Laikas_nuo');
		if(strlen(trim($Laikas_nuo))==0){$Laikas_nuo='00:01';} 
		$Laikas_iki=$this->input->post('Laikas_iki'); 
		if(strlen(trim($Laikas_iki))==0){$Laikas_iki='23:59';}
		$marsrutas['marsrutas']=$this->marsrutas->gautiMarsrutus($filtrai, $Laikas_nuo, $Laikas_iki);	
		$uzklausa['uzklausa']=$this->marsrutas->gautiUzklausas($filtrai, $Laikas_nuo, $Laikas_iki);


		if(isset($this->session->userdata['Klientas_ID'])){
		$this->load->view('header');
		$this->load->view('meniu_prisijungus');
		$this->load->view('titulinis');	
		$this->load->view('visimarsrutai', $marsrutas);	
		$this->load->view('visosuzklausos', $uzklausa);	
		$this->load->view('footer');}
		else{
		$this->load->view('header');
		$this->load->view('meniu_neprisijungus');
		$this->load->view('titulinis');	
		$this->load->view('visimarsrutaineprisijungus', $marsrutas);
		$this->load->view('visosuzklausosneprisijungus', $uzklausa);	
		$this->load->view('footer');}
	}

	public function prisijungimas(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('Elektroninis_pastas', 'Elektroninis_pastas', 'required|valid_email');
		$this->form_validation->set_rules('Slaptazodis', 'Slaptazodis', 'required');
		 if ($this->form_validation->run() == FALSE){
		 	$this->load->view('header');
			$this->load->view('meniu_neprisijungus');
            $this->load->view('prisijungimas');
			$this->load->view('footer');}
			else {
		 	$this->klientas->Elektroninis_pastas = $this->input->post('Elektroninis_pastas');
		 	$this->klientas->Slaptazodis = $this->input->post('Slaptazodis');
		 	$tikrinti = $this->klientas->prisijungti();

		 	if ($tikrinti != false) {
		 		$this->session->set_userdata('Klientas_ID', $tikrinti[0]->Klientas_ID);

		 		$Auto_ID=$this->automobilis->gautiAuto($tikrinti[0]->Klientas_ID);
		 		if(isset($Auto_ID[0])){
				$this->session->set_userdata('Auto_ID', $Auto_ID[0]);}


		 		$Marsrutai=$this->marsrutas->gautiMarsruta($tikrinti[0]->Klientas_ID); 
		 		if(isset($Marsrutai[0])){
				$this->session->set_userdata('Marsrutai', $Marsrutai[0]);}

		 		$Uzklausos=$this->marsrutas->gautiUzklausa($tikrinti[0]->Klientas_ID); 
		 		if(isset($Uzklausos[0])){
		 		$this->session->set_userdata('Uzklausos', $Uzklausos[0]);}
		 		echo '<script>alert("Sveikinu sėkmingai prisijungus!");</script>';
		 		redirect('', 'refresh');
		 	}
		 	else {
		 	$this->load->view('header');
			$this->load->view('meniu_neprisijungus');
            $this->load->view('prisijungimas');
            echo '<script>alert("Elektroninis paštas neegzistuoja arba įvestas neteisingas slaptažodis");</script>';
			$this->load->view('footer');}		 	
		 }
	}

	public function registracija(){
		$duomenys["Vardas"]="";
		$duomenys["Pavarde"]="";
		$duomenys["Telefono_numeris"]="";
		$duomenys["Elektroninis_pastas"]="";
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');			
		$this->form_validation->set_rules('Vardas', 'Vardas', 'required');
		$this->form_validation->set_rules('Pavarde', 'Pavarde', 'required');
		$this->form_validation->set_rules('Telefono_numeris', 'Telefono_numeris', 'required|integer|exact_length[9]');
		$this->form_validation->set_rules('Elektroninis_pastas', 'Elektroninis_pastas', 'required|valid_email|is_unique[klientas.Elektroninis_pastas]');
		$this->form_validation->set_rules('Slaptazodis', 'Slaptazodis', 'required');
                if ($this->form_validation->run() == FALSE){
                	$duomenys["Vardas"]=$this->input->post('Vardas');
					$duomenys["Pavarde"]=$this->input->post('Pavarde');
					$duomenys["Telefono_numeris"]=$this->input->post('Telefono_numeris');
					$duomenys["Elektroninis_pastas"]=$this->input->post('Elektroninis_pastas');
					$this->load->view('header');
					$this->load->view('meniu_neprisijungus');
                    $this->load->view('registracija', $duomenys);
					$this->load->view('footer');}
                else{					
					$this->klientas->Vardas = $this->input->post('Vardas');
					$this->klientas->Pavarde = $this->input->post('Pavarde');
					$this->klientas->Telefono_numeris = $this->input->post('Telefono_numeris');
					$this->klientas->Elektroninis_pastas = $this->input->post('Elektroninis_pastas');
					$this->klientas->Slaptazodis = $this->input->post('Slaptazodis');
					$this->klientas->Bonus_taskai = '0';
					$this->klientas->iterptiNaujaKlienta();
					echo '<script>alert("Sveikinu sėkmingai užsiregistravus! Dabar galite prisijungti.");</script>';
                    redirect('/carshare/prisijungimas', 'refresh');}
	}

	public function marsrutai(){
		$filtrai=array();
		$Isvykimo_miestas=$this->input->post('Isvykimo_miestas');
		if(strlen(trim($Isvykimo_miestas))>0){$filtrai['Isvykimo_miestas']=$Isvykimo_miestas;}
		$Atvykimo_miestas=$this->input->post('Atvykimo_miestas');
		if(strlen(trim($Atvykimo_miestas))>0){$filtrai['Atvykimo_miestas']=$Atvykimo_miestas;}
		$Data=$this->input->post('Data');
		if(strlen(trim($Data))>0){$filtrai['Data']=$Data;}
		$Laikas1=$this->input->post('Laikas1');
		if(strlen(trim($Laikas1))==0){$Laikas1='00:01';} 
		$Laikas2=$this->input->post('Laikas2'); 
		if(strlen(trim($Laikas2))==0){$Laikas2='23:59';}
		$marsrutas['marsrutas']=$this->marsrutas->gautiMarsrutus($filtrai, $Laikas1, $Laikas2);
		//$uzklausa['uzklausa']=$this->uzklausa->gautiUzklausas($filtrai, $Laikas1, $Laikas2);			
		$this->load->view('header');
		if (isset($this->session->userdata['Klientas_ID'])){
		$Klientas_ID = $this->session->userdata['Klientas_ID'];
		$this->load->view('meniu_prisijungus');}
		else {$this->load->view('meniu_neprisijungus');}
		$this->load->view('titulinis');	
		$this->load->view('visimarsrutai', $marsrutas);	
		//$this->load->view('visosuzklausos', $uzklausa);	
		$this->load->view('footer');}

		public function marsrutoredagavimas($M_ID){
			$this->load->library('form_validation');				
			$this->form_validation->set_rules('Laikas_nuo', 'Laikas_nuo', 'required');
			$this->form_validation->set_rules('Data', 'Data', 'required');
			$this->form_validation->set_rules('Galimi_keleiviai', 'Galimi_keleiviai', 'required');
			$this->form_validation->set_rules('Kaina', 'Kaina', 'required');
			$marsruciukas['marsruciukas'] = $this->marsrutas->gautiDuomenis($M_ID)[0];
			if ($this->form_validation->run() == FALSE){
					$this->load->view('header');
					$this->load->view('meniu_prisijungus');
            		$this->load->view('marsrutored', $marsruciukas);
					$this->load->view('footer');}
                else{
					$this->marsrutas->Data = $this->input->post('Data');
					$this->marsrutas->Laikas_nuo = $this->input->post('Laikas_nuo');
					if (trim($this->input->post('Laikas_iki'))==''){$this->marsrutas->Laikas_iki = null;}
					else{$this->marsrutas->Laikas_iki = $this->input->post('Laikas_iki');}
					$this->marsrutas->Galimi_keleiviai = $this->input->post('Galimi_keleiviai');
					$this->marsrutas->Kaina = $this->input->post('Kaina');
					$this->marsrutas->Klientas_ID = $marsruciukas['marsruciukas']->Klientas_ID;
					$this->marsrutas->Atvykimo_miestas = $marsruciukas['marsruciukas']->Atvykimo_miestas;
					$this->marsrutas->Isvykimo_miestas = $marsruciukas['marsruciukas']->Isvykimo_miestas;
					$this->marsrutas->Auto_ID = $marsruciukas['marsruciukas']->Auto_ID;
					$this->marsrutas->Marsruto_busena = '1';
					$this->marsrutas->M_ID = $M_ID;
					$this->marsrutas->atnaujintiMarsruta($M_ID);
					echo '<script>alert("Sveikinu sėkmingai atnaujimus maršrutą!");</script>';
                    redirect('carshare/manomarsrutai', 'refresh');}
			}


			public function marsrutotrynimas($M_ID){
					$marsruciukas['marsruciukas'] = $this->marsrutas->gautiDuomenis($M_ID)[0];
					$this->load->database();
					$this->load->model('marsrutas');
					$this->load->view('header');
					$this->load->view('meniu_prisijungus');
					$this->load->view('marsrutotryn', $marsruciukas);
					$this->load->view('footer');
					$this->marsrutas->istrintiMarsruta($M_ID);
					$Klientas_ID=$this->session->userdata['Klientas_ID'];
					$this->klientas->istrintiBonus($Klientas_ID);
					redirect('carshare/manomarsrutai', 'refresh');
			}

public function uzklausosredagavimas($M_ID){
			$this->load->library('form_validation');   
			$this->form_validation->set_rules('Laikas_nuo', 'Laikas_nuo', 'required');
			$this->form_validation->set_rules('Data', 'Data', 'required');
			$uzklausyte['uzklausyte'] = $this->marsrutas->gautiDuomenis($M_ID)[0];
			if ($this->form_validation->run() == FALSE){
					$this->load->view('header');
					$this->load->view('meniu_prisijungus');
            		$this->load->view('uzklausosred', $uzklausyte);
					$this->load->view('footer');}
                else{
					$this->marsrutas->Data = $this->input->post('Data');
					$this->marsrutas->Laikas_nuo = $this->input->post('Laikas_nuo');
					if (trim($this->input->post('Laikas_iki'))==''){$this->marsrutas->Laikas_iki = null;}
					else{$this->marsrutas->Laikas_iki = $this->input->post('Laikas_iki');}
					$this->marsrutas->Klientas_ID = $uzklausyte['uzklausyte']->Klientas_ID;
					$this->marsrutas->Atvykimo_miestas = $uzklausyte['uzklausyte']->Atvykimo_miestas;
					$this->marsrutas->Isvykimo_miestas = $uzklausyte['uzklausyte']->Isvykimo_miestas;
					$this->marsrutas->M_ID = $M_ID;
					$this->marsrutas->Marsruto_busena = '2';
					$this->marsrutas->atnaujintiMarsruta($M_ID);
					echo '<script>alert("Sveikinu sėkmingai atnaujimus maršruto užklausą!");</script>';
                    redirect('carshare/manouzklausos', 'refresh');}
			}


			public function uzklausostrynimas($M_ID){
					$uzklausyte['uzklausyte'] = $this->marsrutas->gautiDuomenis($M_ID)[0];
					$this->load->view('header');
					$this->load->view('meniu_prisijungus');
					$this->load->view('uzklausostryn', $uzklausyte);
					$this->load->view('footer');
					$this->marsrutas->istrintiUzklausa($M_ID);
					$Klientas_ID=$this->session->userdata['Klientas_ID'];
					$this->klientas->istrintiBonus($Klientas_ID);
					redirect('carshare/manouzklausos', 'refresh');
			}

	


	public function formaauto(){ 
		if (isset($this->session->userdata['Klientas_ID'])){
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');			
		$this->form_validation->set_rules('Valstybinis_registracijos_numeris', 'Valstybinis_registracijos_numeris', 'required|exact_length[6]|is_unique[automobilis.Valstybinis_registracijos_numeris]');
		$this->form_validation->set_rules('Gamybine_marke', 'Gamybine_marke', 'required');
		$this->form_validation->set_rules('Modelis', 'Modelis', 'required');
		$visos_markes['visos_markes']=$this->marke->gautiInfo();
		$this->form_validation->set_rules('Tech_apziuros_galiojimo_pabaigos_data', 'Tech_apziuros_galiojimo_pabaigos_data', 'required|callback_tikrinimasDataApziurai'); 
		$duomenys['Valstybinis_registracijos_numeris']="";
		$duomenys['Spalva']="";
		$duomenys['Tech_apziuros_galiojimo_pabaigos_data']="";
                if ($this->form_validation->run() == FALSE){
                	$duomenys['Valstybinis_registracijos_numeris']=$this->input->post('Valstybinis_registracijos_numeris');
					$duomenys['Spalva']=$this->input->post('Spalva');
					$duomenys['Tech_apziuros_galiojimo_pabaigos_data']=$this->input->post('Tech_apziuros_galiojimo_pabaigos_data');
					$this->load->view('header');
					$this->load->view('meniu_prisijungus');
                    $this->load->view('autoforma',array_merge($visos_markes,$duomenys));

					$this->load->view('footer');}
                else{
					$this->automobilis->Valstybinis_registracijos_numeris = $this->input->post('Valstybinis_registracijos_numeris');
					$this->automobilis->Gamybine_marke = $this->input->post('Gamybine_marke');
					$this->automobilis->Modelis = $this->input->post('Modelis');
					$this->automobilis->Spalva = $this->input->post('Spalva');
					$this->automobilis->Tech_apziuros_galiojimo_pabaigos_data = $this->input->post('Tech_apziuros_galiojimo_pabaigos_data');
					$this->automobilis->Auto_busena = '0';
					$Klientas_ID = $this->session->userdata['Klientas_ID'];
					$this->automobilis->Klientas_ID = $Klientas_ID;
					$tikrinti = $this->automobilis->iterptiNaujaAutomobili();
					$Auto_ID=$this->automobilis->gautiAuto($Klientas_ID);
					$this->session->set_userdata('Auto_ID', $Auto_ID[0]);
					echo '<script>alert("Automobilis pridėtas!");</script>';
                    redirect('', 'refresh');}
		}
	else redirect('prisijungimas', 'refresh');}

	public function formamarsruto(){
		if (isset($this->session->userdata['Klientas_ID'])){
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');				
		$this->form_validation->set_rules('Laikas_nuo', 'Laikas_nuo', 'required');
		$this->form_validation->set_rules('Laikas_iki', 'Laikas_iki', 'callback_tikrinimasLaikas['.$this->input->post('Laikas_nuo').']');
		$this->form_validation->set_rules('Isvykimo_miestas', 'Isvykimo_miestas', 'required');
		$this->form_validation->set_rules('Data', 'Data', 'required|callback_tikrinimasDataMarsrutui');
		$this->form_validation->set_rules('Atvykimo_miestas', 'Atvykimo_miestas', 'required|callback_tikrinimasMiestas['.$this->input->post('Isvykimo_miestas').']');
		$this->form_validation->set_rules('Galimi_keleiviai', 'Galimi_keleiviai', 'required|integer|less_than[11]');
		$this->form_validation->set_rules('Kaina', 'Kaina', 'required|integer|less_than[100]');
		$duomenys['Data']="";
		$duomenys['Laikas_nuo']="";
		$duomenys['Laikas_iki']="";
		$duomenys['Isvykimo_miestas']="";
		$duomenys['Atvykimo_miestas']="";
		$duomenys['Galimi_keleiviai']="";
		$duomenys['Kaina']="";
		$Klientas_ID = $this->session->userdata['Klientas_ID'];
		$auto['auto']=$this->automobilis->gautiDuomenis($Klientas_ID);

                if ($this->form_validation->run() == FALSE){
                	$duomenys['Data']=$this->input->post('Data');
					$duomenys['Laikas_nuo']=$this->input->post('Laikas_nuo');
					$duomenys['Laikas_iki']=$this->input->post('Laikas_iki');
					$duomenys['Isvykimo_miestas']=$this->input->post('Isvykimo_miestas');
					$duomenys['Atvykimo_miestas']=$this->input->post('Atvykimo_miestas');
					$duomenys['Galimi_keleiviai']=$this->input->post('Galimi_keleiviai');
					$duomenys['Kaina']=$this->input->post('Kaina');
					$this->load->view('header');
					$this->load->view('meniu_prisijungus');
                    $this->load->view('marsrutoforma', array_merge($duomenys,$auto));
					$this->load->view('footer');}
                else{
					$this->load->database();
					$this->load->model('marsrutas');
					$this->marsrutas->Data = $this->input->post('Data');
					$this->marsrutas->Laikas_nuo = $this->input->post('Laikas_nuo');
					if (trim($this->input->post('Laikas_iki'))==''){$this->marsrutas->Laikas_iki = null;}
					else{

						$this->marsrutas->Laikas_iki = $this->input->post('Laikas_iki');}
					$this->marsrutas->Isvykimo_miestas = $this->input->post('Isvykimo_miestas');
					$this->marsrutas->Atvykimo_miestas = $this->input->post('Atvykimo_miestas');
					$this->marsrutas->Galimi_keleiviai = $this->input->post('Galimi_keleiviai');
					$this->marsrutas->Kaina = $this->input->post('Kaina');
					$this->marsrutas->Klientas_ID = $this->session->userdata['Klientas_ID'];
					$this->marsrutas->Auto_ID = $this->input->post('Auto_ID');
					$this->marsrutas->Marsruto_busena = "1";
					$this->marsrutas->iterptiNaujaMarsruta();
					$Klientas_ID = $this->session->userdata['Klientas_ID'];
					$this->klientas->pridetiBonus($Klientas_ID);

					$M_ID=$this->marsrutas->gautiMarsruta($Klientas_ID);
					$this->session->set_userdata('Marsrutai', $M_ID[0]);

					echo '<script>alert("Sveikinu sėkmingai pridėjus naują maršrutą!");</script>';
                    redirect('carshare/manomarsrutai', 'refresh');}
		}
		else redirect('prisijungimas', 'refresh');}

		public function formauzklausa(){
			if (isset($this->session->userdata['Klientas_ID'])){
			$this->load->helper(array('form', 'url'));
        	$this->load->library('form_validation');				
			$this->form_validation->set_rules('Laikas_nuo', 'Laikas_nuo', 'required');
			$this->form_validation->set_rules('Laikas_iki', 'Laikas_iki', 'callback_tikrinimasLaikas['.$this->input->post('Laikas_nuo').']');
			$this->form_validation->set_rules('Isvykimo_miestas', 'Isvykimo_miestas', 'required');
			$this->form_validation->set_rules('Data', 'Data', 'required|callback_tikrinimasDataMarsrutui');
			$this->form_validation->set_rules('Atvykimo_miestas', 'Atvykimo_miestas', 'required|callback_tikrinimasMiestas['.$this->input->post('Isvykimo_miestas').']');
		
		$duomenys['Data']="";
		$duomenys['Laikas_nuo']="";
		$duomenys['Laikas_iki']="";
		$duomenys['Isvykimo_miestas']="";
		$duomenys['Atvykimo_miestas']="";


                if ($this->form_validation->run() == FALSE){
                	$duomenys['Data']=$this->input->post('Data');
					$duomenys['Laikas_nuo']=$this->input->post('Laikas_nuo');
					$duomenys['Laikas_iki']=$this->input->post('Laikas_iki');
					$duomenys['Isvykimo_miestas']=$this->input->post('Isvykimo_miestas');
					$duomenys['Atvykimo_miestas']=$this->input->post('Atvykimo_miestas');
					$this->load->view('header');
					$this->load->view('meniu_prisijungus');
                    $this->load->view('uzklausosforma',$duomenys);
					$this->load->view('footer');}
                else{
					$this->load->database();
					$this->load->model('marsrutas');
					$this->marsrutas->Data = $this->input->post('Data');
					$this->marsrutas->Laikas_nuo = $this->input->post('Laikas_nuo');
					if (trim($this->input->post('Laikas_iki'))==''){$this->marsrutas->Laikas_iki = null;}
					else{

					$this->marsrutas->Laikas_iki = $this->input->post('Laikas_iki');}
					$this->marsrutas->Isvykimo_miestas = $this->input->post('Isvykimo_miestas');
					$this->marsrutas->Atvykimo_miestas = $this->input->post('Atvykimo_miestas');
					$this->marsrutas->Klientas_ID = $this->session->userdata['Klientas_ID'];
					$this->marsrutas->Marsruto_busena = "2";
					$this->marsrutas->iterptiNaujaMarsruta();
					$Klientas_ID = $this->session->userdata['Klientas_ID'];
					$this->klientas->pridetiBonus($Klientas_ID);

					$U_ID=$this->marsrutas->gautiUzklausa($Klientas_ID);
					$this->session->set_userdata('Uzklausos', $U_ID[0]);

					echo '<script>alert("Sveikinu sėkmingai pridėjus naują maršruto užklausą!");</script>';
                    redirect('carshare/manouzklausos', 'refresh');}
		}
		else redirect('prisijungimas', 'refresh');}


 public function atsijungti(){
                //$this->session->unset_userdata('Klientas_ID', null);
                $this->session->sess_destroy();
                redirect('', 'refresh');}

public function manomarsrutai(){
		$Klientas_ID = $this->session->userdata['Klientas_ID']; 
		$marsrutas['marsrutas']=$this->marsrutas->gautiManoMarsrutus($Klientas_ID);		
		$this->load->view('header');
		$this->load->view('meniu_prisijungus');
		$this->load->view('asmeniniaimarsrutai', $marsrutas);	
		$this->load->view('footer');}

public function manouzklausos(){
		$Klientas_ID = $this->session->userdata['Klientas_ID']; 
		$uzklausa['uzklausa']=$this->marsrutas->gautiManoUzklausas($Klientas_ID);		
		$this->load->view('header');
		$this->load->view('meniu_prisijungus');
		$this->load->view('asmeninesuzklausos', $uzklausa);	
		$this->load->view('footer');}

public function instrukcija(){	
		$this->load->view('header');
		$this->load->view('meniu_prisijungus');
		$this->load->view('instr');	
		$this->load->view('footer');}

public function pakeleiviai($M_ID){	
		$pakeleiviai['pakeleiviai'] = $this->klientas->gautiKontaktusPakeleiviu($M_ID);
		$this->load->view('header');
		$this->load->view('meniu_prisijungus');
		$this->load->view('pakeleiviai', $pakeleiviai);	
		$this->load->view('footer');}

public function vaziuojam($M_ID){

		$this->kelione->Klientas_ID = $this->session->userdata['Klientas_ID'];
		$this->kelione->M_ID = $M_ID;

		$vairuotojas_ID=$this->marsrutas->gautiVairuotoja($M_ID);
		$Klientas_ID = $this->session->userdata['Klientas_ID'];
		if($vairuotojas_ID[0]->Klientas_ID==$Klientas_ID)
		{
			echo '<script>alert("Jūs esate šio maršruto vairuotojas!");</script>';
			redirect('', 'refresh');
		}
		else{
		$tikrintiKlienta['tikrintiKlienta']=$this->kelione->gautiKlienta($M_ID);
		$results = $this->searcharray($Klientas_ID, $tikrintiKlienta['tikrintiKlienta']);
		if($results==1)
		{
			echo '<script>alert("Jūsų kontaktai jau perduoti vairuotojui ir Jūs keliaujate šiame ekipaže!");</script>';
			redirect('', 'refresh');
		}

		else{

		$this->kelione->sukurtiNauja();
		$this->marsrutas->nuimtiKeleivi($M_ID);
		$Klientas_ID = $this->session->userdata['Klientas_ID'];
		$this->klientas->pridetiBonus($Klientas_ID);

		$Klientas['Klientas']=$this->marsrutas->gautiVairuotoja($M_ID)[0];
		$Klientas_ID=$Klientas['Klientas']->Klientas_ID;

		$this->klientas->pridetiBonus($Klientas_ID);
		echo '<script>alert("Jūsų kontaktai perduoti vairuotojui!");</script>';
		redirect('', 'refresh');
	}
}
}

public function imam($M_ID){

		$this->kelione->Klientas_ID = $this->session->userdata['Klientas_ID'];
		$this->kelione->M_ID = $M_ID;

		$pakeleivio_ID=$this->marsrutas->gautiPakeleivi($M_ID);
		$Klientas_ID = $this->session->userdata['Klientas_ID'];
		if($pakeleivio_ID[0]->Klientas_ID==$Klientas_ID)
		{
			echo '<script>alert("Jūs esate šios užklausos savininkas!");</script>';
			redirect('', 'refresh');
		}
		else{

		$tikrintiKlienta['tikrintiKlienta']=$this->kelione->gautiKlienta($M_ID);
		$Klientas_ID = $this->session->userdata['Klientas_ID'];
		$results = $this->searcharray($Klientas_ID, $tikrintiKlienta['tikrintiKlienta']);
		if($results==1)
		{
			echo '<script>alert("Jūsų kontaktai jau perduoti vairuotojui ir Jūs keliaujate šiame ekipaže!");</script>';
			redirect('', 'refresh');
		}

		else{
		$this->parinktiAuto($M_ID);
	}
	}
}


	public function parinktiAuto($M_ID){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('Auto_ID', 'Auto_ID', 'required'); 
		$Klientas_ID = $this->session->userdata['Klientas_ID'];
		$auto['auto']=$this->automobilis->gautiDuomenis($Klientas_ID);
		if ($this->form_validation->run() == FALSE){
		$this->load->view('header');
		$this->load->view('meniu_prisijungus');
		$this->load->view('automobilioParinkimas', $auto);	
		$this->load->view('footer');}
		else{
		$this->kelione->M_ID = $M_ID;
		$this->kelione->Klientas_ID=$Klientas_ID;
		$this->kelione->Auto_ID=$this->input->post('Auto_ID');
		$this->kelione->sukurtiNauja();
		$Klientas_ID = $this->session->userdata['Klientas_ID'];
		$this->klientas->pridetiBonus($Klientas_ID);

		$Klientas['Klientas']=$this->marsrutas->gautiVairuotoja($M_ID)[0];
		$Klientas_ID=$Klientas['Klientas']->Klientas_ID;

		$this->klientas->pridetiBonus($Klientas_ID);
		echo '<script>alert("Jūsų kontaktai perduoti keleiviui!");</script>';
		redirect('', 'refresh');}
	}


public function vairuotojai($M_ID){
		$Auto_ID=$this->kelione->gautiAutomobili($M_ID);
		if ($Auto_ID==NULL){echo '<script>alert("Vairuotojų kolkas nėra!");</script>'; redirect('carshare/manouzklausos', 'refresh');
		}
		else{$this->load->view('header');
		$this->load->view('meniu_prisijungus');
		$vairuotojai['vairuotojai'] = $this->automobilis->gautiKontaktus($Auto_ID);
		$this->load->view('vairuotojai', $vairuotojai);	
		$this->load->view('footer');}
	}

public function autoredagavimas(){

	$Auto_ID = $this->session->userdata['Auto_ID']->Auto_ID;
	$this->load->library('form_validation');				
	$today = date('Y-m-d');				
	$this->form_validation->set_rules('Tech_apziuros_galiojimo_pabaigos_data', 'Tech_apziuros_galiojimo_pabaigos_data', 'required|callback_tikrinimasDataApziurai'); 
	$automobiliukas['automobiliukas'] = $this->automobilis->gautiDuomenisRedagavimui($Auto_ID)[0];
			if ($this->form_validation->run() == FALSE){
					$this->load->view('header');
					$this->load->view('meniu_prisijungus');
            		$this->load->view('autored', $automobiliukas);
					$this->load->view('footer');}
                else{
					$this->load->database();
					$this->load->model('automobilis');
					$this->automobilis->Valstybinis_registracijos_numeris = $automobiliukas['automobiliukas']->Valstybinis_registracijos_numeris;
					$this->automobilis->Spalva = $this->input->post('Spalva');
					$this->automobilis->Tech_apziuros_galiojimo_pabaigos_data = $this->input->post('Tech_apziuros_galiojimo_pabaigos_data');
					$this->automobilis->Auto_ID = $this->session->userdata['Auto_ID']->Auto_ID;
					$this->automobilis->Gamybine_marke = $automobiliukas['automobiliukas']->Gamybine_marke;
					$this->automobilis->Modelis = $automobiliukas['automobiliukas']->Modelis;
					$this->automobilis->Auto_busena = $automobiliukas['automobiliukas']->Auto_busena;
					$this->automobilis->Klientas_ID = $automobiliukas['automobiliukas']->Klientas_ID;
					$this->automobilis->atnaujintiAutomobili($Auto_ID);
					echo '<script>alert("Sveikinu sėkmingai atnaujinus automobilį!");</script>';
                    redirect('carshare/manoauto', 'refresh');}


}

public function manoauto(){
	$Klientas_ID = $this->session->userdata['Klientas_ID']; 

		$automobilis['automobilis']=$this->automobilis->gautiDuomenis($Klientas_ID);
		$this->load->view('header');
		$this->load->view('meniu_prisijungus');
		$this->load->view('asmeninisauto', $automobilis);	
		$this->load->view('footer');
}

public function autotrynimas($Auto_ID){
	$this->load->view('header');
	$this->load->view('meniu_prisijungus');
	$this->load->view('footer');
	$this->automobilis->istrintiAuto($Auto_ID);
	$MarsrutaiAuto['MarsrutaiAuto']=$this->marsrutas->gautiAutoMarsrutus($Auto_ID);
	foreach ($MarsrutaiAuto['MarsrutaiAuto'] as $kintamasis) {
	$this->marsrutas->pakeistiBusena($kintamasis->M_ID);
		}
	$Klientas_ID=$this->session->userdata['Klientas_ID'];
	redirect('', 'refresh');
}

public function profilioredagavimas(){

	$Klientas_ID = $this->session->userdata['Klientas_ID'];
	$this->load->library('form_validation');							
	$this->form_validation->set_rules('Vardas', 'Vardas', 'required');
	$this->form_validation->set_rules('Pavarde', 'Pavarde', 'required');
	$this->form_validation->set_rules('Telefono_numeris', 'Telefono_numeris', 'required|integer|exact_length[9]');
	$this->form_validation->set_rules('Elektroninis_pastas', 'Elektroninis_pastas', 'required|valid_email');
	$this->form_validation->set_rules('Slaptazodis', 'Slaptazodis', 'required');

	$profiliukas['profiliukas'] = $this->klientas->gautiDuomenis($Klientas_ID)[0];
			if ($this->form_validation->run() == FALSE){
					$this->load->view('header');
					$this->load->view('meniu_prisijungus');
            		$this->load->view('profiliored', $profiliukas);
					$this->load->view('footer');}
                else{
					$this->load->database();
					$this->load->model('klientas');
					$this->klientas->Vardas = $this->input->post('Vardas');
					$this->klientas->Pavarde = $this->input->post('Pavarde');
					$this->klientas->Telefono_numeris = $this->input->post('Telefono_numeris');
					$this->klientas->Elektroninis_pastas = $this->input->post('Elektroninis_pastas');
					$this->klientas->Slaptazodis = $this->input->post('Slaptazodis');
					$this->klientas->Klientas_ID = $Klientas_ID;
					$this->klientas->Bonus_taskai = $profiliukas['profiliukas']->Bonus_taskai;
					$this->klientas->atnaujintiKlienta($Klientas_ID);
					echo '<script>alert("Profilis buvo sėkmingai atnaujintas!");</script>';
                    redirect('', 'refresh');}


}

public function manoprofilis(){
	$Klientas_ID = $this->session->userdata['Klientas_ID']; 
		$klientas['klientas']=$this->klientas->gautiDuomenis($Klientas_ID);
		$kelioneMaktyvi['kelioneMaktyvi']=$this->kelione->gautiKelioneMaktyvi($Klientas_ID);
		$kelioneMistrinta['kelioneMistrinta']=$this->kelione->gautiKelioneMistrinta($Klientas_ID);
		$kelioneUaktyvi['kelioneUaktyvi']=$this->kelione->gautiKelioneUaktyvi($Klientas_ID);
		$kelioneUistrinta['kelioneUistrinta']=$this->kelione->gautiKelioneUistrinta($Klientas_ID);
		$this->load->view('header');
		$this->load->view('meniu_prisijungus');
		$this->load->view('profilis', array_merge($kelioneMaktyvi, $kelioneUaktyvi, $kelioneMistrinta, $kelioneUistrinta, $klientas));	
		$this->load->view('footer');
}


public function modelis(){

  

  $marke = $this->input->post();
  $marke = $marke['markesid'];
  $modeliai['modeliai']=$this->modelis->gautiInfo($marke);


  
  

  echo json_encode($modeliai);
 }

    public function GetCountryName(){
        $keyword=$this->input->post('keyword');
        $data=$this->miestai->GetRow($keyword);        
        echo json_encode($data);
    }

    public function GetCountryName2(){
        $keyword2=$this->input->post('keyword');
        $data2=$this->miestai->GetRow2($keyword2);        
        echo json_encode($data2);
    }

   public function searcharray($value, $array) {
   foreach ($array as $val){
       if ($val->Klientas_ID == $value) {
           return 1;
       }
   }
   return 0;
}


public function tikrinimasDataApziurai($str){
		$today = date('Y-m-d');		
		if ($str < $today)
                {
                        $this->form_validation->set_message('tikrinimasDataApziurai', 'Data negali būti senesnė nei ši diena');
                        return FALSE;
                }
                else
                {
                        return TRUE;
                }
	}

	public function tikrinimasDataMarsrutui($str){
		$today = date('Y-m-d');		
		if ($str < $today)
                {
                        $this->form_validation->set_message('tikrinimasDataMarsrutui', 'Data negali būti ankstesnė nei ši diena');
                        return FALSE;
                }
                else
                {
                        return TRUE;
                }
	}

	public function tikrinimasLaikas($str1,$str2){
		if ($str1!=null){
		if ($str1 < $str2 )
                {

                        $this->form_validation->set_message('tikrinimasLaikas', 'Laikas iki negali būti ankstesnis nei laikas nuo');
                        return FALSE;
                }}
                else
                {
                        return TRUE;
                }
	}

	public function tikrinimasMiestas($str1,$str2){
		if ($str1 == $str2 )
                {
                        $this->form_validation->set_message('tikrinimasMiestas', 'Išvykimo ir atvykimo miestai negali sutapti');
                        return FALSE;
                }
                else
                {
                        return TRUE;
                }
	}

		
}
