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
                <img id="logo" src="img/logo.png" alt="Logo">
                <h6>Furniture For Future</h6>
            </div>

            <div class="elem3">
                <img id="m_lines" src="img/menu_lines.png" alt="Menu">
            </div>

        </div>

        <div class="open" style="display:none">
            <div class="close-angle">
                <img id="close-angle" src="img/angle_menu.png" alt="Close Menu">
            </div>

            <div class="open-menu">
                <nav id="h-menu">
                    <a class="text-menu" onclick="window.location.href = 'home.php';"> Home </a>
                    <a class="text-menu" id="accordeon" onclick="toggleSubMenu()"> Gallery
                        <img id="angle-up" src="img/up.png" alt="Up">
                        <img id="angle-down" src="img/down.png" alt="Down">
                    </a>

                    <div id="p1" style="display:none">
                        <a class="m-text" onclick="window.location.href = 'kgallery.php';">Kitchen</a>
                        <a class="m-text" onclick="window.location.href = 'livingroom.php';">Livingroom</a>
                        <a class="m-text" onclick="window.location.href = 'bedroom.php';">Bedroom</a>
                        <a class="m-text" onclick="window.location.href = 'kids.php';">Kids</a>
                        <a class="m-text" onclick="window.location.href = 'office.php';">Office</a>
                    </div>

                    <a class="text-menu" onclick="window.location.href = 'order.php';"> Contact Us </a>
                    <a class="text-menu" onclick="window.location.href = 'log_in.php';"> Log In </a>
                    <a class="text-menu" onclick="window.location.href = 'log_out.php';"> Log Out </a>
                </nav>
            </div>
        </div>

    </header>

    <?php
        require("mysql.php");

        $message = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $descriere = $_POST['descriere'];

            if (empty($name) || empty($phone) || empty($email) || empty($descriere)) {
                $message = "All fields are required!";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message = "Invalid email address!";
            } else {
                $query = "INSERT INTO client_order (name, phone, email, descriere) VALUES (?, ?, ?, ?)";
                $stmt = $conexiune->prepare($query);
                if ($stmt) {
                    $stmt->bind_param("ssss", $name, $phone, $email, $descriere);
                    $stmt->execute();
                    if ($stmt->affected_rows > 0) {
                        $message = "Order submitted successfully!";
                    } else {
                        $message = "Error submitting order: " . $conexiune->error;
                    }
                    $stmt->close();
                } else {
                    $message = "Database error: " . $conexiune->error;
                }
            }
            $conexiune->close();
        }
        ?>

    <form class="form_in" action="order.php" method="POST">
        <div>
            <div>
                <input id="in-space" type="text" name="name" placeholder="Name" required>
            </div>

            <div>
                <input id="in-space" type="tel" name="phone" placeholder="+40 000 000 000" required>
            </div>

            <div>
                <input id="in-space" type="email" name="email" placeholder="yourmailhere@gmail.com" required>
            </div>

            <div>
                <input id="in-space" type="text" name="descriere" placeholder="Text" required>
            </div>
            <?php if (!empty($message)) { ?>
            <div class="eror_m" style=" color: red; margin-top: 5px; font-size: 14px;"><?php echo $message; ?></div>
            <?php } ?>

            <div>
                <input id="btn-form" type="submit" value="Send request">
            </div>
        </div>
    </form>

    <footer class="footer">
        <ul class="media">
            <li onclick="window.location.href = 'https://www.instagram.com/p/B-75PgqDqOT/';">Instagram</li>
            <li onclick="window.location.href = 'https://www.pinterest.com/pin/9634889140100236/';">Pinterest</li>
            <li onclick="window.location.href = 'https://ro-ro.facebook.com//87914100236/';">Facebook</li>
        </ul>

        <ul class="contact">
            <li>+373 686 99 88 7</li>
            <li>+40 775 430 392</li>
            <li>furnitureFORfuture@gmail.com</li>
        </ul>

        <div class="logo-footer">
            <a href="#up">
                <img id="logo-f" src="img/logo_footer.png" alt="Footer Logo">
            </a>
        </div>
    </footer>

    <script src="js.js"></script>
</body>

</html>