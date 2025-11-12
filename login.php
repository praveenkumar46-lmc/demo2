<?php
session_start();

// If user is already logged in, redirect to the dashboard
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: dashboard.php");
    exit;
}

require_once "config.php";

$email = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        $errors[] = "Both email and password are required.";
    }

    if (empty($errors)) {
        $sql = "SELECT id, email, password FROM users WHERE email = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $param_email);
            $param_email = $email;

            if ($stmt->execute()) {
                $stmt->store_result();

                // Check if email exists, if yes then verify password
                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $email, $hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;

                            // Redirect user to dashboard page
                            header("location: dashboard.php");
                            exit();
                        } else {
                            $errors[] = "Invalid email or password.";
                        }
                    }
                } else {
                    $errors[] = "Invalid email or password.";
                }
            } else {
                $errors[] = "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Food Maveriks</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Using the same style as register.php for consistency -->
    <style>
        :root {
            --hero-green: #2d594e;
            --nav-green: #183D3D;
            --text-dark: #2C2C2C;
            --global-bg-color: #eaf2f0;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--global-bg-color);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .form-wrapper {
            background-color: #fff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .form-wrapper h2 {
            color: var(--hero-green);
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 2rem;
        }
        .form-wrapper p {
            color: #666;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-dark);
        }
        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
        }
        .form-submit-btn {
            width: 100%;
            background-color: var(--hero-green);
            color: #FFFFFF;
            border: none;
            border-radius: 8px;
            padding: 14px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-submit-btn:hover {
            background-color: #1b4e41;
        }
        .register-link {
            margin-top: 20px;
            color: #555;
        }
        .register-link a {
            color: var(--nav-green);
            font-weight: 600;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="form-wrapper">
        <h2>Welcome Back!</h2>
        <p>Login to continue your journey.</p>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="form-submit-btn">Login</button>
            </div>
        </form>

        <div class="register-link">
            Don't have an account? <a href="register.php">Register here</a>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    if (!empty($errors)) {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                text: 'Invalid email or password.',
                confirmButtonColor: '#2d594e'
            });
        </script>";
    }
    // Check for registration success message
    if (isset($_GET['status']) && $_GET['status'] == 'registered') {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Registration Successful!',
                text: 'You can now log in with your credentials.',
                confirmButtonColor: '#2d594e'
            });
        </script>";
    }
    ?>
</body>
</html>