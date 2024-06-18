	<!DOCTYPE html>
	<html>

	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <title>Furniture For Future</title>
	    <link rel="preconnect" href="https://fonts.googleapis.com">
	    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	    <link href="https://fonts.googleapis.com/css2?family=Inter&family=K2D:wght@400;600&display=swap" rel="stylesheet">

	    <link rel="stylesheet" href="home.css">

	</head>

	<body>
	    <header class="navbar">
	        <div class="img-menu">

	            <div class="elem1-2" onclick="window.location.href = 'home.php';">
	                <img id="logo" src="img/logo.png">
	                <h6>Furniture For Future</h6>
	            </div>

	            <div class="elem3">
	                <img id="m_lines" src="img/menu_lines.png">
	            </div>

	        </div>

	        <div class="open" style="display:none">
	            <div class="close-angle">
	                <img id="close-angle" src="img/angle_menu.png">
	            </div>

	            <div class="open-menu">
	                <nav id="h-menu">
	                    <a id="text-menu" onclick="window.location.href = 'home.php';"> Home </a>
	                    <a id="text-menu" id="accordeon" onclick="toggleSubMenu()"> Gallery <img id="angle-up"
	                            src="img/up.png"><img id="angle-down" src="img/down.png"></a>

	                    <div id="p1" style=" display:none">
	                        <a id="m-text" onclick="window.location.href = 'kgallery.php';">Kitchen</a>
	                        <a id="m-text" onclick="window.location.href = 'livingroom.php';">Livingroom</a>
	                        <a id="m-text" onclick="window.location.href = 'bedroom.php';">Bedroom</a>
	                        <a id="m-text" onclick="window.location.href = 'kids.php';">Kids</a>
	                        <a id="m-text" onclick="window.location.href = 'office.php';">Office</a>
	                    </div>

	                    <a id="text-menu" onclick="window.location.href = 'order.php';"> Contact Us </a>
	                    <a id="text-menu" onclick="window.location.href = 'log_in.php';"> Log In </a>
	                    <!--dont have an account yet ?Sign in-->
	                    <a id="text-menu" onclick="window.location.href = 'log_out.php';"> Log Out </a>

	                </nav>
	            </div>
	        </div>



	        <section class="slider-space">
	            <div class="slideshow-container">

	                <div class="slides">

	                    <img class="fade" src="img/k_open.png" width="100%">
	                </div>

	                <div class="slides">

	                    <img class="fade" src="img/k_open1.png" width="100%">
	                </div>


	                <div class="slides">

	                    <img class="fade" src="img/k_open2.png" width="100%">
	                </div>

	                <a class="prev" onclick="plusSlides(-1)"></a>
	                <a class="next" onclick="plusSlides(1)"></a>


	            </div>

	            <div style="text-align: center;">
	                <span class="dot" onclick="currentSlides(1)"> </span>
	                <span class="dot" onclick="currentSlides(2)"> </span>
	                <span class="dot" onclick="currentSlides(3)"> </span>
	                <span class="dot" onclick="currentSlides(4)"> </span>
	            </div>
	        </section>

	        <section class="section-down">

	            <div class="k-images">
	                <div class="k1">
	                    <img src="img/k_open1.png" width="100%">
	                </div>

	                <div class="k2">

	                    <img src="img/k_open2.png" width="100%">
	                </div>

	                <div class="k3">

	                    <img src="img/k_open3.png" width="100%">
	                </div>
	            </div>

	        </section>



	        <section class="description">
	            <div class="prop">
	                <h5 id="denumire">Name</h5>
	            </div>
	            <p id="info">Summer Spells</p>

	            <div class="prop">
	                <h5 id="denumire">Furniture carcase</h5>
	            </div>
	            <p id="info">18 mm LMDP (laminated wood chipboard), edges taped with 0.4 mm PVC tape</p>

	            <div class="prop">
	                <h5 id="denumire">Handles</h5>
	            </div>
	            <p id="info">Metal handles</p>

	            <div class="prop">
	                <h5 id="denumire">Plinth for floor-standing cabinets</h5>
	            </div>
	            <p id="info">LMDP (laminated wood chipboard), with prof. plinth (plastic sealing tape to the floor).</p>

	            <div class="prop">
	                <h5 id="denumire">Hinges</h5>
	            </div>
	            <p id="info">BLUM (gentle closing)</p>


	            <div class="prop">
	                <h5 id="denumire">Drawer mecanism</h5>
	            </div>
	            <p id="info">Tandembox (Blum). Full drawer extension, rails with installed silent closing system
	                “BLUMOTION”.
	            </p>

	        </section>



	        <footer class="footer">
	            <ul type="none" class="media">
	                <li onclick="window.location.href = 'https://www.instagram.com/p/B-75PgqDqOT/';">Instagram</li>
	                <li onclick="window.location.href = 'https://www.pinterest.com/pin/9634889140100236/';">Pinterest </li>
	                <li onclick="window.location.href = 'https://ro-ro.facebook.com//87914100236/';">Facebook</li>
	            </ul>

	            <ul type="none" class="contact">
	                <li>+373 686 99 88 7 </li>
	                <li>+40 775 430 392 </li>
	                <li>furnitureFORfuture@gmail.com</li>
	            </ul>

	            <div class="logo-footer">
	                <a href="#up">
	                    <img id="logo-f" src="img/logo_footer.png">
	                </a>
	            </div>
	        </footer>

	        <script src="js.js"></script>
	</body>

	</html>