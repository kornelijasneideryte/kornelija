<div id="registracijos">
       
          <div class="forma">

            <div class="box_title"><span>Maršruto forma</span></div>
            <?php echo validation_errors(); ?>
            <form method="post">
            <div class="form_row">
              <label class="left">Data:</label>
              <input value="<?php echo $Data; ?>" type="date" name="Data" class="form_input"/>
            </div>
            <div class="form_row">
              <label class="left">Laikas nuo: </label>
              <input value="<?php echo $Laikas_nuo; ?>" type="time" name="Laikas_nuo" class="form_input"/>
            </div>
            <div class="form_row">
              <label class="left">Laikas iki: </label>
              <input value="<?php echo $Laikas_iki; ?>" type="time" name="Laikas_iki" class="form_input"/>
            </div>

            <div class="form_row">
                <label class="left">Išvykimo miestas: </label>
                <input style="height:15px width:140px" type="text" id="country" autocomplete="off" name="Isvykimo_miestas" class="form-control" placeholder="..." value="<?php echo $Isvykimo_miestas; ?>">        
                <ul style="padding-top:20px" class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry"></ul></div>

              <div class="form_row">
                <label class="left">Atvykimo miestas: </label>
                     <input style="height:15px width:140px" type="text" id="country2" autocomplete="off" name="Atvykimo_miestas" class="form_input" placeholder="..." value="<?php echo $Atvykimo_miestas; ?>">        
                    <ul style="padding-top:20px" class="dropdown-menu txtcountry2" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu2"  id="DropdownCountry2"></ul>
              </div>

            
            <div class="form_row">
              <label class="left">Galimi keleiviai: </label>
              <input value="<?php echo $Galimi_keleiviai; ?>" type="text" name="Galimi_keleiviai" class="form_input"/>
            </div>
            <div class="form_row">
              <label class="left">Kaina: </label>
              <input value="<?php echo $Kaina; ?>" type="text" name="Kaina" class="form_input"/>
            </div>
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
