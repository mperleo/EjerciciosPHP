<?php 
    // inicio la sesión e inicio las variables necesarias
    session_start();
    $bloqueado= false;
    $aviso= false;

    // si se ha intentado demasiadas veces el inicio de sesión sin exito bloqueo el formulario
    if(isset($_SESSION['veces']) && $_SESSION['veces']>5){
        $bloqueado= true;
    }
    // si no se ha iniciado sesión se hace una redirección a la página de login
    else if(isset($_SESSION['usuario'])==NULL){
        header('Location: login.php');
        die ();
    }
    // si el usuario ha iniciado sesión correctamente
    else{
        $usuario=array();
        $usuario=$_SESSION['usuario'];
    }

    //Si se ha hecho un logout quitar ultima condicion para poder cerrar la sesion cuando este el bloqueo activo
    if(isset($_GET['logout']) && $_GET['logout']==1 && $bloqueado == false){
        session_unset();
        // descomentar para hacer que el logout te lleve directamente a la pagina de login
        //header('Location: login.php');
        //die (); 
        $aviso=true;
    }
?>

<link rel="stylesheet" type="text/css" href="estilo/ejercicios.css">

<header>
    <h1>Ejercicio 8 PHP</h1>
    <h1>INICIO</h1>
    <a href="index.php"><h2>Ejercicios</h2></a>
    <form action="inicio.php" method="get"> 
        <input style="display:none" type="text" value="1" name="logout" id="logout" />
        <input class="boton" type="submit" value="Desconectar" />
    </form>
</header>

<div class="cuerpo">

    <?php
        // muestro distintos mensajes según si el usuario ha fallado el inicio de sesión, si se ha desconectado o si se ha conectado
        if($bloqueado==true)
            echo '<p class="error">Entrada al sitio bloqueada por fallar '.$_SESSION['veces'].' veces</p>';
        else if($aviso==true)
            echo '<p class="aviso">Usuario desconectado. Actualiza la págian para volver a entrar</p>';
        else
            echo "<p>Hola ".$usuario['nombre'].", te has conectado hace ". (time()-$usuario['t-conex'])." segundos.</p>"; // si se ha conectado muestro el tiempo desde la conexión
    ?>

</div>

<footer class='footer'>
    <p>Miguel Pérez León - 71046648Q</p>
</footer>