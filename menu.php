<style>
    a {
        color: black;
    }

    a:hover {
        color: black;
    }

    a:visited {
        color: black;
    }

    #ah {
        color: white;
    }
</style>

<div class="navbar navbar-light bg-light" style="background: #f5f5f5">
    <a class="navbar-brand" href="index.php">Relève et détachements</a>
    <?php 
				/* si connecter afficher le menu complet et le bouton deconnecter */
					if ( isset( $_SESSION['pseudo'] ) ) { ?>
                        <a id="ah" class="btn btn-danger" href="deconnexion.php" role="button"
                           style="float: right;margin: 7px;">Deconnexion</a>
                        <ul class="nav navbar-nav">
                            <li><a href="index2.php">Exercices</a></li>
                            <li><a href="index3.php">Fonction</a></li>
                            <li><a href="index4.php">Motif</a></li>
                            <li><a href="index5.php">Relève/détachements</a></li>
                        </ul>
                        <?php
						} 
						/* si pas connecter affiche les boutons connexion et inscription */
					else {?>
                        <div class="btn-group">
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                Connexion
                            </button>
                            <div class="dropdown-menu right">
                                <?php include 'connexion.php' ?>
        </div>
    </div>
    <!-- <div class="btn-group">
							  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    Inscription
							  </button>
							  <div class="dropdown-menu right">
					    		 <?php /* include 'inscription.php' */  ?> 
					    	</div>
					    </div> -->
    <?php } ?>

</div>
