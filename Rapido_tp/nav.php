
 <head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

 
    <title>Barre de navigation</title>


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        nav {
            width: 100%;
            margin: 0 auto;
            background-color: rgba(13, 233, 233, 0.7);
        
        }

        nav .menu {
            display: flex;
            justify-content: space-evenly;
            align-items: center;


        }

        .menu li {
            list-style-type: none;
            position: relative;
        }

        .menu li a {

            text-decoration: none;
            display: block;
            padding: 20px 50px;
            color: rgb(15, 64, 138);
            font-weight: bolder;
            font-size: 20px;
        }





        .subMenu {
            position: absolute;
            background-color: rgb(228, 246, 248);
            display: none;
            padding: 0px 0px;
            border-radius: 10px;
            box-shadow: 2px 2px 3px 3px aliceblue;
        }

        .subMenu li:hover{

            background-color: rgba(179, 245, 223, 0.5);
            
        }
        .subMenu li:hover a{
            color: blue;
            font-weight: bolder;
        }

         .menu li:nth-child(n+2){
            font-family: PoppinsInitial;
            font-style: italic;
            font-weight: bolder;
            font-size: 25px;
        }

        .menu li:nth-child(n+4):hover .subMenu {
            display: block;
        }





        /* .menu li a { 
             color: rgb(15, 64, 138); 
            font-weight: bolder;
        }*/

        .subMenu li a {
            width: 100%;
            padding: 20px 20px;
            font-family:PoppinsInitial, Verdana, Geneva, Tahoma, sans-serif;
        }
        .menu li:nth-child(n+5){
            display: flex;
            
        }
        i{
            align-self: center;
        }

        .btn {
            color: white;
        }
        .monImage{
                
            border-radius: 50%;
            height: 60px;
            width: 100px;
        }
        
    </style>
</head>

<body>


    <nav>
        <ul class="menu">
            <li><img src="S.jpg" alt="" class="monImage"></li>
            <li class="text-primary" >RAPIDO TRANSPORT</li>
            <li><a href="informations.php">Voir courses</a></li>
            <li><a href="#">Menu</a>

                <ul class="subMenu">
                    <li><a href="Affecter1.php">Affecter un chauffeur</a></li>
                    <li><a href="statut1.php">Terminer une course</a></li>
                    <li><a href="ajouter1.php">Ajouter une course</a></li>

                </ul>
            </li>
            <li><a href="accueil.php">Home</a></li>
            <li>
                <a href="deconnection.php">
                    <button type="button" class="btn btn-warning" data-toggle="button" aria-pressed="false">
                        Déconnexion
                    </button>
                </a>
               <i class="fa-sharp fa-regular fa-circle-user">Online</i>
            </li>
        </ul>
    </nav>











</body>

