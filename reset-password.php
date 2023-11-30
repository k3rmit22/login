<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM user
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    die("token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="reset-pass-validation.js" defer></script>
    <link rel="stylesheet" href="css/reset.css">
  
</head>
<body>

    <div class="container">
    <h1>Reset Password</h1>
    <form method="post" action="process-reset-password.php"  id="reset" novalidate>
        <input type="hidden" name="token" value="<?= htmlspecialchars($token)?>">
        <div class="input-control">
        <input type="password" id="password" placeholder ="Enter Password" name="password"></div>

          
        <div class="input-control">
        
        <input type="password" id="password_confirmation" placeholder="Repeat Password" name="password_confirmation"></div>

        <button>RESET</button>
    </form>
    </div>

</body>
</html>



