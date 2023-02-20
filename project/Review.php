<?php

    session_start();
    //connect to MySQL
    $db = mysqli_connect('localhost', 'root', '') or die ('Unable to connect. Check your connection parameters.');
    
    //create the main database if it doesn't already exist
    $query = 'CREATE DATABASE IF NOT EXISTS reviewsite';
    mysqli_query($db, $query) or die(mysqli_error($db));

    //make sure our recently created database is the active one
    mysqli_select_db($db, 'reviewsite') or die(mysqli_error($db));

    //create the movie table
    $query = 'CREATE TABLE IF NOT EXISTS reviews (
        review_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
        review_name VARCHAR(30) NOT NULL,
        review_img VARCHAR(30) NOT NULL,
        review_grade VARCHAR(20) NOT NULL,
        review_category VARCHAR(40) NOT NULL,
        review_text VARCHAR(2000) NOT NULL,
        PRIMARY KEY (review_id)
    )
    ENGINE=MyISAM';
    mysqli_query($db, $query) or die (mysqli_error($db));

    if(!isset($_SESSION['loaded'])){
        $_SESSION['loaded'] = 1;
    }
       

    if(isset($_POST['submit']) && $_SESSION['loaded'] == 2)
    {    
        mysqli_select_db($db, 'reviewsite') or die(mysqli_error($db));

        $review_name = $db->real_escape_string($_POST['game_name']);
        $review_img = $db->real_escape_string($_POST['game_img']);
        $review_grade = $db->real_escape_string($_POST['grade']);
        $review_category = "";
        $review_text = $db->real_escape_string($_POST['review_text']);
        
        if(!empty($_POST['check_list'])){
          foreach($_POST['check_list'] as $selected){
            $review_category = $review_category . " , " . $selected;
          }
          substr_replace($review_category, "", -1);
        }

        $query = mysqli_query($db, "INSERT INTO `reviews` 
            (`review_name`, `review_img`, `review_grade`, `review_category`, `review_text`) 
            VALUES 
            ('$review_name', '$review_img', '$review_grade', '$review_category', '$review_text')");
        
        $_SESSION['loaded']= 1;
    }
?>
<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>Game review website</title>
        <style><?php include 'style.css'; ?></style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body>
      <header>
        <img class="logo" src="./images/logo.jpg" alt="" />
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">MENU </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="Main_page.html">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Review <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Informations
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="About.html">About</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="Contact.html">Contact</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <section class="intro">
            <h1>Video Games Reviews</h1>
            <p>
                You can find here various video game review made by our team.
            </p>
        </section>
        <div class="article_text">

            <img class="photo" src="images/warhammer.jpg"/>
            <h3>Total War: Warhammer 3</h3>
            <p>
                Total War: Warhammer 3, the conclusion to Creative Assembly's Warhammer trilogy, is also its strangest and most experimental, letting 
                players leave the traditional Total War sandbox every 30 or so turns to journey through the Realm of Chaos, where the domains of the Chaos gods exist, 
                culminating in huge survival battles that draw from tower defence games,  with fortifications, in-battle recruitment and waves of enemies. 
                It's an impressive campaign, though the narrative elements and Realm of Chaos jaunts make it a bit more linear than most. The real treat, though, is the 
                list of factions. The Chaos factions in particular are a monstrous delight, especially the Daemons of Chaos, which not only lets you recruit units from 
                every daemonic faction, you even get a fully customisable leader with limbs that you can mix and match. It's basically an RPG. 
            </p>
            <p><strong>Grade : </strong> B</p>
            <p><strong>Category : </strong> Strategy </p>

            <img class="photo" src="images/lis.jpg"/>
            <h3>Life is Strange: True Colors</h3>
            <p>
            The story has some good twists and is especially strong in how it explores Alex’s past in the foster care system and her family issues. The narrative is 
            emotional, dealing with grief, abandonment, and self-worth, but it’s also just as much about finding your own path in life. The latter really comes together 
            nicely in the final moments, letting you have a considerable impact on what Alex’s future holds. True Colors’ writing is so strong that it didn’t need a supernatural ability to tell this story. And there’s something special in how True 
             Colors gives you the power to decide her future and what her life needs, making for a memorable ending with a highlight reel of what you envision for the character. 
             Due to all branching choice variations, you can probably get in a few different playthroughs, but the overall message never changes: Don’t give up. 
             It may be a well-worn saying, but it means a lot in Alex Chen’s pained life. 
            </p>
            <p><strong>Grade : </strong> A</p>
            <p><strong>Category : </strong> Adventure </p>
        </div>
        <?php
        
            $query = "SELECT * FROM reviews";

            $result = mysqli_query($db, $query) or die(mysqli_error($db));
            $arr_res = ["","","","",""];
            // show the results
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
            while ($row = mysqli_fetch_assoc($result)) {
                $arr_res[0] = $row["review_name"];
                $arr_res[1] = $row["review_img"];
                $arr_res[2] = $row["review_grade"];
                $arr_res[3] = $row["review_category"];
                $arr_res[4] = $row["review_text"];
                echo  
                '<div class="article_text">
                    <img class="photo" src="images/',$arr_res[1],'.jpg"/>
                    <h3>',$arr_res[0],'</h3>
                    <p>', $arr_res[4],'</p>
                    <p><strong>Grade : </strong>', $arr_res[2],'</p>
                    <p><strong>Category : </strong> ', $arr_res[3],' </p>
                </div>';
            }
        ?>
        <a href="login.php"><button type="button" class="button">Write a Review</button></a> 
    </body>
</html>