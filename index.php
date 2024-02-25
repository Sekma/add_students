<?php
// Faire la connexion à la base de données actor $pdo

//solution 1

/* $url = 'mysql:host=localhost;port=3306;dbname=school';
$username = 'root';
$password = '';

try{
    $pdo = new PDO($url, $username, $password);
}
catch(PDOException $error){
    echo 'connection failed: '.$error->getMessage();
}
 */

//solution 2 (correction)

$options = [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // flux/échange des données PHP/MySQL en utf8
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  // afficher les messages d'erreurs 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // données SQL dans un tableau associatif PHP
];

$pdo = new PDO(
    'mysql:host=localhost;dbname=school', // chaîne de connexion à la base de données actor
    'root', // login
    '',    // password aucun sur le serveur local
    $options
);

$title = "Acteurs";

// 1/ Traiter les données POST, si empty retourne true c'est que la super variable $_POST est vide dans le cas contraire c'est qu'on a des données POST 
if(!empty($_POST)){
    $name=$_POST['name'];
    $note=$_POST['note'];
    $city=$_POST['city'];
    $educ=$_POST['professor_id'];

    try{
        $statement = $pdo->prepare('INSERT INTO students(name, note, city, professor_id) VALUES(?,?,?,?)');

        $statement->execute([$name, $note, $city, $educ]);

       // une redirection vide la variable $_POST de PHP
        header('Location: index.php');
    }
    catch(PDOException $error){
        echo  'ERROR: '.$error->getMessage();
    }
}
// 2/ Faire la requête permettant de récupérer tous les acteurs 

try{
    $statement = $pdo->query('SELECT students.name, note, city, education FROM students LEFT JOIN professors ON professors.id=students.professor_id ORDER BY students.name;');

    //$statement->execute();

    $students = $statement->fetchAll();

   /*  echo '<pre>';
    print_r($students);
    echo '</pre>'; */

    
}
catch(PDOException $error){
   echo 'ERROR: '.$error->getMessage();
}

include 'index.tpl.php';