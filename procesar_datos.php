
<?php
echo "<h1>Detalles del formulario</h1>";

$datos = $_POST;
// Obtener el valor seleccionado del campo de selección de mascotas
$mascotas = $datos['mascotas'];

//isset si la variable es true o false

if (isset($datos['favoritos'])) {
        $num = count($datos['favoritos']);
    } else {
        $num = 0;
    }
    
switch($num){
    case '1':
           $mensaje ="Buena elección";
           break;
        case '2':
            $mensaje="Me encanta";
            break;
        case '3':
            $mensaje = "Algo es algo!!";
            break;
      case '4':
        $mensaje = "Muy buena elección";
        break;
      case '5':
         $mensaje = "Son todos muy tiernos!!";
      break;
    
    default:
          $mensaje ="Que mal gusto tenes:(";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Respuesta</title>
        <link rel="stylesheet" href="estilo/respuestas.css">
</head>
<body>
        <div class="contenedor">
                <div class="info">
       <p>Mucha Suerte <?php echo "<strong>$datos[nombre]</strong>" ?>!!</p>
       <h2>Sus datos ingresados fueron:</h2>
       <p>Telefono: <?php echo "<strong>$datos[telefono]</strong>"?> </p>
       <p>Email: <?php echo "<strong>$datos[email]</strong>"?> </p>
       <p>Fecha de nacimiento:  <?php echo "<strong>$datos[nacimiento]</strong>" ?> </p>
      <?php

    // Procesar el valor
     if ($mascotas) {
    echo "<p>Tienes $mascotas mascotas.</p>";
    } else {
    echo "<p>No seleccionaste el número de mascotas.</p>";
    }
     ?>

<a href="index.php?info=inicio"class=" btn botoncolor fw-bold">Volver al Inicio</a>
                </div>
                
                <div class="rosa">
      
       <h3>Las prendas</h3>

       <ul>
        <?php
        if ($num > 0) {
            foreach ($datos['favoritos'] as $valor) {

            $valor = str_replace("_", " ", $valor);
            $valor = ucfirst($valor);
            
                echo "<li>$valor </li>";
            }
        } else {
            echo "<li>No hay ninguna prenda ingresada</li>";
        }
        ?>
        </ul>

      <p class="parrafo">Has seleccionado <?php echo "$num"?> de las 5 prendas.</p>"
     <p> <?php echo "<h3>$mensaje</h3>"?> </p>
     <img src="img/sonrisa.png" alt="perrito y gatito">
        </div>
        </div>

</body>
</html>