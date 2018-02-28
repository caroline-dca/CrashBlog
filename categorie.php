<!-- Code by Laure -->
<form action="" method="POST">
  <label for='newCat'>Catégories :
    <div id="cat">
<?php

  $servername = "localhost";
  $database = 'CrashBlog_Equipe1';
  $username = "eole";
  $password = "CorioMySQL&1";

  try {
      $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $requete = $conn->prepare('INSERT INTO Categorie VALUES (:categorie)');
      $requete->bindParam(':categorie', $cat);

      foreach ($conn->query('SELECT * FROM Categorie') as $ligne) {
          print_r('<p><input type="radio" name="Categorie" value="' . substr($ligne['Nom_Categorie'], 0, 4) . '">' . $ligne['Nom_Categorie'] . '</p>');
          $conn = null;
        }
      if (($_POST <> "") && ($_POST <> "Nouvelle catégorie") && isset($_POST['newCat'])) {

          if ( preg_match('/^[A-Za-zá-œ\.\- ]+$/', $_POST['newCat']) ) {
            $cat = $_POST['newCat'];
            $requete-> execute();
            echo '<p>Catégorie créée.</p>';
          }
          elseif (!isset($_POST['Categorie'])) {
            echo "<p>Erreur</p>";
          }
          else {
            echo '<p align="center">Catégorie sélectionnée.</p>';
          }
        }
      }
  catch(PDOException $e) {
    echo "L'insertion a échoué, veillez à nommer une catégorie non existante avec des caractères autorisés. <br>";
    echo $e->getMessage();
      }
  unset($_POST);
?>
    <p>
      <input type="radio" name="Categorie" value="newCat">
      <input type="text" id="newCat" name="newCat" placeholder="Nouvelle catégorie">
    </p>
  </div>
  <center><input type='submit'></center>
</form>
