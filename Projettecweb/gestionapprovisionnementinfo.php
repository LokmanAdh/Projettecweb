<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header('location: /projettecweb/pagenotfound.php');
  }
  
    if(isset($_POST['iap'])){
        $_SESSION['iap'] = $_POST['iap'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/table.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Gestion du produit</title>
</head>
<body>
<div>
    <div class="btn">
        <span class="fas fa-bars"></span>
     </div>
     <nav class="sidebar">
        <div class="text">
           <a href='home.php'><img src="/projettecweb/img/logo.jpg" height='70px' width='190px'></a>
        </div>
        <div class="deco">
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
</div>
<div class="container">
<div class="header">
    <form action="addapprovisionnementinfo.php" method='POST'>
        <input type='submit' value='Ajouter un produit' class='ajout'>
    </form>
    <form action="/projettecweb/include/clearapprovisionnementinfo.php" method='POST'>
        <input type='submit' value='Clear' name='clear' class='clear'>
    </form>
    <form action="gestionapprovisionnements.php" method='POST'>
        <input type='submit' value="Return" class='ajout'>
</form>
</div>
<table class="content-table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Reference</th>
            <th>Prix achat</th>
            <th>Quantite</th>
            <th>SUPPRIMER</th>
        </tr>
    </thead>
<tbody>
<?php

$ia = $_SESSION['iap'];
require_once($_SERVER['DOCUMENT_ROOT']."/Projettecweb/include/Class_approvisionnementinfo.php");
require_once($_SERVER['DOCUMENT_ROOT']."/Projettecweb/include/Class_produit.php");

    $approvisionnementinfos = Approvisionnementinfo::getSome("A_num = '$ia'");

    foreach($approvisionnementinfos as $approvisionnementinfo)
    {
                $db = new Dbaccess();
                $db->query("select * from produit where P_reference = '".$approvisionnementinfo->P_reference."'");
                $product = $db->single();
        echo " <tr>
            <td>
                <img src='/projettecweb/img/products/".$product->image."' height='60px' width='60px'/>
            </ttdh>
            <td>".$product->P_reference."</td>  
            <td>".$product->P_prix_achat."</td>
            <td>".$approvisionnementinfo->approvisionnement_quantite."</td>
            <td> 
                <form action= '/projettecweb/include/deleteapprovisionnementinfo.php' method='POST'>
                    <input type='hidden' name='dapri' value='".$approvisionnementinfo->P_reference."'>
                    <input type='hidden' name='dst' value='".$approvisionnementinfo->approvisionnement_quantite."'>
                    <input type='submit' name='delete' value='' class='delete'>
                </form>
        </td>
        </tr>";
    }
    ?>
    </tbody>
</table>
</div>
<script>
        $('.btn').click(function(){
          $(this).toggleClass("click");
          $('.sidebar').toggleClass("show");
        });
          $('.feat-btn').click(function(){
            $('nav ul .feat-show').toggleClass("show");
            $('nav ul .first').toggleClass("rotate");
          });
          $('.serv-btn').click(function(){
            $('nav ul .serv-show').toggleClass("show1");
            $('nav ul .second').toggleClass("rotate");
          });
     </script>
</body>
</html>