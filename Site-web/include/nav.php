<!-- Barre de naviguation du site -->
<nav>
	<a href = "index.php"><img src="img/logo.png" alt="Logo"/></a>
	<ul>
	    <a href="index.php"><li>Accueil</li></a>
	    <a href="search.php"><li>Recherche</li></a>
	    <a href="fiche.php"><li>Fiche</li></a>
	    <a href="contact.php"><li>Contact</li></a>
	    <li>
	    <?php 
	    	if(isset($_SESSION['login'])){
	    		print('<b><a href="#" id="compteform"><i class="fa fa-user fa-1x"></i>Mon compte</a></b>');
	    	} else {
	    		print('<b><a href="#" id="loginform">Connexion</a> | <a href="inscription.php">Inscription</a></b>');
	    	} 

	    	// var_dump($_SESSION);
	    ?>
		    <div class="login">
		      <div class="formholder">
		        <div class="randompad">
		           <fieldset>
		           <?php 
		           		if(!isset($_SESSION['login'])){
		          			 print('<b>'.$message.'</b>');
		          		}
		           ?>
		             <form method="POST" action="index.php">
			             <label name="login">Login</label>
			             <input type="text" name="login" placeholder="Mickael" />
			             <label name="password" >Password</label>
			             <input type="password" name="password" placeholder="••••••••••" />
			             <input type="submit" value="Connexion" name="connexion"/>
		             </form> 
		           </fieldset>
		        </div>
		      </div>
		    </div>

		    <div class="compte">
		      <div class="formholder">
		        <div class="randompad">
		           <fieldset>
		          		<?php 
			           		if(isset($_SESSION['login'])){
			          			print('<p>Bienvenue<br/><b class="redText">'.ucfirst($_SESSION['login']).'</b></p>');	 
				          		if (isset($_SESSION['statut']) && $_SESSION['statut'] == 1) {
				          			 print('<li><a href="equipe.php">Mon équipe</a></li><br/>');
				          			 print('<li><a href="lesagences.php">Les agences</a></li><br/>');
				          		}
			          		}
		          		?>
		             	<li><a href="coordonnee.php">Mes informations</a></li>
		             	<li><a href="mesreservations.php">Mes réservations</a></li>
		             	<li><a href="?action=deconnexion">Déconnexion</a></li>
		           </fieldset>
		        </div>
		      </div>
		    </div>
		</li>
	</ul>
</nav>	

