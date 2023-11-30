<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/forgot.css">

    <title>Forgot Password</title>
</head>
<body>
    <div class = container>
        <h1>Forgot Password</h1>

        <form method="post" action="send-password-reset.php">
    
           
            <input type="email" name="email" id="email" placeholder = "Enter Email Address">
    
            <button>Send</button>
    
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/just-validate@4.3.0/dist/just-validate.production.min.js" defer></script>

    <script src="./js/validation.js" defer></script>
   
    

</body>
</html>