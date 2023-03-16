<?php

class CTirandoComplexidade
{
    public function adminLoginSubmit()
    {
        if (isset($_SESSION['admin'])) {
            header('location:http://localhost/public/admin/' . '?pagina=' . 'inicio');
        }
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            header('location:http://localhost/public/admin/' . '?pagina=' . 'inicio');
            return;
        }
        if (!isset($_POST['adminLogin']) || !isset($_POST['adminPass'])) {
            $_SESSION['error'] = 'Login ou senha inválido, tente novamente';
            header('location:http://localhost/public/admin/' . '?pagina=' . 'admin-login');
            return;
        }
        $adminUser = (trim($_POST['adminLogin']));
        $adminPass = $_POST['adminPass'];
        $admin = new AdminModel();
        $isValid = $admin->validateLoginAdmin($adminUser, $adminPass);
        if (!$isValid) {
            $_SESSION['error'] = 'Login Inválido';
            header('location:http://localhost/public/admin/' . '?pagina=' . 'admin-login');
            return;
        }
        $_SESSION['admin']  = $isValid->id_admin;
        $_SESSION['user']   = $isValid->usuario_admin;
        header('location:http://localhost/public/admin/' . '?pagina=' . 'inicio');
    }
}