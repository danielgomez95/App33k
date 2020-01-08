<h1>Register Now</h1>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <label>First Name</label>
    <input type="text" name="firstName">
    <label>Middle Name</label>
    <input type="text" name="middleName">
    <label>Last Name</label>
    <input type="text" name="lastName">
    <label>Address</label>
    <input type="text" name="address">
    <label>Contact Number</label>
    <input type="number" name="contactNumber">
    <label>Age</label>
    <input type="number" name="age">
    <label>Birthday</label>
    <input type="date" name="birthday">
    <label>Email Address</label>
    <input type="text" name="emailAddress">
    <a href="../../">Cancel</a>
    <button class="button" type="submit" name="register">Submit</button>
</form>