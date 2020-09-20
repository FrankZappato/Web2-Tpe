<?php
    require_once "header.php";
?>

    <main>
        <h1>SignUp</h1>
        <?php
            if(isset($_GET['error'])){
                if($_GET['error']=="emptyfields"){
                    echo "<p>Fill all the fields!</p>";
                }
                else if($_GET['error']=="invaildmailuid"){
                    echo "<p>Invaild E-mail or User!</p>";
                }
            }
            else if($_GET["signup"] == "success"){
                echo "<p>Succesed Login</p>";
            }            
        ?>
        <form action="includes/signup.inc.php" method="post">
        <input type="text" name="uid" placeholder="Username">
        <input type="text" name="mail" placeholder="E-mail">
        <input type="password" name="pwd" placeholder="Password">
        <input type="password" name="pwd-repeat" placeholder="Repeat Password">
        <button type="submit" name="signup-submit">Signup</button>
        </form>
    </main>
<?php
require "footer.php";
?>   