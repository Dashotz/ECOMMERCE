<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawfect Shoppe - Edit Profile</title>
    <link rel="stylesheet" href="css/editaddress.css">
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
            <!-- Sidebar -->
            <aside>
                <h2>Manage My Account</h2>
                <ul>
                    <li><a href="profile.php" class="active">My Profile</a></li>
                    <li><a href="address.php">Address Book</a></li>
                    <li><a href="payments.php">My Payment Options</a></li>
                </ul>
                <h2>My Orders</h2>
                <ul>
                    <li><a href="orders.php">My Orders</a></li>
                    <li><a href="returns.php">My Returns</a></li>
                    <li><a href="cancellations.php">My Cancellations</a></li>
                </ul>
            </aside>

            <!-- Edit Profile Section -->
            <section class="edit-profile">
                <h2>Edit Your Profile</h2>
                <div class="profile-form">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" placeholder="Enter your full name">
                    </div>
                    <div class="form-group">
                        <label>House / Unit / Flr #, Bldg Name, Blk or Lot</label>
                        <input type="text" placeholder="Enter your address">
                    </div>
                    <div class="form-group">
                        <label>Mobile Number</label>
                        <input type="text" placeholder="Enter your mobile number">
                    </div>
                    <div class="form-group">
                        <label>Province</label>
                        <input type="text" placeholder="Enter your province">
                    </div>
                    <div class="form-group">
                        <label>City/Municipality</label>
                        <input type="text" placeholder="Enter your city or municipality">
                    </div>
                    <div class="form-actions">
                        <button class="cancel-btn">Cancel</button>
                        <button class="save-btn">Save</button>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
