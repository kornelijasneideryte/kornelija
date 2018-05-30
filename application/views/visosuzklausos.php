<div id="main_content">
      
      <table style="clear:both; width:100%; margin-top:10px;" cellpadding="0" cellspacing="0" border="0">
        <tr><center><h2>Pakeleivių užklausos</h2></center>
          <th>Data</th>
          <th>Laikas</th>
          <th>Maršrutas</th>
          <th>Keleivio informacija</th>
          <th>Imam?</th>
        </tr>
        <tr class="color1" onmouseout="style.backgroundColor='#F3F5F6'" onclick="document.location.href='#'" onmouseover="this.style.cursor='pointer'; style.backgroundColor='#ffffff'" title="Vezi detaliile anuntului" ></tr>
<?php 
//$Auto_ID=$this->session->userdata['Auto_ID'];
if (empty($uzklausa)){echo '<div class="paieskos_error"><span>Keleivių nėra.</span> Įveskite naujus kriterijus arba paspauskite "Važiuojam!" norint pamatyti visus keleivius.</div>';}
else{
	foreach ($uzklausa as $row)
	
       
		{ echo '<tr>';
        	echo '<td>', $row->Data, '</td>';

        if ( is_null($row->Laikas_iki)) {
          echo '<td>',$row->Laikas_nuo, '</td>';
        }
        else 
        {
  echo '<td>',$row->Laikas_nuo,'-', $row->Laikas_iki, '</td>'; 

        }

        echo '<td>',$row->Isvykimo_miestas,'-',$row->Atvykimo_miestas, '</td>';
        echo '<td>', $row->Vardas,' ',$row->Pavarde, '</td>';
      if (isset($this->session->userdata['Auto_ID']))
          {echo '<td>', '<a href="',base_url(),'index.php/carshare/imam/',$row->M_ID,'">Važiuojam kartu!</a>', '</td>';}
        else  {echo '<td>Jūs nesate vairuotojas</td>';}
        
        
        
}

echo '</tr>';}
?>
      </table>
      
   

</div>