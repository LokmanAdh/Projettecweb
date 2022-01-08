<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home.ma</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="/projettecweb/js/script.js" defer></script>
</head>
<body>
    <header>
        <div class="head">
            <div class="logo"><a href="index.php"><img src="/projettecweb/img/logo.jpg" width="140px" height="54px"></a></div>
            <div class="search">
                <select name="searchcategorie" class="searchitems" id="searchcategorie">
                    <option value="ALL">All</option>
                    <option value="IT">IT</option>
                    <option value="Books">Books</option>
                    <option value="Fashion">Fashion</option>
                    <option value="Home & kitchen">Home & kitchen</option>
                </select>
                
                <input type="text" name="searchbar" class="searchitems" id="searchbar" >
                <input type="submit" class="searchitems" id="searchproduct" name="searchproduct" value=".">
                <i class="fa fa-search icon"></i>
            </div>
            <div class="headbuttons">
                <button class="button1"><a href="login.php">Hello, Sign in</a></button>
                <button class="button1"><a href="#">Contact Us</a></button>
                <button class="button2"><a href="#"></a></button>
            </div>
        </div>
        <div class="nav">
            <div class="navitems">
                <button class="button4"><a href="#">Today's Deals </a></button>
                <button class="button5"><a href="#">Customer Service</a></button>
                <button class="button6"><a href="#">Registry</a></button>
                <button class="button7"><a href="#">Gift Cards</a></button>
                <button class="button8"><a href="#">Sell</a></button>
            </div>
            <button class="button9"><a href="#">Epic Daily Deals</a></button>
        </div>
    </header>

    <div class="up" aria-label="Newest Photos">
        <div class="carousel" data-carousel>
          <button class="carousel-button prev" data-carousel-button="prev">&#8249;</button>
          <button class="carousel-button next" data-carousel-button="next">&#8250;</button>
          <ul data-slides>
            <li class="slide" data-active>
              <a href="#"><img src="/projettecweb/img/news3.jpg"></a>
            </li>
            <li class="slide">
                <a href="#"><img src="/projettecweb/img/news2.jpg"></a>
            </li>
            <li class="slide">
                <a href="#"><img src="/projettecweb/img/news1.jpg" ></a>
            </li>
          </ul>
        </div>
        <div class="news">
            <div class="event">
                <h3>Epic Daily Deals</h3>
                <img src="/projettecweb/img/event.jpg" width="220px" height="220px">
                <a href="#">See More</a>
            </div>
            <div class="event">
                <h3>Electronics Holiday</h3>
                <img src="/projettecweb/img/eventa.jpg" width="220px" height="220px">
                <a href="#">See More</a>
            </div>
            <div class="event" >
                <h3>Shop Electronics</h3>
                <img src="/projettecweb/img/evente.jpg" width="270px" height="220px">
                <a href="#">See More</a>
            </div>
            <div class="event" >
                <h3>Home & Kitchen</h3>
                <img src="/projettecweb/img/eventh.jpg" width="220px" height="220px">
                <a href="#">See More</a>
            </div>
        </div>

        <div class="news1">
            <div class="event">
                <h3>For your Fitness Needs</h3>
                <img src="/projettecweb/img/fit.jpg" width="220px" height="220px">
                <a href="#">See More</a>
            </div>
            <div class="event">
                <h3>New arrivals in Toys</h3>
                <img src="/projettecweb/img/toys.jpg" width="220px" height="220px">
                <a href="#">See More</a>
            </div>
            <div class="event" >
                <h3>Explore home bedding</h3>
                <img src="/projettecweb/img/re.jpg" width="220px" height="220px">
                <a href="#">See More</a>
            </div>
            <div class="event" >
                <h3>Shop Laptops & Tablets</h3>
                <img src="/projettecweb/img/lap.jpg" width="220px" height="220px">
                <a href="#">See More</a>
            </div>
        </div>
            <div class="vide"></div>
    </div>
    <div class="tip">
        <button>Back to top</button>
    </div>
    <div class="contact">
        <div class="logoc">
            <img src="/projettecweb/img/logo3.jpg" width="250px" height="100px">
        </div>
        <div class="c">
            <p class="e">Conditions of Use </p> <p class="e">Privacy Notice </p> <p class="e">Interest-Based Ads</p><p class="e">© 2021-2021, Home.ma, Inc. or its affiliates</p>
    
        </div>
        <div class="contactinfo">
            <div class="p1">
                <p class="p">Contact Us </p>
            </div>
            
            <div class="p2">
                Email : Lokadadlok@gmail.com<br><br> 
                Phone : 0661646826
            </div>
            
        </div>
    </div>
</body>
</html>