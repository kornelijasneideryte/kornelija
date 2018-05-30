
<div id="registracijos">
       
          <div class="forma">
            <div class="box_title"><span>Maršruto užklausos forma</span></div>
            <?php echo validation_errors(); ?>
            <form method="post">
            <div class="form_row">
              <label class="left">Data:</label>
              <input type="date" name="Data" class="form_input" value="<?php echo $uzklausyte->Data;?>"/>
            </div>
            <div class="form_row">
              <label class="left">Laikas nuo: </label>
              <input type="time" name="Laikas_nuo" class="form_input" value="<?php echo $uzklausyte->Laikas_nuo;?>"/>
            </div>
            <div class="form_row">
              <label class="left">Laikas iki: </label>
              <input type="time" name="Laikas_iki" class="form_input" value="<?php echo $uzklausyte->Laikas_iki;?>"/>
            </div>
            </div><center><button type="submit" class="btn" >Atnaujinti!</button></center> </form>


  </div>

    <input type="button" class="btn" value="Atgal į visas užklausas!" onclick="history.back(-1)" />