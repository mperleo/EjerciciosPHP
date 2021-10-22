<?php 
    require 'base_datos_fun.php'; // hago que se necesite el fichero de las funciones para que la página funcione

    // inicio las variables para hacer la paginación
    $pagina = 1;
    $n_indices = 10;

    // si se ha indicado la página en la url la obtengo para mostrar la adecuada
    if(isset($_GET['pagina'])){
        if(!empty($_GET['pagina'])){
            $pagina = $_GET['pagina'];
        }
    }
?>

<link rel="stylesheet" type="text/css" href="estilo/ejercicios.css">

<header>
    <h1>Ejercicio cli_01 PHP</h1>
    <a href="index.php"><h2>Ejercicios</h2></a>
</header>

<div class="cuerpo">
    <?php 
        // obtengo los datos de los clientes para mostrarlos 
        $registros=seleccionarTodos("todos");
        // si hay un error se muestra y no se mostrara el resto de la página
        if(is_string($registros)){
            echo "<p class='error'>".$registros."<p>";
        }
        else{
    ?>
    <h3>Lista de los clientes de la base de datos:</h3>
    <div class="tablas-bd">
        <table>
            <tr>
                <th>id_cliente</th>
                <th>referencia</th>
                <th>cifnif</th>
                <th>nombre</th>
                <th>apellidos</th>
                <th>domFiscal</th>
                <th>domEnvio</th>
                <th>notas</th>
                <th>email</th>
                <th>contraseña</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <?php 
                // calculo el numero de páginas según el número de registros por página y según el número de registros totales
                $n_paginas= intdiv($registros['n-indices'],$n_indices) +1;

                if($registros['n-indices'] % $n_paginas == 0){
                    $n_paginas=$n_paginas-1;
                }
                
                if($pagina==1){
                    $maximo=$n_indices;
                    $i=0;
                }
                else{
                    if($pagina < $n_paginas){
                        $maximo= $n_indices * $pagina;
                        $i= $n_indices * ($pagina-1);
                    }
                    else{
                        $maximo= $n_indices * $n_paginas;
                        $i= $n_indices * ($n_paginas-1);
                    }
                }

                if($maximo > $registros['n-indices']){
                    $maximo=$registros['n-indices'];
                }

                // muestro los registros de la pagina correspondiente
                for($i; $i<$maximo; $i++){
                    echo '<tr>';
                    foreach($registros[$i] as $clave => $valor){    
                        echo "<td>".$valor."</td>";
                    }
                    echo "<td><a href='consultarCliente.php?referencia=".$registros[$i]['referencia']."&atras'>Consultar</a></td>";
                    echo "<td><a href='modificarCliente.php?referencia=".$registros[$i]['referencia']."&atras'>Modificar</a></td>";
                    echo "<td><a href='borrarCliente.php?referencia=".$registros[$i]['referencia']."&atras'>Eliminar</a></td>";
                    echo '</tr>';
                }

                
            ?>
        </table>
    </div>
    <hr>
    <?php 
            // muestro los enlaces del paginador
                echo "<div class='paginador'>";
                for($i=1; $i<=$n_paginas; $i++){
                    if($i==$pagina)
                    echo '<a class="activo" href="listarClientes.php?pagina='.$i.'">'.$i.'</a> ';
                    else
                    echo '<a href="listarClientes.php?pagina='.$i.'">'.$i.'</a> ';
                }
                echo "</div>";
        }
    ?>    

</div>

<footer class='footer'>
    <p>Miguel Pérez León - 71046648Q</p>
</footer>