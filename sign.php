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
                    <nav id="sidebar" class="col sidebar"></nav>
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
                            header("Location: login.php");
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

            <form id="sign" action="sign.php" method="post">
                <h3> Sign In</h3>
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