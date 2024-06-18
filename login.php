<?php
session_start();

// verificam daca este sau nu autentificat userul-----------daca DA atunci trece direct 
if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] === true) {
    header("Location: index.php");
    exit;
}
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
                
                header("Location: index.php");
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

                    </nav>
                </div>

            </div>
        </header>


        <section id="main">
            <form id="login" action="login.php" method="post">
                <?php
            $display_name = isset($_COOKIE['remember_name']) ? $_COOKIE['remember_name'] : '';
            $display_pass = isset($_COOKIE['remember_pass']) ? $_COOKIE['remember_pass'] : '';
            $checked = isset($_COOKIE['remember']) ? "checked" : "";
               ?>

                <h3 style="display: flex;justify-content: center;"> Log In </h3>
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
                    <input type="submit" name="submit" value="Log In">
                </div>
            </form>
        </section>
</body>

</html>