<?php
session_start();
$dapri = $_SESSION['iap'];
require_once($_SERVER['DOCUMENT_ROOT']."/projettecweb/include/Class_approvisionnementinfo.php");
require_once($_SERVER['DOCUMENT_ROOT']."/projettecweb/include/Class_produit.php");

if(isset($_POST['clear']))
{
    $apprs = Approvisionnementinfo::getSome("A_num = '$dapri'");
    $c = new Approvisionnementinfo();
    $p = new Produit();
    foreach($apprs as $appr){
        
        $c->setproduitref($appr->P_reference);
        $c->setanum($dapri);
        $c->delete();
        $p->setReference($appr->P_reference);
        $p->deletestock($appr->approvisionnement_quantite);

    }
    


}


header("Location: ../gestionapprovisionnementinfo.php");


?>