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
    <title>Gestion du commandes</title>
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
<form action="gestioncommandes.php" method='POST'>
    <input type='submit' value='Retournez vers les commandes' class='ajout'>
</form>


<?php

require_once($_SERVER['DOCUMENT_ROOT']."/Projettecweb/include/dbaccess.php");
    $dba = new Dbaccess();
    $dba->query("select count(commande_num) as c from commande natural join client where Client_email = '".$_POST['em']."'");
    $count = $dba->resultSet2();

    if($count[0]["c"]==0){
        echo "<p>commandes introuvable</p>";
    }else{
        @$page = $_GET["page"];
    if(empty($page)) $page = 1;
    $npage = ceil($count[0]["c"]/2);
    $debut = ($page-1)*2;

    $dba = new Dbaccess();
    $dba->query("select * from commande natural join client where Client_email = '".$_POST['em']."' limit $debut,2");
    $commandes = $dba->resultSet();
    echo "<table class='content-table'>
    <thead>
    <tr>
                <th>Id</th>
                <th>Date</th>
                <th>Client</th>
                <th>Email</th>
                <th>Modifier</th>
                <th>Supprimer</th>
                <th>Info</th>
                <th>Download</th>
    </tr>
    </thead><tbody>";
        foreach($commandes as $commande)
    {
                $db = new Dbaccess();
                $db->query("select client_email from client where client_id = ".$commande->client_id."");
                $client = $db->single();
        echo " 
        <tr>
            <td>".$commande->commande_num."</td>  
            <td>".$commande->commande_date."</td>
            <td>".$commande->client_id."</td>
            <td>".$client->client_email."</td>
            <td> 
                <form action= '/projettecweb/updatecommande.php' method='POST'>
                    <input type='hidden' name='ucm' value='".$commande->commande_num."'>
                    <input type='submit' value='' class='update'>
                </form>
            </td>
            <td> 
                <form action= '/projettecweb/include/deletecommande.php' method='POST'>
                    <input type='hidden' name='dcm' value='".$commande->commande_num."'>
                    <input type='submit' name='delete' value='' class='delete'>
                </form>
        </td>
        <td> 
                <form action= '/projettecweb/gestioncommandeinfo.php' method='POST'>
                    <input type='hidden' name='icm' value='".$commande->commande_num."'>
                    <input type='submit' name='info' value='' class='info'>
                </form>
        </td>
        <td> 
                <form action= '/projettecweb/include/pdf.php' method='POST'>
                    <input type='hidden' name='icm' value='".$commande->commande_num."'>
                    <input type='submit' name='info' value='' class='download'>
                </form>
        </td>
        </tr>";
    }
    echo "</tbody></table>";
    }

    
    ?>

<div class="pagination">
    <?php
        if($count[0]["c"]>0){
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