<?php
	//$bdd = mysqli_connect("localhost", "root", "", "gsbv2");

	$bdd = new PDO('mysql:host=localhost;dbname=gsbV2;charset=utf8', 'root', '');

	$login = $_POST['identifiant'];
	$mdp = $_POST['password'];
	
			session_start();
			$requeteid = $bdd->prepare("SELECT id from visiteur WHERE login = ? AND mdp = ?");
			$requeteid->execute(array($login, $mdp));

			$requeteprenom = $bdd->prepare("SELECT prenom from visiteur WHERE login = ? AND mdp = ?");
			$requeteprenom->execute(array($login,$mdp));

			$_SESSION['idvisiteur'] = $requeteid->fetch()[0];
			$_SESSION['prenom'] = $requeteprenom->fetch()[0];

			header('Location: acceuil.php');
  ?>