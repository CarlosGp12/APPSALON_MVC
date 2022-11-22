<h1 class="nombre-pagina">Olvide Password</h1>
<p class="descripcion-pagina">Reestablece tu password escribiendo tu email a continuacion</p>
<?php include_once __DIR__."/../plantillas/alertas.php" ?>
<form class="formulario" method="POST" action="/olvide">
    <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Tu Email">
    </div>
    <input type="submit" value="Enviar Instrucciones" class="boton">

</form>
<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? inicia Sesion</a>
    <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crear una</a>
</div>