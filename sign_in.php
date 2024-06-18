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
        <?php
            include 'mysql.php'; 
             $erorM = "";

            if (isset($_POST['submit'])) {
                $user_name = $_POST['user_name'];
                $user_phone = $_POST['user_phone'];
                $user_email = $_POST['user_email'];
                $user_pass = $_POST['user_pass'];

               
                if (empty($user_name) || empty($user_phone) || empty($user_email) || empty($user_pass)) {
                    $erorM = "All fields are required !";
                } else {
                 
                    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $user_email)) {
                        echo "<h2>Invalid email address.</h2>";
                    } else {
                        $hashed_password = password_hash($user_pass, PASSWORD_BCRYPT);
                        $check_query = "SELECT * FROM users WHERE user_name = ? OR user_email = ?";
                        $stmt = $conexiune->prepare($check_query);
                        $stmt->bind_param("ss", $user_name, $user_email);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            echo "<h2>Username or email already exists!</h2>";
                        } else {
                            $query = "INSERT INTO users (user_name, user_phone, user_email, user_pass) VALUES (?, ?, ?, ?)";
                            $stmt = $conexiune->prepare($query);
                            $stmt->bind_param("ssss", $user_name, $user_phone, $user_email, $hashed_password);
                            $stmt->execute();

                            if ($stmt->affected_rows > 0) {
                            header("Location: log_in.php");
                            exit;
                        } else {
                            echo "<h2>Error: </h2>" . $conexiune->error;
                        }
                        }

                        $stmt->close();
                    }
                }
            }

            $conexiune->close();
            ?>

        <form id="sign" action="sign_in.php" method="post">
            <p> Sign In</p>
            <div>
                <label for="user_name">Create username:</label>
                <input type="text" name="user_name" id="user_name" value="">
            </div>
            <div>
                <label for="user_phone">Phone:</label>
                <input type="text" name="user_phone" id="phone" value="">
            </div>
            <div>
                <label for="user_email">Email:</label>
                <input type="email" name="user_email" id="email" value="">
            </div>
            <div>
                <label for="user_pass">Create password:</label>
                <input type="password" name="user_pass" id="password" value="">
            </div>
            <?php if (!empty($erorM)) { ?>
            <div class="eror_m" style=" color: red; margin-top: 5px; font-size: 14px;"><?php echo $erorM; ?></div>
            <?php } ?>

            <div id="send">
                <input type="submit" name="submit" value="Sign In">
            </div>
        </form>
    </section>
    </div>
</body>

</html>