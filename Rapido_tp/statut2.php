
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<?php

include_once ('connexion.php');

try {
    // Vérifie si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérifie si l'ID de la course est spécifié
        if (!empty($_POST['course_id'])) {
            // Récupère les données du formulaire
            $course_id = $_POST['course_id'];

            // Met à jour le statut de la course
            $update_query = $connexion->prepare("UPDATE courses SET statut = ? WHERE course_id = ?");
            $update_query->execute(["Terminée", $course_id]);

            // Récupère l'ID du chauffeur associé à la course
            $req = $connexion->prepare('SELECT chauffeur_id FROM courses WHERE course_id = ?');
            $req->execute([$course_id]);
            $chauffeur = $req->fetch();

            if ($chauffeur) {
                $chauffeur_id = $chauffeur['chauffeur_id'];

                // Met à jour l'attribut disponible du chauffeur
                $rep = $connexion->prepare('UPDATE chauffeurs SET disponible = 1 WHERE chauffeur_id = ?');
                $rep->execute([$chauffeur_id]);

                // Affiche un message de succès
                echo '<div class="container mt-4">';
                echo '<div class="alert alert-success" role="alert">Statut de la course et disponibilité du chauffeur mis à jour avec succès !</div>';
                echo '</div>';
            } else {
                // Si aucun chauffeur n'est trouvé pour la course spécifiée
                echo '<div class="container mt-4">';
                echo '<div class="alert alert-danger" role="alert">Aucun chauffeur trouvé pour la course spécifiée.</div>';
                echo '</div>';
            }
        } else {
            // Si l'ID de la course n'est pas spécifié
            echo '<div class="container mt-4">';
            echo '<div class="alert alert-danger" role="alert">Veuillez spécifier l\'ID de la course.</div>';
            echo '</div>';
        }
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
} finally {
    $connexion = null;
}
?>

</body>

</html>
