<?php

require_once 'controleurAuthentification.php';
require_once 'controleurInscriptionEtu.php';
require_once 'controleurInscriptionEnt.php';
require_once 'controleurConfirmationInscription.php';
require_once 'controleurOubliMdp.php';
require_once 'controleurLost.php';
require_once 'controleurMenu.php';
require_once 'controleurProfil.php';
require_once __DIR__."/../modele/dao/dao.php";

class Routeur {

  private $ctrlAuthentification;
  private $ctrlInscriptionEtu;
  private $ctrlInscriptionEnt;
  private $ctrlConfirmationInscription;
  private $ctrlOubliMdp;
  private $ctrlLost;
  private $ctrlProfil;
  private $dao;

  public function __construct() {
    $this->ctrlAuthentification= new ControleurAuthentification();
    $this->ctrlInscriptionEnt= new ControleurInscriptionEnt();
    $this->ctrlInscriptionEtu= new ControleurInscriptionEtu();
    $this->ctrlConfirmationInscription= new ControleurConfirmationInscription();
    $this->ctrlOubliMdp= new ControleurOubliMdp();
    $this->ctrlMenu = new ControleurMenu();
    $this->ctrlLost = new ControleurLost();
    $this->ctrlProfil = new ControleurProfil();
    $this->dao = new Dao();
  }

  // Traite une requête entrante
  public function routerRequete() {

    if (isset($_GET['profil']) && isset($_GET['type']) && isset($_SESSION['type_connexion'])) {
            if ($_GET['type'] == "tmpEnt") {
              $this->ctrlProfil->afficherProfil("entreprise",$this->dao->getTempEnt($_GET['profil']));
              return;
            }
            if ($_GET['type'] == "tmpEtu") {
            $this->ctrlProfil->afficherProfil("etudiant",$this->dao->getTempEtu($_GET['profil']));
            return;
         }
          if ($_GET['type'] == "Ent") {
            $this->ctrlProfil->afficherProfil("entreprise",$this->dao->getEnt($_GET['profil']));
            return;
          }
          if ($_GET['type'] == "Etu") {
            $this->ctrlProfil->afficherProfil("etudiant",$this->dao->getEtu($_GET['profil']));
            return;
          }
    }

    if (isset($_POST['changementConfig'])) {
      if ($_POST['heureDebutMatin'] != "") {
        $this->dao->editHeureDebutMatin($_POST['heureDebutMatin']);
      } 
      if ($_POST['heureDebutAprem']  != "") {
        $this->dao->editHeureDebutAprem($_POST['heureDebutAprem']);
      } 
      if ($_POST['nbCreneauxMatin'] != "") {
        $this->dao->editNbCreneauxMatin($_POST['nbCreneauxMatin']);
      } 
      if ($_POST['nbCreneauxAprem'] != "") {
        $this->dao->editNbCreneauxAprem($_POST['nbCreneauxAprem']);
      } 
      if ($_POST['dureeCreneau'] != "") {
        $this->dao->editDureeCreneau($_POST['dureeCreneau']);
      }
      $this->ctrlMenu->afficherMenu(3);
      return;
    }

    if (isset($_GET['error'])) {
      $_SESSION['fail'] = "Êtes-vous perdu(e) ? Il semblerait qu'un imprévu<br/>soit arrivé. Refaites donc votre choix pour retrouver<br/>vos marques.";
      $this->ctrlLost->genererLost();
      return;
    }

    if (isset($_POST['inscription'])) {
      if ($_POST['inscription'] == "etudiant") {
        if ($this->dao->ajoutEtudiant()) {
        	$this->ctrlConfirmationInscription->genereVueConfirmationInscription();
        	return; 
        }
        else {
        	$_SESSION['fail'] = "Une autre personne du même nom ou utilisant cette<br/>adresse email semble déjà inscrite.<br/>Veuillez réessayer avec une autre adresse ou<br/>vérifiez que vous n'êtes pas déjà inscrit.";
        	$this->ctrlLost->genererLost();
      		return;
        }
      }
      if ($_POST['inscription'] == "entreprise") {
        if($this->dao->ajoutEntreprise()) {
        	$this->ctrlConfirmationInscription->genereVueConfirmationInscription();
        	return;
        }
       else {
       		//$_SESSION['fail'] = "Cette adresse email a déjà été utilisée ou cette<br/>entreprise est déjà inscrite à l'événement.<br/>Veuillez vérifier que vous n'êtes pas déjà inscrit<br/>ou réessayez avec une autre adresse email.";
       		$this->ctrlLost->genererLost();
     		return;
       }
      }
    }

    if (isset($_GET['choix']) && isset($_GET['menu'])) {
      if ($_GET['menu'] < 1 || $_GET['menu'] > 4) {
      	$_SESSION['fail'] = "Êtes-vous perdu(e) ? Il semblerait qu'un imprévu<br/>soit arrivé. Refaites donc votre choix pour retrouver<br/>vos marques.";
        $this->ctrlLost->genererLost();
        return;
      } 
    }

    if (isset($_GET['validation']) && isset($_GET['id']) && isset($_GET['type']) && isset($_SESSION['type_connexion'])) {
      if ($_SESSION['type_connexion'] == "admin") {
        if ($_GET['type'] == "tmpEtu") {
          $this->dao->validerEtudiant($_GET['id']);
        }
        if ($_GET['type'] == "tmpEnt") {
          $this->dao->validerEntreprise($_GET['id']);
        }
        header('Location:index.php?choix=ok&menu=2');
        return;
      }
    }

    if (isset($_GET['geler']) && isset($_GET['id']) && isset($_GET['type']) && isset($_SESSION['type_connexion'])) {
      if ($_SESSION['type_connexion'] == "admin") {
        if ($_GET['type'] == "Etu") {
          $this->dao->gelerEtudiant($_GET['id']);
        }
        if ($_GET['type'] == "Ent") {
          $this->dao->gelerEntreprise($_GET['id']);
        }
        header('Location:index.php?choix=ok&menu=2');
        return;
      }
    }

    if (isset($_GET['suppression']) && isset($_GET['id']) && isset($_GET['type']) && isset($_SESSION['type_connexion'])) {
      if ($_SESSION['type_connexion'] == "admin") {
        if ($_GET['type'] == "Etu") {
          $this->dao->supprimerEtu($_GET['id']);
          header('Location:index.php?choix=ok&menu=2');
          return;
        }
        if ($_GET['type'] == "tmpEtu") {
          $this->dao->supprimerEtuTemp($_GET['id']);
          header('Location:index.php?choix=ok&menu=2');
          return;
        }
        if ($_GET['type'] == "Ent") {
          $this->dao->supprimerEnt($_GET['id']);
          header('Location:index.php?choix=ok&menu=2');
          return;
        }
        if ($_GET['type'] == "tmpEnt") {
          $this->dao->supprimerEntTemp($_GET['id']);
          header('Location:index.php?choix=ok&menu=2');
          return;
        }
      }
      header('Location:index.php?choix=ok&menu=2');
      return;
    }

  	if (isset($_GET['oubliMdp'])) {
  		$this->ctrlOubliMdp->aideOubliMdp();
  		return;
  	}

  	if (isset($_GET['inscriptionEtu'])) {
      $date = getdate();
      if ($date['mday'] > 30 && $date['mon'] >2) {
        $this->ctrlInscriptionEtu->inscriptionEtu();
        return;
      }
  	}

  	if (isset($_GET['inscriptionEnt'])) {
      $date = getdate();
      if ($date['mday'] > 17 && $date['mon'] >2) {
        $this->ctrlInscriptionEtu->inscriptionEnt();
        return;
      }
  	}

    if (isset($_GET['choix']) && isset($_SESSION['type_connexion']) && isset($_GET['menu'])) {
      if ($_SESSION['type_connexion'] == "entreprise" && $_GET['menu'] > 3) {
         $_SESSION['fail'] = "Êtes-vous perdu(e) ? Il semblerait qu'un imprévu<br/>soit arrivé. Refaites donc votre choix pour retrouver<br/>vos marques.";
         $this->ctrlLost->genererLost();
         return;
      }
      if ($_SESSION['type_connexion'] == "admin" && $_GET['menu'] > 4) {
         $_SESSION['fail'] = "Êtes-vous perdu(e) ? Il semblerait qu'un imprévu<br/>soit arrivé. Refaites donc votre choix pour retrouver<br/>vos marques.";
         $this->ctrlLost->genererLost();
         return;
      }
      $this->ctrlMenu->afficherMenu($_GET['menu']);
      return;
    }

  	if (isset($_POST['submit_login'])) {
  		$this->dao->connexion();
      if($this->dao->verifieMotDePasse($_POST['identifiant'],$_POST['password'])) {
        $_SESSION['type_connexion'] = $this->dao->getTypeUtilisateur($_POST['identifiant']);
         $this->ctrlMenu->afficherMenu(1);
         return;
      }
  	}

  	if (isset($_GET['deconnexion'])) {
  		session_destroy();
      header('Location: index.php');
  		return;
  	}

    if (isset($_SESSION['type_connexion'])) {
      $this->ctrlMenu->afficherMenu(1);
      return;
    }

  	if (isset($_POST['submit_new_mdp'])) {
  		/*
			TODO
			Modification du mdp
			Vérification de l'email donné.
			Si présent, alors détruire mdp courant
			Créer nouveau mdp
			Envoyer un email avec nouveau mdp
			$this->ctrlMenu->afficherMenu(1);
  		*/
		$_SESSION['fail'] = "Cette fonctionnalité n'est pas encore<br/>implémentée. Nous nous excusons pour cela<br/>et vous demanderons de bien vouloir faire<br/>preuve de patience.";
        $this->ctrlLost->genererLost();
        return;
  	}

  	if (isset($_POST['submit_new_choix'])) {
  		/*
			TODO
			Accès à la BDD
			Modifier valeurs des choix de l'étudiant
			$this->ctrlMenu->afficherMenu(2);
  		*/
		$_SESSION['fail'] = "Cette fonctionnalité n'est pas encore<br/>implémentée. Nous nous excusons pour cela<br/>et vous demanderons de bien vouloir faire<br/>preuve de patience.";
        $this->ctrlLost->genererLost();
        return;
  	}

  	if (isset($_POST['submit_new_formation'])) {
  		/*
			TODO
			Accès à la BDD
			Ajouter une formation à l'entreprise donnée
			$this->ctrlMenu->afficherMenu(2);
  		*/
		$_SESSION['fail'] = "Cette fonctionnalité n'est pas encore<br/>implémentée. Nous nous excusons pour cela<br/>et vous demanderons de bien vouloir faire<br/>preuve de patience.";
        $this->ctrlLost->genererLost();
        return;
  	}

  	if (isset($_POST['delete_formation'])) {
  		/*
			TODO
			Accès à la BDD
			Suppression
			$this->ctrlMenu->afficherMenu(2);
  		*/
		$_SESSION['fail'] = "Cette fonctionnalité n'est pas encore<br/>implémentée. Nous nous excusons pour cela<br/>et vous demanderons de bien vouloir faire<br/>preuve de patience.";
        $this->ctrlLost->genererLost();
        return;
  	}

  	if (isset($_POST['edition_compte'])) {
  		/*
			TODO
			Si mdp correct
			Etablir modifications
  		*/
		$_SESSION['fail'] = "Cette fonctionnalité n'est pas encore<br/>implémentée. Nous nous excusons pour cela<br/>et vous demanderons de bien vouloir faire<br/>preuve de patience.";
        $this->ctrlLost->genererLost();
        return;
  	}

  	if (isset($_POST['suppression_compte'])) {
  		/*
			TODO
			Demander confirmation de la suppression par mdp
  		*/
		$_SESSION['fail'] = "Cette fonctionnalité n'est pas encore<br/>implémentée. Nous nous excusons pour cela<br/>et vous demanderons de bien vouloir faire<br/>preuve de patience.";
        $this->ctrlLost->genererLost();
        return;
  	}

  	if (isset($_POST['confirmation_suppression_compte'])) {
  		/*
			TODO
			Désactiver le compte
			Détruire la session
  		*/
		$_SESSION['fail'] = "Cette fonctionnalité n'est pas encore<br/>implémentée. Nous nous excusons pour cela<br/>et vous demanderons de bien vouloir faire<br/>preuve de patience.";
        $this->ctrlLost->genererLost();
        return;
  	}
    $this->ctrlAuthentification->authentification();
  }

}

?>
