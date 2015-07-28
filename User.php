<?php
class User
{
    public $money;
    public $name;

    public function __construct($name, $money)
    {
        if(isset($name))
        {
            $this->name = $name;
        }

        if(isset($money))
        {
            $this->money = $money;
        }
    }
}

function user_from_form($db, $login, $password)
{
    $stmt = $db->stmt_init();
    if($stmt->prepare("SELECT name, money FROM User WHERE login = ? AND password = ?"))
    {
        $stmt->bind_param("ss", $login, $password);
        $stmt->execute();
        $name = "";
        $money = 0;
        $stmt->bind_result($name, $money);
        if($stmt->fetch()) {
            return new User($name, $money);
        }
    }

    return null;
}

function user_from_cookie($secret)
{

}