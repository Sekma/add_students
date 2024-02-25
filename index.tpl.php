<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <title>Actor - Home</title>

    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
form{
    text-align: center;
}
form input, form p select{
    width: 200px;
    padding: 2px;
}
form .btn{
    font-weight: 600;
    color: #0C359E;
    background-color: #dddddd;
    border: none;
    border-radius: 3px;
    height: 30px;
}
form .btn:hover{
    color: #dddddd;
    background-color: #0C359E;
    cursor: pointer;
}
</style>

</head>
<body>
    <?php //echo $title ; ?>
    <!-- 1/ afficher ici tous les acteurs, dans une liste  -->
    <h2>La liste des étuduents:</h2>
    <table>
        <tr>
            <th>Nom</th>
            <th>Note</th>
            <th>Cité</th>
            <th>Enseignement</th>
        </tr>
<?php foreach($students as $student){?>

    <tr>
        <td><?php echo $student['name']?></td>
        <td><?php echo $student['note']?></td>
        <td><?php echo $student['city']?></td>
        <td><?php echo $student['education']?></td>
    </tr>

<?php } ?>
</table>
<hr>
    <!-- 2/ Ajouter un acteur -->
    <form action="index.php" method="POST">
        <!-- champs : name, vote, compagny  -->

        <p>Nom : <input type="text" name="name"></p>
        <p>Note : <input type="number" name="note" max="20" min="0"></p>
        <p>Educ : 
        <select name="professor_id">
            <option value="1">Php</option>
            <option value="2">MySQL</option>
            <option value="3">Javascript</option>
            <option value="4">Laravel</option>
            <option value="5">Python</option>
            <option value="6">vueJS</option>
        </select>
        </p>
        <p>Cité : 
        <select name="city">
            <option value="PAR">Paris</option>
            <option value="LYO">Lyon</option>
            <option value="MAR">Marseille</option>
            <option value="BOR">Bordeau</option>
        </select>
        </p>
        <input type="submit" value="Créer" class="btn">
    </form>
</body>
</html>