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
    <h1>Ejercicio cli_05 PHP</h1>
    <a href="index.php"><h2>Ejercicios</h2></a>
</header>

<div class="cuerpo">

    <form action="borrarCliente.php" method="get"> 
        <label for="referencia">Indica una referencia de Cliente</label> <br>
         <input type="text" name="referencia" id="referencia" /> 
        <input type="submit" />
    </form>
<?php 
    
    // si se ha indicado una referencia
    if(isset($_GET['referencia'])){
        
        // si hay errores indicados
        if(isset($_GET['error']) && $_GET['error']==1){ // si el error es el 1 es que las referencias indicadas en el get y el post no son las mismas y no se puede hacer el borrado
            echo "<p class='error'>Las referencias indicadas no coinciden <p>";
        }
        else if(isset($_GET['error']) && $_GET['error']!=1){ // si es otro error se muestra en un mensaje
            echo $_GET['error'];
        }

        // si no se ha indicado ningúna refencia se muestra el error
        if(empty($_GET['referencia'])){
            echo "<p class='error'>No has indicado una referencia para buscar<p>";
        }
        else{
            // si hay una referencia indicada se buscan los datos 
            $registros=seleccionarCliente( $_GET['referencia']);
            if(is_string($registros)){
                echo "<p class='error'>".$registros."<p>"; // si hay errores con la base de datos se muestra
            }
            else if($registros!=null){ // si no hay errores se mustran los datos y el formulario de confirmación del borrado
?>
    <hr>
    <h3>Lista de los datos del Cliente</h3>
    <div class="tablas-bd">
        <table>
            <tr>
                <th>id_Cliente</th>
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
            // si no se encuentra un cliente con la referencia indicada
            else{
                echo "<p class='error'>No se ha encontrado el Cliente con la id:'".$_GET['referencia']."'<p>";
            }    
?>
        </table>
    </div>

    <hr>
    <form action="borrarCliente.php" method="post"> 
        <label for="referencia">Indica la referencia del Cliente para confirmar el borrado:</label> <br>
         <input type="text" name="referencia" id="referencia" /> 
         <input style="display: none" type="text" name="referencia_get" id="referencia_get" value=<?php echo '"'.$_GET['referencia'].'"';?> /> 
        <input type="submit" value="Borrar" />
    </form>
<?php 
        }
    }

    // si se ha indicado la referencia por post
    if(isset($_POST['referencia'])){ 
        // verifico que las dos referencias son las mismas
        if(strcmp($_POST['referencia'], $_POST['referencia_get'])===0){
        
            $resultado= borrarCliente($_POST['referencia']); // borro el cliente
            if($resultado!= null){ // indico que hay errores en el borrado en la cadena y la mando con una redirección a la pagina
                $error= "<p class='error'>".$resultado."<p>";
                header('Location: borrarCliente.php?referencia='.$_POST['referencia_get'].'&error='.$error.'');
            }
            else{
                echo "<p class='bien'>El Cliente se ha borrado con exito<p>"; // si se borra con exito se muestra el mensaje de confirmación del borrado
            }
        }
        else{
            header('Location: borrarCliente.php?referencia='.$_POST['referencia_get'].'&error=1'); // redirecciono al usuario con la indicación del error
        }

    }
?>

</div>

<footer class='footer'>
    <p>Miguel Pérez León - 71046648Q</p>
</footer>