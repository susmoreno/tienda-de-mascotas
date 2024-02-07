<?PHP

class Tipos
{

    protected $id;
    protected $tipo;



    /**
     * Devuelve el listado completo de tipos en sistema
     */
    public function lista_tipos(): array
    {
        $conexion = (new Conectar())->getConectar();
        $query = "SELECT * FROM tipo_id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $lista = $PDOStatement->fetchAll();

        return $lista;
    }


    /**
     * Devuelve los datos de un tipo en particular
     * @param int $id El ID único del tipo
     */
    public function get_x_id(int $id): ?Tipos
    {

        $conexion = (new Conectar())->getConectar();
        $query = "SELECT * FROM tipo_id WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);

        $PDOStatement->execute([$id]);

        $result = $PDOStatement->fetch();

        return $result ?? null;
    }


    /**
     * Inserta un nuevo personaje a la base de datos
     * @param string $nombre
     * @param string $alias
     * @param string $creador Creador o creadores del personaje, separados por comas
     * @param int $primera_aparicion El año en el que el personaje hizo su primera aparición (4 dígitos)
     * @param string $biografia 
     * @param string $imagen ruta a un archivo .jpg o .png 
     */
    public function insertarTipo(string $id, string $tipo)
    {
        $conexion = (new Conectar())->getConectar();
        $query = "INSERT INTO tipo_id (`id`, `tipo`) VALUES (:id, :tipo)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id' => $id,
                'tipo' => $tipo,
                ]
        );
    }



    /**
     * Get the value of tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }


    /**
     * Get the value of id
     */
    public function getTipo_id()
    {
        return $this->id;
    }

}