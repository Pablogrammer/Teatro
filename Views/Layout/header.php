<?php
use Models\Categoria;
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda</title>
    <link rel="stylesheet" href="<?=base_url?>styles/style.css">
</head>
<body>
<!-- HEADER -->
<header id="header">
    <div id="logo">
        <img id="logo" src="<?=base_url?>./images/logo.jpg" alt="Logo">
        <a href="<?=base_url?>">
            Teatro
        </a>
    </div>
    <nav>
        <ul>
            <?php if (isset($_SESSION["identity"])):?>

                <li><a href="<?=base_url?>Usuario/logout">Cerrar Sesi&oacute;n</a></li>
            <?php else: ?>
                <li><a href="<?=base_url?>Usuario/identifica">Iniciar Sesi&oacute;n</a></li>
                <li><a href="<?=base_url?>Usuario/registro">Registrarse</a></li>
            <?php endif; ?>
        </ul>
    </nav>

</header>