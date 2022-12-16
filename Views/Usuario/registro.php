<?php use Utils\Utils; ?>

<?php if (isset($_SESSION["register"]) && $_SESSION["register"] == "complete"): ?>
    <div class="alert alert-success" role="alert">
        Registro completado correctamente
    </div>
<?php elseif (isset($_SESSION["register"]) && $_SESSION["register"] == "failed"): ?>
    <div class="alert alert-danger" role="alert">
        Registro fallido, introduce bien los datos
    </div>
<?php endif; ?>
<?php Utils::deleteSession("register"); ?>


<h1>Crear cuenta</h1>
<form action="<?=base_url?>usuario/registro" method="post">
    <label for="user">Usuario</label>
    <input type="text" name="data[user]" id="user" required/>

    <label for="user">Email</label>
    <input type="email" name="data[email]" id="email" required/>

    <label for="password">Contraseña</label>
    <input type="password" name="data[password]" id="password" required/><br>

    <p style="color:red"><?=$error ?? "" ?></p><br>
    <input type="submit" value="Registrarse"/>

</form>

