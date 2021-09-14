<!DOCTYPE html>

<html>
    <head>
         <meta charset="utf-8">
         <title>Acceuil</title>
 		     <link rel="stylesheet" href="vdf.css">
    </head>
       <body>
        <a href="acceuil.php">
        <img class="im1" 
    src="fleche.png"
    height="40px"
    width="60px"/>  </a>
         <img class="im2" 
    src="logogsb.png"
    height="200px"
    width="350px"/> 
  <?php
 
    $bdd = new PDO('mysql:host=localhost;dbname=gsbV2;charset=utf8', 'root', '');

    session_start();

    $reponse = $bdd->prepare("SELECT * from fichefrais WHERE idVisiteur = ?");
    $donnees = $reponse->execute(array($_SESSION['idvisiteur']));

    while ($donnees = $reponse->fetch()) 
    {
      ?>
      <p>
        <STRONG> ID VISITEUR </STRONG> <?php echo $donnees['idVisiteur']; ?> <br>
        <strong> Mois </strong> <?php echo $donnees['mois']; ?> <br>
        <strong>nb justificatif</strong> <?php echo $donnees['nbJustificatifs']; ?> <br>
        <STRONG> montant Valide </STRONG> <?php echo $donnees['montantValide']; ?><br>
        <strong>date modif</strong> <?php echo $donnees['dateModif']; ?> <br>
        <strong>id Etat</strong> <?php echo $donnees['idEtat']; ?> <br>
      </p> 
      <?php
    }
    $reponse->closeCursor();
  ?>
      </body>
</html>