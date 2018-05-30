<div id="main_container">
  <div id="header">
    <div id="logo"> <?php if (isset($this->session->userdata['Klientas_ID']))?><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logo.png" width="147" height="78" alt="" border="0" /></a> </div>
    <div class="banner_adds"></div>
    <div class="menu">
      <ul>
        <li><a href="<?php echo base_url(); ?>index.php/carshare/prisijungimas">Prisijungti</a></li>
        <li><a href="<?php echo base_url(); ?>index.php/carshare/registracija">Registracija</a></li>
      </ul>
    </div>
  </div>