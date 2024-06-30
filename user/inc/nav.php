<nav>
    <a href="index.php"><img src="img/logo.png"></a>
    <div class="nav-links">
        <ul>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="profile.php">Hello, <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
                <li><a href="addtocart.php">Cart</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php">Login/Sign-up</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
