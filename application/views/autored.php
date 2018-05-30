<div id="registracijos">

       
          <div class="forma">
            <div class="box_title"><span>Automobilio forma</span></div>
            <?php echo validation_errors(); ?>
            <form method="post">
            <div class="form_row">
              <label class="left">Spalva: </label>
              <input type="text" name="Spalva" class="form_input" value="<?php echo $automobiliukas->Spalva;?>"/>
            </div>
            <div class="form_row">
              <label class="left">Tech. apziuros pabaiga: </label>
              <input type="date" name="Tech_apziuros_galiojimo_pabaigos_data" class="form_input" value="<?php echo $automobiliukas->Tech_apziuros_galiojimo_pabaigos_data;?>"/>
            </div>

            
           </div><center><button type="submit" class="btn" >Atnaujinti!</button></center></form>

           <br><div>Jeigu norite redaguoti mašinos modelį/markę - ištrinkite automobilį ir pridėkite naują</div>

           <center><button type="button" class="btn" onclick="goBack()">Grįžti atgal</button>

<script>
function goBack() {
    window.history.back();
}
</script>
</center>


  </div>

  <input type="button" class="btn" value="Atgal!" onclick="history.back(-1)" />