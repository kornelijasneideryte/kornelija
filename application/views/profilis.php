<div id="main_content">
      
      <table style="clear:both; width:100%; margin-top:10px;" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <th>Vardas</th>
          <th>Pavardė</th>
          <th>Telefono numeris</th>
          <th>El. paštas</th>
          <th>Bonus taškai</th>
          <th></th>
        </tr>
        <tr class="color1" onmouseout="style.backgroundColor='#F3F5F6'" onclick="document.location.href='#'" onmouseover="this.style.cursor='pointer'; style.backgroundColor='#ffffff'" title="Vezi detaliile anuntului" ></tr>
<?php 

foreach ($klientas as $row)

{ echo '<tr>';
        echo '<td>', $row->Vardas , '</td>';
        echo '<td>', $row->Pavarde , '</td>';
        echo '<td>', $row->Telefono_numeris , '</td>';
        echo '<td>', $row->Elektroninis_pastas , '</td>';
        echo '<td>', $row->Bonus_taskai , '</td>';
        echo '<td>', '<a href="',base_url(),'index.php/carshare/profilioredagavimas/',$row->Klientas_ID,'">Redaguoti</a>', '</td>';         
echo '</tr>';}
?>
      </table>
  </div>


<div id="main_content">
      

      <table style="clear:both; width:100%; margin-top:10px;" cellpadding="0" cellspacing="0" border="0">
        <tr><center><h2>Kokiame maršrute aš važiuoju?</h2></center>
          <th>Data</th>
          <th>Laikas</th>
          <th>Maršrutas</th>
          <th>Kaina</th>
          <th>Vairuotojas</th>
          <th>Automobilis</th>
        </tr>
        <tr class="color1" onmouseout="style.backgroundColor='#F3F5F6'" onclick="document.location.href='#'" onmouseover="this.style.cursor='pointer'; style.backgroundColor='#ffffff'" title="Vezi detaliile anuntului" ></tr>
<?php 

if (empty($kelioneMaktyvi)){echo '<tr><td><div class="paieskos_error"><span>Kelionių nėra.</span> Prisijunkite prie kelionės ir čia matysite jas visas</div></tr></td>';}
else{

foreach ($kelioneMaktyvi as $row)

       
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
        echo '<td>', $row->Kaina, '</td>';
        echo '<td>', $row->Vardas,' ',$row->Pavarde,' ',$row->Telefono_numeris,'</td>';
        echo '<td>', $row->Valstybinis_registracijos_numeris,'</td>';       
}

echo '</tr>';
}?>
      </table>

   </div>


   <div id="main_content">
      

      <table style="clear:both; width:100%; margin-top:10px;" cellpadding="0" cellspacing="0" border="0">
        <tr><center><h2>Kokie maršrutai, kur aš prisijungiau - atšaukti?</h2></center>
          <th>Data</th>
          <th>Laikas</th>
          <th>Maršrutas</th>
          <th>Kaina</th>
          <th>Vairuotojas</th>
          <th>Automobilis</th>
        </tr>
        <tr class="color1" onmouseout="style.backgroundColor='#F3F5F6'" onclick="document.location.href='#'" onmouseover="this.style.cursor='pointer'; style.backgroundColor='#ffffff'" title="Vezi detaliile anuntului" ></tr>
<?php 

if (empty($kelioneMistrinta)){echo '<tr><td><div class="paieskos_error"><span>Ištrintų nėra.</span></div></tr></td>';}
else{

foreach ($kelioneMistrinta as $row)

       
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
        echo '<td>', $row->Kaina, '</td>';
        echo '<td>', $row->Vardas,' ',$row->Pavarde,' ',$row->Telefono_numeris,'</td>';
        echo '<td>', $row->Valstybinis_registracijos_numeris,'</td>';       
}

echo '</tr>';
}?>
      </table>

   </div>




   <div id="main_content">
      

      <table style="clear:both; width:100%; margin-top:10px;" cellpadding="0" cellspacing="0" border="0">
        <tr><center><h2>Kokius pakeleivius aš pasikviečiau?</h2></center>
          <th>Data</th>
          <th>Laikas</th>
          <th>Maršrutas</th>
          <th>Pakeleivis</th>
          <th></th>
        </tr>
        <tr class="color1" onmouseout="style.backgroundColor='#F3F5F6'" onclick="document.location.href='#'" onmouseover="this.style.cursor='pointer'; style.backgroundColor='#ffffff'" title="Vezi detaliile anuntului" ></tr>
<?php 

if (empty($kelioneUaktyvi)){echo '<tr><td><div class="paieskos_error"><span>Pakeleivių nėra.</span> Priimkite keleivį į kelionę ir jų sąrašą rasite čia!</div></tr></td>';}
else{

foreach ($kelioneUaktyvi as $row)

       
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
        echo '<td>', $row->Vardas,' ',$row->Pavarde,' ',$row->Telefono_numeris,'</td>';       
        
}

echo '</tr>';
}?>
      </table>

   </div>


   <div id="main_content">
      

      <table style="clear:both; width:100%; margin-top:10px;" cellpadding="0" cellspacing="0" border="0">
        <tr><center><h2>Kokie pakeleiviai, kuriuos priėmiau į kelionę - atšaukė važiavimą?</h2></center>
          <th>Data</th>
          <th>Laikas</th>
          <th>Maršrutas</th>
          <th>Pakeleivis</th>
          <th></th>
        </tr>
        <tr class="color1" onmouseout="style.backgroundColor='#F3F5F6'" onclick="document.location.href='#'" onmouseover="this.style.cursor='pointer'; style.backgroundColor='#ffffff'" title="Vezi detaliile anuntului" ></tr>
<?php 

if (empty($kelioneUistrinta)){echo '<tr><td><div class="paieskos_error"><span>Ištrintų nėra.</span></div></tr></td>';}
else{

foreach ($kelioneUistrinta as $row)

       
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
        echo '<td>', $row->Vardas,' ',$row->Pavarde,' ',$row->Telefono_numeris,'</td>';    
        
}

echo '</tr>';
}?>
      </table>

   </div>







  <input type="button" class="btn" value="Atgal!" onclick="history.back(-1)" />
