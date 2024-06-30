<?php
session_start();
include 'inc/db.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Initialize variables
$success = false;
$errors = [];
$message = '';

// Fetch user profile data to pre-fill the form
$stmt = $conn->prepare("SELECT first_name, last_name, email, address, number FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $first_name = htmlspecialchars(trim($_POST['first-name']));
    $last_name = htmlspecialchars(trim($_POST['last-name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $address = htmlspecialchars(trim($_POST['address']));
    $number = htmlspecialchars(trim($_POST['contact-number']));
    $current_password = htmlspecialchars(trim($_POST['current-password']));
    $new_password = htmlspecialchars(trim($_POST['new-password']));
    $confirm_password = htmlspecialchars(trim($_POST['confirm-password']));

    // Validate and update profile data
    // Check if passwords are being changed and validate them
    $password_updated = false;
    if (!empty($current_password) || !empty($new_password) || !empty($confirm_password)) {
        // Fetch current password from the database
        $stmt_password = $conn->prepare("SELECT password FROM users WHERE id = ?");
        $stmt_password->bind_param("i", $user_id);
        $stmt_password->execute();
        $result_password = $stmt_password->get_result();
        $user_password = $result_password->fetch_assoc()['password'];
        $stmt_password->close();

        // Validate current password
        if (!password_verify($current_password, $user_password)) {
            $errors[] = "Current password is incorrect.";
        }

        // Validate new password
        if ($new_password != $confirm_password) {
            $errors[] = "New password and confirmation password do not match.";
        }

        // Update password if no errors
        if (empty($errors)) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt_update_password = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
            $stmt_update_password->bind_param("si", $hashed_password, $user_id);
            if ($stmt_update_password->execute()) {
                $password_updated = true;
            } else {
                $errors[] = "Failed to update password. Please try again later.";
            }
            $stmt_update_password->close();
        }
    }

    // Update profile data if no password update errors
    if ($password_updated || empty($errors)) {
        $stmt_update_profile = $conn->prepare("UPDATE users SET first_name = ?, last_name = ?, email = ?, address = ?, number = ? WHERE id = ?");
        $stmt_update_profile->bind_param("sssssi", $first_name, $last_name, $email, $address, $number, $user_id);
        
        if ($stmt_update_profile->execute()) {
            $success = true;
            // Update session data if necessary
            $_SESSION['user_name'] = $first_name . ' ' . $last_name;
            $message = "Profile updated successfully.";
            
            // Refresh user data after update
            $user['first_name'] = $first_name;
            $user['last_name'] = $last_name;
            $user['email'] = $email;
            $user['address'] = $address;
            $user['number'] = $number;
        } else {
            $errors[] = "Failed to update profile. Please try again later.";
        }
        $stmt_update_profile->close();
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Pawfect Shoppe</title>
    <link rel="stylesheet" href="css/editprofile.css">
    <link rel="stylesheet" href="css/nav.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <section class="header">
            <?php include("../inc/nav.php"); ?>   
        </section>
    </header>
    
    <!-- Main Content -->
    <main>
        <div class="account-container">
            <aside>
                <h2>Manage My Account</h2>
                <ul>
                    <li><a href="profile.php">My Profile</a></li>
                    <li><a href="address.php" class="active">Address Book</a></li>
                    <li><a href="payments.php">My Payment Options</a></li>
                </ul>
                <h2>My Orders</h2>
                <ul>
                    <li><a href="orders.php">My Orders</a></li>
                    <li><a href="returns.php">My Returns</a></li>
                    <li><a href="cancellations.php">My Cancellations</a></li>
                </ul>
            </aside>
            <section class="account-details">
                <h2>Edit Your Profile</h2>
                <?php if (!empty($errors)): ?>
                    <div class="error-message">
                        <?php foreach ($errors as $error): ?>
                            <p><?php echo $error; ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php elseif ($success): ?>
                    <div class="success-message">
                        <p><?php echo $message; ?></p>
                    </div>
                <?php endif; ?>
                <form id="edit-profile-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="first-name">First Name</label>
                        <input type="text" id="first-name" name="first-name" value="<?php echo htmlspecialchars($user['first_name']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name</label>
                        <input type="text" id="last-name" name="last-name" value="<?php echo htmlspecialchars($user['last_name']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($user['address']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="contact-number">Contact Number</label>
                        <input type="text" id="contact-number" name="contact-number" value="<?php echo htmlspecialchars($user['number']); ?>">
                    </div>
                    <div class="form-group">
                        <h3>Password Changes</h3>
                        <label for="current-password">Current Password</label>
                        <input type="password" id="current-password" name="current-password">
                    </div>
                    <div class="form-group">
                        <label for="new-password">New Password</label>
                        <input type="password" id="new-password" name="new-password">
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm New Password</label>
                        <input type="password" id="confirm-password" name="confirm-password">
                    </div>
                    <div class="form-actions">
                        <button type="button" id="cancel-button">Cancel</button>
                        <button type="submit" id="save-button">Save Changes</button>
                    </div>
                </form>
            </section>
        </div>
    </main>

    <script src="js/editprofile.js"></script>
</body>
</html>
