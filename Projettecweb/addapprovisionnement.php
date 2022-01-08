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
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Ajouter une approvisionnement</title>
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
<div id="login-card">
    <h1>Ajouter une approvisionnement</h1>
    <form action="/projettecweb/include/confirmapprovisionnement.php"enctype="multipart/form-data" method="post" >

            <div class="input-group">
                <label for="date">Date</label>
                <div class="merge-input-icon">
                    <input type="date" placeholder="date" name="date" required>  
                </div>
            </div>

            <div class="input-group">
                <label for="em">Email</label>
                <div class="merge-input-icon">
                <input type="text" placeholder="email" name="em" required>
                </div>
            </div>

        <div class="error-alert">
            <?php

                if(isset($_GET['err']))
                {
                    switch($_GET['err'])
                    {
                        case "em":echo "Fournisseur introuvable"; break;
                    }
                }

            ?>
        </div>
        <div class="login-button">
            <input type="submit" name="AA" value="AJOUTER L' APPROVISIONNEMENT">
        </div>
    </form>
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

  <style>
      @font-face {
    font-family: "emberregular";
    src: url("/projettecweb/fonts/AmazonEmber_Rg.ttf");
}
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "emberregular";
}

a{
    color: inherit;
    text-decoration: none; 
}

body{
    background-color: #eff1f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 800px;
}

#login-card{
    background-color: #ffffff;
    height: 400px;
    width: 460px;
    border-radius: 6px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
}

#login-card h1{
    font-size: 28px; 
    font-weight: 600;
    height: 70px;
    line-height: 80px;
    padding-left: 40px;
}

.input-group{
    display: flex;
    flex-direction: column;
    width: 80%;
    margin: 15px auto;
}

label{
    text-transform: capitalize;
    margin-bottom: 10px;
    font-size: 13px;
    font-weight: 600;
}

.input-group input{
   height: 35px; 
   border-radius: 50px;
   border: 1px solid #919496; 
   padding-left: 15px;
   width: 100%;
}
#file{
    border: none;
}

.merge-input-icon{
    display: flex;
    position: relative;
}

.merge-input-icon i{
    position: absolute;
    right: 20px;
    top: 10px;
    color: #919496;
    cursor: pointer;
}

.merge-input-icon i:hover{
    color: #131921;
}

.remember-password{
    display: flex;
    justify-content: space-between;
    width: 80%;
    margin: 15px auto;
}

.remember-password a{
    font-size: 12px;
    text-transform: capitalize;
}

.remember-password-group label{
    color: #919496;
    text-transform: capitalize;
    font-weight: 300;
    font-size: 12px;
    margin-left: 6px;
    line-height: 14px;
}

.remember-password-group input[type="checkbox"] {
    vertical-align:middle; 
}

.error-alert{
    text-align: center;
    color:red;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 2px;
    text-transform: capitalize;
}

.login-button{
    height: 30px;
    width: 80%;
    margin: 25px auto;
}

.login-button input{
    background-color: #131921;
    color: #ffffff;
    text-transform: capitalize;
    border:none;
    border-radius: 50px;
    height: 35px;
    width: 100%;
    box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.3),
    0px -2px 6px rgba(0, 0, 0, 0.3);
    cursor: pointer;
}

.login-button input:active{
    box-shadow: 0px 3px 3px rgba(0, 0, 0, 0.3),
    0px -1px 3px rgba(0, 0, 0, 0.3);
}

.create-account{
    display: flex;
    justify-content: center;
}

.create-account p{
    color: #919496;
    font-size: 12px;
    margin-right: 12px;
}

.create-account a{
    font-size: 12px;
    font-weight: 500;
    margin-right: 12px;
    text-transform: capitalize;
}
.sidebar .deco{
    position: absolute;
    top: 650px;
    left: 60px; 
}
.deco input{
    height: 35px;
    width: 120px;
    font-size: 17px;
    background-color: #febd69;
    border-width: 0px;
    border-radius: 7px;
    cursor: pointer;
    color: #131921;
    font-weight: 900;
}
.btn{
    position: absolute;
    top: 15px;
    left: 45px;
    height: 45px;
    width: 45px;
    text-align: center;
    background: #131921;
    border-radius: 3px;
    cursor: pointer;
    transition: left 0.4s ease;
  }
  .btn.click{
    left: 260px;
  }
  .btn span{
    color: white;
    font-size: 28px;
    line-height: 45px;
  }
  .btn.click span:before{
    content: '\f00d';
  }
  .sidebar{
    position: fixed;
    top: 0px;
    width: 250px;
    height: 100%;
    left: -250px;
    background: #131921;
    transition: left 0.4s ease;
  }
  .sidebar.show{
    left: 0px;
  }
  .sidebar .text{
    margin-top: 20px;
    line-height: 65px;
    text-align: center;
    
  }
  nav ul{
    background: #131921;
    height: 100%;
    width: 100%;
    list-style: none;
  }
  nav ul li{
    line-height: 60px;
    border-top: 1px solid rgba(255,255,255,0.1);
  }
  nav ul li:last-child{
    border-bottom: 1px solid rgba(255,255,255,0.05);
  }
  nav ul li a{
    position: relative;
    color: white;
    text-decoration: none;
    font-size: 18px;
    padding-left: 20px;
    font-weight: 500;
    display: block;
    width: 100%;
    border-left: 3px solid transparent;
  }
  nav ul li.active a{
    color: #febd69;
    background: #131921;
    border-left-color: #febd69;
  }
  nav ul li a:hover{
    background: #131921;
    color: #febd69;
  }


  nav ul li a span{
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
    font-size: 22px;
    transition: transform 0.4s;
  }
  nav ul li a span.rotate{
    transform: translateY(-50%) rotate(-180deg);
  }
  

  </style>

</body>
</html>