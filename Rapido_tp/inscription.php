<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inscription</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
        <link rel="stylesheet" href="https://fontawesome.com/icons/headphones?f=sharp&amp;s=solid">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
                .visible {
                        display: block;
                }

                .unvisible {
                        display: none;
                }
        </style>

</head>

<body>


        <div class="env">
                <div class="wrapper">
                        <section class="form signup">
                                <header>Inscription</header>
                                <form action="" method="POST">

                                        <div class="error unvisible">Message d'erreur</div>


                                        <div class="name-details">
                                                <div class="field input">

                                                        <label for="mail" class="text-primary">Adresse email</label>
                                                        <input type="email" name="mail" id="mail"
                                                                placeholder="Entrez votre adresse mail"
                                                                class="form-control">
                                                </div>

                                        </div>

                                        <div class="field input">
                                                <label for="categorie" class="text-primary ">Catégorie</label>
                                                <select name="categorie" id="categorie" class="form-select">
                                                        <option value="Administrateur">Administrateur</option>
                                                        <option value="Personnel">Personnel</option>

                                                </select>
                                        </div>


                                        <div class="field input">
                                                <label for="passe" class="text-primary">Mot de passe</label>
                                                <input type="password" name="passe" id="passe"
                                                        placeholder="Entrer votre mot de passe" class="form-control">
                                        </div>




                                        <div class="field button ">
                                                <input type="submit" value="S'inscrire" class="bg-primary
                                                " name="envoi">
                                        </div>



                                </form>

                        </section>

                </div>

        </div>


        <?php


        if (isset($_POST["envoi"])) {
                if (empty($_POST['mail']) || empty($_POST['passe'])) { ?>

                        <script>
                                var elt = document.querySelector('.error');
                                elt.innerHTML = "Veuilez entrer l'email et le mot de passe";
                                elt.classList.remove('unvisible');

                        </script>


                        <?php

                } else {
                        include_once ('connexion.php');

                        try {

                                $table = $_POST['categorie'];
                                $mail = htmlspecialchars($_POST['mail']);
                                $password = sha1($_POST['passe']);
                            
                                if ($table == 'Administrateur') {
                                        $query = $connexion->prepare("INSERT INTO  Administrateur VALUES(0,?,?)");
                                        $query->execute([$mail, $password]);
                                } else {
                                        $query = $connexion->prepare("INSERT INTO  Personnel VALUES(0,?,?)");
                                        $query->execute([$mail, $password]);

                                }
                        } catch (Exception $e) {
                                echo 'Erreur ' . $e->getMessage();
                        } finally {
                                 $connexion = null;
                                header("Location:accueil.php");

                        }

        


                }
        }
        ?>
        

</body>