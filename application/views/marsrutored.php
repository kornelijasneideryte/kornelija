
<div id="registracijos">
       
          <div class="forma">
            <div class="box_title"><span>Maršruto forma</span></div>
            <?php echo validation_errors(); ?>
            <form method="post">
            <div class="form_row">
              <label class="left">Data:</label>
              <input type="date" name="Data" class="form_input" value="<?php echo $marsruciukas->Data;?>"/>
            </div>
            <div class="form_row">
              <label class="left">Laikas nuo: </label>
              <input type="time" name="Laikas_nuo" class="form_input" value="<?php echo $marsruciukas->Laikas_nuo;?>"/>
            </div>
            <div class="form_row">
              <label class="left">Laikas iki: </label>
              <input type="time" name="Laikas_iki" class="form_input" value="<?php echo $marsruciukas->Laikas_iki;?>"/>
            </div>
            <div class="form_row">
              <label class="left">Galimi keleiviai: </label>
              <input type="text" name="Galimi_keleiviai" class="form_input" value="<?php echo $marsruciukas->Galimi_keleiviai;?>"/>
            </div>
            <div class="form_row">
              <label class="left">Kaina: </label>
              <input type="text" name="Kaina" class="form_input" value="<?php echo $marsruciukas->Kaina;?>"/>
            </div>

           
           </div><center><button type="submit" class="btn" >Atnaujinti!</button></center> </form>


  </div>

<input type="button" class="btn" value="Atgal į visus maršrutus!" onclick="history.back(-1)" />