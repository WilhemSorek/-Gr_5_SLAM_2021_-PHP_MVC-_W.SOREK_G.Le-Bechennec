<!DOCTYPE html>
<html>
    <head>
        <title>GSB</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="acceuil.css">
    </head>

    <body>
        <?php
        session_start();
        $today = date("Y-m-d");
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
        try {
            $selectFicheFrais = $bdd->prepare("SELECT all from fichefrais WHERE idVisiteur = " . $_SESSION['idvisiteur'] . " and mois = " . $datefr);
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }

        $selectFicheFrais->execute();
        if ($selectFicheFrais->fetch() == false)
        {
            $creationFicheFrais = $bdd->prepare("INSERT into fichefrais values (:idVisiteur, :mois, :nbJustificatifs, :montantValide, :dateModif, :idEtat)");
            $creationFicheFrais->execute(array(
                'idVisiteur' => $_SESSION['idvisiteur'],
                'mois' => $datefr,
                'nbJustificatifs' => 0,
                'montantValide' => 0,
                'dateModif' => $today,
                'idEtat' => "CR"
            ));
            $creationLigneETP = $bdd->prepare("INSERT INTO lignefraisforfait values (:idVisiteur, :mois, :idFraisForfait, :quantite)");
            $creationLigneETP->execute(array(
                'idVisiteur' => $_SESSION['idvisiteur'],
                'mois' => $datefr,
                'idFraisForfait' => "ETP",
                'quantite' => 0
            ));
            $creationLigneKM = $bdd->prepare("INSERT INTO lignefraisforfait values (:idVisiteur, :mois, :idFraisForfait, :quantite)");
            $creationLigneKM->execute(array(
                'idVisiteur' => $_SESSION['idvisiteur'],
                'mois' => $datefr,
                'idFraisForfait' => "KM",
                'quantite' => 0
            ));
            $creationLigneNUI = $bdd->prepare("INSERT INTO lignefraisforfait values (:idVisiteur, :mois, :idFraisForfait, :quantite)");
            $creationLigneNUI->execute(array(
                'idVisiteur' => $_SESSION['idvisiteur'],
                'mois' => $datefr,
                'idFraisForfait' => "NUI",
                'quantite' => 0
            ));
            $creationLigneREP = $bdd->prepare("INSERT INTO lignefraisforfait values (:idVisiteur, :mois, :idFraisForfait, :quantite)");
            $creationLigneREP->execute(array(
                'idVisiteur' => $_SESSION['idvisiteur'],
                'mois' => $datefr,
                'idFraisForfait' => "REP",
                'quantite' => 0
            ));
        }
        ?>
        <img class="logo" src="logogsb.png" alt="logo">
         <?php  echo "bonjour ".$_SESSION['prenom']; ?>

        <div class="titre">Veuillez cliquez sur l'icone correspondant à votre choix :</div>

        <div class="renseignez">Renseignez fiche de frais</div>
        <a href="rdf.php"><img class="logo1" src="11268s.png" alt="logo1"></a>

        <div class="consultez">Consultez fiche de frais</div>
        <a href="vdf.php"><img class="logo2" src="obligation.jpg" alt="logo2"></a>

        <a href="connexion.php"><img class="sortie" src="decos1.png" alt="logo3"></a>
       
    </body>
</html>