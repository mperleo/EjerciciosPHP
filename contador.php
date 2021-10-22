<?php
    //inicio la sesión y las variables
    session_start(); 
    $contador=1;

    // compruebo si se ha enviado la petición de poner el contador a 0 en caso de que se haya indicado elimina el contador de la sesión
    if(isset($_GET['limpiar'])){
        unset($_SESSION['contador']);
    }
?> 

<link rel="stylesheet" type="text/css" href="estilo/ejercicios.css">

<header>
    <h1>Ejercicio 6 PHP</h1>
    <a href="index.php"><h2>Ejercicios</h2></a>
</header>

<div class="cuerpo">
    <?php 
        // verifico si se ha enviado un número por el formulario GET
        if(isset($_GET['numero'])){
            $numero = intval($_GET['numero']);
            // si no es un valor numérico, si es cierto muestro un mensaje al usuario
            if($numero<=0){
                echo '<p class="error">No has indicado un número. No se ha modifiado el contador con el valor indicado.</p>';
                echo "<hr>";
                $contador=$_SESSION['contador'];
            }
            // si no es vacio, guardo el valor del número indicado en la variable contador y guardo ese valor como el nuevo contador en la sesión
            else{
                $contador=$_GET['numero'];
                $_SESSION['contador']=$contador;
            }
        }
        // compruebo si el contador esta subido en la sesión
        else if(isset($_SESSION['contador'])){
            $contador=$_SESSION['contador'];
        }
        // si no esta el contador en la sesión lo incluyo
        else{
            $_SESSION['contador']=$contador;
        }

        // muestro el contador de la sesión y lo incremento para la siguente entrada a la página
        echo "<b>Contador:</b> ".$contador;
        $_SESSION['contador']++;

    ?> 
    <hr>

    <a href="contador.php" class="boton-enlace"><div class="boton">
        Actualizar
    </div></a>
    <hr>

    <form action="contador.php" method="get"> 
        <input class="boton" type="submit" value="Limpiar" name="limpiar" id="limpiar" />
    </form>
    <hr>

    <form action="contador.php" method="get"> 
        <label for="numero">Indica un número: </label>
         <input type="text" name="numero" id="numero" /> 
        <input type="submit" value="Establecer" />
    </form>

</div>

<footer class='footer'>
    <p>Miguel Pérez León - 71046648Q</p>
</footer>