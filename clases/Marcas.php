<?php
class Marcas{
    protected $id;
    protected $nombre;
    protected $descripcion;
    protected $creador;
    protected $imagen;

       /**
     * Devuelve todos los artistas en base
     * @return Marcas[]
     */
    public function todas_marcas(): array
    {
        $conexion = (new Conectar())->getConectar();
        $query = "SELECT * FROM marca_id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $result = $PDOStatement->fetchAll();

        return $result;
    }
    
    /**
     * Devuelve los datos de un artista en particular
     * @param int $id El ID único del artista 
     */
     public function get_marca_id($id):Marcas{
        $conectar = (new Conectar())->getConectar();
        $query = "SELECT * FROM marca_id WHERE id = ?";
    
        $PDOStatement = $conectar->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    
        $PDOStatement->execute([$id]);
    
        $result = $PDOStatement->fetch();
    
        return $result ?? null;
         }

     public function insert(string $nombre, string $descripcion, string $creador, string $imagen)
    {
        $conexion = (new Conectar())->getConectar();
        $query = "INSERT INTO marca_id (`nombre`, `descripcion`, `creador`, `imagen`) VALUES (:nombre, :descripcion, :creador, :imagen)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'creador' => $creador,
                'imagen' => $imagen
            ]
        );
    }

    /**
     * Edita los datos de un personaje en la base de datos
     * @param string $nombre
     * @param string $descripcion
     * @param string $creador Creador o creadores del personaje, separados por comas
     * @param int $primera_aparicion El año en el que el personaje hizo su primera aparición (4 dígitos)
     * @param string $biografia 
     * @param string $imagen ruta a un archivo .jpg o .png 
     */
    public function edit($nombre, $descripcion, $creador, $imagen)
    {

        $conexion = (new Conectar())->getConectar();
        $query = "UPDATE marca_id SET nombre = :nombre, descripcion = :descripcion, creador = :creador, imagen = :imagen WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id' => $this->id,
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'creador' => $creador,
                'imagen' => $imagen
            ]
        );
    }


     /**
     * Elimina esta instancia de la base de datos
     */
    public function delete()
    {
        $conexion = (new Conectar())->getConectar();
        $query = "DELETE FROM marca_id WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }

    public function puedeEliminarse()
    {
        $conectar = (new Conectar())->getConectar();
        $query = "SELECT COUNT(*) FROM productos WHERE marca_id = ?";
        $PDOStatement = $conectar->prepare($query);
        $PDOStatement->execute([$this->id]);

        $numProductos = $PDOStatement->fetchColumn();

        return $numProductos == 0;
    }




    public function getMarca_id()
    {
        return $this->id;
    }

    public function getMarca_nombre()
    {
        return $this->nombre;
    }

    public function getMarca_descripcion()
    {
        return $this->descripcion;
    }
    public function getMarca_creador()
    {
        return $this->creador;
    }
    public function getMarca_imagen()
    {
        return $this->imagen;
    }
}
?>