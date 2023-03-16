<?php

class BRemovendoEspacosRenomeandoVariaveis
{
    public function adminLoginSubmit()
    {
        if (!isset($_SESSION['admin'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['adminLogin']) || isset($_POST['adminPass'])) {
                    $adminUser = (trim($_POST['adminLogin']));
                    $adminPass = $_POST['adminPass'];
                    $admin = new AdminModel();
                    $isValid = $admin->validateLoginAdmin($adminUser, $adminPass);
                    if ($isValid) {
                        $_SESSION['admin']  = $isValid->id_admin;
                        $_SESSION['user']   = $isValid->usuario_admin;
                        header('location:http://localhost/public/admin/' . '?pagina=' . 'inicio');
                        return;
                    }
                    $_SESSION['error'] = 'Login Inválido';
                    header('location:http://localhost/public/admin/' . '?pagina=' . 'admin-login');
                    return;
                }
                $_SESSION['error'] = 'Login ou senha inválido, tente novamente';
                header('location:http://localhost/public/admin/' . '?pagina=' . 'admin-login');
                return;
            }
            header('location:http://localhost/public/admin/' . '?pagina=' . 'inicio');
            return;
        }
        header('location:http://localhost/public/admin/' . '?pagina=' . 'inicio');
    }
}