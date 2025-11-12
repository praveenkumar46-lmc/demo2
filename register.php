<?php
require_once 'config.php';
session_start();

$errors = [];
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate email
    $email = trim($_POST['email']);
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate passwords
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    } elseif ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // Check if email already exists
    if (empty($errors)) {
        $sql = "SELECT id FROM users WHERE email = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $email);
            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows == 1) {
                    $errors[] = "This email is already taken.";
                }
            } else {
                $errors[] = "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }

    // If no errors, insert new user into the database
    if (empty($errors)) {
        // HASH the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ss", $email, $hashed_password);
            if ($stmt->execute()) {
                // Redirect to login page with a success message
                header("location: login.php?status=registered");
                exit();
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
    <title>Register - Food Maveriks</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        :root { /* Copied from your main site for consistency */
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
        .login-link {
            margin-top: 20px;
            color: #555;
        }
        .login-link a {
            color: var(--nav-green);
            font-weight: 600;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="form-wrapper">
        <h2>Create Account</h2>
        <p>Join the Food Maveriks community.</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="form-submit-btn">Register</button>
            </div>
        </form>

        <div class="login-link">
            Already have an account? <a href="login.php">Login here</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    if (!empty($errors)) {
        $error_message = implode("\\n", $errors);
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Registration Failed',
                text: '{$error_message}',
                confirmButtonColor: '#2d594e'
            });
        </script>";
    }
    ?>
</body>
</html>