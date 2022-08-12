<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <div class="login-box">

    <h2>Admin</h2>

    <form action="process_login.php" method="POST">
      <div class="user-box">
        <input type="email" name="email" id="email">
        <label for="email">Username</label>
      </div>
      <div class="user-box">

        <input type="password" name="password" id="pass">
        <label for="pass">password</label>
      </div>
      <a href="" for="btn">
        <span></span>
        <span></span>
        <button id="btn">signin</button>
        <span></span>
        <span></span>
      </a>
      
    </form><?php include 'notification.php' ?>

  </div>
</body>

</html>