<!DOCTYPE html>
<?php 
session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Acceuil</title>
 		<link rel="stylesheet" href="acceuil.css">
       <body>
<img
    src="logogsb.png"
    height="40px"
    width="60px"/>	
    
    	 <?php 
    echo "bonjour ".$_SESSION['prenom']; ?>
<h1 class="DROITE">
	<a href="connexion.php">
	<img
    src="deco.jpg"
    height="30px"
    width="30px"
    /> </a>
     </h1>
   
  
<div class="div">
     <P><strong>Consulter fiche de frais</strong></P>
     <a href="vdf.php">
     <img
    src="obligation.jpg"
    height="400px"
    width="400px"/>  </a>
</div>
<div class="div2">
  <P><strong>Renseigner fiche de frais</strong></P>
  <a href="rdf.php">
     <img
    src="11268.png"
    height="400px"
    width="400px"/>  </a>
</div>

<?php 
echo $_SESSION['idvisiteur'];
 ?>
</body>
</html>