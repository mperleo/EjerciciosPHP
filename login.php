<?php 
    // inicio la sesión e inicio las variables necesarias
    session_start();
    $error=0;
    $usuario=array();
    $veces=1;

    // si existe la variable se sesión veces la incremento y la guardo para usarla
    if(isset($_SESSION['veces'])){
        $veces=$_SESSION['veces'];
        $veces++;
    }

    // si se ha iniciado sesión 5 veces o más se bloqueara el inicio y se pone la variable error a 3 para luego indicarlo
    if($veces>5){
        $error=3;
    }
    else if(isset($_POST['email'])){
        if(strcmp($_POST['email'],"admin")===0){
            if(isset($_POST['pass'])){
                if(strcmp($_POST['pass'],"1234")===0){
                    // si el email y la contraseña son correctos se guardan los datos en la sesión y se pone a 0 las veces que se ha intentado iniciar sesión
                    $usuario['email']= $_POST['email'];
                    $usuario['pass']= $_POST['pass'];
                    $usuario['t-conex']= $_SERVER['REQUEST_TIME'];

                    $_SESSION['usuario']=$usuario;

                    $veces=0;
                    $_SESSION['veces']=$veces;

                    // mando al usuario a la página de inicio
                    header('Location: inicio.php');
                    die (); 
                }
                // si la contraseña no coincide se pone el error a 2
                else{
                    $error=2;
                }
            }
        }
        // si el email de usuario no coincide se pone el error a 1
        else{
            $error=1;
        }
    }
    // modifico el valor de las veces
    $_SESSION['veces']=$veces;
?>

<link rel="stylesheet" type="text/css" href="estilo/ejercicios.css">

<header>
    <h1>Ejercicio 8 PHP</h1>
    <h1>LOGIN</h1>
    <a href="index.php"><h2>Ejercicios</h2></a>
</header>

<div class="cuerpo">

    <?php 
        // muestro los errores según el valor de la variable
        if($error==1){
            echo '<p class="error">No has indicado un email de usuario valido. </p>';
            echo "<hr>";
        }
        else if($error==2){
            echo '<p class="error">No has indicado la contraseña correcta.</p>';
            echo "<hr>";
        }

        // si el error es el 3, fallado muchas veces el formulario
        if($error==3){
            echo '<p class="error">Entrada al sitio bloqueada por fallar '.$veces.' veces</p>';
        }
        // muestro el formulario si no esta bloqueado por fallar más de 5 veces
        else{
    ?>

    <h3> Inicio de sesión </h3>
    <hr>
    <form action="login.php" method="post"> 
        <label for="email">email de usuario </label> <br>
            <input type="text" name="email" id="email" /> <br>
        <label for="pass">Contraseña</label> <br>
            <input type="password" name="pass" id="pass" /> <br>
            <br>
        <input type="submit" value="Conectar" />
    </form>

    <?php 
        } // cierre de el else de la primera parte
    ?>

</div>

<footer class='footer'>
    <p>Miguel Pérez León - 71046648Q</p>
</footer>