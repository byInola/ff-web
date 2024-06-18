<?php
require("mysql.php");


$q_hero = "SELECT * FROM herosection WHERE hero_id = 1";
$result_hero = $conexiune->query($q_hero);
if ($result_hero->num_rows > 0) {
    $row_hero = $result_hero->fetch_assoc();
} else {
    echo "Nu există rezultate în baza de date.";
}


function newBenef($icon, $titlu, $descriere) {

echo '<article>';
echo '<div><img id="icon" src="img/' . $icon . '" alt="img"> </div>';
echo '<div class="benefits">';
    echo '<h2>' . $titlu . '</h2>';
echo '</div>';
    echo '<p>' . $descriere . '</p>';
echo '</article>';
}



function newOferCard($titlu, $oferta, $img) {
echo '<article class="elem-card">';
 echo '<div class="text-promo">';
    echo '<h3>' . $titlu . '</h3>';
    echo '<h4>' . $oferta . '</h4>';
    echo '<button onclick="window.location.href = \'order.php\';" type="button" id="add_button">Add an order</button>';
 echo '</div>';

 echo '<div class="card" ><img id="card_img" src="img/' . $img . '" alt="img"> </div>';
    
echo '</article>';
}

function newIst($titlu, $img, $txt_1, $txt_2) {
echo '<div>';
    echo '<h2>' . $titlu . '</h2>';
    echo '<img id="home_2" src="img/' . $img . '" alt="img">';
echo '</div>';

echo '<article class="text4">';
    
echo '<div class="text4_1">';
    echo '<p>' . $txt_1 . '</p>';
    echo '<button onclick="window.location.href = \'https://www.youtube.com/watch?v=BVya_sqQtvm\';" type="button" id="add_button">Watch video</button>';
echo '</div>';
    
echo '<div class="text4_2">';
    echo '<p>' . $txt_2 . '</p>';
echo '</div>';

echo '</article>';
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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


    <section class="section1" id="up">

        <div class="banner-card">
            <div id="img-desck"><img id="home_1" src="img/<?php echo $row_hero["img"];?>" alt="img"></div>

            <div class="banner-text">
                <h1> <?php echo $row_hero ["titlu"];?> </h1>
            </div>
        </div>

        <article>
            <p><?php echo $row_hero ["descriere"];?></p>
        </article>

    </section>


    <section class="section2">

        <?php
        require("mysql.php");

        $quire_benef = "SELECT icon, titlu, descriere FROM beneficii";
        $result_benef = $conexiune->query($quire_benef);
        if ($result_benef->num_rows > 0) {
            while($row_benef = $result_benef->fetch_assoc()) {
                newBenef($row_benef["icon"], $row_benef["titlu"], $row_benef["descriere"]);
            }
        } else {
            echo "Nu există rezultate în baza de date.";
        }
        $conexiune->close();
        ?>
    </section>


    <section class="section3">

        <?php
        require("mysql.php");

        $quire_ofer = "SELECT titlu, oferta, img FROM oferte";
        $result_ofer= $conexiune->query($quire_ofer);
        if ($result_ofer->num_rows > 0) {
            while($row_ofer = $result_ofer->fetch_assoc()) {
                newOferCard($row_ofer["titlu"], $row_ofer["oferta"], $row_ofer["img"]);
            }
        } else {
            echo "Nu există rezultate în baza de date.";
        }
        $conexiune->close();
        ?>

    </section>



    <section class="section4">

        <?php 

        require("mysql.php");

        $quire_ist = "SELECT titlu, img , txt_1, txt_2 FROM istorie";
        $result_ist= $conexiune->query($quire_ist);
        if ($result_ist->num_rows > 0) {
            while($row_ist = $result_ist->fetch_assoc()) {
                newIst($row_ist["titlu"], $row_ist["img"], $row_ist["txt_1"],  $row_ist["txt_2"]);
            }
        } else {
            echo "Nu există rezultate în baza de date.";
        }
        $conexiune->close();

    ?>

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