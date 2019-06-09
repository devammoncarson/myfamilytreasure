<!DOCTYPE html> 
<html lang="en-us">
    <head>
        <title>HOME | MyFamilyTreasure</title>
        <meta name="description" content="Welcome to MyFamilyTreasure!">
        <meta charset="utf-8">
        <meta name="author" content="Ammon Carson">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/images/favicon.ico"/>
        <link rel="stylesheet" href="../assets/styles/main.css"/>
        <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="pagetitle">
            <h1>My Family Treasure</h1>
            <h2 class="slogan">Where connection means everything</h2>
        </div>

        <div class="login">
            <h2>Login</h2>
            <form action="../index.php" method="post" id="login.php">
                <input type="hidden" name="action" value="login">

                <p class="mainerror"><?php if (isset($error)) {
    echo $error;
} ?></p>

                <div class="input">
                    <label>Email:</label>
                    <input type="text" name="email" required/>
                </div>

                <div class="input">
                    <label>Password:</label>
                    <input type="password" name="password" required/>
                </div>

                <label></label>
                <input class="button" type="submit" value="Login" />
                <br>
            </form>
        </div>



        <footer class="mainfooter">
            <div>
				<p class="register">Need to create an account? <a>Register Here</a></p>
                <p class="copyright">&copy; MyFamilyTreasure, Inc.</p>
            </div>
        </footer>
    </body>
</html>