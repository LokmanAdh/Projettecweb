<?php
session_start();
$icm = $_SESSION['icm'];
require_once($_SERVER['DOCUMENT_ROOT']."/projettecweb/include/Class_commandeinfo.php");
require_once($_SERVER['DOCUMENT_ROOT']."/projettecweb/include/Class_produit.php");

if(isset($_POST['clear']))
{
    $cms = Commandeinfo::getSome("commande_num = '$icm'");
    $c = new Commandeinfo();
    $p = new Produit();
    foreach($cms as $cm){
        
        $c->setProduitref($cm->P_reference);
        $c->setcommandenum($icm);
        $c->delete();
        $p->setReference($cm->P_reference);
        $p->addstock($cm->commande_quantite);

    }
    


}


header("Location: ../gestioncommandeinfo.php");


?>