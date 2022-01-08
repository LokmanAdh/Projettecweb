<?php
session_start();
$dcm = $_POST['dcm'];
require_once($_SERVER['DOCUMENT_ROOT']."/projettecweb/include/Class_commande.php");
require_once($_SERVER['DOCUMENT_ROOT']."/projettecweb/include/Class_commandeinfo.php");
require_once($_SERVER['DOCUMENT_ROOT']."/projettecweb/include/Class_produit.php");

if(isset($_POST['delete']))
{
    $cms = Commandeinfo::getSome("commande_num = '$dcm'");
    $c = new Commandeinfo();
    $p = new Produit();
    foreach($cms as $cm){
        
        $c->setProduitref($cm->P_reference);
        $c->setcommandenum($dcm);
        $c->delete();
        $p->setReference($cm->P_reference);
        $p->addstock($cm->commande_quantite);

    }
    $a = new Commande();
    $a->setcommandenum($dcm);
    $a->delete();

}


header("Location: ../gestioncommandes.php");


?>