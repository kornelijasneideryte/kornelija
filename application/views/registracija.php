<div id="registracijos">
       

          <div class="forma">
            <div class="box_title"><span>Registracija</span></div>
     <?php echo validation_errors(); ?>
            <form method="post"> 
            <div class="form_row">
              <label class="left">Vardas:</label>
              <input value="<?php echo $Vardas; ?>" type="text" name="Vardas" class="form_input"/>
            </div>
            <div class="form_row">
              <label class="left">Pavardė: </label>
              <input value="<?php echo $Pavarde; ?>" type="text" name="Pavarde" class="form_input"/>
            </div>
            <div class="form_row">
              <label class="left">El. paštas: </label>
              <input value="<?php echo $Elektroninis_pastas; ?>" type="text" name="Elektroninis_pastas" class="form_input"/>
            </div>
            <div class="form_row">
              <label class="left">Tel. Nr.: </label>
              <input value="<?php echo $Telefono_numeris; ?>" type="text" name="Telefono_numeris" class="form_input"/>
            </div>
            <div class="form_row">
              <label class="left">Slaptažodis: </label>
              <input type="password" name="Slaptazodis" class="form_input"/>
            </div>
            
           </div><center><button type="submit" class="btn" >Užsiregistruoti!</button></center></form>


  </div>

  <input type="button" class="btn" value="Atgal!" onclick="history.back(-1)" />