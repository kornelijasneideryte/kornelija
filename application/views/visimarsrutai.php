<div id="main_content">
      
      <table style="clear:both; width:100%; margin-top:10px;" cellpadding="0" cellspacing="0" border="0">
        <tr><center><h2>Vairuotojų maršrutai</h2></center>
          <th>Data</th>
          <th>Laikas</th>
          <th>Maršrutas</th>
          <th>Keleiviai</th>
          <th>Kaina</th>
          <th>Vairuotojo informacija</th>
          <th>Automobilio informacija</th>
          <th>Tinka?</th>
        </tr>
        <tr class="color1" onmouseout="style.backgroundColor='#F3F5F6'" onclick="document.location.href='#'" onmouseover="this.style.cursor='pointer'; style.backgroundColor='#ffffff'" title="Vezi detaliile anuntului" ></tr>
<?php 
if (empty($marsrutas)){echo '<div class="paieskos_error"><span>Maršrutų nėra.</span> Įveskite naujus kriterijus arba paspauskite "Važiuojam!" norint pamatyti visus maršrutus.</div>';}
else{
foreach ($marsrutas as $row)
       
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
        echo '<td>', $row->Galimi_keleiviai, '</td>';
        echo '<td>', $row->Kaina, '</td>';
        echo '<td>', $row->Vardas,' ',$row->Pavarde, '</td>';
        echo '<td>', $row->Valstybinis_registracijos_numeris, ' ',$row->marke,' ',$row->Modelis,'</td>';
        echo '<td>', '<a href="',base_url(),'index.php/carshare/vaziuojam/',$row->M_ID,'">Važiuojam kartu!</a>', '</td>';
        
}

echo '</tr>';}
?>
      </table>
      
   

</div>