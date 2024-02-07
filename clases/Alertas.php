<?PHP

class Alertas
{


    /**
     * Registra una alerta en el sitema, guardandola en la sesión
     * @param string $tipo el tipo de alerta danger/warning/success
     * @param string $mensaje El contenido de la alerta
     */
    public function incluir_alerta(string $tipo, string $mensaje)
    {
        $_SESSION['alertas'][] = [
            'tipo' => $tipo,
            'mensaje' => $mensaje
        ];
    }

    /**
     * Vacia la lista de alertas
     */
    public function limpiar_alertas()
    {
        $_SESSION['alertas'] = [];
    }


     /**
     * Devuelve todas las alertas acumuladas en el sistema, y vacia la lista
     * @return string 
     */
    public function get_alertas()
    {

        if (!empty($_SESSION['alertas'])) {

            $alertaActual = "";
            foreach ($_SESSION['alertas'] as $alerta) {
                $alertaActual .= $this->print_alerta($alerta);
            }
            $this->limpiar_alertas();
            return $alertaActual;
        } else {
            return null;
        }
    }

    private function print_alerta($alerta): string
    {
        $html = "<div class='alert alert-{$alerta['tipo']} alert-dismissible fade show' role='alert'>";
        $html .= $alerta['mensaje'];
        $html .= "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
        $html .= "</div>";    

        return $html;
    }
}