<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: index.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="container1">
        <nav class="navbar navbar-expand-lg bg-dark fixed-top" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" title="Home">
                    <img src="./images/icon.png" alt="" style="width:100px; height: 60px; padding-left: 50px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-end" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" style="color: aliceblue;" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: aliceblue;" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: aliceblue;" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <h1>SMF LOG IN</h1>
            <p>B2B SUPPLIER PORTAL</p>
            <form method="post">
                <input placeholder="Email" type="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                <input type="password" name="password" id="password" placeholder="Password">
                <?php if ($is_invalid): ?>
                    <div class="error">
                        Please enter a correct Email and Password
                    </div>
                <?php endif; ?>
                <div class="forgot">
                    <a href="forgot-password.php" class="password">Forgot password?</a>
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
