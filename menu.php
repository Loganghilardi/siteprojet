<style>
    a {
        color: black;

    }

    a:hover {
        color: black;
        text-decoration: none;

    }

    a:visited {
        color: black;
    }

    #ah {
        color: white;
    }

    .itemderoulant {
        height: auto;
        background: #f5f5f5;
        position: relative;
        display: block;
        padding: 10px 15px;


    }

    .itemderoulant:hover {
        background: #eeeeee;

    }


</style>

<div class="navbar navbar-light bg-light" style="background: #f5f5f5; border-radius: ">
    <a class="navbar-brand" href="index.php">Relève et détachements</a>
    <?php
    /* si connecter afficher le menu complet et le bouton deconnecter */
    if (isset($_SESSION['pseudo'])) { ?>
        <a id="ah" class="btn btn-danger" href="deconnexion.php" role="button"
           style="float: right;margin: 7px;">Deconnexion</a>
        <ul class="nav navbar-nav">
            <li><a href="index2.php">Exercices</a></li>
            <li><a href="index3.php">Fonction</a></li>
            <li><a href="index4.php">Motif</a></li>
            <li><a href="index5.php">Relève/détachements</a></li>
            <li class="nav-item dropdown">

                <a style="color:black" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Edition ▼
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="text-align: center;        background: #f5f5f5;
">
                    <a href="sectionana.php">
                        <div class="itemderoulant">Sections Analytiques / Motif</div>
                    </a>

                    <a href="#">
                        <div class="itemderoulant">Agent</div>
                    </a>

                    <a href="#">
                        <div class="itemderoulant">Total journées</div>
                    </a>

                    <a href="#">
                        <div class="itemderoulant">Total heures</div>
                    </a>

                    <a href="#">
                        <div class="itemderoulant">Listes Agents</div>
                    </a>

                </div>
            </li>
        </ul>
        <?php
    } /* si pas connecter affiche les boutons connexion et inscription */
    else { ?>
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
					    		 <?php /* include 'inscription.php' */ ?>
					    	</div>
					    </div> -->
    <?php } ?>

</div>
