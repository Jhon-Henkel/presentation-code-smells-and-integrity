<?php

class DConstants
{
    const START_URL = 'http://localhost/public/admin/?pagina=inicio';
    const LOGIN_URL = 'http://localhost/public/admin/?pagina=admin-login';
    const INVALID_LOGIN_MESSAGE = 'Login inválido';

    public function adminLoginSubmit()
    {
        if (isset($_SESSION['admin'])) {
            header('location:' . self::START_URL);
        }
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            header('location:' . self::START_URL);
            return;
        }
        if (!isset($_POST['adminLogin']) || !isset($_POST['adminPass'])) {
            $_SESSION['error'] = self::INVALID_LOGIN_MESSAGE;
            header('location:' . self::LOGIN_URL);
            return;
        }
        $adminUser = (trim($_POST['adminLogin']));
        $adminPass = $_POST['adminPass'];
        $admin = new AdminModel();
        $isValid = $admin->validateLoginAdmin($adminUser, $adminPass);
        if (!$isValid) {
            $_SESSION['error'] = self::INVALID_LOGIN_MESSAGE;
            header('location:' . self::LOGIN_URL);
            return;
        }
        $_SESSION['admin']  = $isValid->id_admin;
        $_SESSION['user']   = $isValid->usuario_admin;
        header('location:' . self::START_URL);
    }
}