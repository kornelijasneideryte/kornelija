<div id="main_content">
      <div class="paieskos_error"><span>Maršrutai</span></div>
      <table style="clear:both; width:100%; margin-top:10px;" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <th>Data</th>
          <th>Laikas</th>
          <th>Maršrutas</th>
          <th>Keleiviai</th>
          <th>Kaina</th>
          <th>Tinka?</th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
        <tr class="color1" onmouseout="style.backgroundColor='#F3F5F6'" onclick="document.location.href='#'" onmouseover="this.style.cursor='pointer'; style.backgroundColor='#ffffff'" title="Vezi detaliile anuntului" ></tr>
<?php 
if (empty($marsrutas)){echo '<div class="paieskos_error"><span>Maršrutu nėra.</span> Įveskite naujus kriterijus arba paspauskite "Važiuojam!" norint pamatyti visus maršrutus.</div>';}
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
        echo '<td>', '<a href="',base_url(),'index.php/carshare/registracija/">Registruokis</a>', '</td>';
        echo '<td> arba </td>';
        echo '<td>', '<a href="',base_url(),'index.php/carshare/prisijungimas/">prisijunk</a>', '</td>';
        echo '<td> norint pamatyti daugiau info</td>';
}

echo '</tr>';}
?>
      </table>
      
   

</div>