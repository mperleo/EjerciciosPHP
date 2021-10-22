<?php 
    // incluyo el fichero de las funcióness
    include 'divisas_fun.php';

    // inicio las variables
    $cantidad = 0.00;
    $conversion = false;
    $error = 0;
    $valor = 0;

    // verifico que se ha indicado algo en el formulario
    if(isset($_POST['cantidad'])){
        $valor=validarNumero( $_POST['cantidad']);// valido el número
        // si el número es valido hago las operaciones
        if($valor!=null)
            if(isset($_POST['moneda-or']) && isset($_POST['moneda-fin'])){
                if($_POST['moneda-or'] !=1 && $_POST['moneda-fin'] !=1){ // compruebo que no se haya usado la opcion usada como placeholder
                    $cantidad = convertirTodo($cambio[$_POST['moneda-or']], $cambio[$_POST['moneda-fin']], $valor); // realizo la conversión
                    $conversion = true;// indico que hay una operación realizada
                }
                else{
                    $error = 1; // error que indica que una moneda no es valida o no se ha seleccionado
                }    
            }
            else{
                $error = 1; // error que indica que una moneda no es valida o no se ha seleccionado
            }
        else{
            $error = 2; // error que indica que una moneda no es valida o no se ha seleccionado
        }    
    }
?>

<link rel="stylesheet" type="text/css" href="estilo/ejercicios.css">

<header>
    <h1>Ejercicio 11 PHP</h1>
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

    <form action="divisas3.php" method="post">
        <select name="moneda-or" id="moneda-or">
            <option value="1">Selecciona la moneda origen</option>
                <optgroup label="Moneda origen">
                <option value="EUR">Euro</option>
                <option value="USD">Dólar EEUU</option>
                <option value="GBP">Libras</option>
                <option value="CHF">Franco Suizo</option>
                <option value="SEK">Corona Sueca</option>
                <option value="RUB">Rublo Ruso</option>
                <option value="JPY">Yen</option>
            </optgroup>
        </select>

        <label> Indica una cantidad:</label>
        <input type="text" id="cantidad" name="cantidad"> 
        
        <select name="moneda-fin" id="moneda-fin">
            <option value="1">Selecciona la moneda final</option>
              <optgroup label="Moneda a convertir">
              <option value="EUR">Euro</option>
                <option value="USD">Dólar EEUU</option>
                <option value="GBP">Libras</option>
                <option value="CHF">Franco Suizo</option>
                <option value="SEK">Corona Sueca</option>
                <option value="RUB">Rublo Ruso</option>
                <option value="JPY">Yen</option>
              </optgroup>
        </select>
        <br><br>
        <input type="submit" value="Convertir">
    </form>

    <?php 
        // muestro el resultado de la operación solo si hay una realizada
        if( $conversion == true){
            echo "<hr>";
            echo '<p class="resultado">'.$_POST['cantidad'].' '.$_POST['moneda-or']. ' = '.$cantidad.' '.$_POST['moneda-fin'].'</p>';
        }
    ?>

</div>

<footer class='footer'>
    <p>Miguel Pérez León - 71046648Q</p>
</footer>

