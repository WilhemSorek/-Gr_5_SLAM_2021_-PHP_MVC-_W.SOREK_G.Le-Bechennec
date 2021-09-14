<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=gsbV2;charset=utf8', 'root', '');

$mois = $_POST['mois'];
$nbjusti = $_POST['number'];
switch ($_POST['idfrais']) {
	case 'ETP':
	$montant = 110;
		break;
	case 'KM':
	$montant = 1;
	break;
	case 'NUI':
	$montant = 80;
	break;
	case 'REP':
	$montant = 25;
		break;
}
	$montant = $montant * $nbjusti;
$requetesql = $bdd->prepare('INSERT into lignefraisforfaitvalues (:idVisiteur ,:mois ,:nbJustificatif ,:montantValide,:dateModif ,:idEtat)');
$requetesqlNbJusti = $bdd->prepare('SELECT * from fichefrais WHERE mois = ' . date("F"));
$requetesql->execute(array(
	'idVisiteur' => $_SESSION['idvisiteur'],
	 'mois' => date("F"),
	 'nbJustificatif' => $nbjusti,
	 'montantValide' => $montant,
	 'dateModif' => date("Y-m-d"),
	 'idEtat' => "CL"
	));
header('Location: acceuil.php');
  ?>