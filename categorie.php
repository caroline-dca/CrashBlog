<!-- Code by Laure -->
<?php

// echo "<input type='text' name='newCat' placeholder='catégorie'>";

$servername = "localhost";
$database = 'CrashBlog_Equipe1';
$username = "eole";
$password = "CorioMySQL&1";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Connected successfully";
    print_r('<input list="Categorie" placeholder="Choix de catégorie">');
    print_r('<datalist id="Categorie">');
    foreach ($conn->query('SELECT * FROM Categorie') as $ligne) {
        print_r('<option value="' . $ligne[Nom_Categorie] . '">');
        $conn = null;
      }
    print_r('</datalist>');
    }
catch(PDOException $e) {
  echo "La connexion a échoué : " . $e->getMessage();
    }


// $query = "SELECT nom_pays FROM pays_table WHERE nom_pays='FRANCE'";
//         $result = db_query($query);
//         $row = db_fecth_array($result);
//         $pays = $row[0];

?>

<!-- <label for='newCat'>Catégories :  -->
