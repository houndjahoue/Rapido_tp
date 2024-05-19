<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Ajouter une course</title>
    <style>
        body,
        html {
            height: 100%;
            background: url("image.jpg");
            background-size: 100vw, 100vh;
        }

        .wrap {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .wrap h3 {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-group {
            display: flex;
            justify-content: space-between; /* Pour espacer les boutons */
        }

        /* Ajoute une grande marge à droite pour espacer les boutons */
        .btn-submit {
            margin-right: 300px;
        }
    </style>
</head>

<body>
    <?php 
    include_once('nav.php');
    ?>
    <div class="wrap">
        <form action="ajouter2.php" method="POST">
            <h3>Ajouter une course</h3>
            <div class="form-group">
                <label for="point_depart" class="form-label">Point de départ</label>
                <input type="text" name="point_depart" id="point_depart" class="form-control">
            </div>
            <div class="form-group">
                <label for="point_arrivee" class="form-label">Point d'arrivée</label>
                <input type="text" name="point_arrivee" id="point_arrivee" class="form-control">
            </div>
            <div class="form-group">
                <label for="date_heure" class="form-label">Date et heure</label>
                <input type="datetime-local" name="date_heure" id="date_heure" class="form-control">
            </div>
            <div class="form-group">
                <label for="nom_chauffeur" class="form-label">Nom du chauffeur</label>
                <select name="nom_chauffeur" id="nom_chauffeur" class="form-select">
                    <option value="Aucun">Aucun</option>
                    <?php
                    include_once ('connexion.php');
                    try {
                        $req = $connexion->query('SELECT nom, prenoms FROM chauffeurs where disponible = TRUE');
                        while ($ligne = $req->fetch()) {
                            echo '<option>' . $ligne['nom'] . ' ' . $ligne['prenoms'] . '</option>';
                        }
                    } catch (PDOException $e) {
                        echo 'Erreur ' . $e->getMessage();
                    } finally {
                        $connexion = null;
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="statut" class="form-label">Statut</label>
                <select name="statut" id="statut" class="form-select">
                    <option value="En cours">En cours</option>
                    <option value="Terminée">Terminée</option>
                </select>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-primary btn-submit">Ajouter</button>
                <button type="reset" class="btn btn-danger">Effacer</button>
            </div>
        </form>
    </div>
</body>

</html>
