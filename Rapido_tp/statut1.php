<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Affecter statut Terminée à une course</title>
    <style>
        body {
            /* padding-top: 50px; */
            padding-bottom: 20px;
            background-image: url('image.jpg');
            background-size: 100vw,100vh;
        }
        label{
          color: white;
        }
    </style>
</head>
<body>
<?php 
   include_once('nav.php');
?>


<div class="container">
    <h2 class="mb-4">Affecter le statut Terminée</h2>
    <form action="statut2.php" method="post">
        <div class="mb-3">
            <label for="course_id" class="form-label">ID de la course en attente :</label>
            <input type="text" name="course_id" id="course_id" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="chauffeur_id" class="form-label">Sélectionnez le statut Terminée :</label>
            <select name="statut" id="statut" class="form-select" required>
                <option value="Terminée">Terminée</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Affecter statut</button>
    </form>
</div>

</body>
</html>
