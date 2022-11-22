<h1 class="nombre-pagina">Actualizar Servicio</h1>
<p class="descripcion-pagina">Modifica los valores del formulario</p>

<?php
    include_once __DIR__ . '/../plantillas/barra.php';
    include_once __DIR__ . '/../plantillas/alertas.php';
?>

<form class="formulario" method="POST">
    <?php
        include_once __DIR__.'/formulario.php';
    ?>
    <input type="submit" class="boton" value="Actualizar Servicio">
</form>