<?php 
    require 'base_datos_fun.php'; // hago que se necesite el fichero de las funciones para que la página funcione
?>

<link rel="stylesheet" type="text/css" href="estilo/ejercicios.css">

<header>
    <?php 
        // si se entra desde la página de mantener cliente se muestra un botón para volver a esa página
        if(isset($_GET['atras'])){
            echo '<div style="text-align: left">';
            echo '<a style="padding:10px; left" class="boton boton-enlace" href="mantenerClientes.php">Atras</a>';
            echo '</div>';
        }
    ?>
    <h1>Ejercicio cli_02 PHP</h1>
    <a href="index.php"><h2>Ejercicios</h2></a>
</header>

<div class="cuerpo">
    <form action="consultarCliente.php" method="get"> 
        <label for="referencia">Indica una referencia de cliente</label> <br>
         <input type="text" name="referencia" id="referencia" /> 
        <input type="submit" />
    </form>

    <hr>

    <?php 

        // compruebo que se ha indicado el párametro referencia
        if(isset($_GET['referencia'])){
            // si no se ha indicado nada dentro del párametro
            if(empty($_GET['referencia'])){
                echo "<p class='error'>No has indicado una referencia para buscar<p>"; // muestro el mensaje de error
            }
            else{
                // busco el cliente en la base de datos
                $registros=seleccionarCliente( $_GET['referencia']);
                // si la función devuelve un string es que hay algún error en la consulta y muestro en mensaje
                if(is_string($registros)){
                    echo "<p class='error'>".$registros."<p>";
                }
                // muestro los datos si todo es correcto
                else if($registros!=null){
    ?>
        <h3>Lista de los datos del cliente</h3>
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
                </tr>
    <?php 
                    echo '<tr>';  
                    foreach($registros as $clave => $valor){
                        echo "<td>".$valor."</td>";
                    }
                    echo '</tr>';
                }
                else{
                    echo "<p class='error'>No se ha encontrado el cliente con la id:'".$_GET['referencia']."'<p>"; // muestro un mensaje de error si no se ha encontrado el cliente indicado
                }    
    ?>
            </table>
        </div>
    <?php 
            }
        }
    ?>

</div>

<footer class='footer'>
    <p>Miguel Pérez León - 71046648Q</p>
</footer>