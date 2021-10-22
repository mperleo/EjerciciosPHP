<?php 
    require 'base_datos_fun.php'; // hago que se necesite el fichero de las funciones para que la página funcione
?>

<link rel="stylesheet" type="text/css" href="estilo/ejercicios.css">

<header>
    <h1>Ejercicio cli_03 PHP</h1>
    <a href="index.php"><h2>Ejercicios</h2></a>
</header>

<div class="cuerpo">

    <h3>Indica los datos del nuevo usuario:</h3>


        <form action="crearCliente.php" method="post"> 
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
            <input type="submit" />
        </form>

    <hr>

    <?php 
        // si se ha indicado algo en el formulario
        if(isset($_POST['nombre'])){
            
            // creo el cliente
            $resultado= crearCliente();

            // como las referencias tienen un tamaño y formato (8 caracteres, 2 letras y 6 cifras numéricas) concreto si es de ese tamaño puedo saber si se devuelve una referencia u otro mensaje
            if(strlen($resultado)!=8)
                echo "<p class='error'>".$resultado."<p>";  // muestro un mensaje de error si ha fallado algo al intentar crear
            else{
                echo "<p class='bien'>El cliente se ha dado de alta con exito su referencia es ".$resultado."<p>"; // muestro el mensaje de que se ha creado el cliente y se indica la referencia nueva
            }

        }
    ?>

</div>

<footer class='footer'>
    <p>Miguel Pérez León - 71046648Q</p>
</footer>