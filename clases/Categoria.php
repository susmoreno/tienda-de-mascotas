<?php
class Categoria{
    protected $id;
    protected $nombre_categoria;
    protected $imagen;

    public function getCategorias(int $id): ?Categoria
    {
        $conectar = (new Conectar())->getConectar();
        $query = "SELECT * FROM categoria_id WHERE id = $id";

        $completar = $conectar->prepare($query);
        $completar->setFetchMode(PDO::FETCH_CLASS, self::class);
        $completar->execute();

        $result = $completar->fetch(); 
   
        return $result ?? null;
    }

    public function getCategorias_tablas()
    {
        $conectar = (new Conectar())->getConectar();
        $query = "SELECT * FROM categoria_id";

        $completar = $conectar->prepare($query);
        $completar->setFetchMode(PDO::FETCH_CLASS, self::class);
        $completar->execute();

        $result = $completar->fetchAll();

        return $result;
    }

    public function puedeEliminarse()
    {
        $conectar = (new Conectar())->getConectar();
        $query = "SELECT COUNT(*) FROM productos WHERE categoria_id = ?";
        $PDOStatement = $conectar->prepare($query);
        $PDOStatement->execute([$this->id]);

        $numProductos = $PDOStatement->fetchColumn();

        return $numProductos == 0;
    }

    public function get_categoria_id($id){
        $conectar = (new Conectar())->getConectar();
        $query = "SELECT * FROM categoria_id WHERE id = ?";
    
        $PDOStatement = $conectar->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    
        $PDOStatement->execute([$id]);
    
        $result = $PDOStatement->fetch();
    
        return $result ?? null;

    }

    public function insert(string $nombre_categoria, string $imagen)
    {
        $conexion = (new Conectar())->getConectar();
        $query = "INSERT INTO categoria_id (`nombre_categoria`,`imagen`) VALUES (:nombre_categoria, :imagen)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'nombre_categoria' => $nombre_categoria,
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
    public function edit($nombre_categoria, $imagen)
    {

        $conexion = (new Conectar())->getConectar();
        $query = "UPDATE categoria_id SET nombre_categoria = :nombre_categoria, imagen = :imagen WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id' => $this->id,
                'nombre_categoria' => $nombre_categoria,
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
        $query = "DELETE FROM categoria_id WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }


    public function getCategoria_nombre()
    {
        return $this->nombre_categoria;
    }

    public function getCategoria_id()
    {
        return $this->id;
    }

    public function getCategoria_imagen()
    {
        return $this->imagen;
    }
}
?>