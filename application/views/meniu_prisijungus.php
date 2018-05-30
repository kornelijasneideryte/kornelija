<div id="main_container">
  <div id="header">
     <div id="logo"> <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logo.png" width="147" height="78" alt="" border="0" /></a> </div>
    <div class="banner_adds"></div> 
    <div class="menu">

      <ul>
        
        <?php 
        //$Auto_ID=$this->session->userdata['Auto_ID']; 
        if (isset($this->session->userdata['Auto_ID'])){
          ?>
        <li><a href="<?php echo base_url(); ?>index.php/carshare/manoauto">Mano automobilis</a></li>
        <li><a href="<?php echo base_url(); ?>index.php/carshare/formamarsruto">Pridėti maršrutą</a></li>
        <?php } else {?>
         <li><a href="<?php echo base_url(); ?>index.php/carshare/formaauto">Pridėti automobilį</a></li>
        <?php }
        //$Marsrutai=$this->session->userdata['Marsrutai'];
        //echo $Marsrutai;
        //var_dump($Marsrutai);
        //exit();
        if (isset($this->session->userdata['Marsrutai'])){
         // if(isset($this->session->flashdata(['Marsrutai']))){ 
            ?>
        <li><a href="<?php echo base_url(); ?>index.php/carshare/manomarsrutai">Mano maršrutai</a></li><?php } ?>  
        <li><a href="<?php echo base_url(); ?>index.php/carshare/formauzklausa">Pridėti užklausą</a></li>
        <?php 
        //$Uzklausos=$this->session->userdata['Uzklausos']; 
        //if (isset($Uzklausos) && $Uzklausos->U_ID>'0'){
        if(isset($this->session->userdata['Uzklausos'])){
        ?>
        <li><a href="<?php echo base_url(); ?>index.php/carshare/manouzklausos">Mano užklausos</a></li>
        <?php } ?>  
        <li><a href="<?php echo base_url(); ?>index.php/carshare/manoprofilis">Mano profilis</a></li>
        <li><a href="<?php echo base_url(); ?>index.php/carshare/instrukcija">Instrukcija</a></li>
        <li><a href="<?php echo base_url(); ?>index.php/carshare/atsijungti">Atsijungti</a></li>
      </ul>
    </div>
  </div>