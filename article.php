    <p>Pour créer votre article c'est ici !</p>
    <p>N'oubliez pas de créer votre <a href="categorie.php">Catégorie</a> et votre <a href="categorie.php">Auteur</a> !</p>

    <form action="">
        Titre de l'article <input type="text" name="titre" size="50">
    </form>
    <!-- envoyer -->

 <br/>

Catégories <select size="1" class="categorie">
  <?php
    $bdd = new PDO('mysql:host=localhost;dbname=CrashBlog_Equipe1', 'eole', 'CorioMySQL&1');
    $reponse = $bdd->query('SELECT * FROM Categorie');
    while ($file = $reponse->fetch()) {
    echo "<option>", $file['Nom_Categorie'], "</option>";
    }
  ?>
            </select>

      <p class="clique1">Vous n'avez pas encore créé votre catégorie ? <a href="http://localhost/dev/CrashBlog/categorie.php"> Cliquez ici ! </a></p>

<br/>
Auteurs <select size="1" class="auteur">
  <?php
  $bdd = new PDO('mysql:host=localhost;dbname=CrashBlog_Equipe1', 'eole', 'CorioMySQL&1');
  $reponse = $bdd->query('SELECT * FROM Auteur');
  while ($file = $reponse->fetch()) {
  echo "<option>", $file['Nom_Auteur'], "</option>";
  }
  ?>
        </select>

        <p class="clique1">Vous n'avez pas encore créé votre catégorie ? <a href="http://localhost/dev/CrashBlog/auteur.php"> Cliquez ici ! </a></p>

    <form action="">
     Image <input class="clique2" size="50" type="text" placeholder="Ex: http://www...">
    </form>

      <textarea name="article" rows="30" cols="63" placeholder="Votre Article..."></textarea>

      <form action="">
        <input type="submit">
      </form>
