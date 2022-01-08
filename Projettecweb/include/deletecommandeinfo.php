<?php
session_start();
$icm = $_SESSION['icm'];
require_once($_SERVER['DOCUMENT_ROOT']."/projettecweb/include/Class_commandeinfo.php");
require_once($_SERVER['DOCUMENT_ROOT']."/projettecweb/include/Class_produit.php");

if(isset($_POST['delete']))
{
    $c = new commandeinfo();
    $c->setProduitref($_POST['dcmi']);
    $c->setcommandenum($icm);
    $c->delete();
    $p = new Produit();
    $p->setReference($_POST['dcmi']);
    $p->addstock($_POST['dst']);


}


header("Location: ../gestioncommandeinfo.php");


?>