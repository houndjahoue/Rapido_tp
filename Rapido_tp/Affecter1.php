<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Affecter un chauffeur à une course</title>
  <style>
    body {
      /* padding-top: 50px; */
      padding-bottom: 20px;
      background-image: url("image.jpg");
      background-size: 100vw, 100vh;

    }

    label{
          color: white;
        }
  </style>
</head>

<body>
  <?php
      include_once ('nav.php');
  ?>

  <div class="container">
    <h2 class="mb-4">Affecter un chauffeur à une course en attente</h2>
    <form action="Affecter2.php" method="post">
      <div class="mb-3">
        <label for="course_id" class="form-label">ID de la course en attente :</label>
        <input type="text" name="course_id" id="course_id" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="chauffeur_id" class="form-label">Sélectionnez un chauffeur :</label>
        <select name="nom_chauffeur" id="nom_chauffeur" class="form-select" required>
          <option value="Aucun">Aucun</option>
          <?php
          include_once ('connexion.php');
          try {
            $req = $connexion->query('SELECT nom, prenoms FROM chauffeurs WHERE disponible = TRUE');
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
      <button type="submit" class="btn btn-primary">Affecter chauffeur</button>
    </form>
  </div>

</body>

</html>