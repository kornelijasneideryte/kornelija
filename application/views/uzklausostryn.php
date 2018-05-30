	<div class="box_title"><span>Ar tikrai norite ištrinti?</span></div>

	<table style="clear:both; width:100%; margin-top:10px;" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <th>Data</th>
          <th>Laikas</th>
          <th>Maršrutas</th>
          <th>Keleiviai</th>
          <th>Kaina</th>
          <th></th>
        </tr>
<?php 

        echo '<tr>';
        echo '<td>', $marsruciukas->Data, '</td>';
        if ( is_null($marsruciukas->Laikas_iki)) {
          echo '<td>',$marsruciukas->Laikas_nuo, '</td>';
        }
        else 
        {
  echo '<td>',$marsruciukas->Laikas_nuo,'-', $marsruciukas->Laikas_iki, '</td>'; 

        }

        echo '<td>',$marsruciukas->Isvykimo_miestas,'-',$marsruciukas->Atvykimo_miestas, '</td>';
        echo '<td>', $marsruciukas->Galimi_keleiviai, '</td>';
        echo '<td>', $marsruciukas->Kaina, '</td>';
?>
</table>
<form><center><button type="submit" class="btn" >Taip!</button></center> </form>

