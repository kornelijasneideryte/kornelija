<script>
function deletechecked()
    {
        if(confirm("Ar tikrai ištrinti automobilį?"))
        {
            return true;
        }
        else
        {
            return false;  
        } 
   }
</script>

<div id="main_content">
      
      <table style="clear:both; width:100%; margin-top:10px;" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <th>Valstybiniai numeriai</th>
          <th>Markė</th>
          <th>Modelis</th>
          <th>Spalva</th>
          <th>Tech. apžiūra</th>
          <th></th>
          <th></th>
        </tr>
        <tr class="color1" onmouseout="style.backgroundColor='#F3F5F6'" onclick="document.location.href='#'" onmouseover="this.style.cursor='pointer'; style.backgroundColor='#ffffff'" title="Vezi detaliile anuntului" ></tr>
<?php 



foreach ($automobilis as $row)
       
{ echo '<tr>';
        echo '<td>', $row->Valstybinis_registracijos_numeris, '</td>';
        

        echo '<td>', $row->marke, '</td>';
        echo '<td>', $row->Modelis, '</td>';
        if ( is_null($row->Spalva)) {
          echo '<td>-</td>';
        }
        else 
        {
  echo '<td>',$row->Spalva, '</td>'; 

        }
        echo '<td>', $row->Tech_apziuros_galiojimo_pabaigos_data, '</td>';
        echo '<td>', '<a href="',base_url(),'index.php/carshare/autoredagavimas/',$row->Auto_ID,'">Redaguoti</a>', '</td>';
        echo '<td>', '<a href="',base_url(),'index.php/carshare/autotrynimas/',$row->Auto_ID,' "onClick="return deletechecked()";>Ištrinti</a>', '</td>';

        
        
        
}

echo '</tr>';
?>
      </table>
      
   

</div>
  <button type="button" class="btn " onclick="window.location.replace('http://rude.su.lt/~ramanauskaite/kornelija/index.php/carshare/formaauto');">Naujas automobilis</button>

  <input type="button" class="btn" value="Atgal!" onclick="history.back(-1)" />