<?php
    // inicio la sesión
    session_start(); 

    // si se ha indicado que se reinicie el juego borro las variables de sesión
    if(isset($_GET['nuevo'])){
        unset($_SESSION['solucion']);
        unset($_SESSION['min']);
        unset($_SESSION['max']);
    }

    // guardo en la sesión los datos en caso de no estar ya en ella
    if(isset($_SESSION['max'])==null){
       $_SESSION['max']=100;
    }

    if(isset($_SESSION['min'])==null){
        $_SESSION['min']=1;
    }

    if(isset($_SESSION['solucion'])==null){
        $_SESSION['solucion']= rand(1,100);
    }
?> 

<link rel="stylesheet" type="text/css" href="estilo/ejercicios.css">

<header>
    <h1>Ejercicio 7 PHP</h1>
    <a href="index.php"><h2>Ejercicios</h2></a>
</header>

<div class="cuerpo">

    <?php 
        // si se ha indicado que se muestre la solución
        if(isset($_GET['solucion'])){
            echo '<p class="aviso">El <strong>'.$_SESSION['solucion'].'</strong> es la solución</p>';
            echo "<hr>";
        }
        
        // compruebo si se ha indicado un número en el formulario
        if(isset($_GET['numero'])){
            $numero = intval($_GET['numero']);
            // si no es un valor numérico
            if($numero<=0){
                echo '<p class="error">No has indicado un número.</p>';
                echo "<hr>";
            }
            else{
                // si el valor coincide con la solución muestro un mensaje al usuario y borro las variables de sesión
                if($numero == $_SESSION['solucion']){
                    echo '<p class="bien">El <strong>'.$_SESSION['solucion'].'</strong> era la solución</p>';
                    unset($_SESSION['solucion']);
                    unset($_SESSION['min']);
                    unset($_SESSION['max']);

                    // reinicio el juego
                    $_SESSION['max']=100;
                    $_SESSION['min']=1;
                    $_SESSION['solucion']= rand(1,100);
                } 
                // si no es la solución y es un numero modifico los valores de los rangos en los que se encuentra el valor correcto
                else if($numero > $_SESSION['solucion'] && $numero < $_SESSION['max'] ){ 
                    $_SESSION['max']=$numero;
                }
                else if($numero < $_SESSION['solucion'] && $numero > $_SESSION['min']){ 
                    $_SESSION['min']=$numero;
                }
                echo "<hr>";
            }
        }
    ?>

    <form action="mayorMenor.php" method="get"> 
        <label for="numero"><?php echo "Dame un número entre ".$_SESSION['min']." e ".$_SESSION['max'] ?></label>
         <input type="text" name="numero" id="numero" /> 
        <input type="submit" value="Comprobar" />
    </form>
    <hr>
    
    <form action="mayorMenor.php" method="get"> 
        <input class="boton" type="submit" value="Nuevo juego" name="nuevo" id="nuevo" />
    </form>

    <form action="mayorMenor.php" method="get"> 
        <input class="boton" type="submit" value="Solución" name="solucion" id="solucion" />
    </form>
</div>

<footer class='footer'>
    <p>Miguel Pérez León - 71046648Q</p>
</footer>