<!-- Code by Laure -->
<?php


$servername = "localhost";
$database = 'CrashBlog_Equipe1';
$username = "eole";
$password = "CorioMySQL&1";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Connected successfully";
    print_r('<input list="Categorie" placeholder="Catégories existantes">');
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

    echo "<input type='text' name='newCat' placeholder='Nouvelle catégorie'>";

// $query = "SELECT nom_pays FROM pays_table WHERE nom_pays='FRANCE'";
//         $result = db_query($query);
//         $row = db_fecth_array($result);
//         $pays = $row[0];

?>

<!-- <label for='newCat'>Catégories :  -->
