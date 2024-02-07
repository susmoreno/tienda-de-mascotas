<?PHP

class Autenticarse
{

    /**
     * Verifica las credenciales del usuario, y de ser correctas, guarda los datos en la sesión
     * @param string $username El nombre de usuario provisto
     * @param string $password El password provisto
     * @return bool Devuelve TRUE en caso que las credenciales sean correctas, FALSE en caso de que no lo sean
     */
    public function log_in(string $username, string $password): ?bool
    {

        $datosUsuario = (new Usuarios())->usuario_por_nombreusuario($username);

        if ($datosUsuario) {


            if (password_verify($password, $datosUsuario->getPassword())) {
                

                $datosLogin['username'] = $datosUsuario->getNombre_usuario();
                $datosLogin['nombre_completo'] = $datosUsuario->getNombre_completo();
                $datosLogin['id'] = $datosUsuario->getId();
                $datosLogin['rol'] = $datosUsuario->getRol();
                $_SESSION['loggedIn'] = $datosLogin;

                return $datosLogin['rol'];
            } else {
                (new Alertas())->incluir_alerta('danger', "Contraseña Incorrecta. Intente nuevamente");
                return FALSE;
            }
        } else {
            (new Alertas())->incluir_alerta('warning', "El usuario no se encuentra Registrado");
            return NULL;
        }
    }

    public function log_out()
    {
     
        if (isset($_SESSION['loggedIn'])) {
            unset($_SESSION['loggedIn']);
        };
    }

public function verify($admin = TRUE): bool
    {
      
        if (isset($_SESSION['loggedIn'])) {

            if($admin){

                if ($_SESSION['loggedIn']['rol'] == "admin" OR $_SESSION['loggedIn']['rol'] == "superadmin"){
                    return TRUE;
                }else{
                    (new Alertas())->incluir_alerta('warning', "El usuario no cuenta con permisos para ver el panel de administrador");
                    header('location: index.php?sec=login');
                }

            }else{
                return TRUE;
            }
        } else {
            header('location: index.php?sec=login');
        }
    }
}