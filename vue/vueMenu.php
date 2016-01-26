<?php


require_once 'util/utilitairePageHtml.php';
require_once __DIR__."/../modele/dao/dao.php";
require_once __DIR__."/../modele/bean/Etudiant.php";
require_once __DIR__."/../modele/bean/Entreprise.php";

class VueMenu{

public function afficherPlanningEtu(){
		$util = new UtilitairePageHtml();
		echo $util->genereBandeauApresConnexion();
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="vue/css/general.css">
		<title></title>
		<meta charset="UTF-8">
	</head>
	<body>
	<div id="main">
		<br/>&nbsp;&nbsp;&nbsp;&nbsp;Bonjour,
		<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;Bienvenue sur votre espace utilisateur créé à l'occasion des rencontres alternances du 1 avril 2016.

		<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;Les emplois du temps relatifs à cet événement, le vôtre y compris, n'ont toujours pas été générés. Ceux-ci seront générés le 31 mars.
		L'administrateur vous en informera lorsque ceux-ci seront disponibles.
	</div>
		<?php
		//////////////////////////////////////ATTTENTION METTRE EN PLACE SYSTEME DATE POUR AFFICHER/////////////////////////////////////

		/*

		//On génére l'emploi du temps
    $dao = new Dao();
    $tabConfig = $dao -> getConfiguration();
    $tabForm = $dao -> getFormation();

		?>
    <!DOCTYPE html>
  	<html>
  	<head>
  		<link rel="stylesheet" type="text/css" href="vue/css/general.css">
  		<title></title>
  		<meta charset="UTF-8">
  	</head>
  	<body>
  	<div id="main">
  	<br/>

    <table id="tabPlanningEnt">

		<tr>
			<td colspan="7"> Planning </td>
		</tr>
		<tr>
			<td colspan= <?php $tabConfig["nbCreneauxMatin"]?>> Matin </td>
			<td colspan=<?php $tabConfig["nbCreneauxAprem"]?>> Après-midi </td>
		</tr>

		<?php
			//Ici afficher table
		?>
		</table>

    <?php

		echo $util->generePied();

		?>
	</body>
	</html>

*/

	//<?php

	}

public function afficherPlanningEnt(){
		$util = new UtilitairePageHtml();
		echo $util->genereBandeauApresConnexion();
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="vue/css/general.css">
		<title></title>
		<meta charset="UTF-8">
	</head>
	<body>
	<div id="main">
		<br/>&nbsp;&nbsp;&nbsp;&nbsp;Bonjour,
		<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;Bienvenue sur votre espace utilisateur créé à l'occasion des rencontres alternances du 1 avril 2016.

		<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;Les emplois du temps relatifs à cet événement, le vôtre y compris, n'ont toujours pas été générés. Ceux-ci seront générés le 31 mars.
		L'administrateur vous en informera lorsque ceux-ci seront disponibles.
	</div>
		<?php
		//////////////////////////////////////ATTTENTION METTRE EN PLACE SYSTEME DATE POUR AFFICHER/////////////////////////////////////

		/*
		//On génére l'emploi du temps
    $dao = new Dao();
    $tabConfig = $dao -> getConfiguration();
		//Le 1 doit être l'id de l'entreprise connecté
    $tabForm = $dao -> getFormationEntreprise(1);

		?>
    <!DOCTYPE html>
  	<html>
  	<head>
  		<link rel="stylesheet" type="text/css" href="vue/css/general.css">
  		<title></title>
  		<meta charset="UTF-8">
  	</head>
  	<body>
  	<div id="main">
  	<br/>

    <table id="tabPlanningEnt">

		<tr>
			<td colspan="7"> Planning </td>
		</tr>
		<tr>
			<td colspan= <?php $tabConfig["nbCreneauxMatin"]?>> Matin </td>
			<td colspan=<?php $tabConfig["nbCreneauxAprem"]?>> Après-midi </td>
		</tr>

		<?php
			foreach ($tabForm as $formation) {
				echo '<tr>
					<td>'
					.$formation["IDformation"].
					'</td>
				</tr>';
			}
		?>
		</table>

    <?php

		echo $util->generePied();

		?>
	</body>
	</html>

	*/

	//<?php
	}

public function afficherPlanningAdmin(){
		$util = new UtilitairePageHtml();
		echo $util->genereBandeauApresConnexion();
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="vue/css/general.css">
		<title></title>
		<meta charset="UTF-8">
	</head>
	<body>
	<div id="main">
		<br/>&nbsp;&nbsp;&nbsp;&nbsp;Bonjour,
		<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;Bienvenue sur votre espace administrateur créé à l'occasion des rencontres alternances du 1 avril 2016.

		<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;Les emplois du temps relatifs à cet événement n'ont toujours pas été générés. Ceux-ci seront à générer le 31 mars.
	</div>
		<?php
    //////////////////////////////////////ATTTENTION METTRE EN PLACE SYSTEME DATE POUR AFFICHER/////////////////////////////////////

		/*

    //On génére l'emploi du temps
    $dao = new Dao();
    $tabConfig = $dao -> getConfiguration();
		$tabEnt = $dao -> getAllEntreprises();
		/////////////////////ATTENTION DONNEE MAGIQUE
    $tabForm = $dao -> getFormations("Informatique");

    //Planning du point de vue des entreprises
    ?>
    <!DOCTYPE html>
  	<html>
  	<head>
  		<link rel="stylesheet" type="text/css" href="vue/css/general.css">
  		<title></title>
  		<meta charset="UTF-8">
  	</head>
  	<body>
  	<div id="main">
  	<br/>
		<style>

		#tabPlanningEnt {
			background-color: #f2f2f2;
			margin-left: -40%;
			border-style : solid;
			border-width : 1 px;
			border-collapse: collapse;
			text-align: center;

		}
		#tabPlanningEnt tr td {
			border-style : solid;
			border-width : 1px;
			border-collapse: collapse;
		}

		</style>
    <table id="tabPlanningEnt">

		<tr>
				<?php
				$tmp = $tabConfig["nbCreneauxMatin"] + $tabConfig["nbCreneauxAprem"] + 3;
				echo'<td colspan= '.$tmp.'> Planning Entreprises </td>';
				?>
		</tr>
		<tr>
			<td colspan= 1> Entreprise </td>
			<td colspan= 1> Formation </td>
			<?php
			echo'<td colspan= '.$tabConfig["nbCreneauxMatin"].'> Matin </td>';
			echo'<td colspan= 1> Pause midi </td>';
			echo'<td colspan= '.$tabConfig["nbCreneauxAprem"].'> Après-midi </td>';
			?>
		</tr>

		<?php

		echo'<tr>';
		echo'<td> </td>';
		echo'<td> </td>';
		//Les horaires
		$duree = $tabConfig["dureeCreneau"];
		$heureString = $tabConfig["heureDebutMatin"];
		$heureString = explode(':', $heureString);
		$heure = $heureString[0];
		$min = $heureString[1];

		for($i = 0; $i < 15; $i++) {
			if ($i == 6) {
				echo'<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</td>';
				$heureString = $tabConfig["heureDebutAprem"];
				$heureString = explode(':', $heureString);
				$heure = $heureString[0];
				$min = $heureString[1];
			} else {
				echo'<td>' . $heure . ' : ';
				if ($min == 0)
					echo '00';
				else
					echo $min;
				echo'</td>';

				$min += $duree;
				if($min == 60) {
					$min = 0;
					$heure++;
				}
			}


		}
		echo'</tr>';





		foreach ($tabEnt as $ent) {
			$tabForm = $dao -> getFormationsEntreprise($ent -> getID());



		foreach ($tabForm as $form) {
			echo '<tr>
			<td>'
			.$ent -> getnomEnt().
			'</td>
			<td>'
			.$form['typeFormation'].
			'</td>';
			;
			for($i = 0; $i < $tabConfig['nbCreneauxMatin'] + $tabConfig['nbCreneauxAprem']; $i++) {
				if ($i == 6) {
					echo'<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</td>';
				}
				echo '
				<td>'
				.
				$dao -> getNomEtudiant($dao -> getCreneau($i, $form['IDformation'])).
				'</td> ';
			}
		}
			echo '</tr>';
	}



		?>
		</table>

    <?php

    //Planning du point de vue des Etudiants





		echo $util->generePied();

		?>
	</body>
	</html>

	*/


	//<?php
	}

public function afficherComptes() {
	$util = new UtilitairePageHtml();
	 	$dao = new Dao();
		echo $util->genereBandeauApresConnexion();
		$tabEtuTemp = $dao->getAllEtudiantsTemp();
		$tabEtu = $dao->getAllEtudiants();
		$tabEntTemp = $dao->getAllEntreprisesTemp();
		$tabEnt = $dao->getAllEntreprises();
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="vue/css/general.css">
		<title></title>
		<meta charset="UTF-8">
	</head>
	<body>
	<div id="main">
	<br/>
		<table id="tabEtudiants">

		<tr>
			<td colspan="7"> Etudiants </td>
		</tr>
		<tr>
			<td colspan="5"> Données </td>
			<td colspan="2"> Actions </td>
		</tr>
		<tr>
			<td>
				Nom
			</td>
			<td>
				Prénom
			</td>
			<td>
				Email
			</td>
			<td>
				Téléphone
			</td>
			<td>
				Formation
			</td>
			<td>
				Etat
			</td>
			<td>
				Suppression
			</td>
		</tr>
		<?php
			foreach ($tabEtuTemp as $etuTemp) {
				echo '<tr>
					<td>
					<a href="index.php?profil='.$etuTemp->getID().'&type=tmpEtu">'.$etuTemp->getNomEtu().'</a>
					</td>
					<td>'
					.$etuTemp->getPrenomEtu().
					'</td>
					</td>
					<td>
					<a href="mailto:'.$etuTemp->getMailEtu().'">'.$etuTemp->getMailEtu().'</a>
					</td>
					<td>'
					.$etuTemp->getNumTelEtu().
					'</td>
					<td>'
					.$etuTemp->getFormationEtu().
					'</td>
					<td>
						<a href="index.php?validation=ok&id='.$etuTemp->getId().'&type=tmpEtu" onclick="return checkValidate()">Valider</a>
					</td>
					<td>
						<a href="index.php?suppression=ok&id='.$etuTemp->getId().'&type=tmpEtu" onclick="return checkDelete()">Supprimer</a>
					</td>
				</tr>';
			}

			foreach ($tabEtu as $etuTemp) {
				echo '<tr>
					<td>
					<a href="index.php?profil='.$etuTemp->getID().'&type=Etu">'.$etuTemp->getNomEtu().'</a>
					</td>
					<td>'
					.$etuTemp->getPrenomEtu().
					'</td>
					<td> <a href="mailto:'.$etuTemp->getMailEtu().'">'.$etuTemp->getMailEtu().'</a>
					</td>
					<td>'
					.$etuTemp->getNumtelEtu().
					'</td>
					<td>'
					.$etuTemp->getFormationEtu().
					'</td>
					<td>
						<a href="index.php?geler=ok&id='.$etuTemp->getId().'&type=Etu" onclick="return checkFreeze()">Geler</a>
					</td>
					<td>
						<a href="index.php?suppression=ok&id='.$etuTemp->getId().'&type=Etu" onclick="return checkDelete()">Supprimer</a>
					</td>
				</tr>';
			}
		?>
		</table>

		<br/><br/>

		<table id="tabEntreprises">

		<tr>
			<td colspan="7"> Entreprises </td>
		</tr>
		<tr>
			<td colspan="5"> Données </td>
			<td colspan="2"> Actions </td>
		</tr>
		<tr>
			<td>
				Entreprise
			</td>
			<td>
				Nom contact
			</td>
			<td>
				Prenom contact
			</td>
			<td>
				Téléphone
			</td>
			<td>
				Email
			</td>
			<td>
				Etat
			</td>
			<td>
				Suppression
			</td>
		</tr>
		<?php
			foreach ($tabEntTemp as $entTemp) {
				echo '<tr>
					<td>
					<a href="index.php?profil='.$entTemp->getID().'&type=tmpEnt">'.$entTemp->getNomEnt().'</a>
					</td>
					<td>'
					.$entTemp->getNomContact().
					'</td>
					<td>'
					.$entTemp->getPrenomContact().
					'</td>
					<td>'
					.$entTemp->getNumTelContact().
					'</td>
					<td>
					<a href="mailto:'.$entTemp->getMailEnt().'">'.$entTemp->getMailEnt().'</a>
					</td>
					<td>
						<a href="index.php?validation=ok&id='.$entTemp->getId().'&type=tmpEnt" onclick="return checkValidate()">Valider</a>
					</td>
					<td>
						<a href="index.php?suppression=ok&id='.$entTemp->getId().'&type=tmpEnt" onclick="return checkDelete()">Supprimer</a>
					</td>
				</tr>';
			}

			foreach ($tabEnt as $entTemp) {
				echo '<tr>
					<td>
					<a href="index.php?profil='.$entTemp->getID().'&type=Ent">'.$entTemp->getNomEnt().'</a>
					</td>
					<td>'
					.$entTemp->getNomContact().
					'</td>
					<td>'
					.$entTemp->getPrenomContact().
					'</td>
					<td>'
					.$entTemp->getNumTelContact().
					'</td>
					<td>
					<a href="mailto:'.$entTemp->getMailEnt().'">'.$entTemp->getMailEnt().'</a>
					</td>
					<td>
						<a href="index.php?geler=ok&id='.$entTemp->getId().'&type=Ent" onclick="return checkFreeze()">Geler</a>
					</td>
					<td>
						<a href="index.php?suppression=ok&id='.$entTemp->getId().'&type=Ent" onclick="return checkDelete()">Supprimer</a>
					</td>
				</tr>';
			}
		?>
		</table>

		<script>
		function checkDelete() {
			if (confirm('Êtes-vous sûr(e) de vouloir supprimer ce compte ? Cette action ne peut pas être annulée !')) {
   				return confirm('Veuillez confirmer une seconde fois la suppression irréversible de ce compte.');
			} else {
			    return false;
			}
		}
		function checkFreeze() {
			return confirm('Êtes-vous sûr(e) de vouloir geler ce compte ?');
		}
		function checkValidate() {
			return confirm('Êtes-vous sûr(e) de vouloir valider ce compte ?');
		}
		</script>

	</div>
		<?php

		echo $util->generePied();

		?>
	</body>
	</html>

	<?php
	}

	public function afficherConfig() {

		$util = new UtilitairePageHtml();
		echo $util->genereBandeauApresConnexion();
		$dao = new Dao();
		$tabConfig = $dao->getConfiguration();
		$heureDebutMatin = $tabConfig['heureDebutMatin'];
		$heureDebutAprem = $tabConfig['heureDebutAprem'];
		$nbCreneauxMatin = $tabConfig['nbCreneauxMatin'];
		$nbCreneauxAprem = $tabConfig['nbCreneauxAprem'];
		$dureeCreneau = $tabConfig['dureeCreneau'];
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="vue/css/general.css">
		<title></title>
		<meta charset="UTF-8">
	</head>
	<body>
	<div id="main">
		<br/><span class="categorie_profil">Configuration actuelle :</span>
		<br/><br/>
		<?php
			echo'

			Les emplois du temps débuteront le matin à : '.$heureDebutMatin.'.
			<br/><br/>Les emplois du temps débuteront l\'après-midi à : '.$heureDebutAprem.'.
			<br/><br/>Il y aura '.$nbCreneauxMatin.' créneau(x) le matin et '.$nbCreneauxAprem.' l\'après-midi.
			<br/><br/>Chaque créneau dure '.$dureeCreneau.' minutes.
			';
		?>

		<br/><br/><span class="categorie_profil">Nouvelle configuration :</span>
		<form action="index.php" method="POST">
			<br/>
			<label>Début de la matinée (format hh:mm) : </label><input type="text" name="heureDebutMatin"/>
			<br/><br/>
			<label>Nombre de créneaux dans la matinée : </label><input type="text" name="nbCreneauxMatin"/>
			<br/><br/>
			<label>Début de l'après-midi (format hh:mm) : </label><input type="text" name="heureDebutAprem"/>
			<br/><br/>
			<label>Nombre de créneaux dans l'après-midi : </label><input type="text" name="nbCreneauxAprem"/>
			<br/><br/>
			<label>Durée en minutes d'un créneau : </label><input type="text" name="dureeCreneau"/>
			<br/><br/>
			<input type="submit" name="changementConfig" value="Confirmer"/>
		</form>
	</div>
		<?php

		echo $util->generePied();

		?>
	</body>
	</html>

	<?php
	}

	public function afficherChoix(){
		$util = new UtilitairePageHtml();
		echo $util->genereBandeauApresConnexion();
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="vue/css/general.css">
		<title></title>
		<meta charset="UTF-8">
	</head>
	<body>
	<div id="main">
		<br/>&nbsp;&nbsp;&nbsp;&nbsp;Bonjour,
		<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;Ici sera affichée la liste des entreprises proposant la formation de l'élève pour sélectionner des voeux. La sélection se fera par listes déroulantes.
	</div>
		<?php

		echo $util->generePied();

		?>
	</body>
	</html>

	<?php
	}

	public function afficherEntreprises(){
		$dao = new Dao();
		$tabEntreprises = $dao->getEntreprisesParFormation($dao->getFormationEtudiant($_SESSION['idUser']));
		$util = new UtilitairePageHtml();
		echo $util->genereBandeauApresConnexion();
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="vue/css/general.css">
		<title></title>
		<meta charset="UTF-8">
	</head>
	<body>
	<div id="main">
		<br/><br/><span style="categorie_profil">Liste des entreprises recherchant votre formation :</span><br/><br/>

		<?php

			if (sizeof($tabEntreprises) > 0) {

				foreach ($tabEntreprises as $entreprise) {
					echo '<a href="index.php?profil='.$entreprise->getID().'&type=Ent">'.$entreprise->getNomEnt().'</a><br/><br/>';
				}

			}
			else {
				echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Actuellement, aucune entreprise ne propose de formation correspondante à la votre.';
			}

		?>


	</div>
		<?php

		echo $util->generePied();

		?>
	</body>
	</html>

	<?php
	}

	public function afficherCompteEtu(){
		$util = new UtilitairePageHtml();
		echo $util->genereBandeauApresConnexion();
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="vue/css/general.css">
		<title></title>
		<meta charset="UTF-8">
	</head>
	<body>
	<div id="main">
		<br/>&nbsp;&nbsp;&nbsp;&nbsp;Bonjour,
		<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;Ici seront affichées les données du compte étudiant. Celui-ci pourra les modifier.
	</div>
		<?php

		echo $util->generePied();

		?>
	</body>
	</html>

	<?php
	}

	public function afficherFormations(){
		$util = new UtilitairePageHtml();
		echo $util->genereBandeauApresConnexion();
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="vue/css/general.css">
		<title></title>
		<meta charset="UTF-8">
	</head>
	<body>
	<div id="main">
		<br/>&nbsp;&nbsp;&nbsp;&nbsp;Bonjour,
		<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;Ici seront affichées les formations possibles de l'entreprise. Celle-ci pourra les modifier en respectant les contraintes de son compte.
	</div>
		<?php

		echo $util->generePied();

		?>
	</body>
	</html>

	<?php
	}


	public function afficherCompteEnt(){
		$util = new UtilitairePageHtml();
		echo $util->genereBandeauApresConnexion();
	/*?>
	<!DOCTYPE html>
	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="vue/css/general.css">
		<title></title>
		<meta charset="UTF-8">
	</head>
	<body>
	<div id="main">
		<br/>&nbsp;&nbsp;&nbsp;&nbsp;Bonjour,
		<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;Ici seront affichées les données du compte entreprise. Celle-ci pourra les modifier.
	</div>
		<?php

		echo $util->generePied();

		?>
	</body>
	</html>



	<?php*/
	$dao = new Dao();
	$id = $_SESSION['idUser'];
	$tabprofil = $dao->getEnt($id);
	$profil = $tabprofil[0];
	$util = new UtilitairePageHtml();

	$dispo = "";
	if ($profil->getTypeCreneau() == "journee") {
		$dispo = "Journée.";
	}
	if ($profil->getTypeCreneau() == "matin") {
		$dispo = "Matinée.";
	}
	if ($profil->getTypeCreneau() == "apres_midi") {
		$dispo = "Après-midi.";
	}
	echo '
	<br/><br/>
	<span class="categorie_profil">Nom de l\'entreprise :</span> '.$profil->getNomEnt().'
	<br/><br/>
	<span class="categorie_profil">Ville de l\'entreprise :</span> '.$profil->getVilleEnt().'
	<br/><br/>
	<span class="categorie_profil">Code Postal :</span> '.$profil->getCodePostal().'
	<br/><br/>
	<span class="categorie_profil">Adresse :</span> '.$profil->getAdresseEnt().'
	<br/><br/>
	<span class="categorie_profil">Disponibilité :</span> '.$dispo.'
	<br/><br/>
	<span class="categorie_profil">Nom du contact :</span> '.$profil->getPrenomContact().' '.$profil->getNomContact().'
	<br/><br/>
	<span class="categorie_profil">Email :</span> <a href="mailto:'.$profil->getMailEnt().'">'.$profil->getMailEnt().'</a>
	<br/><br/>
	<span class="categorie_profil">Téléphone :</span> '.$profil->getNumTelContact().'
	<br/><br/>
	<span class="categorie_profil">Recherche :</span> '.$profil->getFormationsRecherchees().' pour '.$profil->getNbPlaces().' recruteur(s) disponible(s).
	<br/><br/>
	<span class="categorie_profil">Nombre de stands en simultané :</span> '.$profil->getNbStands().'
	<br/><br/>
	<span class="categorie_profil">Nombre de repas prévus :</span> '.$profil->getNbRepas().'
	';



		//<!-- Nom -->
		echo'<br></br></br></br>
		----------------------------------------------------<br/><br/>

		<h2>Pour effectuer des changements : </h2>

		<style>
		#tabModifEnt tr td{
    padding: 15px;
    border: 1px solid navy;
		}
		</style>

		<form action="index.php" method="post" >
		<TABLE id="tabModifEnt">
	  	<CAPTION> Organisation </CAPTION>
	  	<TR>
	 			<TD> <label for="disponibiliteSociete"/> Disponibilité
				<br/>
				<select required name="disponibiliteSociete"/>
					<option value=""disabled selected>Sélectionnez un horaire</option>
					<option value="matin">Matin</option>
					<option value="apres_midi">Après-midi</option>
					<option value="journee">Journée</option>
				</select>
				<br/>
				<label for="nbStandsSociete"/> Nombre d\'entretiens en simultanés
				<br/>
				<input required type="text" name="nbStandsSociete" value='.$profil->getNbStands().' >
				<br/>
				<label for="nbRepasSociete"/> Nombre de repas prévus
				<br/>
				<input required type="text" name="nbRepasSociete" value='.$profil->getNbRepas().' >
	 			<TD> 	<input type="submit" name="modification_entreprise_organistaion" value="confirmer"/> </TD>
		</TABLE>
		</form></br>

		<form action="index.php" method="post" >
		<TABLE id="tabModifEnt">
	  	<CAPTION> Formations recherchées </CAPTION>
	  	<TR>
	 			<TD> <input type="checkbox" name="formation[]" id="formation" value="LP I2P">
				 LP Innovations Produits Process (I2P)<br/>
    		<input type="checkbox" name="formation[]" id="formation" value="LP LOGIQUAL">
				LP Industrialisation et Mise en Oeuvre des matériaux composites (IMOC)<br/>
    		<input type="checkbox" name="formation[]" id="formation" value="LP LOGIQUAL">
				LP Logistique et qualité (LOGIQUAL)<br/>
    		<input type="checkbox" name="formation[]" id="formation" value="LP EAS">
				LP Electrohydraulique mobile et automatismes associés (EAS)<br/>
    		<input type="checkbox" name="formation[]" id="formation" value="LP SEICOM">
				LP Systèmes Electroniques et Informatiques Communicants (SEICOM)<br/>
    		<input type="checkbox" name="formation[]" id="formation" value="LP IDEB">
				LP Intelligence et Distribution Electrique du Bâtiment (IDEB)<br/>
    		<input type="checkbox" name="formation[]" id="formation" value="LP FICA">
				LP Froid Industriel et Conditionnement d\'Air (FICA)<br/>
				<input type="checkbox" name="formation[]" id="formation" value="DUT GEII">
				DUT 2ème année GEII : Génie Électrique et Informatique Industrielle<br/>
				<input type="checkbox" name="formation[]" id="formation" value="DUT INFO">
				DUT 2ème année Informatique<br/>
				<input type="checkbox" name="formation[]" id="formation" value="DUT GMP">
				DUT 2ème année Génie Mécanique et Productique<br/>
				<input type="checkbox" name="formation[]" id="formation" value="DUT SGM">
				DUT 2ème année Science et Génie des Matériaux<br/>
	 			<TD> 	<input type="submit" name="modification_entreprise_formations" value="confirmer"/> </TD>
		</TABLE>
		</form></br>

		<form action="index.php" method="post" >
		<TABLE id="tabModifEnt">
	  	<CAPTION> Informations sur la société </CAPTION>
	  	<TR>
	 			<TD> <label for="nomSociete"/> Nom
				<br/>
				<input required type="text" name="nomSociete" value='.$profil->getNomEnt().'  >
				<label for="villeSociete"/> Ville
				<br/>
				<input required type="text" name="villeSociete" value='.$profil->getVilleEnt().' >
				<br/>
				<label for="codePostalSociete"/> Code postal
				<br/>
				<input required type="text" name="codePostalSociete" value='.$profil->getCodePostal().' >
				<br/>
				<label for="adresseSociete"/> Adresse
				<br/>
				<input required type="text" name="adresseSociete" value='.$profil->getAdresseEnt().' > </TD>
	 			<TD> 	<input type="submit" name="modification_entreprise_informations" value="confirmer"/> </TD>
		</TABLE>
		</form>
		<br/>

		<form action="index.php" method="post" >
		<TABLE id="tabModifEnt">
	  	<CAPTION> Contacts </CAPTION>
	  	<TR>
	 			<TD> <label for="nomContactSociete"/> Nom du contact
				<br/>
				<input required type="text" name="nomContactSociete" value='.$profil->getNomContact().' >
				<br/>
				<label for="prenomContactSociete"/> Prénom du contact
				<br/>
				<input required type="text" name="prenomContactSociete" value='.$profil->getPrenomContact().' >
				<br/>
				<label for="emailSociete"/> Email
				<br/>
				<input required type="text" name="emailSociete" value='.$profil->getMailEnt().' >
				<br/>
				<label for="numTelSociete"/> Téléphone
				<br/>
				<input required type="text" name="numTelSociete" value='.$profil->getNumTelContact().' > </TD>
	 			<TD> 	<input type="submit" name="modification_entreprise_contact" value="confirmer"/> </TD>
		</TABLE>
		</form>';


		/*

			<h2>Votre société</h2>

			<h2>Vous recherchez :</h2>

			<!-- Formation -->
			<label for="formation"/> Quelle(s) formation(s) vous intéresse(nt) ? <span name="obligatoire">*</span>
			<br/><br/>
			<input type="checkbox" name="formation_LPI2P" value="LP I2P" onClick="EnableSubmit(this)">LP Innovations Produits Process (I2P)</option>
			<br/>
			<input type="checkbox" name="formation_LPIMOC" value="LP IMOC" onClick="EnableSubmit(this)">LP Industrialisation et Mise en Oeuvre des matériaux composites (IMOC)</option>
			<br/>
			<input type="checkbox" name="formation_LPLOGICAL" value="LP LOGIQUAL" onClick="EnableSubmit(this)">LP Logistique et qualité (LOGIQUAL)</option>
			<br/>
			<input type="checkbox" name="formation_LPEAS" value="LP EAS" onClick="EnableSubmit(this)">LP Electrohydraulique mobile et automatismes associés (EAS)</option>
			<br/>
			<input type="checkbox" name="formation_LPSEICOM" value="LP SEICOM" onClick="EnableSubmit(this)">LP Systèmes Electroniques et Informatiques Communicants (SEICOM)</option>
			<br/>
			<input type="checkbox" name="formation_LPIDEB" value="LP IDEB" onClick="EnableSubmit(this)">LP Intelligence et Distribution Electrique du Bâtiment (IDEB)</option>
			<br/>
			<input type="checkbox" name="formation_LPFICA" value="LP FICA" onClick="EnableSubmit(this)">LP Froid Industriel et Conditionnement d'Air (FICA)</option>
			<br/>
			<input type="checkbox" name="formation_DUTGEII" value="DUT GEII" onClick="EnableSubmit(this)">DUT 2ème année GEII : Génie Électrique et Informatique Industrielle</option>
			<br/>
			<input type="checkbox" name="formation_DUTINFO" value="DUT INFO" onClick="EnableSubmit(this)">DUT 2ème année Informatique</option>
			<br/>
			<input type="checkbox" name="formation_DUTGMP" value="DUT GMP" onClick="EnableSubmit(this)">DUT 2ème année Génie Mécanique et Productique</option>
			<br/>
			<input type="checkbox" name="formation_DUTSGM" value="DUT SGM" onClick="EnableSubmit(this)">DUT 2ème année Science et Génie des Matériaux</option>
			<br/>
			<input type="checkbox" name="formation_DCG" value="DCG" onClick="EnableSubmit(this)">Préparation Diplôme de Comptabilité et de Gestion (DCG)</option>
			<br/><br/>

			<span name="information">Pour plus d'informations sur nos formations : <a href="www.univ-nantes.fr/iutnantes">www.univ-nantes.fr/iutnantes</a> </span>
			<br/><br/>
			Emplacement de l'entreprise :
			<br/><br/>
			<!-- Ville -->
			<label for="ville"/> Ville <span name="obligatoire">*</span>
			<br/>
			<input type="text" name="ville"/>
			<br/><br/>
			<!-- Code Postal -->
			<label for="codePostal"/> Code Postal <span name="obligatoire">*</span>
			<br/>
			<input type="text" name="codePostal"/>
			<br/><br/>
			<!-- Adresse -->
			<label for="adresse"/> Adresse <span name="obligatoire">*</span>
			<br/>
			<input type="text" name="adresse"/>
			<br/><br/>

			<!-- Nombre alternant -->
			<label for="NbAlternants"/> Pouvez-vous indiquer le nombre d'alternants (pour chaque formation) que vous envisagez de recruter ? </span>
			<br/>
			<input type="text" name="NbAlternants"/>
			<br/><br/>
			<!-- Nombre de personnes
			<label for="NbPersonnes"/> Afin d'organiser au mieux le planning, merci de nous indiquer le nombre de personnes de votre entreprise présentes pour mener les entretiens. <span name="obligatoire">*</span>
			<br/>
			<input type="text" name="NbPersonnes" required/>
			<br/><br/> -->
			<!-- Disponibilité-->
			<label for="disponibilite"/> Veuillez indiquer vos disponibilités : <span name="obligatoire">*</span>
			<br/>
			<select name="disponibilite" required>
				<option value=""/>
				<option value="matin">Matin</option>
				<option value="apres_midi">Après-midi</option>
				<option value="journee">Journée</option>
			</select>
			<br/><br/>
			<!-- Nombre stand -->
			<label for="NbStand"/> Pouvez-vous indiquer combien d'étudiants dont vous pourrez faire passer en entretien en simultané ? <span name="obligatoire">*</span>
			<br/>
			<input type="text" name="NbStand" required/>
			<br/><br/>
			<!-- Déjeuner ?-->
			<input type="checkbox" name="dejeuner" value="dejeuner_ok" id="checkbox_repas"/><span>Vous souhaitez déjeuner sur place.</span>
			<br/><br/>
			<!-- Nombre déjeuners -->
			<label for="NbRepas"/> Si oui, pouvez-vous indiquer le nombre de repas à prévoir ?
			<br/>
			<input type="text" name="NbRepas" id="nb_repas"/>
			<br/><br/>



			<h2>Personne à contacter :</h2>
			<span> Pour la mise en place de cette journée. </span>
			<br/><br/>
			<!-- Nom -->
			<label for="nom"/> Nom <span name="obligatoire">*</span>
			<br/>
			<input type="text" name="nom" required/>
			<br/><br/>
			<!-- Prenom-->
			<label for="prenom"/> Prénom <span name="obligatoire">*</span>
			<br/>
			<input type="text" name="prenom" required/>
			<br/><br/>
			<!-- Telephone -->
			<label for="tel"/> Numéro de téléphone (sans espace. Ex : 0610203040)<span name="obligatoire">*</span>
			<br/>
			<input type="text" name="tel" required/>
			<br/><br/>
			<!--  Adresse email-->
			<label for="email"/> Email (il sera utilité pour l'authentification sur le site)<span name="obligatoire">*</span>
			<br/>
			<input type="text" name="email" id="mail" required/>
			<br/><br/>
			<!--  Mdp -->
			<label for="password"/> Mot de passe (il sera utilité pour l'authentification sur le site)<span name="obligatoire">*</span>
			<br/>
			<input type="password" name="password" id="passw" required/>
			<br/><br/>
			<!--  Mdp bis-->
			<label for="passwordBis"/> Veuillez réécrire le mot de passe<span name="obligatoire">*</span>
			<br/>
			<input type="password" name="passwordBis" id="passwBis" equired/>
			<br/><br/>
			<input type="hidden" name="inscription" value="entreprise"/>
			<input type="submit" name="valid_inscription_ent" id="submit" disabled/>
		</form>
		<script type="text/javascript">
			EnableSubmit = function(val)
			{
					var sbmt = document.getElementById("submit");

					if (val.checked == true)
					{
							sbmt.disabled = false;
					}
					else
					{
							sbmt.disabled = true;
					}
			}
		</script>
		<script>
		VerifSubmit = function()
			{
			var nb_repas = document.getElementById("nb_repas");
			var checkboxRepas = document.getElementById("checkbox_repas");
			var passw = document.getElementById("passw");
			var passwBis = document.getElementById("passwBis");
				if (checkboxRepas.checked == true) {
						if (nb_repas.value == '' || nb_repas.value == null)
						{
							alert('Vous n\'avez pas précisé combien de repas seront à prévoir.');
								return false;
						}
				}
				if (passw.value != passwBis.value) {
						alert('Les mots de passe ne coïncident pas.');
								return false;
				}
				if (/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i.test(document.getElementById("mail").value))
					{
						return true;
					}
					else {
						alert("L\'adresse email n'est pas correcte !")  ;
					return false;
					}
			}
		</script>
	</p>
*/}





	/////////////////////∕FINFINFINFINFINFIFNIFNIFNFINFINFINFINFINFINFIFNFNIFNIFINFINFINFINFIFNIFN///////////////////////////

	public function afficherAutres(){
		$util = new UtilitairePageHtml();
		$dao = new Dao();
		$tabDetails = $dao->getDetails();
		echo $util->genereBandeauApresConnexion();
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="vue/css/general.css">
		<title></title>
		<meta charset="UTF-8">
	</head>
	<body>
	<div id="main">
		<br/><br/>
		<table id="tabStatistiques">
		<tr>
			<td>Nombre total de participants</td>
			<td><?php echo ($tabDetails['nbEnt'] + $tabDetails['nbEtu']);?></td>
		</tr>
		<tr>
			<td>Nombre d'étudiants</td>
			<td><?php echo $tabDetails['nbEtu'];?></td>
		</tr>
		<tr>
			<td>Nombre d'entreprises</td>
			<td><?php echo $tabDetails['nbEnt'];?></td>
		</tr>
		<tr>
			<td>Nombre de repas à prévoir</td>
			<td><?php echo $tabDetails['nbRepas'];?></td>
		</tr>
		</table>
		<br/><br/>
		<!-- IMPORTANT : demande de génération des emplois du temps -->
		<?php
		$date = getdate();
		// if ($date['mday'] > 30 && $date['mon'] >2) {
			echo '<form method="POST" action="index.php" onclick="return confirm("Attention ! Cette action utilisera les données courantes pour générer les emplois
				du temps ! Veuillez vérifier toutes vos données avant de continuer.");">
			<input type="submit" value="Générer les emplois du temps" name="startGeneration">
			</form>';
		// }
		// else {
		// 	echo 'La génération des emplois du temps sera disponible à partir du 31 mars inclus.';
		// }
		?>

	</div>
		<?php

		echo $util->generePied();

		?>
	</body>
	</html>

	<?php
	}
}
?>
