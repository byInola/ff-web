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
                            <li class="nav-item"><a class="nav-link" href="hero.php">Hero Section</a></li>
                            <li class="nav-item"><a class="nav-link " href="benef.php">Beneficii</a></li>
                            <li class="nav-item"><a class="nav-link" href="ofer.php">Oferte</a></li>
                            <li class="nav-item"><a class="nav-link " href="ist.php">Istorie</a></li>
                            <li class="nav-item"><a class="nav-link active" href="footer.php">Footer</a></li>
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

        <?php
        $lfootera = true;
        $action = "view";
        if (isset($_GET['f_id'])) {
            $lfootera = false;
            $id = $_GET['f_id'];
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
            }
        }
        require("mysql.php");

        if ($lfootera) {
            $query = "SELECT * FROM footer ORDER BY f_id ASC";
        }
        else {
            $query = "SELECT *
                FROM footer
                WHERE footer.f_id=".$id;
        }

        $rezultat = mysqli_query($conexiune, $query) or die ('Eroare');

    ?>

        <section id="main">
            <article>
                <header>
                    <h1>Detalii footer</h1>
                </header>

                <?php
                    if ($action == "view") {
                        if (!$lfootera) {
                            echo "<h2>Ați selectat id " . $id . "</h2>";
                        } else {
                            echo "";
                        }
                ?>
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Social Media</th>
                        <th>Contact</th>
                        <th>Logo</th>

                        <th>Editează</th>
                        <th>Șterge</th>
                    </tr>
                    <?php

                            if (mysqli_num_rows($rezultat) > 0) {
                            while($row = mysqli_fetch_assoc($rezultat)) {
                                echo "<tr >";
                                echo "<td>" . $row["f_id"] . "</td>";
                                 ?>
                    <td><?php echo $row["s_media"]; ?></td>
                    <td><?php echo $row["contact"]; ?></td>
                    <td><img id="img-t" src="img/<?php echo $row["logo"];?>" alt="img"></td>
                    <?php
                                echo "<td><a href='editfooter.php?f_id=" . $row['f_id'] . " '><img src='img/edit.png' alt='edit icon' width='32px'></a></td>";
                                echo "<td><a href='footer.php?f_id=" . $row['f_id'] . "&action=delete'><img src='img/delete.png' alt='delete icon' width='32px'></a></td>";
                                echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='8'>Nu aveti aceste detalii</td></tr>";
                            }
                    ?>
                </table>



                <?php
                } else {
                    if ($action == "delete") {
                        $query = "DELETE FROM footer WHERE f_id=".$id;
                        $result=mysqli_query($conexiune, $query);

                        if (!$result) {
                            echo mysqli_error($conexiune);
                        } else {
                            echo "<h2>Ștergere efectuată!</h2>";
                            echo "<meta http-equiv=\"refresh\" content=\"2; URL='footer.php'\" >";

                        }
                    }

                }
                mysqli_close($conexiune);
                ?>

            </article>


        </section>
    </div>

</body>

</html>