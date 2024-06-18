<?php
session_start();
if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true) {
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE HTML>

<html>

<head>
    <title>Dashboard-FF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>

    <div id="page-wrap">

        <header id="page">
            <div class="row">

                <div class="col-1">
                    <nav id="sidebar" class="col sidebar">
                        <a class="navbar-brand" href="#">
                            <img src="img/logo_footer.png" alt="logo" class="logo" />
                        </a>
                        <ul style="list-style-type:none;" class="nav flex-column vertical-nav">

                            <li class="nav-item"><a class="nav-link " aria-current="page" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link  " href="brand.php">Brand</a></li>
                            <li class="nav-item"><a class="nav-link" href="hero.php">Hero Section</a></li>
                            <li class="nav-item"><a class="nav-link" href="benef.php">Beneficii</a></li>
                            <li class="nav-item"><a class="nav-link active" href="ofer.php">Oferte</a></li>
                            <li class="nav-item"><a class="nav-link" href="ist.php">Istorie</a></li>
                            <li class="nav-item"><a class="nav-link" href="footer.php">Footer</a></li>
                            <li class="nav-item"><a class="nav-link" href="g_kitchen.php">Kitchen Galerie</a></li>
                            <li class="nav-item"><a class="nav-link" href="view.php">View Element</a></li>
                            <li class="nav-item"><a class="nav-link" href="client_order.php">Client Order</a></li>
                            <li id="b-nav" class="nav-item"><button type="button" class="activ"><a class="nav-link"
                                        href="sign.php">
                                        Add Admin</a></button> </li>
                            <li id="b-nav" class="nav-item"><button type="button"><a class="nav-link"
                                        href="logout.php">Log
                                        Out</a></button></li>
                        </ul>
                    </nav>
                </div>

            </div>
        </header>

        <section id="main">

            <article>
                <header>
                    <h1>Adauga noi oferte</h1>
                </header>

                <?php

                        require("mysql.php");

                        if (isset($_POST['submit'])) {
                            
                            $titlu = $_POST['titlu'];
                            $oferta = $_POST['oferta'];
                            $img = $_POST['img'];

                            $query = "INSERT INTO oferte (titlu, oferta, img) 
                            VALUES ('$titlu', '$oferta', '$img')";

                            $result = mysqli_query($conexiune, $query);

                            if (!$result) {
                                echo mysqli_error($conexiune);
                            } else {
                                echo "<h2>Inserare efectuată cu success!</h2>";
                                echo "<h2>Înapoi la <a href='ofer.php'>oferte</a></h2>";
                            }

                        } else {
                ?>
                <form id="editOfer" action="nouofer.php" method="post">
                    <div>
                        <label for="titlu">Titlu:</label>
                        <input type="text" name="titlu" id="titlu" value="">
                    </div>
                    <div>
                        <label for="oferta">Oferta:</label>
                        <input type="text" name="oferta" id="oferta" value="">
                    </div>
                    <div>
                        <label for="img">Imagine:</label>
                        <input type="file" name="img" id="img">
                    </div>

                    <div id="send">
                        <input type="submit" name="submit" value="Submit">
                    </div>
                </form>

                <?php
                        }
                        mysqli_close($conexiune);
                ?>

            </article>

        </section>
    </div>

</body>

</html>