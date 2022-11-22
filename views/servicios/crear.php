<h1 class="nombre-pagina">Nuevo Servicio</h1>
<p class="descripcion-pagina">Llena todo slos campos para añadir un nuevo servicios</p>

<?php
    include_once __DIR__ . '/../plantillas/barra.php';
    include_once __DIR__ . '/../plantillas/alertas.php';
?>

<form class="formulario" action="/servicios/crear" method="POST">
    <?php
        include_once __DIR__.'/formulario.php';
    ?>
    <input type="submit" class="boton" value="Guardar Servicio">
</form>