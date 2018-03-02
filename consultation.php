<!-- Code by Tony -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="developpement" />
  <title>CrashBlog</title>
</head>

<body>

<input class="search" type="text" placeholder="search">
<input type="submit" value="ok">

<select class= "trier">
  <option value="">Titre</option>
  <option value="">Date_Creation</option>
  <option value="">URL_image</option>
  <option value="">Auteur</option>
  <option value="">categorie</option>
 </select>
 <input type="submit" value="ok" id="tri">

<?php

  include "param.php";

  $base = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  $reponse = $base->query("SELECT *, DATE_FORMAT(Date_Creation,'%d/%m/%Y %H:%i') as Date FROM Article");

  echo "<table id='t_consult'>";
  echo "<th>"."Titre"."</th>";
  echo "<th>"."Date_Creation"."</th>";
  echo "<th>"."URL_image"."</th>";
  echo "<th>"."Auteur"."</th>";
  echo "<th>"."Categorie"."</th>";
// DATE_FORMAT(ApprenantDateNaiss,'%d/%m/%Y') as DateNaiss
    while ($file = $reponse->fetch()) {
      echo "<tr>";
      echo "<td>" . $file['Titre'] . "</td>";
      echo "<td>" . $file['Date'] . "</td>";
      echo "<td><img src='" . $file['URL_image'] . "'></td>";
      echo "<td>" . $file['Auteur'] . "</td>";
      echo "<td>" . $file['Categorie'] . "</td>";
      echo "</tr>";
    }

  echo "</table>";
?>


<FORM method="POST">
<input type="text" name="Titre">
<SELECT name="nomAuteur" >
<?php

  include "param.php";

  $bdd = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

  $reponse = $bdd->query('SELECT * FROM Auteur');

  while ($file = $reponse->fetch()) {
    echo "<option>", $file['Nom_Auteur'], "</option>";
  }

?>
</form>

</body>
</html>
