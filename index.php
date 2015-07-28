<?php
require_once('db.inc.php');
require_once("User.php");
$bLoggedIn = false; //isset($_COOKIE["logged_in"]) and $_COOKIE["logged_in"] and false;
if(!$bLoggedIn and isset($_POST["submit"]))
{
    if(isset($_POST["name"]) and isset($_POST["password"]))
    {
        $user = user_from_form($db, $_POST["name"], $_POST["password"]);
        if(isset($user))
        {
            $bLoggedIn = true;
            setcookie("logged_in", true);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MalkNet</title>
</head>
<body>
<?php
if($bLoggedIn)
{
    ?>
    <h1>Willkommen im MalkNet: <?=$user->name?> (Credits: <?=$user->money?>)</h1>
    <?php
}
else
{
    ?>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <label for="password">Passwort:</label>
        <input type="password" id="password" name="password">
        <input type="submit" name="submit" id="submit" value="Login">
    </form>
    <?php
}
?>
</body>
</html>