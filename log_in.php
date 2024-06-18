<?php

$erorM = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'mysql.php';
    $username = $_POST['user_name'];
    $password = $_POST['user_pass'];

    if(isset($_POST['remember'])) {
    $remember = $_POST['remember'];
    } else {
    $remember = ""; 
    }


    if (empty($username) || empty($password)) {
        $erorM = "Please fill in all fields.";
    } else {
        $query = "SELECT * FROM users WHERE user_name = ?";
        $stmt = $conexiune->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['user_pass'])) 
            {   //vom implimenta cookie p/u Remember Me
                if(isset($_POST['remember'])){
                   //vom seta p/u ambele inputuri
                setcookie("remember_name", $username, time() + 30 * 24 * 60 * 60);
                setcookie("remember_pass", $password, time() + 30 * 24 * 60 * 60);
                setcookie("remember", $remember, time() + 30 * 24 * 60 * 60);
            } else {
                setcookie("remember_name", "", time() - 30 * 24 * 60 * 60);
                setcookie("remember_pass", "", time() - 30 * 24 * 60 * 60);
                setcookie("remember", "", time() - 30 * 24 * 60 * 60);
                }

                
                $_SESSION["authenticated"] = true;
                header("Location: home.php");
                exit;
            } else {
                $erorM = "Incorrect password. Please try again.";
            }
        } else {
            $erorM = "User not found. Please try again.";
        }

        $stmt->close();
        $conexiune->close();
    }
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


    <section id="main">
        <form id="sign" action="log_in.php" method="post">
            <?php
            $display_name = isset($_COOKIE['remember_name']) ? $_COOKIE['remember_name'] : '';
            $display_pass = isset($_COOKIE['remember_pass']) ? $_COOKIE['remember_pass'] : '';
            $checked = isset($_COOKIE['remember']) ? "checked" : "";
               ?>

            <p style="display: flex;justify-content: center;"> Log In </p>
            <div>
                <label for="user_name">Username</label>
                <input type="text" name="user_name" id="user_name" value="<?= $display_name?>">
            </div>
            <div>
                <label for="user_pass">Password</label>
                <input type="password" name="user_pass" id="user_pass" value="<?= $display_pass?>">
            </div>

            <div style="display: flex; font-size: 14px;">
                <input type="checkbox" name="remember" id="remember" <?= $checked?>>
                <label for="remember">Remember me</label>

            </div>

            <?php if (!empty($erorM)) { ?>
            <div class="eror_m" style=" color: red; margin-top: 5px; font-size: 14px;"><?php echo $erorM; ?>
            </div>
            <?php } ?>

            <div id="send">
                <span> Don't have an account? <a href="sign_in.php" style="text-decoration:none;">Sign In</a></span>
                <input type="submit" name="submit" value="Log In">
            </div>
        </form>
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