<?php
  $serveur = "localhost";
  $login = "keitaro";
  $pass = "27288066a";

  try {
    $connexion = new PDO("mysql:host=$serveur;dbname=CrashBlog_Equipe1", $login, $pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  catch(PDOException $e){
    echo 'Echec:' .$e->getMessage();
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Crash Blog</title>
  <link href="https://fonts.googleapis.com/css?family=Krona+One|Montserrat|Titillium+Web" rel="stylesheet">
</head>
<body>

  <header>
    <h1><a href="http://localhost/dev/CrashBlog/index.php">Crash Blog</a></h1>
  </header>

  <main>

    <p>Pour créer votre article c'est ici !</p>
    <p>N'oubliez pas de créer votre <a href="categorie.php">Catégorie</a> et votre <a href="categorie.php">Auteur</a> !</p>

    <form method="post">
        Titre de l'article <input type="text" name="titre" size="50">
    
    <!-- envoyer -->
    
 <br/>   

Catégories <select size="1" class="categorie" name="cate">
  <?php
    $bdd = new PDO('mysql:host=localhost;dbname=CrashBlog_Equipe1', 'keitaro', '27288066a');
    $reponse = $bdd->query('SELECT * FROM Categorie');
    while ($file = $reponse->fetch()) {
    echo "<option>", $file['Nom_Categorie'], "</option>";
    }
  ?>
            </select>

      <p class="clique1">Vous n'avez pas encore créé votre catégorie ? <a href="http://localhost/dev/CrashBlog/categorie.php"> Cliquez ici ! </a></p>

<br/>
Auteurs <select size="1" class="auteur" name="auteur">
  <?php
  $bdd = new PDO('mysql:host=localhost;dbname=CrashBlog_Equipe1', 'keitaro', '27288066a');
  $reponse = $bdd->query('SELECT * FROM Auteur');
  while ($file = $reponse->fetch()) {
  echo "<option>", $file['Nom_Auteur'], "</option>";
  }

  $titre = $_POST['titre'];
  $cat = $_POST['cate'];
  $auteur = $_POST['auteur'];
  $image = $_POST['image'];

  $requete = $bdd->prepare("INSERT INTO Article(Titre, URL_image, Auteur, Categorie) VALUES('$titre', '$image', '$auteur', '$cat')");
  $requete->execute(array($titre, $image, $auteur, $cat));
  ?>
        </select>
      
        <p class="clique1">Vous n'avez pas encore créé votre auteur ? <a href="http://localhost/dev/CrashBlog/auteur.php"> Cliquez ici ! </a></p>

    
     Image <input class="clique2" size="50" type="text" name="image" placeholder="Ex: http://www...">

      <textarea name="article" rows="30" cols="63" placeholder="Votre Article..."></textarea>

      <br/>
        <input type="submit">
      </form> 
  </main>
</body>
</html>