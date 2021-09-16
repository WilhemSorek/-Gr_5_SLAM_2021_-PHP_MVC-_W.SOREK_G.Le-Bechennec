<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=gsbV2;charset=utf8', 'root', '');
switch (date("F")) {
            case 'January':
                $datefr = "Janvier";
                break;
            case 'Februar':
            $datefr = "Fevrier";
            break;
             case 'March':
             $datefr = 'Mars';
            break;
             case 'April':
             $datefr = "Avril";
            break;
             case 'May':
             $datefr = "Mai";
            break;
             case 'June':
             $datefr = 'Juin';
            break;
             case 'July':
             $datefr = 'Juillet';
            break;
             case 'August':
             $datefr = "Aout";
            break;
             case 'September':
             $datefr = 'Septembre';
            break;
             case 'October':
             $datefr = 'Octobre';
            break;
             case 'November':
             $datefr = 'Novembre';
            break;
             case 'December':
             $datefr = 'Decembre';
            break;
        }
        $today = date("Y-m-d");

$requetesql = $bdd->prepare('INSERT into lignefraishorsforfait (idVisiteur, mois, libelle, date, montant) values (:idVisiteur ,:mois ,:libelle ,:date , :montant');
$requetesql->bindparam(':idVisiteur', $_SESSION['idvisiteur']);
$requetesql->bindparam(':mois', $datefr);
$requetesql->bindparam('libelle', $_POST['libelle']);
$requetesql->bindparam(':date', $today);
$requetesql->bindparam(':montant',$_POST['montant']);
$requetesql->execute();
	header('Location: acceuil.php');
  ?>