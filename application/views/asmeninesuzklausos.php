<script>
function deletechecked(){
  if(confirm("Ar tikrai ištrinti pasirinktą užklausą?")){return true;}
  else{return false;}}
</script>

<div id="main_content">      

      <table style="clear:both; width:100%; margin-top:10px;" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <th>Data</th>
          <th>Laikas</th>
          <th>Maršrutas</th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
        <tr class="color1" onmouseout="style.backgroundColor='#F3F5F6'" onclick="document.location.href='#'" onmouseover="this.style.cursor='pointer'; style.backgroundColor='#ffffff'" title="Vezi detaliile anuntului" ></tr>
<?php 
foreach ($uzklausa as $row)
       
{ echo '<tr>';
        echo '<td>', $row->Data, '</td>';
        if ( is_null($row->Laikas_iki)) {echo '<td>',$row->Laikas_nuo, '</td>';}
        else {echo '<td>',$row->Laikas_nuo,'-', $row->Laikas_iki, '</td>';}

        echo '<td>',$row->Isvykimo_miestas,'-',$row->Atvykimo_miestas, '</td>';
        echo '<td>', '<a href="',base_url(),'index.php/carshare/uzklausosredagavimas/',$row->M_ID,'">Redaguoti</a>', '</td>';
        echo '<td>', '<a href="',base_url(),'index.php/carshare/uzklausostrynimas/',$row->M_ID,' "onClick="return deletechecked()";>Ištrinti</a>', '</td>';
         echo '<td>', '<a href="',base_url(),'index.php/carshare/vairuotojai/',$row->M_ID,'">Vairuotojai</a>', '</td>';
      } echo '</tr>';?>
  </table>
</div>
  <input type="button" class="btn" value="Atgal!" onclick="history.back(-1)" />
