<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Please log in </title>
        <style><?php include 'style.css'; ?></style>
    </head>
    <body>
    <?php require 'Base.html';?>
        <section class="intro">
            <p>You need to log in if you want to write a Review.</p>
        </section>
        <div class="form_style">
        <form method="post" action="form.php">
            <p>Enter your username:
                <input type="text" name="user"/>
            </p>
            <p> Enter your password:
                <input type="password" name="pass"/>
            </p>
            <p>
                <input class="form_button" type="submit" name="submit" value="Submit"/>
            </p>
        </form>
        </div>
        <footer> By Bo</footer>
    </body>
</html>