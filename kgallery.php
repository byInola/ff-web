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

	    </header>





	    <section id="section-gallery">
	        <div class="container-fluid">
	            <div class="row">
	                <div class="column">
	                    <img onclick="window.location.href = 'element.php';" src="img/k_open.png" />
	                    <img src="img/k_dulap.png" />
	                    <img src="img/k_dulap5.png" />
	                    <img src="img/k_dulap3.png" />
	                </div>
	                <div class="column">
	                    <img src="img/k_dulap3.png">
	                    <img src="img/k_dulap5.png">
	                    <img src="img/k_dulap4.png">
	                    <img src="img/k_dulap7.png">
	                </div>
	                <div class="column">
	                    <img onclick="window.location.href = 'element.php';" src="img/k_open.png" />
	                    <img src="img/k_dulap8.png" />
	                    <img src="img/k_dulap2.png" />
	                    <img src="img/k_dulap11.png" />
	                </div>
	                <div class="column">
	                    <img src="img/k_dulap7.png">
	                    <img src="img/k_dulap2.png">
	                    <img src="img/k_dulap5.png">
	                    <img src="img/k_dulap7.png">
	                </div>
	                <div class="column">
	                    <img src="img/k_dulap5.png">
	                    <img src="img/k_dulap11.png">
	                    <img src="img/k_dulap.png">
	                    <img src="img/k_dulap8.png">
	                </div>
	            </div>


	            <div class="row2">
	            </div>
	        </div>



	        <div class="load-btn">
	            <button onclick="LoadMore()" type="button" id="load">Load More</button>
	        </div>

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