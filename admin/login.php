<!DOCTYPE html>
<html>

<head>
  <title>Courier Management Dashboard - Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 320px;
      margin: 100px auto;
      background-color: #fff;
      padding: 40px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    .logo {
      text-align: center;
      margin-bottom: 30px;
    }

    .logo img {
      width: 150px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group input[type="password"] {
      width: 75%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-group i {
      position: absolute;
      top: 14px;
      left: 10px;
      color: #aaa;
    }

    .form-group input[type="text"]+i,
    .form-group input[type="password"]+i {
      pointer-events: none;
    }

    .form-group input[type="text"]:focus+i,
    .form-group input[type="password"]:focus+i {
      color: #2196F3;
    }

    .login-btn {
      width: 30%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      font-weight: bold;
    }

    .login-btn:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <?php
  session_start();
  if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
  }
  ?>

  <div class="container">
    <div class="logo">
      <img src="images/dashboard-image.jpg" alt="Courier Management">
    </div>
    <h1>Courier Management Dashboard</h1>
    <form action="" method="post">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <?php
      // Check if the username and password are provided
      if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Perform your authentication logic here
        // You can check against a database or any other authentication method

        // For example, let's assume the correct username and password are "admin"
        if ($username === 'admin' && $password === '1234') {
          // Authentication successful
          $_SESSION['username'] = $username;
          header("Location: index.php");
          exit();
        } else {
          // Authentication failed
          echo '<p style="color:red">Invalid username or password.</p>';  
        }
      }
      ?>
      <button class="login-btn" type="submit" name="submit">Login</button>
    </form>
  </div>
</body>

</html>