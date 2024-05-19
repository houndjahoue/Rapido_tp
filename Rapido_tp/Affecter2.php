<?php


include_once('connexion.php');



try{
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si l'ID de la course et le nom du chauffeur sont spécifiés
    if (!empty($_POST['course_id']) && !empty($_POST['nom_chauffeur'])) {
        // Récupère les données du formulaire
        $course_id = $_POST['course_id'];
        $chauffeur_nom = $_POST['nom_chauffeur'];

        // Recherche l'ID du chauffeur en utilisant son nom
        $query = $connexion->prepare("SELECT chauffeur_id FROM chauffeurs WHERE CONCAT(nom, ' ', prenoms) = ?");
        $query->execute([$chauffeur_nom]);
        $result = $query->fetch();
        
        if ($result) {
            $chauffeur_id = $result['chauffeur_id'];
            
            // Met à jour la course avec l'ID du chauffeur
            $update_query = $connexion->prepare("UPDATE courses SET chauffeur_id = ?, statut = 'En cours' WHERE course_id = ?");
            $update_query->execute([$chauffeur_id, $course_id]);
            $update_query = $connexion->prepare("UPDATE chauffeurs SET disponible = ? WHERE chauffeur_id = ?");
            $update_query->execute([0,$chauffeur_id]);
            
            
            // Affiche un message de succès
            echo '<div class="container mt-4">';
            echo '<div class="alert alert-success" role="alert">Chauffeur affecté à la course avec succès !</div>';
            echo '</div>';
        } else {
            // Si aucun chauffeur n'est trouvé avec le nom spécifié
            echo '<div class="container mt-4">';
            echo '<div class="alert alert-danger" role="alert">Aucun chauffeur trouvé avec le nom spécifié.</div>';
            echo '</div>';
        }
    } else {
        // L'ID de la course ou le nom du chauffeur n'a pas été spécifié
        echo '<div class="container mt-4">';
        echo '<div class="alert alert-danger" role="alert">Veuillez spécifier l\'ID de la course et sélectionner un chauffeur.</div>';
        echo '</div>';
    }
}

}catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}finally{
    $connexion = null;
}
?>
