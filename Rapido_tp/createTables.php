<?php


include_once ('connexion.php');

try {

    $requete = "CREATE TABLE IF NOT EXISTS chauffeurs(
                         
             chauffeur_id INT PRIMARY KEY AUTO_INCREMENT,
             nom VARCHAR(100) NOT NULL ,
             prenoms VARCHAR(100) NOT NULL ,
             telephone VARCHAR(50) NOT NULL,
             sexe VARCHAR(20) NOT NULL,
             disponible BOOLEAN DEFAULT TRUE 
             
             );
     CREATE TABLE IF NOT EXISTS courses( 
            course_id INT PRIMARY KEY AUTO_INCREMENT, 
            point_depart VARCHAR(150) NOT NULL,
            point_arrivee VARCHAR(150) NOT NULL,
            date_heure DATETIME NOT NULL,
            chauffeur_id INT ,
            FOREIGN KEY (chauffeur_id ) REFERENCES chauffeurs(chauffeur_id),
            statut VARCHAR(20) 

     );";

    $connexion->exec($requete);
    
    echo "<h2>Tables créés avec succès</h2>";
        
} catch ( PDOException $e) {
    echo 'Error  '.$e->getMessage();
}finally{

    $connexion = null;
}



?>