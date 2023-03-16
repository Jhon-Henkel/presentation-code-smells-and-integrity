<?php

class ATotalSmell
{
    public function adminLoginSubmit(){

        if (!isset($_SESSION['admin'])) {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                if (isset($_POST['adminLogin']) || isset($_POST['adminPass'])) {

                    $a = (trim($_POST['adminLogin']));
                    $b = $_POST['adminPass'];

                $new = new AdminModel();
                $valid = $new->validateLoginAdmin($a, $b);

                    if ($valid) {

                            $_SESSION['admin']  = $valid->id_admin;
                            $_SESSION['user']   = $valid->usuario_admin;

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