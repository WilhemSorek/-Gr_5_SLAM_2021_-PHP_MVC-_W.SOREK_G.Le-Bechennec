<?php
//acces au controller parent pour l heritage
namespace App\Controllers;
use CodeIgniter\Controller;

//=========================================================================================
//définition d'une classe Controleur (meme nom que votre fichier Controleur.php) 
//héritée de Controller et permettant d'utiliser les raccoucis et fonctions de CodeIgniter
//  Attention vos Fichiers et Classes Controleur et Modele doit commencer par une Majuscule 
//  et suivre par des minuscules
//=========================================================================================

class Controleur extends Controller {

//=====================================================================
//Fonction index correspondant au Controleur frontal (ou index.php) en MVC libre
//=====================================================================
public function index()
{

	if(isset($_GET['action']))
	{
		switch ($_GET['action'])
		{
			case "consulter":
				$this->consulter();
			break;

			case "renseigner":
				$this->renseigner();
			break;

			case "deco":
				$this->deconnexion();
			break;
			case 'retouracc':
				$this->retourAcc();
			break;
		}

	}

	elseif (isset($_POST['identifiant']))
	{
		$this->verif($_POST['identifiant'], $_POST['password']);
	}
	elseif (isset($_POST['quantite']))
	{
		$this->updateFrais();
	}
	elseif (isset($_POST['libelle']))
	{
		$this->insertHorsForfait();
	}
	else
	{
	$this->connexion();
	}


}
public function updateFrais()
{
	session_start();
		$Modele = new \App\Models\Modele();

		$donnees = $Modele->updateFrais($_POST['quantite'], $_POST['idfrais']);

		echo view('acceuil.php');
}
public function insertHorsForfait()
{
	session_start();
		$Modele = new \App\Models\Modele();

		$donnees = $Modele->insertFraisHF($_SESSION['id'], $Modele->moisTrad(), $_POST['libelle'], $Modele->today(), $_POST['montant']);

		echo view('acceuil.php');
}
public function retourAcc()
{
	echo view('acceuil.php');
}
public function connexion()
{
	echo view('connexion.php');
}

public function deconnexion()
{
	session_start();
	session_destroy();
	echo view('connexion.php');
}

public function consulter()
{
	session_start();
	$Modele = new \App\Models\Modele();

	$donneesHF = $Modele->selectVDHF($_SESSION['id'], $Modele->moisTrad());
	$donnees = $Modele->selectVDF($_SESSION['id'], $Modele->moisTrad());
	
	$data['resultat'] = $donnees;
	$data['resultatHF'] = $donneesHF;
	
	echo view('vdf.php', $data);
}

public function renseigner()
{
	echo view('rdf.php');
}

public function verif($id, $mdp)
{
	
	$Modele = new \App\Models\Modele();
		
		$donnees = $Modele->login($id, $mdp);
		
		$data['resultat']=$donnees;
  		
		
		if (!empty($data['resultat'][0]->id))
		{
			session_start();
			$_SESSION['id']=$data['resultat'][0]->id;
			echo view("acceuil.php");
		}
  		else
		{
		  echo view("connexion.php");
		}
}


public function accueil() {
	    //================
		//acces au modele
		//================
		$Modele = new \App\Models\Modele();
		
	    //===============================
		//Appel d'une fonction du Modele
		//===============================	
		$donnees = $Modele->getBillets();
		
		//=================================================================================
		//!!! Création d'un jeu de données $data sécurisé pouvant etre passé à la vue
		//!!! on créé une variable qui récupère le résultat de la requete : $getBillets();
		//=================================================================================
		$data['resultat']=$donnees;
		
		//==========================================
		//on charge la vue correspondante
		//et on envoie le jeu de données $data à la vue
		//la vue aura acces a une variable $resultat
		//==========================================s
		echo view('vueAccueil',$data);
}

// Action 2 : Affiche les détails sur un billet
public function billet($idBillet) {
		//================
		//acces au modele
		//================
		$Modele = new \App\Models\Modele();
		
		//===============================
		//Appel d'une fonction du Modele
		//===============================	
		$donnees = $Modele->getDetails($idBillet);
		
		//=================================================================================
		//!!! Création d'un jeu de données $data sécurisé pouvant etre passé à la vue
		//!!! on créé une variable qui récupère le résultat de la requete : $getBillets();
		//=================================================================================
		$data['resultat']=$donnees;
  		
		//==========================================
		//on charge la vue correspondante
		//et on envoie le jeu de données $data à la vue
		//la vue aura acces a une variable $resultat
		//==========================================
  		echo view('vueBillet',$data);
  
}

// Affiche une erreur
public function erreur($msgErreur) {
  echo view('vueErreur.php', $data);
}

//==========================
//Fin du code du controleur simple
//===========================

//fin de la classe
}



?>