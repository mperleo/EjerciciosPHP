<?php 
    // incluyo el fichero de las funciónes
    include 'divisas_fun.php';

    // inicio las variables
    $cantidad = 0.00;
    $conversion = false;
    $error = 0;
    $valor = 0;

    // verifico que se ha indicado algo en el formulario
    if(isset($_POST['cantidad'])){
        $valor=validarNumero( $_POST['cantidad']); // valido el número
        if($valor!=null)
            if(isset($_POST['moneda'])){
                $cantidad = convertirEUR($cambio[$_POST['moneda']], $valor); // realizo la conversión
                $conversion = true; // indico que hay una operación realizada
            }
            else{
                $error = 1; // error que indica que el valor del formulario no es un número valido
            }
        else{
            $error = 2; // error que indica que no se ha indicado nada en el formulario
        }    
    }
?>

<link rel="stylesheet" type="text/css" href="estilo/ejercicios.css">

<header>
    <h1>Ejercicio 9 PHP</h1>
    <a href="index.php"><h2>Ejercicios</h2></a>
</header>

<div class="cuerpo">

    <?php 
        // si hay errores muestro los mensajes
        if($error==1){
            echo '<p class="aviso">Indica una moneda para hacer la conversión. </p>';
            echo "<hr>";
        }
        if($error==2){
            echo '<p class="error">Indica un número valido</p>';
            echo "<hr>";
        }
    ?>

    <form action="divisas1.php" method="post">
        <label>Indica una cantidad en euros:</label>
        <input type="text" id="cantidad" name="cantidad"> 
        <hr>
        <label>Selecciona una moneda:</label> <br>
        <input type="radio" id="USD" name="moneda" value="USD"> <label for="USD">Dólar EEUU</label> <br>
        <input type="radio" id="GBP" name="moneda" value="GBP"> <label for="GBP">Libras</label> <br>
        <input type="radio" id="CHF" name="moneda" value="CHF"> <label for="CHF">Franco Suizo</label> <br>
        <input type="radio" id="SEK" name="moneda" value="SEK"> <label for="SEK">Corona Sueca</label> <br>
        <input type="radio" id="RUB" name="moneda" value="RUB"> <label for="RUB">Rublo Ruso</label> <br>
        <input type="radio" id="JPY" name="moneda" value="JPY"> <label for="JPY">Yen</label> <br><br>
        <input type="submit" value="Convertir">
    </form>

    <?php 
        // muestro el resultado de la operación solo si hay una realizada
        if( $conversion == true){
            echo "<hr>";
            echo '<p class="resultado">'.$_POST['cantidad'].' EUR = '.$cantidad.' '.$_POST['moneda'].'</p>';
        }
    ?>

</div>

<footer class='footer'>
    <p>Miguel Pérez León - 71046648Q</p>
</footer>