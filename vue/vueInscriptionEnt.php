<?php


require_once 'util/utilitairePageHtml.php';

class VueInscriptionEnt{



public function afficherFormulaireEnt(){
	$util = new UtilitairePageHtml();
	echo $util->genereBandeauAvantConnexion();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="vue/css/general.css">
	<title></title>
	<meta charset="UTF-8">
</head>
<body>

<div id="corps">
	<div>
		<h1> Rencontres Alternance </h1>
		<span> Le 1 avril 2016, l'IUT de Nantes vous propose de rencontrer nos futurs étudiants en alternance (DUT, Licences Professionnelles et DCG).
			Si vous êtes intéressés, nous organiserons les entretiens sur inscription : vous avez donc l'assurance de rencontrer des candidats motivés et correspondant au profil que vous recherchez.
			<br>Attention, aucune modification ne pourra être apportée après le 28 mars.
		</span>
		<p>
			* Obligatoire
		</p>
		<p>
			<form name ="inscriptionEnt" action="index.php" method="post" onSubmit="return VerifSubmit();">
				<!-- Participation-->
				<input type="checkbox" name="engagement" required/>Vous souhaitez participer à cette journée de "rencontres alternance". <span name="obligatoire">*</span>
				<br/><br/>
				<!-- Nom -->
				<label for="nomSociete"/> Nom de la société représentée<span name="obligatoire">*</span>
				<br/>
				<input type="text" name="nomSociete" onblur="verifString(this, 'messageNom', '20')" required/>
        <p id="messageNom" style="color:red"></p>

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
				<input type="text" name="ville" onblur="verifString(this, 'messageVille', '20')" required/>
        <p id="messageVille" style="color:red"></p>
				<!-- Code Postal -->
				<label for="codePostal"/> Code Postal <span name="obligatoire">*</span>
				<br/>
				<input type="text" name="codePostal" onblur="verifCodePostal(this, 'messageCP')" required/>
        <p id="messageCP" style="color:red"></p>
				<!-- Adresse -->
				<label for="adresse"/> Adresse <span name="obligatoire">*</span>
				<br/>
				<input type="text" name="adresse" onblur="verifString(this, 'messageAdresse', '30')" required/>
        <p id="messageAdresse" style="color:red"></p>

				<!-- Nombre alternant -->
				<label for="NbAlternants"/> Pouvez-vous indiquer le nombre d'alternants (pour chaque formation) que vous envisagez de recruter ? </span>
				<br/>
				<input type="number" name="NbAlternants" min="1" max="10"/>
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
				<input type="number" name="NbStand" min="1" max="10" required/>
				<br/><br/>
				<!-- Déjeuner ?-->
				<input type="checkbox" name="dejeuner" value="dejeuner_ok" id="checkbox_repas"/><span>Vous souhaitez déjeuner sur place.</span>
				<br/><br/>
				<!-- Nombre déjeuners -->
				<label for="NbRepas"/> Si oui, pouvez-vous indiquer le nombre de repas à prévoir ?
				<br/>
				<input type="text" name="NbRepas" id="nb_repas" onblur="verifNombre(this, 'messageNbRepas', '3')"/>
        <p id="messageNbRepas" style="color:red"></p>
				<br/>



				<h2>Personne à contacter :</h2>
				<span> Pour la mise en place de cette journée. </span>
				<br/><br/>
				<!-- Nom -->
				<label for="nom"/> Nom <span name="obligatoire">*</span>
				<br/>
				<input type="text" name="nom" onblur="verifString(this, 'messageNomContact', '20')" required/>
        <p id="messageNomContact" style="color:red"></p>
				<!-- Prenom-->
				<label for="prenom"/> Prénom <span name="obligatoire">*</span>
				<br/>
				<input type="text" name="prenom" onblur="verifString(this, 'messagePrenomContact', '20')" required/>
        <p id="messagePrenomContact" style="color:red"></p>
				<!-- Telephone -->
				<label for="tel"/> Numéro de téléphone (sans espace. Ex : 0610203040)<span name="obligatoire">*</span>
				<br/>
				<input type="text" name="tel" onblur="verifTelephone(this, 'messageTel')" required/>
        <p id="messageTel" style="color:red"></p>
				<!--  Adresse email-->
				<label for="email"/> Email (il sera utilité pour l'authentification sur le site)<span name="obligatoire">*</span>
				<br/>
				<input type="text" name="email" id="mail" onblur="verifEmail(this, 'messageEmail')" required/>
        <p id="messageEmail" style="color:red"></p>
				<!--  Mdp -->
				<label for="password"/> Mot de passe (il sera utilité pour l'authentification sur le site)<span name="obligatoire">*</span>
				<br/>
				<input type="password" name="password" id="passw" required/>
				<br/><br/>
				<!--  Mdp bis-->
				<label for="passwordBis"/> Veuillez réécrire le mot de passe<span name="obligatoire">*</span>
				<br/>
				<input type="password" name="passwordBis" id="passwBis" onblur="verifMdp('messageMdp')" required/>
        <p id="messageMdp" style="color:red"></p>
				<br/><br/>
				<input type="hidden" name="inscription" value="entreprise"/>
				<input type="submit" name="valid_inscription_ent" id="submit" disabled/>
			</form>

      <!--Les scripts pour vérifier chaque case-->
      <script>
      //On surligne les cases non valides
      function surligne(champ, erreur) {
      if(erreur)
        champ.style.backgroundColor = "#fba";
      else
        champ.style.backgroundColor = "";
      }

      function verifString(champ, txt, longMax) {
        if(champ.value.length > longMax) {
          surligne(champ, true);
          document.getElementById(txt).innerHTML = longMax + " caractères maximum autorisé";
          return true;
        } else {
          surligne(champ, false);
          document.getElementById(txt).innerHTML = "";
          return false;
        }
      }

      function verifNombre(champ, txt, longMax) {
        if(champ.value.length > longMax || (!/^\d+$/.test(champ.value) && champ.value.length != 0)) {
          surligne(champ, true);
          document.getElementById(txt).innerHTML = "Un nombre de taille maximum " + longMax + " est attendu";
          return true;
        } else {
          surligne(champ, false);
          document.getElementById(txt).innerHTML = "";
          return false;
        }
      }

      function verifCodePostal(champ, txt) {
        if(champ.value.length != 5 || !/^\d+$/.test(champ.value)) {
          surligne(champ, true);
          document.getElementById(txt).innerHTML = "Le code postal doit être rentré au format 44000";
          return true;
        } else {
          surligne(champ, false);
          document.getElementById(txt).innerHTML = "";
          return false;
        }
      }

      function verifTelephone(champ, txt) {
        if(champ.value.length != 10 || !/^\d+$/.test(champ.value)) {
          surligne(champ, true);
          document.getElementById(txt).innerHTML = "Format invalide";
          return true;
        } else {
          surligne(champ, false);
          document.getElementById(txt).innerHTML = "";
          return false;
        }
      }


      function verifEmail(champ, txt){
        var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
        if(!reg.test(champ.value)) {
          surligne(champ, true);
          document.getElementById(txt).innerHTML = "L'e-mail n'est pas valide.";
          return true;
        } else {
          surligne(champ, false);
          document.getElementById(txt).innerHTML = "";
          return false;
        }
      }

      function verifMdp(txt){
        var passw = document.getElementById("passw");
				var passwBis = document.getElementById("passwBis");
        if (passw.value != passwBis.value) {
          surligne(passw, true);
          surligne(passwBis, true);
          document.getElementById(txt).innerHTML = "Les 2 valeurs sont différentes";
          return true;
        } else if (passw.value.length > 20 || passw.value.length < 5) {
          surligne(passw, true);
          surligne(passwBis, true);
          document.getElementById(txt).innerHTML = "Le mot de passe doit faire 5 à 20 caractères";
          return true;
        } else {
          surligne(passw, false);
          surligne(passwBis, false);
          document.getElementById(txt).innerHTML = "";
          return false;
        }
      }
      </script>


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
	</div>
	<div style="text-align: center;">
		<a href="index.php">Retour à la page d'accueil</a>
	</div>
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
