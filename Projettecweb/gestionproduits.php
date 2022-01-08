<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header('location: /projettecweb/pagenotfound.php');
  }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/table.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Gestion du produits</title>
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
    <div class='header'>
        <form action="addproduct.php" method='POST'>
                <input type='submit' value='Ajouter un produit' class='ajout'>
            </form>
            <form action="searchproduct.php" method='POST'>
        <input type='text' name='ref' placeholder='Reference' class='refe' required>
        <input type='submit' value='Search' class='recherche'>
    </form>
    </div>
        <table class="content-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Reference</th>
                    <th>Libelle</th>
                    <th>Description</th>
                    <th>Quantite</th>
                    <th>Prix d'achat</th>
                    <th>Prix unitaire</th>
                    <th>Prix de vente</th>
                    <th>Categorie</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
            <?php


            require_once($_SERVER['DOCUMENT_ROOT']."/Projettecweb/include/dbaccess.php");
        $db = new Dbaccess();
        $db->query("select count(P_reference) as p from produit");
        $count = $db->resultSet2();

        @$page = $_GET["page"];
        if(empty($page)) $page = 1;
        $npage = ceil($count[0]["p"]/2);
        $debut = ($page-1)*2;

        $dba = new Dbaccess();
        $dba->query("select * from produit limit $debut,2");
        $products = $dba->resultSet();

                foreach($products as $product)
                {
                    
                    $db = new Dbaccess();
                    $db->query("select C_description from categorie where C_reference = '".$product->C_reference."'");
                    $res = $db->single();
                    $cat = $res->C_description;
                    echo " <tr>
                        <td>
                            <img src='/projettecweb/img/products/".$product->image."' height='60px' width='60px'/>
                        </td>
                        <td>".$product->P_reference."</td>  
                        <td>".$product->P_libelle."</td>
                        <td>".$product->P_description."</td>
                        <td>".$product->P_stock_quantite."</td>
                        <td>".$product->P_prix_achat."</td>
                        <td>".$product->P_prix_unitaire."</td>
                        <td>".$product->P_prix_vente."</td>
                        <td>".$cat."</td>
                        <td> 
                            <form action= '/projettecweb/updateproduct.php' method='POST'>
                                <input type='hidden' name='uref' value='".$product->P_reference."'>
                                <input type='submit' value='' class='update'>
                            </form>
                        </td>
                        <td> 
                            <form action= '/projettecweb/include/deleteproduct.php' method='POST'>
                                <input type='hidden' name='dref' value='".$product->P_reference."'>
                                <input type='submit' name='delete' value='' class='delete'>
                            </form>
                    </td>
                    </tr>";
                }
                ?>
                </tbody>
            </table>
</div>
        <div class="pagination">
    <?php
        if($count[0]["p"]>0){
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