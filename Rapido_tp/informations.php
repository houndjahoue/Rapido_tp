<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Informations sur les courses </title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }

        body {
            font-size: 62.5%;
            min-height: 100vh;

        }

        .topBar {

            color: whitesmoke;
            background-color: rgba(240, 245, 0, 0.9);
            text-transform: uppercase;
            font-size: 2rem;
            padding: 20px 10px;
            text-align: center;
            border-bottom: 5px solid grey;
            border-top: 5px solid grey;
            font-weight: bold;



        }

        .wrapper {

            display: flex;
            justify-content: center;
            align-items: center;

        }

        table {
            border-collapse: collapse;
            margin-top: 50px;

        }

        td,
        th {
            border: 1px solid black;
            font-size: 1rem;
            padding: 1.5rem;
            font-weight: bold;
        }

        nav a{ 
             font-size: 20px; 
         } 
    </style>
</head>

<body class ="p-3 mb-2 bg-light">
<?php 
   include_once('nav.php');
?>

    <div class="topBar p-3 mb-2 bg-success text-white">Informations sur les courses </div>

    <div class="wrapper">
        <?php



        try {

            include_once ('connexion.php');
            $req = $connexion->query('SELECT courses.course_id, courses.point_depart, courses.point_arrivee, courses.date_heure, courses.statut,chauffeurs.nom AS nom_chauffeur,chauffeurs.prenoms AS prenoms_chauffeur
            FROM courses
            INNER JOIN chauffeurs ON courses.chauffeur_id = chauffeurs.chauffeur_id
            ORDER BY course_id');
            echo ' <table class="table table-info table-striped-colum" >' . '<th>ID COURSE</th>' . '<th>POINT DE DEPART</th>' . '<th>POINT D\'ARRIVEE</th>' . '<th>DATE ET HEURE</th>' . '<th>NOM DU CHAUFFEUR</th>' . '<th>STATUT</th>';




            while ($ligne = $req->fetch()) {

                
                echo '<tr>' . '<td>' . $ligne['course_id'] . '</td>' . '<td>' . $ligne['point_depart'] . '</td>' . '<td>' . $ligne['point_arrivee'] . '</td>' . '<td>' . $ligne['date_heure'] . '</td>' . '<td>'.$ligne['nom_chauffeur'].'  '.$ligne['prenoms_chauffeur']. '</td>' . '<td>' . $ligne['statut'];
                if ($ligne['statut'] != 'En cours')
                    echo '<span> ✅</span>';
                else
                    echo '<span> ⏳</span>';
                echo '</td>'.'</tr>'; 

            }

            echo  '</table>';

        } catch (PDOException $e) {

            echo 'Erreur ' . $e->getMessage();
        } finally {
            $connexion = null;
        }







        ?>
    </div>


</body>

</html>