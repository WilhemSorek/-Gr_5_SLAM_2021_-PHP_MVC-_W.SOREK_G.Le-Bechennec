<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Acceuil</title>
    <link rel="stylesheet" href="rdf.css">
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

    <h2>Frais forfait</h2>
    <form class="Form1" method="post" action="creationfichefrais.php">
      <label for="idetat">Renseignez le frais forfaitisé</label>
      <select name="idfrais" id="idfrais"> 
        <option value="ETP"> Forfait étape </option>
        <option value="KM"> Frais Kilométrique </option>
        <option value="NUI"> Nuitée Hotel </option>
        <option value="REP"> Repas Restaurant </option>
      </select>
      <br>
      <br>
      <input type="number" name="quantite" min="0" value="0">
      <input type="submit" value="Envoyer">
  </form>

  <h2>Frais Hors Forfait</h2>
  <form method="post" action="creationfichehorsfrais.php">
      <label>Renseignez l'objet du frais à rembourser</label>
      <input type="text" name="libelle">
      <br>
      <br>
      <label>Renseignez le montant</label>
      <input type="number" name="montant" min="0">
      <br>
      <input type="submit" value="Envoyer">
  </form>
</body>
</html>