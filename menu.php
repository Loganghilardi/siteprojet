<div class="navbar navbar-inverse">
			  <a class="navbar-brand" href="index.php">ALLTECH</a>
				<?php 
				/* si connecter afficher le menu complet et le bouton deconnecter */
					if ( isset( $_SESSION['pseudo'] ) ) { ?> 
						  <a class="btn btn-primary" href="deconnexion.php" role="button" style="float: right;margin: 7px;">Deconnexion</a>
						  <ul class="nav navbar-nav">
						  	<li><a  href="index2.php">Franchisés</a></li>
						  	<li><a href="#">blabla</a></li>
						  </ul>
						  <?php 
						} 
						/* si pas connecter affiche les boutons connexion et inscription */
					else {?>
					    <div class="btn-group">
							  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    Connexion
							  </button>
							  <div class="dropdown-menu right">
					    		<?php include 'connexion.php' ?>
					    	</div>
						</div>		 
					     <div class="btn-group">
							  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    Inscription
							  </button>
							  <div class="dropdown-menu right">
					    		<?php include 'inscription.php' ?>
					    	</div>
					    </div>
					<?php } ?>			
		</div> 		