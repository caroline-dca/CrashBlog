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
    <h1><a href="http://localhost/dev/CrashBlog/index.php">Crash Blog</a></h1>
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
                            
                  // if (isset($_POST))){
                    if (isset($_POST["name"])){
                      $email = $_POST["email"];
                      $name = $_POST["name"]; 
                      if ($name){
                        $requete->execute();
                        echo "<script> alert('Instertion OK') </script>";
                      }

                     
                    }
                      // else {
                      //    echo "<script> alert('Nom obligatoire') </script>";
                      // }
                  // }
                  

            }
        catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
            die();
            }


        ?> 


    <div id = "listeAuteurs">
        <p>Liste des auteurs déjà enregistrés:</p>     
        <!-- <table>
          <tr><td>Nom</td><td>Prénom</td></tr>        
          <tr><td>a</td><td>aa</td></tr>
          <tr><td>b</td><td>bb</td></tr>  
        </table> -->


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
                
                  echo '<table>'."\n";
                  echo '<tr>';
                  echo '<td>Nom/Prénom/Pseudo</td>';
                  echo '<td>Email</td>';
                  echo '</tr>'."\n";
                  foreach($conn->query("SELECT * FROM Auteur") as $row) {
                      echo '<tr>';
                      echo '<td>'.$row["Nom_Auteur"].'</td>';
                      echo '<td>'.$row["Mail_Auteur"].'</td>';
                      echo '</tr>'."\n";
                      }
                  echo '</table>'."\n";

                  }
              catch(PDOException $e)
                  {
                  echo "Connection failed: " . $e->getMessage();
                  die();
                  }

                  $conn->close();

                  if (!isset($_POST["submit"])){
                    session_destroy();
                }
              ?>     
    </div>
  </main>
</body>
</html>
