<div id="registracijos">
       
          <div class="forma">

            <div class="box_title"><span>Kuriuo automobiliu pavešite?</span></div>
            <?php echo validation_errors(); ?>
             <form method="post">

            <div class="form_row">
              <label class="left">Automobilis: </label>
              <select class="form-control" name="Auto_ID" placeholder="--------">
               <?php
                  foreach ($auto as $auto):
                ?>
              <option id="Auto_ID" value="<?php echo $auto->Auto_ID; ?>"><?php echo $auto->Valstybinis_registracijos_numeris;?></option>
                <?php endforeach;?>
            </div></select></div>

           
           <center><button type="submit" class="btn" >Siūlyti!</button></center> </form></div></div>



<input type="button" class="btn" value="Atgal!" onclick="history.back(-1)" />
