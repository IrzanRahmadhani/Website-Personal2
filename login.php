<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === "admin" && $password === "admin123") {
        $_SESSION["admin_logged_in"] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome untuk ikon mata -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: "Montserrat", sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
    background-color: var(--header-bg, #fcf346);
    color: var(--header-color, #040400);
    padding: 35px 40px;
    display: flex;
    justify-content: center;
    align-items: center;
      /* position: sticky; */
  /* top: 0; */
    z-index: 100;  /* Pastikan header tetap berada di atas konten lain */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

        .container {
            max-width: 400px;
            margin: 60px auto;
            padding: 30px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .card h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .card label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        .card input[type="text"],
        .card input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper i {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #888;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background-color: #fcf346;
            color: #040400;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .alert {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }

        .back-icon {
    display: inline-block;
    background-color: #fcf346;
    border: 2px solid #ccc;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    text-align: center;
    line-height: 40px;
    color: #333;
    font-size: 18px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    margin-bottom: 15px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.back-icon:hover {
    background-color: #fcf346;
    color: #040400;
    transform: scale(1.05);
}

    </style>
</head>
<body>
<header>Login Admin</header>

<div class="container">
    <a href="home.html" class="back-icon">
  <i class="fa-solid fa-arrow-left"></i>
</a>

    <div class="card">
        <h2>Masuk sebagai Admin</h2>
        <?php if (!empty($error)): ?>
            <div class="alert"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST">
            <label>Username:</label>
            <input type="text" name="username" required>

            <label>Password:</label>
            <div class="password-wrapper">
                <input type="password" name="password" id="password" required>
                <i class="fa-solid fa-eye" id="togglePassword" onclick="togglePassword()"></i>
            </div>

            <input type="submit" value="Login" class="btn">
        </form>
    </div>
</div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById("password");
        const toggleIcon = document.getElementById("togglePassword");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        }
    }
</script>

</body>
</html>
