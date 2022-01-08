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
    <link rel="stylesheet" href="css/table.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Gestion du fournisseurs</title>
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
<form action="addfournisseur.php" method='POST'>
    <input type='submit' value='Ajouter un Fournisseur' class='ajout'>
</form>
<form action="searchfournisseur.php" method='POST'>
    <input type='text' name='em' placeholder='Email' class='em' required>
    <input type='submit' value='Search' class='recherche'>
</form>
</div>
<table class="content-table">
<thead>
<tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Email</th>
            <th>tel</th>
            <th>Addresse</th>
            <th>Modifier</th>
            <th>Supprimer</th>
</tr>
<thead>
<tbody>
<?php

require_once($_SERVER['DOCUMENT_ROOT']."/Projettecweb/include/dbaccess.php");
    $db = new Dbaccess();
    $db->query("select count(F_id) as f from fournisseur");
    $count = $db->resultSet2();

    @$page = $_GET["page"];
    if(empty($page)) $page = 1;
    $npage = ceil($count[0]["f"]/2);
    $debut = ($page-1)*2;

    $dba = new Dbaccess();
    $dba->query("select * from fournisseur limit $debut,2");
    $fournisseurs = $dba->resultSet();

    foreach($fournisseurs as $fournisseur)
    {
        echo " <tr>
            <td>".$fournisseur->F_id."</td>  
            <td>".$fournisseur->F_nom."</td>
            <td>".$fournisseur->F_email."</td>
            <td>".$fournisseur->F_tel."</td>
            <td>".$fournisseur->F_addresse."</td>
            <td> 
                <form action= '/projettecweb/updatefournisseur.php' method='POST'>
                    <input type='hidden' name='ufid' value='".$fournisseur->F_id."'>
                    <input type='submit' value='' class='update'>
                </form>
            </td>
            <td> 
                <form action= '/projettecweb/include/deletefournisseur.php' method='POST'>
                    <input type='hidden' name='dfid' value='".$fournisseur->F_id."'>
                    <input type='submit' name='delete' value='' class='delete'>
                </form>
        </td>
        </tr>";
    }
    ?>
    <tbody>
</table>
</div>
<div class="pagination">
    <?php
        if($count[0]["f"]>0){
            for($i=1;$i<=$npage;$i++){
                echo "<a href='?page=$i'>$i</a>";
            }
        }
    ?>
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