<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


  <title>RAPIDO TRANSPORT</title>

  <style>
    * {
      box-sizing: border-box;
    }

    body {
      background-image: url("image.jpg");
      background-size: 100vw, 100vh;


    }

    .main {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 500px;

    }

    .text {
      text-align: center;
      font-size: 50px;
      font-weight: bold;
      color: white;
      text-transform: translate(-50%, -50%);
    }
  </style>
</head>



<body>

  <?php
  session_start();
  if (!($_SESSION))
     header('Location:connection.php');
  ?>

  <?php
  include_once ('nav.php');
  ?>

  <div class="main">
    <div class="text">

      <h1>Bienvenue chez Rapido transport !

      </h1>
      <h2>Pour tout service veuillez consulter le menu !</h2>
    </div>
  </div>


</body>

</html>