<!-- Header du site -->
<header>
	<h2>Vous êtes à la bonne adresse !</h2>
	<img src="img/voiture.jpg" alt="Voiture"/>
	<h3><i>Partons à la recherche de votre véhicule..</i></h3>
	<div id="search">
		<form method="POST" action="search.php" class="form" id="form1">
		  <br/>
		  <i class="fa fa-map-marker" style="font-size: 45px;" aria-hidden="true" "></i>
			
		  <div class="select" tabindex="1">
			  <input class="choixAgence" name="bordeaux" value="1" type="radio" id="opt1">
			  <label for="opt1" class="option">Agence de Bordeaux</label>
			  <input class="choixAgence" name="niort" value="2" type="radio" id="opt2">
			  <label for="opt2" class="option">Agence de Niort</label>
			  <input class="choixAgence" name="courcon" value="3" type="radio" id="opt3">
			  <label for="opt3" class="option">Agence de Courçon</label>
			  <input class="choixAgence" name="chatellerault" value="4" type="radio" id="opt4">
			  <label for="opt4" class="option">Agence de Châtellerault</label>
			  <input class="choixAgence" name="poey" value="5" type="radio" id="opt5">
			  <label for="opt5" class="option">Agence de Poey d'Oloron</label>
			  <input class="choixAgence" name="default" type="radio" value="" id="opt6">
			  <label for="opt6" class="option">Choisissez une agence</label>
		  </div>

	      <i class="fa fa-calendar fa-2x" aria-hidden="true" "></i><input class="date feedback-input" type="text" placeholder="Date de départ" />

	      <i class="fa fa-calendar fa-2x" aria-hidden="true"></i><input class="date feedback-input" type="text" placeholder="Date d'arrivée" />

		  <br/>
		  
	      <div class="submit">
	        <input type="submit" value="Lancer la recherche" id="button-blue"/>
	      </div>

		</form>
	</div>
</header>