<?php 
class UserModel
{
    public $idGuru = null;
    public string $username;
    public string $password;

    function __construct($idGuru, $username, $password)
    {
        $this->$idGuru = $idGuru;
        $this->username = $username;
        $this->password = $password;
    }

    static function init($username, $password) {
        $model = new UserModel('null', $username, $password);
        return $model;
    }

    function getInsertQuery() {
        return "INSERT INTO `user` VALUES (DEFAULT, '$this->username','$this->password');";
    }

    function getSelectOneQuery() {
        return "SELECT * FROM `user` WHERE username = '$this->username' AND password = '$this->password';";
    }
};
?>