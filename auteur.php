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
   
           $requete = $conn->prepare(
                "INSERT INTO Auteur (Nom_Auteur,Mail_Auteur)
                VALUES  (:name, :email)"
           );

           $requete->bindParam(':name', $name);
           $requete->bindParam(':email', $email);
                     
           $email = $_POST["email"];
           $name = $_POST["name"];
           
           if ($name){
             $requete->execute();
           }
           else {
             echo "<script> alert('Nom obligatoire') </script>";
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
