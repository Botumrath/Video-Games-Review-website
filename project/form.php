 <?php
    session_start();
    $_SESSION['username'] = $_POST['user'];
    $_SESSION['userpass'] = $_POST['pass'];
    $_SESSION['loaded'] = 2;
    //check username and password info
    if(($_SESSION['username'] == 'Bo' and $_SESSION['userpass'] == '1234') or $_SESSION['authuser'] == 1){
        $_SESSION['authuser'] == 1;
        }
    else{
        echo 'You don\'t have the permission to access this website';
        exit();
    }
?>
<script>
    function radio_click(){
        alert('You chose a grade')
    }
</script>
<!DOCTYPE html>
<html>
    <head>
        <title> new review </title>
        <style><?php include 'style.css'; ?></style>
    </head>
    <body>
    <?php require 'Base.html';?>
        <div class="form_style2">
        <form method="post" action="Review.php">
            <p>Name of the game:
                <input type="text" name="game_name"/>
            </p>
            <p>Image path:
                <input type="text" name="game_img"/>
            </p>
            <div>
                <label >Grade: </label>
                <input type="radio" onClick="radio_click()" name="grade" value="A"/> <label >A</label>
                <input type="radio" onClick="radio_click()" name="grade" value="B"/><label >B</label>
                <input type="radio" onClick="radio_click()" name="grade" value="C"/><label >C</label>
                <input type="radio" onClick="radio_click()" name="grade" value="D"/><label >D</label>
            </div>
            <div>
                <label >Category: </label><br/>
                <label >Action : </label>
                <input type="checkbox" name="check_list[]" value="Action"/>
                <label >Strategy : </label>
                <input type="checkbox" name="check_list[]" value="Strategy"/>
                <label >Role-Play : </label>
                <input type="checkbox" name="check_list[]" value="RP"/>
                <label >Adventure : </label>
                <input type="checkbox" name="check_list[]" value="Adventure"/>
            </div>
            <p> Review:
                <textarea id="review_text" name="review_text" rows="12" cols="45"></textarea>
            </p>
            <p>
                <input class="form_button" type="submit" name="submit" value="Submit"/>
            </p>
        </form>
        </div>
        <footer> By Bo</footer>
    </body>
</html>