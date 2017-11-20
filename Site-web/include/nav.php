<!-- Barre de naviguation du site -->
<nav>
	<img src="img/logo.png" alt="Logo"/>
	<ul>
	    <a href="#"><li>Accueil</li></a>
	    <a href="#"><li>Types de véhicules</li></a>
	    <a href="#"><li>Partenaires</li></a>
	    <a href="#"><li>Contact</li></a>
	    <li>
	    <?php 
	    	if(isset($_SESSION['login'])){
	    		print('<b><i class="fa fa-user fa-1x"></i><a href="#" id="compteform">Mon compte</a></b>');
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
			          			 print('<li>Bienvenue <b class="redText">'.ucfirst($_SESSION['login']).'</b></li><br/><br/>');
			          		}
		          		?>
		             	<li><a href="informations.php">Mes informations</a></li>
		             	<li><a href="?action=deconnexion">Déconnexion</a></li>
		           </fieldset>
		        </div>
		      </div>
		    </div>
		</li>
	</ul>
</nav>	

