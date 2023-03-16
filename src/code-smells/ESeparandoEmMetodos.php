<?php

class ESeparandoEmMetodos
{
    const START_URL = 'http://localhost/public/admin/?pagina=inicio';
    const LOGIN_URL = 'http://localhost/public/admin/?pagina=admin-login';
    const INVALID_LOGIN_MESSAGE = 'Login inválido';

    public function adminLoginSubmit():void
    {
        $this->isAdminLogged();
        $this->isPostMethod();
        $this->validatePost();
        $admin = new AdminModel();
        $user = $admin->validateLoginAdmin(trim($_POST['adminLogin']), $_POST['adminPass']);
        if (!$user) {
            $this->returnInvalidLogin();
        }
        $this->returnValidLogin($user);
    }

    public function isAdminLogged(): void
    {
        if (isset($_SESSION['admin'])) {
            $this->redirect(self::START_URL);
        }
    }

    public function isPostMethod(): void
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $this->redirect(self::START_URL);
        }
    }

    public function validatePost(): void
    {
        if (!isset($_POST['adminLogin']) || !isset($_POST['adminPass'])) {
            $_SESSION['error'] = self::INVALID_LOGIN_MESSAGE;
            $this->redirect(self::LOGIN_URL);
        }
    }

    public function returnInvalidLogin(): void
    {
        $_SESSION['error'] = self::INVALID_LOGIN_MESSAGE;
        $this->redirect(self::LOGIN_URL);
    }

    public function returnValidLogin(stdClass $user): void
    {
        $_SESSION['admin']  = $user->id_admin;
        $_SESSION['user']   = $user->usuario_admin;
        $this->redirect(self::START_URL);
    }

    public function redirect(string $url): void
    {
        header('location:' . $url);
    }
}