	<div class="box_title"><span>Ar tikrai norite ištrinti?</span></div>

	<table style="clear:both; width:100%; margin-top:10px;" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <th>Data</th>
          <th>Laikas</th>
          <th>Maršrutas</th>
          <th></th>
        </tr>
<?php 

        echo '<tr>';
        echo '<td>', $uzklausyte->Data, '</td>';
        if ( is_null($uzklausyte->Laikas_iki)) {
          echo '<td>',$uzklausyte->Laikas_nuo, '</td>';
        }
        else 
        {
  echo '<td>',$uzklausyte->Laikas_nuo,'-', $uzklausyte->Laikas_iki, '</td>'; 

        }

        echo '<td>',$uzklausyte->Isvykimo_miestas,'-',$uzklausyte->Atvykimo_miestas, '</td>';
?>
</table>
<form><center><button type="submit" class="btn" >Taip!</button></center> </form>

