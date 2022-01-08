<?php
session_start(); 
require_once("dbaccess.php");
require_once("Class_commande.php");
require_once("Class_client.php");

    if(isset($_POST['AC'])){
                $c = new Commande();
                $db = new Dbaccess();
                $db->query("select client_id from client where client_email = '".$_POST['em']."'");
                $client = $db->single();
        if(strcmp($client->client_id,NULL)==0){
            header("Location: ../addcommande.php?err=em");
        }
        else{
 

                $c->setcommandedate($_POST['date']);
                $c->setclientid($client->client_id);
                $c->save();

                header("Location: ../gestioncommandes.php"); 
        }

                
            
    }

    if(isset($_POST['MC'])){
        $c = new Commande();
        $db = new Dbaccess();
        $db->query("select client_id from client where client_email = '".$_POST['em']."'");
        $client = $db->single();
        $cm = $_SESSION['ucm'];

            if(strcmp($client->client_id,NULL)==0)
            {
                header("Location: ../updatecommande.php?err=em");
            }
            else{
                $c->setcommandenum($cm);
                $c->setcommandedate($_POST['date']);
                $c->setclientid($client->client_id);
                $c->update();

                header("Location: ../gestioncommandes.php");
            }


           


    }





?>