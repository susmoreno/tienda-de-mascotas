
<div class="row my-5 justify-content-center">
    <div class="col col-md-5">
 
        <h1 class="text-center mb-5 fw-bold">Iniciar Sesión</h1>
        
		<div>
			<?= $alerta = (new Alertas())->get_alertas(); ?>
		</div> 

        <form class="row g-3" action="acciones/auth_login.php" method="POST">
            <!-- Your form fields go here -->
            <div class="col-12 mb-3">
                <label for="username" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>

            <div class="col-12 mb-3">
                <label for="pass" class="form-label">Password</label>
                <input type="password" class="form-control" id="pass" name="pass">
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>