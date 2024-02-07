<?php 
class Mascotas{
    private $id;
    private $nombre; 
    private $categoria;
    private $color;
    private $talle;
    private $especial;
    private $fecha;
    private $descripcion;
    private $mascotita;
    private $imagen;
    private $tipo;
    private $material;
    private $sabor;
    private $ingredientes;
    private $categoria_id;
    private $marca;
    private $tipo_id;
    private $precio;

    private static $crearValores = ['id', 'nombre', 'descripcion', 'material', 'talle', 'fecha', 'color', 'imagen', 'especial', 'precio'];


    /**
     * Devuelve una instancia del objeto Comic, con todas sus propiedades configuradas
     *@return Mascotas
     */
    private function createProducto($productosInfo): Mascotas
    {
        $producto = new self();

        foreach (self::$crearValores as $v) {
            $producto->{$v} = $productosInfo[$v];
        }

        $producto->marca = (new Marcas())->get_marca_id($productosInfo['marca_id']);
        $producto->categoria = (new Categoria())->get_categoria_id($productosInfo['categoria_id']);
        $tipos = !empty($productosInfo['tipos']) ? explode(",", $productosInfo['tipos']) : [];
        $arr_tipos = [];
        foreach ($tipos as $id_tipo) {
         $arr_tipos[] = (new Tipos)->get_x_id(intval($id_tipo));}
         $producto->tipo = $arr_tipos;

        return $producto;
    }


    public function catalogo_completo(): array
    {
        $catalogo = [];

        $conectar = (new Conectar())->getConectar();
        $query = "SELECT * FROM productos";

        $PDOStatement = $conectar->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        $productos = $PDOStatement->fetchAll();

        foreach ($productos as $productoInfo) {
            $catalogo[] = $this->createProducto($productoInfo);
        }

        return $catalogo;
    }

    public function cada_producto($categoria): array
    {
        $catalogo = [];
    
        $conectar = (new Conectar())->getConectar();
        $query = "SELECT productos.*, categoria_id.nombre_categoria
                  FROM productos
                  LEFT JOIN categoria_id ON productos.categoria_id = categoria_id.id
                  WHERE categoria_id.nombre_categoria = :categoria";
    
        $PDOStatement = $conectar->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute(["categoria"=>$categoria]);
    
        while ($result = $PDOStatement->fetch()) {
            $catalogo[] = $this->createProducto($result);
        }
    
        return $catalogo;
    }
/**
     * Devuelve los datos de un disco en particular 
     * @param int $idProducto El ID del producto
     * @return Mascotas Un objeto Producto o null
     */
    public function producto_id(int $idProducto): ?Mascotas{
        $conectar = (new Conectar())->getConectar();
        
        $query = "SELECT productos.*, GROUP_CONCAT(txp.tipo_id) AS tipos FROM productos
        LEFT JOIN tipo_x_productos AS txp ON productos.id = txp.id_productos
        WHERE productos.id = ?
        GROUP BY productos.id";

        $PDOStatement = $conectar->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute([$idProducto]);
        $producto = $PDOStatement->fetch();

        // echo "<pre>";
        // print_r($catalogo);
        // echo "</pre>";

        if($producto){
            $catalogo = $this->createProducto($producto);
            return $catalogo;
        }else{
            return null;
        }
    }



    public function obtener_categorias(): array
{
    $conectar = (new Conectar())->getConectar();
    $query = "SELECT DISTINCT nombre_categoria FROM categoria_id";

    $PDOStatement = $conectar->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
    $PDOStatement->execute();

    $categorias = $PDOStatement->fetchAll(PDO::FETCH_COLUMN);

    return $categorias;
}


/**
 * Filtra los productos por tipo (perro, gato)
 * @param string $tipo Tipo de mascota a filtrar
 * @return array Lista de productos filtrados por tipo
 */
public function filtrarPorTipo(string $tipo): array
{
    $conexion = (new Conectar())->getConectar();
    $listaFiltrada = [];

    $queryTipoId = "SELECT productos.*, txp.tipo_id AS tipo FROM productos
    LEFT JOIN tipo_x_productos AS txp ON productos.id = txp.id_productos
    WHERE txp.tipo_id IN (SELECT id FROM tipo_id WHERE tipo = :tipo)";
    $stmtTipoId = $conexion->prepare($queryTipoId);
    $stmtTipoId->execute(["tipo"=>$tipo]);
    $stmtTipoId->setFetchMode(PDO::FETCH_ASSOC);

    while ($producto = $stmtTipoId->fetch()){
        $listaFiltrada[] = $this->createProducto($producto);
    }
    return $listaFiltrada ?? [];
}


public function getNombresTipos(): array
{
    $nombresTipos = [];
    foreach ($this->tipo as $idTipo) {
        $tipo = (new Tipos())->get_x_id(intval($idTipo));
        if ($tipo) {
            $nombresTipos[] = $tipo->getTipo();
        }
    }
    return $nombresTipos;
}

  /**
 * Agrupa 6 productos de la categoría marvel del catálogo completo.
 * @return array Un array con los 6 productos de la categoría marvel
 */
public function productos_marvel(string $marvelito): array
{
    $conectar = (new Conectar())->getConectar();
    $productosMarvel = [];

    $query = "SELECT * FROM productos WHERE especial = :marvelito";
    $PDOStatement = $conectar->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute(["marvelito"=>$marvelito]);
        $productos = $PDOStatement->fetchAll();

        foreach ($productos as $productoInfo) {
            $productosMarvel[] = $this->createProducto($productoInfo);
        }

        return $productosMarvel;
}
  
/** Agrupa los 6 productos mas baratos.
* @return array Un array con los productos según su precio.
*/
public function filtrar_precio(): array
{
    $conectar = (new Conectar())->getConectar();
    $productosBaratos = [];

    $query = "SELECT * FROM productos ORDER BY precio ASC LIMIT 6";
    $stmt = $conectar->prepare($query);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $productos = $stmt->fetchAll();

    foreach ($productos as $productoInfo) {
        $productosBaratos[] = $this->createProducto($productoInfo);
    }

    return $productosBaratos;
}


/** Agrupa los productos por talle s.
* @return array Un array con los productos de talle s.
*/

public function filtrar_talle(): array
{
    $conectar = (new Conectar())->getConectar();
    $filtrados = [];

    $query = "SELECT * FROM productos WHERE talle = 'S'";
    $stmt = $conectar->prepare($query);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $productos = $stmt->fetchAll();

        foreach ($productos as $productoInfo) {
            $filtrados[] = $this->createProducto($productoInfo);
        }

        return $filtrados;

            
}

  /**
     * Corta la cantidad de palabras 
     * @return string 
     */

  public function cantidad_palabras(int $total = 8): string
    {
        $texto = $this->descripcion;

        $parrafo = explode(" ", $texto);
        if (count($parrafo) <= $total) {
            $resultado = $texto;
        } else {
            array_splice($parrafo, $total);
            $resultado = implode(" ", $parrafo) . "...";
        }

        return $resultado;
    }

    public function insertarProducto($categoria_id,
    $marca_id,
    $nombre,
    $descripcion,
    $material,
    $talle,
    $fecha,
    $color,
    $imagen,
    $especial,
    $precio){

        $conexion = (new Conectar())->getConectar();
        $query = "INSERT INTO productos VALUES (NULL, :categoria_id, :marca_id, :nombre, :descripcion, :material, :talle, :fecha, :color, :imagen, :especial, :precio)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
            'categoria_id' => $categoria_id,
            'marca_id' => $marca_id,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'material' => $material,
            'talle' => $talle,
            'fecha' => $fecha,
            'color' => $color,
            'imagen' => $imagen,
            'especial' => $especial,
            'precio' => $precio,
            ]
        );

        return $conexion->lastInsertId();
    }


    public function add_tipo(int $id_productos, int $tipo_id)
    {
        $conexion = (new Conectar())->getConectar();
        $query = "INSERT INTO tipo_x_productos VALUES (NULL, :id_productos, :tipo_id)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id_productos' => $id_productos,
                'tipo_id' =>  $tipo_id
            ]
        );
    }



    public function edit($categoria_id, $marca_id, $nombre, $descripcion, $material, $talle, $fecha, $color, $imagen, $especial, $precio)
    {
        $conexion = (new Conectar())->getConectar();
        $query = "UPDATE productos SET
            categoria_id = :categoria_id,
            marca_id = :marca_id,
            nombre = :nombre,
            descripcion = :descripcion,
            material = :material,
            talle = :talle,
            fecha = :fecha,
            color = :color,
            imagen = :imagen,
            especial = :especial,
            precio = :precio
            WHERE id = :id";
    
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id' => $this->id,
                'categoria_id' => $categoria_id,
                'marca_id' => $marca_id,
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'material' => $material,
                'talle' => $talle,
                'fecha' => $fecha,
                'color' => $color,
                'imagen' => $imagen,
                'especial' => $especial,
                'precio' => $precio,
            ]
        );
    }

    public function borrar()
    {
        $conectar = (new Conectar())->getConectar();
        $query = "DELETE FROM productos WHERE id = ?";

        $PDOStatement = $conectar->prepare($query);
        $PDOStatement->execute([$this->id]);
    }

    public function clear_tipo_x()
    {
        $conexion = (new Conectar())->getConectar();
        $query = "DELETE FROM tipo_x_productos WHERE id_productos = :id_productos";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id_productos' => $this->id
            ]
        );
    }
/**
 * Buscar productos por nombre en la base de datos
 * @param string $termino El término de búsqueda
 * @return array Un array con los resultados de la búsqueda
 */
    
 public function buscador(string $termino = ""): array {
    $conexion = (new Conectar())->getConectar();

        $query = "SELECT * FROM productos WHERE LOWER(nombre) LIKE LOWER(:termino) OR LOWER(descripcion) LIKE LOWER(:termino)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute(['termino' => "%$termino%"]);

        while ($mascota = $PDOStatement->fetch()){
            $resultado[] = $this->createProducto($mascota);
        }

    return $resultado ?? [];
}



// public function getTipos_ids(): array
// {
//     return is_array($this->tipo_id) ? $this->tipo_id : [];
// }

public function getTipos_ids():array
    {
        $idTipos = [];
        foreach ($this->tipo as $t) {
            $idTipos[] = intval($t->getTipo_id());
        }
        return $idTipos;
    }

 /**
     * Precios 
     * @return string 
     */
    public function formateoprecio(): string
    {
        return number_format($this->precio, 2, ",", ".");
    }

     /**
     * Obtener el valor de nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Obtener el valor de categoria
     */
    // public function getCategoria()
    // {
    //     $categorias = (new Categoria())->getCategorias($this->categoria_id);
    //     $nombre = $categorias->getCategoria_nombre();
    //     return $nombre;
    
    // }


    /**
     * Obtener el valor de color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Obtener el valor de talle
     */
    public function getTalle()
    {
        return $this->talle;
    }


  /**
     * Obtener el valor de fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }


    /**
     * Obtener el valor deespecial
     */
    public function getEspecial()
    {
        return $this->especial;
    }

    /**
     * Obtener el valor de descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Obtener el valor de mascotita
     */
    public function getMascotita()
    {
        return $this->mascotita;
    }

    /**
     * Obtener el valor de imagen
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Obtener el valor de tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Obtener el valor de material
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Obtener el valor de precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Obtener el valor de id
     */
    public function getId()
    {
        return $this->id;
    }

       /**
     * Obtener el valor de sabor
     */
    public function getSabor()
    {
        return $this->sabor;
    }
       /**
     * Obtener el valor de ingredientes
     */
    public function getIngredientes()
    {
        return $this->ingredientes;
    }

        /**
     * Obtener el valor de Marca id
     */
    public function getMarca()
    {
        return $this->marca;
    }

        /**
     * Obtener el valor de Categoria id
     */
    public function getCategoria()
    {
        return $this->categoria;
    }
    
        /**
     * Obtener el valor de tipo id
     */
    public function getTipoid()
    {
        return $this->tipo_id;
    }
}

?>