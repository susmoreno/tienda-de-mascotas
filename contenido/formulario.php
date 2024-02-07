
<?php

$favoritos = [
    "traje" => "Traje",
    "vestido" => "Vestido",
    "ciervo" => "Ciervo",
    "capitan-america" => "Cápitan America",
    "toy-story"=>"Toy Story"
]

?>

<section>

            <div class="col-12 bg-light text-center">
                <h1>Participá por tu vestimenta favorita</h1>
            </div>

<div class="row form">
<img class=" col-6 foto" src="img/imgform.png" alt="chica en pijama con un gato">

<div class="col-6 fondopatitas">
        <section>

            <div class="col-12 ">
                <form action="procesar_datos.php" method="post">
                    <div class="g-2">
                        <div class="col-12">
                            <div class="form-floating m-4 mt-5 ">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre" required>
                                <label for="nombre" class="form-label">Ingrese su Nombre</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating m-4 mt-5 ">
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su telefono" required>

                                <label for="telefono" class="form-label">Ingrese su telefono</label>
                            </div>
                        </div>
                        
                    </div>

                    <div class="col-12">
                    <div class="form-floating m-4">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                         <label for="email">Email</label>
                             </div>
                        </div>
                    
                        <div class="col-12">
                            <div class="form-floating m-4">
                                <input class="form-control" type="date" name="nacimiento" id="nacimiento" min="1980-01-01" max="2005-01-01" value="1987-09-10" required>
                                <label for="nacimiento">Fecha de nacimiento:</label>
                            </div>
                        </div>

                        <div class="form-floating m-4">
                         <select class="form-select" id="floatingSelect" name="mascotas" aria-label="¿Cuántas mascotas tienes?">
                             <option selected>¿Cuántas mascotas tienes?</option>
                             <option value="1">Uno</option>
                             <option value="2">Dos</option>
                             <option value="3">Tres</option>
                             <option value="4">Cuatro o más</option>
                             </select>
                            <label for="floatingSelect">Mascotas</label>
                        </div>

                        <div class="col-12">
                            <div class="m-4 mt-5">
                                <div class="mb-4 fw-bold">¿Cuáles de estas prendas son tus favoritas?</div>
                                <div class="d-flex flex-wrap justify-content-start">
                                    <div class="d-flex flex-wrap justify-content-start">

<?PHP 
    foreach ($favoritos as $valor) { 
       
     $codigo_minusculas = strtolower($valor);
     $codigo_sinEspacios = str_replace(" ", "_", $codigo_minusculas);
    ?>

 <div class="form-check form-check-inline form-switch ">
 <input class="form-check-input" type="checkbox" id="check_<?= $codigo_sinEspacios ?>" name="favoritos[]" value="<?= $codigo_sinEspacios ?>">
 <label class="form-check-label mb-4 px-2" for="check_<?= $codigo_sinEspacios ?>"><?= $valor ?></label>
  </div>

 <?PHP } ?>

</div>
  <button type="submit" class="btn botoncolor w-100 mt-2">Enviar</button>

  </div>
  </div>
   </div>
 </div>
 </div>
                </form>
            </div>
        </section>

    </div>
    </div>

</section>