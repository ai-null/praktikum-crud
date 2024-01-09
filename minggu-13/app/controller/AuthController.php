<?php

class AuthController extends BaseController {

    public function __construct($isNeedAuthMiddleware = true) {
        parent::__construct($isNeedAuthMiddleware);
    }

    public $error = false;

    public function doLogin() {
        if(isset($_POST["submit"])) {
            $data = UserModel::init($_POST['username'], $_POST['password']);
            $result = $this->query($data->getSelectOneQuery());
            if(count($result) == 1) {
                $_SESSION["login"] = true;
                $_SESSION["error"] = false;
                $this->moveTo("home");
                exit;
            } else {
                $_SESSION["error"] = true;
            }
        } else {
            $_SESSION["error"] = false;
        }
    }

    public function doRegister() {
        if(isset($_POST["submit"])) {
            $data = UserModel::init($_POST['username'], $_POST['password']);
            // echo $data->getInsertQuery();
            if ($this->insert($data->getInsertQuery()) > 0) {
                $this->showMessage('data berhasil ditambahkan!', 'login');
            } else {
                $this->error = true;
            }
        }
    }

    public function doLogout() {
        $_SESSION = [];
        session_unset();
        session_destroy();

        $this->moveTo('login');
        exit;
    }
}
?>