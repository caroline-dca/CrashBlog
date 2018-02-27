<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Crash Blog</title>
  <link rel="stylesheet" href="css/base.css">
  <link rel="stylesheet" href="css/form.css">
  <link href="https://fonts.googleapis.com/css?family=Krona+One|Montserrat|Titillium+Web" rel="stylesheet">
</head>
<body>

  <header>
    <h1>Crash Blog</h1>
  </header>

  <main>
  <h2>Ajouter un auteur :</h2>
    <section>
    
    <form method="post" action = "" id="form">
      
      <p>
        <label for="name">Nom, prénom ou pseudo</label>
        <input type="text" name="name" id="name">
      </p>
      <p>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
      </p>
      <p>
        <input type="submit" id="submit" value="Ajouter">
      </p>

    </form>


                 
    </section>

    <p> <?php 
    
    // if (isset($_POST["submit"])) {
      $email = $_POST["email"];
      $name = $_POST["name"];
      if ($email){
        echo "<p> Votre email: " . $email . "</p>";
      } 
      if ($name){
        echo "<p> Votre nom: " . $name . "</p>";
      }   

  ?> 
  </p>
  </main>

  <?php


$servername = "localhost";
$username = "caroline";
$password = "LvebdlB2022";
$dbname = "CrashBlog_Equipe1";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
   
           foreach($conn->query("SELECT * FROM Auteur" as $row) {

            echo '<p>'.$row["Nom_Auteur"].'</p>';
            echo '<p>'.$row["Email_Auteur"].'</p>';

            }

    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    die();
    }


$conn->close();
?> 
</body>
</html>
