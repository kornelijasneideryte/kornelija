<div id="registracijos">
       

          <div class="forma">
            <div class="box_title"><span>Profilio redagavimas</span></div>
     <?php echo validation_errors(); ?>
            <form method="post"> 
            <div class="form_row">
              <label class="left">Vardas:</label>
              <input type="text" name="Vardas" class="form_input" value="<?php echo $profiliukas->Vardas;?>"/>
            </div>
            <div class="form_row">
              <label class="left">Pavardė: </label>
              <input type="text" name="Pavarde" class="form_input" value="<?php echo $profiliukas->Pavarde;?>"/>
            </div>
            <div class="form_row">
              <label class="left">El. paštas: </label>
              <input type="text" name="Elektroninis_pastas" class="form_input" value="<?php echo $profiliukas->Elektroninis_pastas;?>"/>
            </div>
            <div class="form_row">
              <label class="left">Tel. Nr.: </label>
              <input type="text" name="Telefono_numeris" class="form_input" value="<?php echo $profiliukas->Telefono_numeris;?>"/>
            </div>
            <div class="form_row">
              <label class="left">Slaptažodis: </label>
              <input type="text" name="Slaptazodis" class="form_input" value="<?php echo $profiliukas->Slaptazodis;?>"/>
            </div>
            
           </div><center><button type="submit" class="btn" >Naujinti!</button></center></form>


  </div>

  <input type="button" class="btn" value="Atgal į profilį!" onclick="history.back(-1)" />