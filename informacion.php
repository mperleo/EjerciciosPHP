<?php 

// función para obtener el nombre del buscador mediante $_SERVER['HTTP_USER_AGENT']
function obtenerNombreBuscador($buscador)
{
    // para comprobar solo una cadena y no varias paso la cadena a minusculas
    $buscador= strtolower($buscador);
    if (strpos($buscador, 'opera')) return 'Opera';
    elseif (strpos($buscador, 'edge')) return 'Edge (Version anterior)'; // las versiones más actuales de edge estas basadas en Chrimum (codigo libre de Chrome) y no entran es este if
    elseif (strpos($buscador, 'chrome')) return 'Chrome o basado en Chromium'; // versiones modificadas de Chrome basadas en Chromium se detectan como iguales
    elseif (strpos($buscador, 'safari')) return 'Safari';
    elseif (strpos($buscador, 'firefox')) return 'Firefox';

    return 'Otro buscador distinto de Opera, Firefox, Chrome o Safari';
}

// función para obtener los idiomas que tiene el usuario mediante $_SERVER['HTTP_ACCEPT_LANGUAGE']
function obtenerIdioma($idioma)
{
    // para comprobar solo una cadena y no varias paso la cadena a minusculas
    $idioma= strtolower($idioma);
    if (strpos($idioma, 'es')) return 'Español';
    elseif (strpos($idioma, 'en')) return 'Ingles';
    elseif (strpos($idioma, 'it')) return 'Italiano';
    elseif (strpos($idioma, 'pt')) return 'Portugues';
    
    return 'Otro idoma';
}
?> 

<link rel="stylesheet" type="text/css" href="estilo/ejercicios.css">

<header>
    <h1>Ejercicio 2 PHP</h1>
    <a href="index.php"><h2>Ejercicios</h2></a>
</header>

<div class="cuerpo">

    <h3>Parámetros de la conexión</h3> 
    <?php 
        echo "<b>Solicitud desde:</b> {$_SERVER['SERVER_NAME']} ({$_SERVER["SERVER_ADDR"]}) : <b>Puerto remoto</b> {$_SERVER["REMOTE_PORT"]} <br>"; 
        echo "<b>Usando Protocolo:</b> {$_SERVER['SERVER_PROTOCOL']} <br>";
        echo "<b>Usando petición tipo:</b> {$_SERVER['REQUEST_METHOD']} <br>";
        echo "<b>Usando Navegador:</b> ".obtenerNombreBuscador($_SERVER['HTTP_USER_AGENT'])." <br>";
        echo "<b>Idiomas preferidos:</b> ".obtenerIdioma($_SERVER['HTTP_ACCEPT_LANGUAGE'])."<br>";
    ?>     
    <hr>

    <h3>Parámetros recibidos por GET</h3>
    <?php 
        if(isset($_GET['nombre']) || isset($_GET['navegador'])){
            echo "<b>Nombre y apellidos</b> {$_GET['nombre']}  <br>"; 
            echo "<b>Navegador</b> {$_GET['navegador']} <br>";
        } 
        else
            echo "No se han indicado parametros por el formulario con el método GET";
    ?>   
    <hr>

    <h3>Parámetros recibidos por POST</h3>  
    <?php 
        if(isset($_POST['nombre']) || isset($_POST['navegador']) ){
            echo "<b>Nombre y apellidos</b> {$_POST['nombre']}  <br>"; 
            echo "<b>Navegador</b> {$_POST['navegador']} <br>"; 
        }
        else
            echo "No se han indicado parametros por el formulario con el método POST";
            
    ?>   
    <hr>

    <h3> Formulario GET </h3>
    <form action="informacion.php" method="get">
        <label for="nombre">Nombre y apellidos </label> <br>
         <input type="text" name="nombre" id="nombre" /> <br>
        <label for="navegador">Navegador</label> <br>
         <input type="text" name="navegador" id="navegador"/> <br>
         <br>
        <input type="submit" />
    </form>
    <hr>

    <h3> Formulario POST </h3>
    <form action="informacion.php" method="post"> 
        <label for="nombre">Nombre y apellidos </label> <br>
         <input type="text" name="nombre" id="nombre" /> <br>
        <label for="navegador">Navegador</label> <br>
         <input type="text" name="navegador" id="navegador" /> <br>
         <br>
        <input type="submit" />
    </form>
</div>

<footer class='footer'>
    <p>Miguel Pérez León - 71046648Q</p>
</footer>
