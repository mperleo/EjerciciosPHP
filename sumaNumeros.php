<?php
    // inicio las variables para hacer los calculos
    $numero=0;
    $suma=0;
?> 

<link rel="stylesheet" type="text/css" href="estilo/ejercicios.css">

<header>
    <h1>Ejercicio 3 PHP</h1>
    <a href="index.php"><h2>Ejercicios</h2></a>
</header>

<div class="cuerpo">

    <form action="sumaNumeros.php" method="get"> 
        <h3><label for="numero">Indica un número </label></h3>
         <input type="text" name="numero" id="numero" /> 
        <input type="submit" />
    </form>
    <hr>

    <?php 
        // compruebo que se ha indicado algo en el formulario
        if(isset($_GET['numero'])){
            $numero = intval($_GET['numero']);
            // verifico que el contenido enviado por el formulario es un número y hago los calculos
            if($numero>0){
                echo '<p>Suma de los '.$numero.' primeros números:</p>';
                echo '<table>';
                    echo '<tr>';
                        echo '<th>Número</th>';
                        echo '<th>Acumulado</th>';
                    echo '</tr>';
                    for ($i = 1; $i <= $numero; $i++) {
                        echo "<tr>";
                        echo "<td>".$i."</td>";
                        $suma= $suma + $i;
                        echo "<td>".$suma."</td>";
                        echo "</tr>";
                    }
                echo '</table>';
            }
            // error 1: se ha indicado algo en el formulario que no es un número
            else{
                echo '<p class="error">No se ha indicado un número</p>';
            }
        }
        // error 2: no se ha indicado nada en el formulario     
        else{
            echo '<p class="error">No se ha indicado ningún parámetro</p>';
        }    
    ?>

</div>

<footer class='footer'>
    <p>Miguel Pérez León - 71046648Q</p>
</footer>
