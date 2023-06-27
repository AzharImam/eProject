<?php
require_once "config.php";
session_start();

if (!$connect) {
  die("Database connection failed: " . mysqli_connect_error());
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $query = "SELECT * FROM tbl_agent WHERE user_name = '$username' AND password = '$password'";
  $result = mysqli_query($connect, $query);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION["agent_name"] = $row['name'];
    header("Location: index.php");
    exit();
  } else {
    $message = "Invalid username or password. Please try again.";
  }
}

mysqli_close($connect);
?>
<!DOCTYPE html>
<html>

<head>
  <title>Agent Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 80vh;
    }

    .card {
      width: 300px;
      padding: 30px;
      background-color: #fff;
      border-radius: 4px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    .card h2 {
      text-align: center;
      margin-bottom: 30px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-group input {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-group .error-message {
      color: red;
      margin-top: 5px;
    }

    .error-message {
      color: red;
      text-align: center;
      margin-top: 10px;
    }

    .submit-btn {
      width: 100%;
      padding: 10px;
      background-color: #4caf50;
      border: none;
      border-radius: 4px;
      color: #fff;
      cursor: pointer;
    }

    .submit-btn:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="card">
      <h2>Agent Login</h2>
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" name="username" required>
        </div>

        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" name="password" required>
        </div>

        <?php if (!empty($message)) : ?>
          <p class="error-message"><?php echo $message; ?></p>
        <?php endif; ?>

        <input type="submit" value="Login" class="submit-btn">
      </form>
    </div>
  </div>
</body>

</html>