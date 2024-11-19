<?php
require_once ROOT_PATH . 'core/Controller.php';
require ROOT_PATH . 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SiteController extends Controller
{
    public function login()
    {   
        require_once ROOT_PATH . 'config/db.php'; // Include your database connection settings

        $error = ''; // Variable to store any error messages

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize and retrieve form inputs
            $username = htmlspecialchars(trim($_POST['username']));
            $password = htmlspecialchars(trim($_POST['password']));

            // Prepare SQL statement to fetch the user by username
            $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            $stmt->close();

            // Check if the user exists
            if ($user) {
                // Verify the password
                if (password_verify($password, $user['password'])) {
                    // Set user session variables
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    
                    // Set success message with username for SweetAlert after successful login
                    $_SESSION['success'] = "Welcome back, " . $user['username'] . "!";
                    // Redirect to the index page after successful login
                    header("Location: " . BASE_URL . "index.php?r=site/index");
                    exit;
                } else {
                    $error = "Invalid password.";
                }
            } else {
                $error = "Invalid username.";
            }
        }

        $data = ['title' => 'UTM Gatherly', 'error' => $error];
        $this->renderPartial('login', $data);
    }

    public function signup()
    {
        require_once ROOT_PATH . 'config/db.php'; // Include your database connection settings

        $error = ''; // Variable to store any error messages
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Sanitize and retrieve form inputs
            $username = htmlspecialchars(trim($_POST['username']));
            $email = htmlspecialchars(trim($_POST['email']));
            $password = htmlspecialchars(trim($_POST['password']));

            // Check if username or email already exists
            $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = ? OR email = ?");
            $stmt->bind_param('ss', $username, $email);
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();
            $stmt->close();

            if ($count > 0) {
                // Username or email already exists
                $error = "Username or email is already taken. Please choose another.";
                $data = ['title' => 'UTM Gatherly', 'error' => $error];
                $this->renderPartial('signup', $data);
                return;
            }

            // Hash the password for security
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Insert the user data into the database
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param('sss', $username, $email, $hashedPassword);

            if ($stmt->execute()) {
                // Get the ID of the newly created user
                $userId = $stmt->insert_id; // Retrieve last inserted ID
                $_SESSION['user_id'] = $userId;
                $_SESSION['username'] = $username;

                // Set success session to display sweetalert message after successful signup
                $_SESSION['success'] = "Signup successful! Welcome to Gatherly.";
                // Redirect to the index page
                header("Location: " . BASE_URL . "index.php?r=site/index");
                exit;

            } else {
                $error = "Signup failed. Please try again.";
                $data = ['title' => 'Sign Up', 'error' => $error];
                $this->renderPartial('signup', $data);
                return;
            }
            
            $stmt->close();
        }

        $data = ['title' => 'UTM Gatherly', 'error' => $error];
        $this->renderPartial('signup', $data);
    }

    public function index()
    {
        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) {
            // If not logged in, redirect to the login page
            header("Location: " . BASE_URL . "index.php?r=site/login");
            exit; // Stop further execution
        }
        
        $data = ['title' => 'Home'];
        $this->render('index', $data);
    }

    public function forgotPassword()
    {
        require_once ROOT_PATH . 'config/db.php'; // Include your database connection settings

        $error = ''; // Variable to store any error messages

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Sanitize and retrieve form inputs
            $email = htmlspecialchars(trim($_POST['email']));

            // Check if username or email already exists
            $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 0) {
                // Username or email dont exists
                $_SESSION['error'] = "This email address don't exist.";
            } else {

                // Generate a unique token for password reset
                $token = bin2hex(random_bytes(16));
                $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

                // Store the token in the database
                $updateQuery = "UPDATE users SET reset_token = ?, reset_token_expiry = ? WHERE email = ?";
                $stmt = $conn->prepare($updateQuery);
                $stmt->bind_param("sss", $token, $expiry, $email);
                $stmt->execute();

                $mail = new PHPMailer(true);

                try {
                    // SMTP Configuration
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP host
                    $mail->SMTPAuth = true;
                    $mail->Username = 'fairul.haziq@gmail.com'; // Your email
                    $mail->Password = 'dfawqf'; // Your email password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    // Email Configuration
                    $mail->setFrom('fairul.haziq@gmail.com', 'UTM Gatherly');
                    $mail->addAddress($email);
                    $mail->isHTML(true);

                    $resetLink = BASE_URL . "index.php?r=site/resetPassword?token=" . $token;

                    $mail->Subject = 'Password Reset Request';
                    $mail->Body = "Hello,<br><br>Click the link below to reset your password:<br><a href='$resetLink'>$resetLink</a><br><br>This link will expire in 1 hour.";
                    $mail->AltBody = "Click the link to reset your password: $resetLink";

                    $mail->send();
                    echo json_encode(['success' => true, 'message' => 'If an account with this email exists, a password reset link will be sent.']);
                    $_SESSION['error'] = "This email address don't exist.";
                } catch (Exception $e) {
                    echo json_encode(['success' => false, 'message' => 'Failed to send reset email. Please try again.']);
                }
            }


            
        }

        // If logged in, proceed to render the home page
        $data = ['title' => 'UTM Gatherly', 'error' => $error];
        $this->renderPartial('forgot_password', $data);
    }

    public function resetPassword(){

    }

    public function logout()
    {
        // Clear all session variables
        session_unset();
        session_destroy();
        header("Location: " . BASE_URL . "index.php?r=site/login");
        exit;
    }

    public function about()
    {
        $data = ['title' => 'About'];
        $this->render('about', $data);
    }
}