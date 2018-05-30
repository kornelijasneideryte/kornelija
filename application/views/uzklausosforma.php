<div id="registracijos">
       
          <div class="forma">
            <div class="box_title"><span>Maršruto užklausos forma</span>
            </div>
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
                <ul style="padding-top:20px" class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry"></ul>
          </div>
              <div class="form_row">
                <label class="left">Atvykimo miestas: </label>
                     <input style="height:15px width:140px" type="text" id="country2" autocomplete="off" name="Atvykimo_miestas" class="form_input" placeholder="..." value="<?php echo $Atvykimo_miestas; ?>">        
                    <ul style="padding-top:20px" class="dropdown-menu txtcountry2" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu2"  id="DropdownCountry2"></ul>
              </div>
           
           <center><button type="submit" class="btn" >Ieškoti!</button></center> </form>

</div></div>

    <input type="button" class="btn" value="Atgal!" onclick="history.back(-1)" />

