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

    $reponse = $bdd->prepare("SELECT * from lignefraisforfait WHERE idVisiteur = ?");
    $donnees = $reponse->execute(array($_SESSION['idvisiteur']));
    ?>
        <h1>Frais Forfait</h1>
        <?php
    while ($donnees = $reponse->fetch()) 
    {
      ?>
      <p>
        <STRONG> ID VISITEUR </STRONG> <?php echo $donnees['idVisiteur']; ?> <br>
        <strong> Mois </strong> <?php echo $donnees['mois']; ?> <br>
        <strong> ID Frais Forfait </strong> <?php echo $donnees['idFraisForfait']; ?> <br>
        <STRONG> Quantité </STRONG> <?php echo $donnees['quantite']; ?><br>
      </p> 
      <?php
    }
    $reponse->closeCursor();
  ?>
  <h1>Frais Hors Forfait</h1>
  <?php 
  $reponse = $bdd->prepare("SELECT * from lignefraishorsforfait WHERE idVisiteur = ?");
  $donnees = $reponse->execute(array($_SESSION['idvisiteur']));
  while($donnees = $reponse->fetch())
  {
    ?>
    <p>
      
      <strong> Id Frais </strong> <?php echo $donnees['id']; ?> <br>
      <strong> ID VISITEUR </strong> <?php echo $donnees['idVisiteur']; ?> <br>
      <strong> Mois </strong> <?php echo $donnees['mois']; ?> <br>
      <strong> Libelle </strong> <?php echo $donnees['libelle']; ?> <br>
      <strong> Date </strong><?php echo $donnees['date']; ?> <br>
      <strong> montant </strong><?php echo $donnees['montant']; ?> <br>
    </p>
    <?php
  }
  $reponse->closeCursor();
  ?>
  </body>
</html>