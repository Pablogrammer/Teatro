<?php

if (!isset($_SESSION['identity'])):?>

<h1>Login</h1>
<form action="<?=base_url?>Usuario/identifica" method="post">
    <label for="user">Usuario</label>
    <input type="text" name="data[user]" required/>
    
    <label for="password">Contraseña</label>
    <input type="password" name="data[password]" required/><br>

    <p style="color:red"><?=$error ?? "" ?></p><br>

    <input type="submit" value="Enviar"/>
</form>

<?php else: ?>
    <h3><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->password?></h3>
<?php endif; ?>