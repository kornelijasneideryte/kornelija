<div id="registracijos">
       
          <div class="forma">
            <div class="box_title"><span>Automobilio forma</span></div>
            <?php echo validation_errors(); ?>
            <form method="post">
            <div class="form_row">
              <label class="left">Valstybinis numeris:</label>
              <input value="<?php echo $Valstybinis_registracijos_numeris; ?>" type="text" name="Valstybinis_registracijos_numeris" class="form_input"/>
            </div>
        
            <div class="form_row">
              <label class="left">Spalva: </label>
              <input value="<?php echo $Spalva; ?>" type="text" name="Spalva" class="form_input"/>
            </div>
            <div class="form_row">
              <label class="left">Tech. apžiūros pabaiga: </label>
              <input value="<?php echo $Tech_apziuros_galiojimo_pabaigos_data; ?>" type="date" name="Tech_apziuros_galiojimo_pabaigos_data" class="form_input"/>
            </div>

            <div class="form-row">
             <label class="left">Pasirinkite markę:</label>
              <select class="form-control" name="Gamybine_marke" id="sel1" onchange="modeliai()" placeholder="--------">
                <?php
                  foreach ($visos_markes as $markes):
                ?>
              <option id="markesid" value="<?php echo $markes->id; ?>"><?php echo $markes->marke;?></option>
                <?php endforeach;?>
              </select>
            </div>
            <div class="form-row" style="padding-top:20px">
             <label class="left">Pasirinkite modelį:</label>
              <select class="form-control" name="Modelis" id="sel2">
              </select>
            </div>
            
           </div>
           <center><button type="submit" class="btn" >Priskirti!</button></center>
         </form>

  </div>

  <input type="button" class="btn" value="Atgal!" onclick="history.back(-1)" />