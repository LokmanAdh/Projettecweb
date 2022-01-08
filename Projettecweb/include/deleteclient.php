<?php

require_once($_SERVER['DOCUMENT_ROOT']."/projettecweb/include/Class_client.php");

if(isset($_POST['delete']))
{
    $c = new Client();
    $c->setclientid($_POST['dcid']);
    $c->delete();

}


header("Location: ../gestionclients.php");


?>