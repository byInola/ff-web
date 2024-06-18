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
                            <li class="nav-item"><a class="nav-link " href="brand.php">Brand</a></li>
                            <li class="nav-item"><a class="nav-link active" href="benef.php">Beneficii</a></li>
                            <li class="nav-item"><a class="nav-link" href="ofer.php">Oferte</a></li>
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
                    <h2>Editare detalii oferte</h2>
                </header>

                <?php
                    if (isset($_GET['ofert_id'])) {
                        $id = $_GET['ofert_id'];

                        require("mysql.php");

                        if (isset($_POST['submit'])) {
                            $query = "UPDATE oferte
                            SET titlu='". $_POST['titlu'] ."',
                            oferta='". $_POST['oferta'] ."',
                            img='". $_POST['img'] ."'
                            WHERE ofert_id=".$id;

                            $result = mysqli_query($conexiune, $query);
                            if (!$result) {
                                echo mysqli_error($conexiune);
                            } else {
                                echo "<h2>Modificare efectuată cu success!</h2>";
                                echo "<h2>Înapoi la <a href='ofer.php'>tabel</a></h2>";
                            }
                        } else {
                            $query = "SELECT * FROM oferte WHERE ofert_id=".$id;
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare');
                            $row = mysqli_fetch_assoc($rezultat);
                ?>
                <form id="editOfer" action="editofer.php?ofert_id=<?=$id?>" method="post">

                    <div>
                        <label for="titlu">Titlu:</label>
                        <input type="text" name="titlu" id="titlu" value="<?=$row["titlu"]?>">
                    </div>

                    <div>
                        <label for="oferta">Oferta:</label>
                        <input type="text" name="oferta" id="oferta" value="<?=$row["oferta"]?>">
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
                    } else {
                        echo "<h2>Lipsă parametru (nu știu ce să modific)</h2>";
                        echo "<h2>Mergeți înapoi la <a href='ofer.php'>tabel</a></h2>";
                    }
                ?>

            </article>

        </section>

    </div>

</body>

</html>