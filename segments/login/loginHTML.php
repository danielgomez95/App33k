<h1>Log In</h1>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <label>Username / Email Address</label>
    <input type="text" name="username">
    <label>Password</label>
    <input type="password" name="password">
    <a href="segments/register/register.php">Register Now</a>
    <button class="button" type="submit" name="login">Log In</button>
    </div>
</form>