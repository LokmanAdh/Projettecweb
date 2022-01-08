<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header('location: /projettecweb/pagenotfound.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Home</title>
</head>
<body>
    <div class="btn">
        <span class="fas fa-bars"></span>
     </div>
     <nav class="sidebar">
        <div class="text">
           <a href='home.php'><img src="/projettecweb/img/logo.jpg" height='70px' width='190px'></a>
        </div><div class="deco">
        <form action="/projettecweb/include/logout.php" method='POST'>
            <input type='submit' value='Logout'>
         </form>
      </div>
        <ul>
            <li><a href="/projettecweb/gestionproduits.php">Gestion des Produits</a></li>
           <li><a href="/projettecweb/gestioncategories.php">Gestion des Categories </a></li>
           <li><a href="/projettecweb/gestionclients.php">Gestion des Clients </a></li>
           <li><a href="/projettecweb/gestionfournisseurs.php">Gestion des Fournisseurs</a></li>
           <li><a href="/projettecweb/gestioncommandes.php">Gestion des commandes</a></li>
           <li><a href="/projettecweb/gestionapprovisionnements.php">Gestion des achats</a></li>
        </ul>
        
     </nav>
     <div class="content">
        <div class="header">
           Welcome Admin
        </div>
        <p>
           There is lot of work to do!
        </p>
     </div>
     <script>
        $('.btn').click(function(){
          $(this).toggleClass("click");
          $('.sidebar').toggleClass("show");
        });
          $('nav ul li').click(function(){
            $(this).addClass("active").siblings().removeClass("active");
          });
     </script>
</body>
</html>