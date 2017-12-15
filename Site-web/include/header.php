<!-- Header du site -->
<header>
	<h2>Vous êtes à la bonne adresse !</h2>
	<img src="img/voiture.jpg" alt="Voiture"/>
	<h3><i>Partons à la recherche de votre véhicule..</i></h3>
	<div id="search">
		<?php print($action); ?>
		  <br/>
		  <i class="fa fa-map-marker" style="font-size: 45px;" aria-hidden="true" "></i>
			
		  <div class="select" id="choixAgence" tabindex="1">

			  <input class="selectopt" name="agence" value="1" type="radio" id="opt1">
			  <label for="opt1" class="option">Agence de Bordeaux</label>
			  <input class="selectopt" name="agence" value="2" type="radio" id="opt2">
			  <label for="opt2" class="option">Agence de Niort</label>
			  <input class="selectopt" name="agence" value="3" type="radio" id="opt3">
			  <label for="opt3" class="option">Agence de Courçon</label>
			  <input class="selectopt" name="agence" value="4" type="radio" id="opt4">
			  <label for="opt4" class="option">Agence de Châtellerault</label>
			  <input class="selectopt" name="agence" value="5" type="radio" id="opt5">
			  <label for="opt5" class="option">Agence de Poey d'Oloron</label>
			  <input class="selectopt" name="agence" type="radio" value="" id="opt6">
			  <label for="opt6" class="option">Choisissez une agence</label>
		  </div>
		  	<p id="erreurAgence"> Veuillez choisir une agence </p>
		  <div id="date">
		  <i class="fa fa-calendar fa-2x" aria-hidden="true"></i>
	      <input class="date feedback-input" id="dateDepart" name="dateDepart" type="text" placeholder="Date de départ" />
		
		  <i class="fa fa-calendar fa-2x" aria-hidden="true"></i>
	      <input class="date feedback-input" name="dateArrivee" id="dateArrivee" type="text" placeholder="Date d'arrivée" />
	      <p id="erreurDate"> Veuillez renseignez des dates correctes </p>
	  	</div>
		  <br/>
		  
	      <div class="submit">
	      	<?php print($submit) ?>
	      </div>

		</form>
	</div>
</header>