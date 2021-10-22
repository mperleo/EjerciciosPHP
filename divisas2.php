<?php 
    // incluyo el fichero de las funciónes
    include 'divisas_fun.php';

    // inicio las variables
    $cantidad = array();
    $conversion = false;
    $error = 0;
    $valor = 0;

    // verifico que se ha indicado algo en el formulario
    if(isset($_POST['cantidad'])){
        $valor=validarNumero( $_POST['cantidad']); // valido el número
        if($valor!=null)
            if(isset($_POST)){
                foreach ($_POST as $clave => $moneda) {
                    if(array_search($clave, $listMonedas)!= false){
                        $cantidad[$moneda] = convertirEUR($cambio[$moneda], $valor); // realizo la conversión
                        $conversion = true; // indico que hay una operación realizada
                    }
                }
            }
            else{
                $error = 1; // error que indica que el valor del formulario no es un número validos
            }
        else{
            $error = 2; // error que indica que no se ha indicado nada en el formulario
        }    
    }
?>

<link rel="stylesheet" type="text/css" href="estilo/ejercicios.css">

<header>
    <h1>Ejercicio 10 PHP</h1>
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

    <form action="divisas2.php" method="post">
        <label>Indica una cantidad en euros:</label>
        <input type="text" id="cantidad" name="cantidad"> 
        <hr>
        <label>Selecciona una moneda:</label> <br>
        <input type="checkbox" id="USD" name="USD" value="USD"> <label for="USD">Dólar EEUU</label> <br>
        <input type="checkbox" id="GBP" name="GBP" value="GBP"> <label for="GBP">Libras</label> <br>
        <input type="checkbox" id="CHF" name="CHF" value="CHF"> <label for="CHF">Franco Suizo</label> <br>
        <input type="checkbox" id="SEK" name="SEK" value="SEK"> <label for="SEK">Corona Sueca</label> <br>
        <input type="checkbox" id="RUB" name="RUB" value="RUB"> <label for="RUB">Rublo Ruso</label> <br>
        <input type="checkbox" id="JPY" name="JPY" value="JPY"> <label for="JPY">Yen</label> <br><br>
        <input type="submit" value="Convertir">
    </form>

    <?php 
        // muestro el resultado de la operación solo si hay una realizada
        if( $conversion == true){
            echo "<hr>";
            echo '<div class="resultado">';
            foreach ($cantidad as $moneda => $valor) {
                echo '<p style="color:white">'.$_POST['cantidad'].' EUR = '.$valor.' '.$moneda.'</p>';
            }
            echo '</div>';
        }
    ?>

</div>

<footer class='footer'>
    <p>Miguel Pérez León - 71046648Q</p>
</footer>