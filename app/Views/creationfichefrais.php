<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=gsbV2;charset=utf8', 'root', '');

$requetesql = $bdd->prepare('UPDATE lignefraisforfait SET quantite = :quantite WHERE idFraisForfait = :idff');
$requetesql->bindparam(':quantite', $_POST['quantite']);
$requetesql->bindparam(':idff', $_POST['idfrais']);
	try {
	$requetesql->execute();	
} catch (Exception $e){
	echo "erreur : " . $e->getMessage();
}
header('Location: acceuil.php');
  ?>