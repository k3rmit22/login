<?php

$email = $_POST["email"];

$token = bin2hex(random_bytes(16));
$token_hash = hash("sha256", $token);
$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

$mysqli = require __DIR__ . "/database.php";

$sql = "UPDATE user
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE email = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sss", $token_hash, $expiry, $email);
$stmt->execute();
//palitan mo yung login ng TRES pag lalagay na sya sa mismong system
if ($mysqli->affected_rows) {
    $mail = require __DIR__ . "/mailer.php";
    $mail->setFrom("henry.eugeno01@gmail.com");
    $mail->addAddress($email);
    $mail->Subject = "Password Reset";
    $mail->Body = <<<END
    Click <a href="http://localhost/login/reset-password.php?token=$token">here</a> 
    to reset your password.
    END;

    try {
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
    }
}

// Display a message in HTML format
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Reset</title>
    <link rel="stylesheet" href="css/send-pass.css">
   
</head>
<body>
    <div class="container">
        <h1>Email Sent!</h1>
        <p >please check your inbox.</p>
        
    </div>
</body>
</html>
