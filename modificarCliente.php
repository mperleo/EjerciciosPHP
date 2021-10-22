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
    <h1>Ejercicio cli_04 PHP</h1>
    <a href="index.php"><h2>Ejercicios</h2></a>
</header>

<div class="cuerpo">
    <form action="modificarCliente.php" method="get"> 
        <label for="referencia">Indica una referencia del cliente</label> <br>
         <input type="text" name="referencia" id="referencia" /> 
        <input type="submit" />
    </form>

    <?php 
        // busco si se ha indicado algo en la referencia para buscar
        if(isset($_GET['referencia'])){
        
            // si no se indica una referencia se muestra un mensaje de error
            if(empty($_GET['referencia'])){
                echo "<p class='error'>No has indicado una referencia para buscar<p>"; 
            }
            else{
                // busco la referencia en la base de datos
                $registros=seleccionarCliente( $_GET['referencia']);
                // si hay errores los muestro
                if(is_string($registros)){
                    echo "<p class='error'>".$registros."<p>";
                }
                // si todo es correcto muestro el formulario para meter los nuevos datos y los datos anteriores del cliente
                else if($registros!=null){
    ?>
        <hr>
        <h3>Datos del cliente:</h3>
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
    ?>
            </table>
        </div>
        <hr>
        <h3>Indica los datos a modificar:</h3>
        <form action="modificarCliente.php" method="post"> 
            <label for="cifnif">Cif/nif</label> <br>
            <input type="text" name="cifnif" id="cifnif" /> <br>
            <label for="nombre">Nombre</label> <br>
            <input type="text" name="nombre" id="nombre" /> <br>
            <label for="apellidos">Apellidos</label> <br>
            <input type="text" name="apellidos" id="apellidos" /> <br>
            <label for="domFiscal ">DomFiscal</label> <br>
            <input type="text" name="domFiscal" id="domFiscal" /> <br>
            <label for="domEnvio">DomEnvio</label> <br>
            <input type="text" name="domEnvio" id="domEnvio" /> <br>
            <label for="email">Email</label> <br> 
            <input type="text" name="email" id="email" /> <br>
            <label for="password">Contraseña</label> <br>
            <input type="text" name="password" id="password" /> <br>
            <input style="display: none" type="text" name="referencia_get" id="referencia_get" value=<?php echo '"'.$_GET['referencia'].'"';?> />
            <input type="submit" value="Modificar" />
        </form>
    <?php
                }
                else{
                    echo "<p class='error'>No se ha encontrado el cliente con la id:'".$_GET['referencia']."'<p>"; // si se ha indicado una referencia que no esta en la base de datos
                }    
    ?>
    <?php 
            }
        }
    ?>

    <?php 
        //si hay algo en el formulario 
        if(isset($_POST['nombre'])){
        
            // modifico el cliente
            $resultado= modificarCliente();
            // como las referencias tienen un tamaño y formato (8 caracteres, 2 letras y 6 cifras numéricas) concreto si es de ese tamaño puedo saber si se devuelve una referencia u otro mensaje
            if(strlen($resultado)!=8)
                echo "<p class='error'>".$resultado."<p>"; // muestro un mensaje de error si ha fallado algo al intentar modificar
            else{
                echo "<p class='bien'>El cliente con la referencia ".$resultado." se ha modificado con exito <p>"; // muestro el mensaje de que se ha modificad el cliente y se indica la referencia
            }

        }
    ?>
</div>

<footer class='footer'>
    <p>Miguel Pérez León - 71046648Q</p>
</footer>