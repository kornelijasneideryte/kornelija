<div id="prisijungimo">
       
          <div class="forma">
            <div class="box_title"><span>Prisijungimas</span></div>
            <?php echo validation_errors(); ?>
            <form method="post">
            <div class="form_row">
              <label class="left">El. paštas: </label>
              <input type="text" name="Elektroninis_pastas" class="form_input"/>
            </div>
            <div class="form_row">
              <label class="left">Slaptažodis: </label>
              <input type="password" name="Slaptazodis" class="form_input"/>
            </div>
          
           <center><button type="submit" class="btn">Prisijungti!</button></center></form>
  </div></div>

  <input type="button" class="btn" value="Atgal į titulinį!" onclick="history.back(-1)" />