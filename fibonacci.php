<?php
    // inicio las variables para hacer los calculos
    $numero=0;
    $termino=0;
    $termino1=1;
    $termino2=0;
?> 

<link rel="stylesheet" type="text/css" href="estilo/ejercicios.css">

<header>
    <h1>Ejercicio 5 PHP</h1>
    <a href="index.php"><h2>Ejercicios</h2></a>
</header>

<div class="cuerpo">

    <form action="fibonacci.php" method="get"> 
        <h3><label for="numero">Indica un número </label></h3>
         <input type="text" name="numero" id="numero" /> 
        <input type="submit" />
    </form>
    <hr>

    <?php 
        // compruebo si el formulario se envia vacío
        if(isset($_GET['numero'])==null){
            echo '<p class="error">No se ha indicado ningún parámetro.</p>';
            echo "<hr>";
        }
        else{
            // si hay contenido en el formulario lo paso a valor númerico
            $numero = intval($_GET['numero']);
            if($numero<=0){
                // muestro un mensaje de error en el caso de no ser un valor numérico
                echo '<p class="error">No has indicado un número.</p>';
                echo "<hr>";
            }
            else{
                // muestro el resultado calculado en una tabla
                echo '<p>Sucesión de Fibonacci con '.$numero.' términos:</p>';
                echo '<table>';
                    echo '<tr>';
                        echo '<th>Número</th>';
                        echo '<th>Resultado</th>';
                    echo '</tr>';
                    for ($i = 1; $i <= $numero; $i++) {
                        echo "<tr>";
                        echo "<td>".$i."</td>";

                        $termino= $termino1 + $termino2;
                        echo "<td>".$termino."</td>";
                        echo "</tr>";

                        $termino1=$termino2;
                        $termino2=$termino;
                    }
                echo '</table>';
            }
        }  
    ?>

</div>

<footer class='footer'>
    <p>Miguel Pérez León - 71046648Q</p>
</footer>