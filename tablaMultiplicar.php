<?php
    // inicio las variables para hacer los calculos
    $numero=0;
    $multiplicacion=0;
?> 

<link rel="stylesheet" type="text/css" href="estilo/ejercicios.css">

<header>
    <h1>Ejercicio 4 PHP</h1>
    <a href="index.php"><h2>Ejercicios</h2></a>
</header>

<div class="cuerpo">

    <form action="tablaMultiplicar.php" method="get"> 
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
        // si hay contenido en el formulario lo paso a valor númerico
        else{
            $numero = intval($_GET['numero']);
        }

        // si no se ha indicado ningún número se cambia el valor por el valor por defecto en este caso 1 y se muestra un mensaje
        if($numero<=0)
        {
            $numero=1;
            echo '<p class="error">No has indicado un número, se mostrara el 1.</p>';
            echo "<hr>";
        }

        // muestro el resultado calculado en una tabla
        echo '<p>Tabla de multiplicar del: '.$numero.'.</p>';
        echo '<table>';
            echo '<tr>';
                echo '<th>Número</th>';
                echo '<th>Resultado</th>';
            echo '</tr>';
            for ($i = 0; $i <= 10; $i++) {
                echo "<tr>";
                echo "<td>".$numero." x ".$i."</td>";
                $multiplicacion= $numero * $i;
                echo "<td>".$multiplicacion."</td>";
                echo "</tr>";
            }
        echo '</table>';
    ?>

</div>

<footer class='footer'>
    <p>Miguel Pérez León - 71046648Q</p>
</footer>