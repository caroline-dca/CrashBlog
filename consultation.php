<!-- Code by Tony -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="developpement" />
  <title>CrashBlog</title>
</head>

<body>

<!-- Barre de recherche -->
<!-- <input class="search" type="text" placeholder="search">
<input type="submit" value="ok"> -->


<!-- Filtre par Auteur et Catégorie -->
    <form action="consultation.php" method="post">
        <select name="auteurs" >
            <option value="autor">Auteur</option>
            <?php
              include "param.php";
              $base = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
              $reponse = $base->query("SELECT *, DATE_FORMAT(Date_Creation,'%d/%m/%Y %H:%i') as Date FROM Article");
              $aut = $base->query('SELECT * FROM Auteur');
              while ($donnees = $aut->fetch())
              {
              ?>
                  <option value="<?php echo($donnees['Nom_Auteur']) ?>"><?php echo($donnees['Nom_Auteur']) ?></option>
              <?php
              }
              $aut->closeCursor();
            ?>
        </select>
        <select name="categ">
            <option value="categorie">Catégorie</option>
            <?php
              $cato = $base->query('SELECT * FROM Categorie');
              while ($donnees = $cato->fetch())
              {
            ?>
                <option value="<?php echo($donnees['Nom_Categorie']) ?>"><?php echo($donnees['Nom_Categorie']) ?></option>
            <?php
                }
                $cato->closeCursor();
            ?>
        </select>
        <input type="submit" value="Trier" name="sub">
    </form>

    <?php
    
    // $reponse = $base->query('SELECT * FROM Article');
    // if (isset($_POST["sub"])){
       
        if(isset($_POST["auteurs"]) && $_POST["auteurs"]!==autor){
            $done = $_POST["auteurs"];
            $reponse = $base->prepare("SELECT *, DATE_FORMAT(Date_Creation,'%d/%m/%Y %H:%i') as Date  FROM Article WHERE Auteur = ? ");
            $reponse->execute(array($done));  
        }
       
        elseif(isset($_POST["categ"]) &&  $_POST["categ"]!==categorie){
            $dcate = $_POST["categ"];
            $reponse = $base->prepare("SELECT *, DATE_FORMAT(Date_Creation,'%d/%m/%Y %H:%i') as Date  FROM Article WHERE Categorie = ? ");
            $reponse->execute(array($dcate));  
        } else
        { 
            // echo "<p> Pas de tri </p>" ;
           $reponse = $base->query("SELECT *, DATE_FORMAT(Date_Creation,'%d/%m/%Y %H:%i') as Date  FROM Article"); 
        } 
        // }  

    

  echo "<table id='t_consult'>";
  echo "<th>"."Titre"."</th>";
  echo "<th>"."Date de création"."</th>";
  echo "<th>"."URL de l'image"."</th>";
  echo "<th>"."Auteur"."</th>";
  echo "<th>"."Catégorie"."</th>";

  while ($donnees = $reponse->fetch()) {
      echo "<tr>";
      echo "<td>" . $donnees['Titre'] . "</td>";
      echo "<td>" . $donnees['Date'] . "</td>";
      echo "<td><img src='" . $donnees['URL_image'] . "'></td>";
      echo "<td>" . $donnees['Auteur'] . "</td>";
      echo "<td>" . $donnees['Categorie'] . "</td>";
      echo "</tr>";
    }
    $reponse->closeCursor();
  echo "</table>";

?>



</body>
</html>
