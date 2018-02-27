<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Crash Blog</title>
  <link rel="stylesheet" media="screen and (max-width: 460px)" href="css/xs.css">
  <link rel="stylesheet" media="screen and (min-width: 461px) and (max-width: 780px)" href="css/small.css">
  <link rel="stylesheet" media="screen and (min-width: 781px) and (max-width: 1200px)" href="css/medium.css">
  <link rel="stylesheet" media="screen and (min-width: 1201px)" href="css/large.css">
  <link rel="stylesheet" href="css/base.css">
  <link rel="stylesheet" href="css/form.css">
  <link href="https://fonts.googleapis.com/css?family=Krona+One|Montserrat|Titillium+Web" rel="stylesheet">
</head>
<body>

  <header>
    <h1>Crash Blog</h1>
  </header>

  <main>

    <p>Bienvenue sur le blog des Crash Coders. Vous trouverez ici nos articles, publiés au fil de la formation.</p>
    <p>Sentez-vous libres de contribuer !</p>

    <section>

        <div id='creation'>
          <h2>Création&nbsp;:</h2>
          <p><a href="auteur.php">Auteur</a></p>
          <p><a href="categorie.php">Catégorie</a></p>
          <p><a href="article.php">Article</a></p>
          </h3>
        </id>
      </div>

      <div class="separateur"></div>

      <div id='consult'>
        <h2>Consultation&nbsp;:</h2>
          <p><a href="consultation.php">Articles en ligne</a></p>
      </div>

    </section>

    <?php include 'categorie.php'; ?>
  </main>
</body>
</html>
