<div id="main_content">
      
      <table style="clear:both; width:100%; margin-top:10px;" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <th>Vardas</th>
          <th>Pavardė</th>
          <th>Telefono numeris</th>
          <th>El. paštas</th>
        </tr>
        <tr class="color1" onmouseout="style.backgroundColor='#F3F5F6'" onclick="document.location.href='#'" onmouseover="this.style.cursor='pointer'; style.backgroundColor='#ffffff'" title="Vezi detaliile anuntului" ></tr>
<?php 

if (empty($pakeleiviai)){echo '<tr><div class="paieskos_error"><span>Pakeleivių nėra.</span></div></tr>';}
else{
foreach ($pakeleiviai as $row)

{ echo '<tr>';
        echo '<td>', $row->Vardas , '</td>';
        echo '<td>', $row->Pavarde , '</td>';
        echo '<td>', $row->Telefono_numeris , '</td>';
        echo '<td>', $row->Elektroninis_pastas , '</td>';        
echo '</tr>';}}
?>
      </table>
  </div>

  <input type="button" class="btn" value="Atgal į visus maršrutus!" onclick="history.back(-1)" />
