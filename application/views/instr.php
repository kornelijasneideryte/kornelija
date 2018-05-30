<head>
<link rel="stylesheet" href="<?php echo base_url(); ?>/userguide/css/style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/userguide/css/prettify.css">
</head>


<section>
  <div class="container">
    <ul class="docs-nav">
      <li><strong>Pradžia</strong></li>
      <li><a href="#sveiki" class="cc-active">Sveiki!</a></li>
      <li><a href="#privalumai" class="cc-active">Privalumai</a></li>
      <li class="separator"></li>
      <li><strong>Naudojimasis</strong></li>
      <li><a href="#paieska" class="cc-active">Paieška</a></li>
      <li><a href="#automobilis" class="cc-active">Automobilio įkėlimas</a></li>
      <li><a href="#marsrutas" class="cc-active">Maršruto pateikimas</a></li>
      <li><a href="#uzklausa" class="cc-active">Užklausos pateikimas</a></li>         
      <li><a href="#keliavimas" class="cc-active">Keliavimas</a></li>
      <li><a href="#informacija" class="cc-active">Informacijos redagavimas</a></li>
      <li><a href="#prizai" class="cc-active">Prizai</a></li>
    </ul>
    <div class="docs-content">
      <h2> Pradžia</h2>
      <h3 id="sveiki"> Sveiki!</h3>
     
      <p> Sveiki prisijungę prie kelionių pakeleivingais automobiliais informacinės sistemos. Čia galite pateikti savo vykdomas keliones, ieškoti sau tinkančių kelionių, kaupti taškus ir keisti juos į prizus.</p>

      <p> Čia galite sužinoti visą reikalingą informaciją apie sistemos naudojimą. </p>
      <h3 id="privalumai"> Privalumai</h3>
      <ul>
        <li><p>Patogiai ieškokite reikiamų kelionių</p></li>
        <li><p>Siūlykite savo maršrutus - taupykite ant degalų</p></li>
        <li><p>Už kiekvieną įvykdytą ir sudalyvautą kelionę - kaupiate taškus</p></li>
        <li><p>Taškai yra keičiami į vertingus remėjų prizus</p></li>
        <li><p>Ir juk smagiau keliauti ne vienam!</p></li>
      </ul>
      
      <hr>
      <h2> Naudojimasis</h2>
     
      <h3 id="paieska"> Paieška</h3>
     
      <p> <a href="http://localhost:8080/carshare/index.php/carshare/marsrutai">Čia</a> galite atlikti sau tinkamo maršruto ar keleivio paiešką. Įveskite bent vieną kriterijų ir pagal jį gausite paieškos rezultatus.</p>
      <p>Jeigu žinote tikslų laiką - įveskite jį į 'Laikas nuo' lauką. Jeigu tikslus išvykimo laikas nėra svarbus, įvesti ribas galite į abu laiko laukus.</p>

      <h3 id="automobilis"> Automobilio įkėlimas</h3>
     
      <p> <a href="http://localhost:8080/carshare/index.php/carshare/formaauto">Čia</a> galite priskirti sau vairuojamą automobilį. Be jo, negalėsite įkelti maršrutų.</p>
      <p>Visi formos laukai, išskyrus spalva, yra privalomi. Automobilis yra išsaugomas sistemoje, jeigu jo valstybiniai registracijos numeriai yra autentiški bei techninės apžiūros galiojimo pabaigos data nėra ankstesnė nei pildymo data.</p>

      <h3 id="marsrutas"> Maršruto pateikimas</h3>
     
      <p> Maršrutus pateikti gali tik tie, kurie turi įkelė vairuojamą automobilį į sistemą. Tai atlikus, meniu juostoje atsiras mygtukas "Pridėti maršrutą", kur turėsite užpildyti maršruto formą. Visi laukai yra privalomi, išskyrus dėl laikų. Laikas nuo yra privalomas. Laikas iki nėra privalomas. Jį galite pildyti, jeigu nėra tikslaus išvykimo laiko.</p>
      <p>Įkėlus bent vieną maršrutą, meniu juostoje atsiras mygtukas "Mano maršrutai", kur galėsite stebėti visus savo įkeltus maršrutus. Taip pat čia galite pamatyti ir savo pakeleivių kontaktus, paspaudus mygtuką "Pakeleiviai".</p>

      <h3 id="uzklausa"> Užklausos pateikimas</h3>
     
      <p> Norint pridėti savo užklausą, ieškant vairuotojo, meniu juostoje paspauskite mygtuką "Pridėti užklausą". Ten turėsite užpildyti užklausos formą. Visi laukai yra privalomi, išskyrus dėl laikų. Laikas nuo yra privalomas. Laikas iki nėra privalomas. Jį galite pildyti, jeigu nėra tikslaus išvykimo laiko.</p>
      <p>Įkėlus bent vieną užklausą, meniu juostoje atsiras mygtukas "Mano užklausos", kur galėsite stebėti visas savo įkeltas užklausas. Taip pat čia galite pamatyti ir savo vairuotojų kontaktus, paspaudus mygtuką "Vairuotojai".</p>

      <h3 id="keliavimas"> Keliavimas</h3>
     
      <p> Radus tinkamą maršrutą, klientui tereikia paspausti mygtuką "Važiuojam kartu". Vairuotojui yra nusiunčiami kontaktiniai duomenys ir jis gali su Jumis susisiekti.</p>
      <p> Radus tinkamą užklausą, klientui tereikia paspausti mygtuką "Imam". Keleiviui yra nusiunčiami kontaktiniai duomenys ir jis gali su Jumis susisiekti.</p>

      <h3 id="informacija"> Informacijos redagavimas</h3>
     
      <p> Visi gali redaguoti savo kontaktinius duomenis. Tai galite padaryti apsilankę <a href="http://localhost:8080/carshare/index.php/carshare/manoprofilis">"mano profilis"</a> lange ir paspaudę mygtuką "Redaguoti".</p>

      <p> Turintys automobilį klientai, gali redaguoti jo informaciją apsilankę "Mano automobilis" lange bei pasirinkę mygtuką "redaguoti". Ten pat taip pat galima automobilį ir ištrinti. Tuomet sistema leis prideti naują automobilį. </p>

      <p> Turintys maršrutą klientai, gali redaguoti jų informaciją apsilankę "Mano maršrutai" lange bei pasirinkę mygtuką "redaguoti". Ten pat taip pat galima maršrutą ir ištrinti. </p>      

      <h3 id="prizai"> Prizai!</h3>
     
      <p> Už ką gaunami taškai?</p>

      <p> +1 tašką gauni jeigu: įkeli maršrutą, prie jo prisijungia pakeleivis (1 pakeleivis=1 taškas), važiuoji kartu maršrute, įkeli užklausą, prie savo kelionęs priimi pakeleivį. </p>
      <p> -1 tašką nuskaičiuojame tuomet, jeigu yra ištrinamas maršrutas. </p>
      <p> Prizą (šiuo metu neskelbiamas) gaus po du žmones metų pabaigoje: 1 vairuotojas ir 1 keleivis, tais metais turintys daugiausiai taškų. </p>
      <p> Ateityje bus galima papildomai įsigyti papildomų prizų už tam tikrą taškų skaičių.</p>




      </div>
  </div>
</section>

<input type="button" class="btn" value="Atgal!" onclick="history.back(-1)" />


<script src="<?php echo base_url(); ?>/userguide/js/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>/userguide/js/prettify/prettify.js"></script> 
<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?lang=css&skin=sunburst"></script>
<script src="<?php echo base_url(); ?>/userguide/js/layout.js"></script>