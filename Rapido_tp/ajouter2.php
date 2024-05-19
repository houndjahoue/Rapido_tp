<?php

include_once('connexion.php');

try {
    // Vérifie si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérifie si tous les champs sont remplis
        if (!empty($_POST['point_depart']) && !empty($_POST['point_arrivee']) && !empty($_POST['date_heure']) && !empty($_POST['statut'])) {
            // Récupère les valeurs des champs
            $point_depart = $_POST['point_depart'];
            $point_arrivee = $_POST['point_arrivee'];
            $date_heure = $_POST['date_heure'];
            $statut = $_POST['statut'];
            $chauffeur_nom = $_POST['nom_chauffeur'];

            // Initialise chauffeur_id à NULL par défaut
            $chauffeur_id = null;

            if ($chauffeur_nom !== "Aucun") {
                // Récupère l'ID du chauffeur en fonction du nom sélectionné
                $query = $connexion->prepare("SELECT chauffeur_id FROM chauffeurs WHERE CONCAT(nom, ' ', prenoms) = ?");
                $query->execute([$chauffeur_nom]);
                $result = $query->fetch();

                if ($result) {
                    $chauffeur_id = $result['chauffeur_id'];

                    // Met à jour la disponibilité du chauffeur
                    $update_query = $connexion->prepare("UPDATE chauffeurs SET disponible = 0 WHERE chauffeur_id = ?");
                    $update_query->execute([$chauffeur_id]);
                }
            }

            // Insertion des données dans la table "courses"
            $insert_query = $connexion->prepare("INSERT INTO courses (point_depart, point_arrivee, date_heure, chauffeur_id, statut) VALUES (?, ?, ?, ?, ?)");
            $insert_result = $insert_query->execute([$point_depart, $point_arrivee, $date_heure, $chauffeur_id, $statut]);

            // Vérifie s'il y a des erreurs lors de l'insertion
            if ($insert_result) {
                // Affiche une alerte de succès
                echo '<div class="alert alert-success" role="alert">Course ajoutée avec succès !</div>';
            } else {
                // Affiche une alerte d'erreur si l'insertion a échoué
                echo '<div class="alert alert-danger" role="alert">Erreur lors de l\'insertion des données.</div>';
                // Affiche les erreurs SQL
                print_r($insert_query->errorInfo());
            }
        } else {
            // Affiche une alerte d'erreur si tous les champs ne sont pas remplis
            echo '<div class="alert alert-danger" role="alert">Tous les champs doivent être remplis.</div>';
        }
    }
} catch (PDOException $e) {
    echo 'Erreur: ' . $e->getMessage();
} finally {
    $connexion = null;
    header('Location:informations.php');
}
?>
